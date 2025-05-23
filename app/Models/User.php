<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Hash;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\DefaultUserScope;
use Illuminate\Validation\Rule;
/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use SoftDeletes;

    protected $table = 'contacts';
    
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'department_id', 'status', 'theme', 'portal_language', 'confirmation_code', 'ticketit_admin', 'ticketit_agent', 'hourly_rate', 'color_theme', 'color_skin'];
    protected $hidden = ['password', 'remember_token'];

    
    public static function updateValidation($request)
    {
        return [
            'role' => 'array|required',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
        ];
    }

    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);

        static::addGlobalScope(new \App\Scopes\DefaultOrderScope);

        static::addGlobalScope(new \App\Scopes\DefaultUserScope);
    }
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }


    /**
     * Set to null if empty
     * @param $input
     */
    public function setDepartmentIdAttribute($input)
    {
        $this->attributes['department_id'] = $input ? $input : null;
    }

    public function contact_type()
    {
        return $this->belongsToMany(ContactType::class, 'contact_contact_type', 'contact_id')->withTrashed();
    }
        
    public static function roleadmins()
    {
        return User::whereHas("contact_type",
                   function ($query) {
                       $query->where('slug', ROLE_ADMIN);
                   });
    }
    
    
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id')->withTrashed();
    }
    
    public function topics() {
        return $this->hasMany(MessengerTopic::class, 'receiver_id')->orWhere('sender_id', $this->id);
    }

    public function inbox()
    {
        return $this->hasMany(MessengerTopic::class, 'receiver_id');
    }

    public function outbox()
    {
        return $this->hasMany(MessengerTopic::class, 'sender_id');
    }
    public function internalNotifications()
    {
        return $this->belongsToMany(InternalNotification::class)
            ->withPivot('read_at')
            ->orderBy('internal_notification_user.created_at', 'desc')
            ->limit(10);
    }
    
    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }
    public static function isAgent($id = null)
    {
        if (isset($id)) {
            $user = User::find($id);
            if ($user->ticketit_agent) {
                return true;
            }

            return false;
        }
        if (auth()->check()) {
            if (auth()->user()->ticketit_agent) {
                return true;
            }
        }

        return false;
    }

    public  function renderTicketTable($collection)
    {
        $collection->editColumn('subject', function ($ticket) {
            return (string) link_to_route(
                'admin.support.show',
                $ticket->subject,
                $ticket->id
            );
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
            $ticket = \Modules\Support\Entities\Ticket::find($ticket->id);

            return e($ticket->agent->name);
        });

        return $collection;
    }

public function data($u){
 
$datatables = app(\Yajra\Datatables\Datatables::class);
$collection = \Modules\Support\Entities\Ticket::userTickets($u->id)->active();

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
    if (\Modules\Support\Helpers\LaravelVersion::min('5.4')) {
        $collection->rawColumns(['subject', 'status', 'priority', 'category', 'agent']);
    }
 return $collection->make(true);
}


}
