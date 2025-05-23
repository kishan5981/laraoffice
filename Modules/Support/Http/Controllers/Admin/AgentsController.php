<?php

namespace Modules\Support\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Support\Entities\Agent;
use Modules\Support\Entities\Setting;
use Modules\Support\Helpers\LaravelVersion;

class AgentsController extends Controller
{
    public function index()
    {
        $agents = Agent::agents()->get();

        return view('support::admin.agent.index', compact('agents'));
    }

    public function create()
    {
        $users = Agent::paginate(Setting::grab('paginate_items'));

        return view('support::admin.agent.create', compact('users'));
    }

    public function store(Request $request)
    {
    	$rules = [
            'agents' => 'required|array|min:1',
        ];

        if(LaravelVersion::min('5.2')){
        	$rules['agents.*'] = 'integer|exists:users,id';
        }

    	// $this->validate($request, $rules);

        $agents_list = $this->addAgents($request->input('agents'));
        $agents_names = implode(',', $agents_list);

        Session::flash('status', trans('Agent added  successfully', ['names' => $agents_names]));

        return redirect()->route('admin.agent.index');
    }

    public function update($id, Request $request)
    {
        $this->syncAgentCategories($id, $request);

        Session::flash('status', 'Joined categories successfully');

        return redirect()->route('admin.agent.index');
    }

    public function destroy($id)
    {
        $agent = $this->removeAgent($id);

        Session::flash('status', trans('Agent removed  successfully', ['name' => $agent->name]));

        return redirect()->route('admin.agent.index');
    }

    /**
     * Assign users as agents.
     *
     * @param $user_ids
     *
     * @return array
     */
    public function addAgents($user_ids)
    {
        $users = Agent::find($user_ids);
        foreach ($users as $user) {
            $user->ticketit_agent = true;
            $user->save();
            $users_list[] = $user->name;
        }

        return $users_list;
    }

    /**
     * Remove user from the agents.
     *
     * @param $id
     *
     * @return mixed
     */
    public function removeAgent($id)
    {
        $agent = Agent::find($id);
        $agent->ticketit_agent = false;
        $agent->save();

        // Remove him from tickets categories as well
        if (version_compare(app()->version(), '5.2.0', '>=')) {
            $agent_cats = $agent->categories->pluck('id')->toArray();
        } else { // if Laravel 5.1
            $agent_cats = $agent->categories->lists('id')->toArray();
        }

        $agent->categories()->detach($agent_cats);

        return $agent;
    }

    /**
     * Sync Agent categories with the selected categories got from update form.
     *
     * @param $id
     * @param Request $request
     */
    public function syncAgentCategories($id, Request $request)
    {
        $form_cats = ($request->input('agent_cats') == null) ? [] : $request->input('agent_cats');
        $agent = Agent::find($id);
        $agent->categories()->sync($form_cats);
    }
}