<?php
namespace Modules\Quotes\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class QuotesReminder
 *
 * @package App
 * @property text $description
 * @property string $date
 * @property enum $isnotified
 * @property string $quote
 * @property string $reminder_to
 * @property enum $notify_by_email
 * @property string $created_by
*/
class QuotesReminder extends Model
{
    use SoftDeletes;

    protected $fillable = ['description', 'date', 'isnotified', 'notify_by_email', 'quote_id', 'reminder_to_id', 'created_by_id'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        QuotesReminder::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_isnotified = ["no" => "No", "yes" => "Yes"];

    public static $enum_notify_by_email = ["no" => "No", "yes" => "Yes"];

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setQuoteIdAttribute($input)
    {
        $this->attributes['quote_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setReminderToIdAttribute($input)
    {
        $this->attributes['reminder_to_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function quote()
    {
        return $this->belongsTo(Quote::class, 'quote_id')->withTrashed();
    }
    
    public function reminder_to()
    {
        return $this->belongsTo(\App\Models\User::class, 'reminder_to_id');
        }
    
    public function created_by()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by_id');
    }
    
}
