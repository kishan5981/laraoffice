<?php

namespace Modules\Support\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Support\Helpers\LaravelVersion;
use Modules\Support\Entities;
use Modules\Support\Entities\Agent;
use Modules\Support\Entities\Category;
use Modules\Support\Entities\Setting;
use Modules\Support\Entities\Ticket;
use Modules\Support\Helpers\EditorLocale;

class TicketsController extends Controller
{
    protected $tickets;
    protected $agent;

    public function __construct(Ticket $tickets, Agent $agent)
    {
        $this->middleware('Modules\Support\Http\Middleware\ResAccessMiddleware', ['only' => ['show']]);
        $this->middleware('Modules\Support\Http\Middleware\IsAgentMiddleware', ['only' => ['edit', 'update']]);
        $this->middleware('Modules\Support\Http\Middleware\IsAdminMiddleware', ['only' => ['destroy']]);

        $this->tickets = $tickets;
        $this->agent = $agent;
    }

    public function data($complete)
{
    if (LaravelVersion::min('5.4')) {
        $datatables = app(\Yajra\DataTables\DataTables::class);
    } else {
        $datatables = app(\Yajra\Datatables\Datatables::class);
    }
        
    $user = $this->agent->find(\Auth::user()->id);

    if ($user->ticketit_admin == '1') {
        if ($complete) {
            $collection = Ticket::complete();
        } else {
            $collection = Ticket::active();
        }
    } elseif ($user->isAgent()) {
        if ($complete) {
            $collection = Ticket::complete()->agentUserTickets($user->id);
        } else {
            $collection = Ticket::active()->agentUserTickets($user->id);
        }
    } else {
        if ($complete) {
            $collection = Ticket::userTickets($user->id)->complete();
        } else {
            $collection = Ticket::userTickets($user->id)->active();
        }
    }

   
    $collection
    ->join('contacts', 'contacts.id', '=', 'ticketit.user_id')
    ->join('ticketit_statuses', 'ticketit_statuses.id', '=', 'ticketit.status_id')
    ->join('ticketit_priorities', 'ticketit_priorities.id', '=', 'ticketit.priority_id')
    ->join('ticketit_categories', 'ticketit_categories.id', '=', 'ticketit.category_id')
    ->select([
        'ticketit.id',
        'ticketit.subject AS subject',
        'ticketit_statuses.name AS status',
        'ticketit_statuses.color AS color_status',
        'ticketit_priorities.color AS color_priority',
        'ticketit_categories.color AS color_category',
        'ticketit.id AS agent',
        'ticketit.updated_at AS updated_at',
        'ticketit_priorities.name AS priority',
        'contacts.name AS owner',
        'ticketit.agent_id',
        'ticketit_categories.name AS category',
    ]);

    $collection = $datatables->of($collection);

    $this->renderTicketTable($collection);

    $collection->editColumn('updated_at', '{!! \Carbon\Carbon::parse($updated_at)->diffForHumans() !!}');

    // method rawColumns was introduced in laravel-datatables 7, which is only compatible with >L5.4
    // in previous laravel-datatables versions escaping columns wasn't defaut
    if (LaravelVersion::min('5.4')) {
        $collection->rawColumns(['subject', 'status', 'priority', 'category', 'agent']);
    }
// dd($collection);
    return $collection->make(true);
}

    public function renderTicketTable($collection)
    {
        $collection->editColumn('subject', function ($ticket) {
            return $ticket->subject; // Return subject data as plain text
        });

        $collection->editColumn('status', function ($ticket) {
            $color = $ticket->color_status;
            $status = e($ticket->status);

            return "<div style='color: $color'>$status</div>";
        });

        $collection->editColumn('priority', function ($ticket) {
            $color = $ticket->color_priority;
            $priority = e($ticket->priority);

            return "<div style='color: $color'>$priority</div>";
        });

        $collection->editColumn('category', function ($ticket) {
            $color = $ticket->color_category;
            $category = e($ticket->category);

            return "<div style='color: $color'>$category</div>";
        });

        $collection->editColumn('agent', function ($ticket) {
            $ticket = $this->tickets->find($ticket->id);

            return e($ticket->agent->name);
        });

        return $collection;
    }

    /**
     * Display a listing of active tickets related to user.
     *
     * @return Response
     */
    public function index()
    {
        $complete = false;

$jdata = $this->data($complete);
$jsonContent = $jdata->getContent();
// dd($jsonContent);
$data = json_decode($jsonContent)->data;

        return view('support::tickets.index', compact('complete','data'));
    }

    /**
     * Display a listing of completed tickets related to user.
     *
     * @return Response
     */
    public function indexComplete()
    {
        $complete = true;
        $jdata = $this->data($complete);
        $jsonContent = $jdata->getContent();
        // dd(json_decode($jsonContent)->data);
        $data = json_decode($jsonContent)->data;
        
        return view('support::tickets.index', compact('complete','data'));
    }

