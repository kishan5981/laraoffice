<?php

namespace Modules\Quotes\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

use App\Scopes\InvoiceCustomerScope;
use App\Scopes\InvoiceSaleAgentScope;

class Quote extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = ['title', 'address', 'invoice_prefix', 'show_quantity_as', 'invoice_no', 'status', 'reference', 'invoice_date', 'invoice_due_date', 'invoice_notes', 'amount', 'products', 'paymentstatus', 'customer_id', 'currency_id', 'tax_id', 'discount_id', 'recurring_period_id', 'slug', 'delivery_address', 'show_delivery_address', 'admin_notes', 'sale_agent', 'terms_conditions', 'prevent_overdue_reminders', 'created_by_id', 'invoice_number_format', 'invoice_number_separator', 'invoice_number_length'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Quote::observe(new \App\Observers\UserActionsObserver);

        if ( ! defined('CRON_JOB') ) {
            if ( isCustomer() ) {
                static::addGlobalScope(new \App\Scopes\QuoteCustomerScope);
            }
            if ( isSalesPerson() ) {
                static::addGlobalScope(new \App\Scopes\QuoteSaleAgentScope);
            }

            static::addGlobalScope(new \App\Scopes\DefaultOrderScope);
        }
    }

    public static $enum_status = ["Published" => "Published", "Draft" => "Draft"];

    public static $enum_paymentstatus = ["Unpaid" => "Unpaid", "Paid" => "Paid", "Partial" => "Partial", "Cancelled" => "Cancelled", "Due" => "Due"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCustomerIdAttribute($input)
    {
        $this->attributes['customer_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCurrencyIdAttribute($input)
    {
        $this->attributes['currency_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function getInvoiceNumberDisplayAttribute($input)
    {
        $invoice_number_format = ( $this->invoice_number_format ) ? $this->invoice_number_format : $this->attributes['invoice_number_format'];
        $invoice_number_separator = ( $this->invoice_number_separator ) ? $this->invoice_number_separator : $this->attributes['invoice_number_separator'];
        $invoice_number_length = ( $this->invoice_number_length ) ? $this->invoice_number_length : $this->attributes['invoice_number_length'];
        $invoice_no = ( $this->invoice_no ) ? $this->invoice_no : $this->attributes['invoice_no'];
        $invoice_prefix = ( $this->invoice_prefix ) ? $this->invoice_prefix : $this->attributes['invoice_prefix'];

        $invoice_date = ( $this->invoice_date ) ? $this->invoice_date : $this->attributes['invoice_date'];

        if ( empty( $invoice_date ) ) {
            $invoice_number_format = 'numberbased';
        }
        

     
        $invoice_no_display = $invoice_no;
        if ( ! empty( $invoice_number_length ) ) {
            $invoice_no = str_pad($invoice_no, $invoice_number_length, 0, STR_PAD_LEFT);
        }
        if ( 'yearbased' === $invoice_number_format ) {
            $invoice_no_display = date('Y', strtotime( $invoice_date ) ) . $invoice_number_separator . $invoice_no;
        } elseif ( 'year2digits' === $invoice_number_format ) {
            $invoice_no_display = date('y', strtotime( $invoice_date ) ) . $invoice_number_separator . $invoice_no;
        } elseif ( 'yearmonthnumber' === $invoice_number_format ) {
            $invoice_no_display = date('Y', strtotime( $invoice_date ) ) . $invoice_number_separator . date('m', strtotime( $invoice_date ) ) . $invoice_number_separator . $invoice_no;
        } elseif ( 'yearbasedright' === $invoice_number_format ) {
            $invoice_no_display = $invoice_no . $invoice_number_separator . date('Y', strtotime( $invoice_date ) );
        } elseif ( 'year2digitsright' === $invoice_number_format ) {
            $invoice_no_display = $invoice_no . $invoice_number_separator . date('y', strtotime( $invoice_date ) );
        } elseif ( 'numbermonthyear' === $invoice_number_format ) {
            $invoice_no_display = $invoice_no . $invoice_number_separator . date('m', strtotime( $invoice_date ) ) . $invoice_number_separator . date('Y', strtotime( $invoice_date ) );
        }
        return $invoice_prefix . $invoice_no_display;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTaxIdAttribute($input)
    {
        $this->attributes['tax_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setDiscountIdAttribute($input)
    {
        $this->attributes['discount_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRecurringPeriodIdAttribute($input)
    {
        $this->attributes['recurring_period_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setAmountAttribute($input)
    {
        $this->attributes['amount'] = $input ? $input : null;
    }
    
    public function customer()
    {
        return $this->belongsTo(\App\Models\Contact::class, 'customer_id')->withDefault();
    }
	
	public function saleagent()
    {
        return $this->belongsTo(\App\Models\Contact::class, 'sale_agent', 'id')->withDefault();
    }
    
    public function currency()
    {
        return $this->belongsTo(\App\Models\Currency::class, 'currency_id')->withDefault()->withTrashed();
    }
    
    public function tax()
    {
        return $this->belongsTo(\App\Models\Tax::class, 'tax_id')->withDefault()->withTrashed();
    }
    
    public function discount()
    {
        return $this->belongsTo(\App\Models\Discount::class, 'discount_id')->withDefault()->withTrashed();
    }
    
    public function recurring_period()
    {
        return $this->belongsTo(\Modules\RecurringPeriods\Entities\RecurringPeriod::class, 'recurring_period_id')->withDefault()->withTrashed();
    }

    public function transactions()
    {
        return $this->hasMany(QuotePayment::class)->orderBy('id', 'DESC')->withTrashed();
    }

    public function history()
    {
        return $this->hasMany(QuoteHistory::class)->orderBy('id', 'DESC')->withTrashed();
    }

    public function created_by()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by_id')->withDefault();
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function getCurrencyAmountAttribute($input)
    {
        return digiCurrency( $this->attributes['amount'] );
    }

    public function quote_products()
    {
        return $this->belongsToMany(\Modules\Quotes\Entities\Quote::class, 'quote_products');
    }

    public function attached_products( $id )
    {
        return Quote::select(['pop.*'])
            ->join('quote_products as pop', 'pop.quote_id', '=', 'quotes.id')
            ->join('products', 'products.id', '=', 'pop.product_id')
            ->where('quotes.id', $id)->get();
    }
}