    /**
     * Returns priorities, categories and statuses lists in this order
     * Decouple it with list().
     *
     * @return array
     */
    protected function PCS()
    {
        // seconds expected for L5.8<=, minutes before that
        $time = LaravelVersion::min('5.8') ? 60*60 : 60;

        $priorities = Cache::remember('support::priorities', $time, function () {
            return Entities\Priority::all();
        });

        $categories = Cache::remember('support::categories', $time, function () {
            return Entities\Category::all();
        });

        $statuses = Cache::remember('support::statuses', $time, function () {
            return Entities\Status::all();
        });

        if (LaravelVersion::min('5.3.0')) {
            return [$priorities->pluck('name', 'id'), $categories->pluck('name', 'id'), $statuses->pluck('name', 'id')];
        } else {
            return [$priorities->lists('name', 'id'), $categories->lists('name', 'id'), $statuses->lists('name', 'id')];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        list($priorities, $categories) = $this->PCS();
        $editor_enabled = true;
        $codemirror_enabled = false;
        $edit = new EditorLocale;
        
        $editor_locale = $edit->getEditorLocale();
       
        $codemirror_theme = false;
        $editor_options = true;
        return view('support::tickets.create', compact('priorities', 
        'categories',
        'editor_enabled',
        'codemirror_enabled',
        'editor_locale',
        'codemirror_theme',
        'editor_options'));
    }

    /**
     * Store a newly created ticket and auto assign an agent for it.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject'     => 'required|min:3',
            'content'     => 'required|min:6',
            'priority_id' => 'required|exists:ticketit_priorities,id',
            'category_id' => 'required|exists:ticketit_categories,id',
        ]);

        $ticket = new Ticket();

        $ticket->subject = $request->subject;

        $ticket->setPurifiedContent($request->get('content'));

        $ticket->priority_id = $request->priority_id;
        $ticket->category_id = $request->category_id;

        $ticket->status_id = Setting::grab('default_status_id');
        $ticket->user_id = auth()->user()->id;
        $ticket->autoSelectAgent();

        $ticket->save();

        session()->flash('status', trans('support::lang.the-ticket-has-been-created'));

        return redirect()->route('admin.support.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ticket = $this->tickets->findOrFail($id);

        list($priority_lists, $category_lists, $status_lists) = $this->PCS();

        $close_perm = $this->permToClose($id);
        $reopen_perm = $this->permToReopen($id);

        $cat_agents = Entities\Category::find($ticket->category_id)->agents()->agentsLists();
        if (is_array($cat_agents)) {
            $agent_lists = ['auto' => 'Auto Select'] + $cat_agents;
        } else {
            $agent_lists = ['auto' => 'Auto Select'];
        }

        $comments = $ticket->comments()->paginate(Setting::grab('paginate_items'));

        return view('support::tickets.show',
            compact('ticket', 'status_lists', 'priority_lists', 'category_lists', 'agent_lists', 'comments',
                'close_perm', 'reopen_perm'));

                
    }
    

    public function edit($id)
    {
        $ticket = $this->tickets->findOrFail($id);
    
        list($priority_lists, $category_lists, $status_lists) = $this->PCS();
    
        // Retrieve agent lists
        $agent_lists = Entities\Category::find($ticket->category_id)->agents()->agentsLists();
    
        // Check if agent_lists is empty
        if (empty($agent_lists)) {
            $agent_lists = ['auto' => 'Auto Select'];
        } else {
            // Add 'Auto Select' option to the beginning of the array
            $agent_lists = ['auto' => 'Auto Select'] + $agent_lists;
        }
    
        $editor_enabled = true;
        $codemirror_enabled = false;
        $edit = new EditorLocale;
        $editor_locale = $edit->getEditorLocale();
        $codemirror_theme = false;
        $editor_options = true;
    
        return view('support::tickets.edit', compact('ticket', 'priority_lists', 'category_lists', 'status_lists', 'agent_lists', 'editor_enabled', 'codemirror_enabled', 'editor_locale', 'codemirror_theme', 'editor_options'));
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
   
     public function update(Request $request, $id)
{
    $this->validate($request, [
        'subject'     => 'required|min:3',
        'content'     => 'required|min:6',
        'priority_id' => 'required|exists:ticketit_priorities,id',
        'category_id' => 'required|exists:ticketit_categories,id',
    ]);

    $ticket = $this->tickets->findOrFail($id);

    $ticket->subject = $request->subject;
    $ticket->setPurifiedContent($request->get('content'));
    $ticket->priority_id = $request->priority_id;
    $ticket->category_id = $request->category_id;

    $ticket->save();

    session()->flash('status', trans('support::lang.the-ticket-has-been-updated'));

    return redirect()->route('admin.support.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ticket = $this->tickets->findOrFail($id);
        $subject = $ticket->subject;
        $ticket->delete();

        session()->flash('status', trans('Deleted Successfully', ['name' => $subject]));

        return redirect()->route('admin.support.index');
    }

    // Other methods...

    /**
     * Mark ticket as complete.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
     
      
        // Ensure the permission check is defined and functional
        if ($this->permToClose($id) == 'yes') {
            $ticket = $this->tickets->findOrFail($id);
            $ticket->completed_at = Carbon::now();

            // Check if a default close status ID is set in settings
            if (Setting::grab('default_close_status_id')) {
                $ticket->status_id = Setting::grab('default_close_status_id');
            }

            $subject = $ticket->subject;
            $ticket->save();

            // Flash a success message to the session
            session()->flash('status', trans('support::lang.the-ticket-has-been-completed', ['name' => $subject]));

            // Redirect to the support index page
            return redirect()->route('admin.support.index');
        }

        // If the user doesn't have permission, flash a warning message and redirect
        return redirect()->route('admin.support.index')
            ->with('warning', trans('support::lang.you-are-not-permitted-to-do-this'));
    }

  




    /**
     * Reopen ticket from complete status.
     *
     * @param int $id
     *
     * @return Response
     */
    public function reopen($id)
    {
        if ($this->permToReopen($id) == 'yes') {
            $ticket = $this->tickets->findOrFail($id);
            $ticket->completed_at = null;

            if (Setting::grab('default_reopen_status_id')) {
                $ticket->status_id = Setting::grab('default_reopen_status_id');
            }

            $subject = $ticket->subject;
            $ticket->save();

            session()->flash('status', trans('support::lang.the-ticket-has-been-reopened', ['name' => $subject]));

            return redirect()->route('admin.support.index');
        }

        return redirect()->route('admin.support.index')
            ->with('warning', trans('support::lang.you-are-not-permitted-to-do-this'));
    }

    public function agentSelectList($category_id, $ticket_id)
    {
        $cat_agents = Entities\Category::find($category_id)->agents()->agentsLists();
        if (is_array($cat_agents)) {
            $agents = ['auto' => 'Auto Select'] + $cat_agents;
        } else {
            $agents = ['auto' => 'Auto Select'];
        }

        $selected_Agent = $this->tickets->find($ticket_id)->agent->id;
        $select = '<select class="form-control" id="agent_id" name="agent_id">';
        foreach ($agents as $id => $name) {
            $selected = ($id == $selected_Agent) ? 'selected' : '';
            $select .= '<option value="'.$id.'" '.$selected.'>'.$name.'</option>';
        }
        $select .= '</select>';

        return $select;
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function permToClose($id)
    {
        $close_ticket_perm = Setting::grab('close_ticket_perm');

        if ($this->agent->isAdmin() && $close_ticket_perm['admin'] == 'yes') {
            return 'yes';
        }
        if ($this->agent->isAgent() && $close_ticket_perm['agent'] == 'yes') {
            return 'yes';
        }
        if ($this->agent->isTicketOwner($id) && $close_ticket_perm['owner'] == 'yes') {
            return 'yes';
        }

        return 'no';
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function permToReopen($id)
    {
        $reopen_ticket_perm = Setting::grab('reopen_ticket_perm');
        if ($this->agent->isAdmin() && $reopen_ticket_perm['admin'] == 'yes') {
            return 'yes';
        } elseif ($this->agent->isAgent() && $reopen_ticket_perm['agent'] == 'yes') {
            return 'yes';
        } elseif ($this->agent->isTicketOwner($id) && $reopen_ticket_perm['owner'] == 'yes') {
            return 'yes';
        }

        return 'no';
    }

    /**
     * Calculate average closing period of days per category for number of months.
     *
     * @param int $period
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function monthlyPerfomance($period = 2)
    {
        $categories = Category::all();
        foreach ($categories as $cat) {
            $records['categories'][] = $cat->name;
        }

        for ($m = $period; $m >= 0; $m--) {
            $from = Carbon::now();
            $from->day = 1;
            $from->subMonth($m);
            $to = Carbon::now();
            $to->day = 1;
            $to->subMonth($m);
            $to->endOfMonth();
            $records['interval'][$from->format('F Y')] = [];
            foreach ($categories as $cat) {
                $records['interval'][$from->format('F Y')][] = round($this->intervalPerformance($from, $to, $cat->id), 1);
            }
        }

        return $records;
    }

    /**
     * Calculate the date length it took to solve a ticket.
     *
     * @param Ticket $ticket
     *
     * @return int|false
     */
    public function ticketPerformance($ticket)
    {
        if ($ticket->completed_at == null) {
            return false;
        }

        $created = new Carbon($ticket->created_at);
        $completed = new Carbon($ticket->completed_at);
        $length = $created->diff($completed)->days;

        return $length;
    }

    /**
     * Calculate the average date length it took to solve tickets within date period.
     *
     * @param $from
     * @param $to
     *
     * @return int
     */
    public function intervalPerformance($from, $to, $cat_id = false)
    {
        if ($cat_id) {
            $tickets = Ticket::where('category_id', $cat_id)->whereBetween('completed_at', [$from, $to])->get();
        } else {
            $tickets = Ticket::whereBetween('completed_at', [$from, $to])->get();
        }

        if (empty($tickets->first())) {
            return false;
        }

        $performance_count = 0;
        $counter = 0;
        foreach ($tickets as $ticket) {
            $performance_count += $this->ticketPerformance($ticket);
            $counter++;
        }
        $performance_average = $performance_count / $counter;

        return $performance_average;
    }
}