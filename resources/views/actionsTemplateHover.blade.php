<span>
<?php
$controller = getController( 'controller' );
$action = getController( 'action' );
?>
@can($gateKey.'view')
    @if ( ! in_array( $controller, array( 'DatabaseBackupsController' ) ) )
    <?php 
    if ( in_array($controller, array( 'QuoteTasksController', 'QuotesRemindersController', 'QuotesNotesController' )) ) {
        ?>
    <a href="{{ route( $routeKey.'.show', [ 'quote_id' => $row->quote_id, 'id' => $row->id ] ) }}"
       class="primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_view')}}">@if( 'button' === $addnew_type ) @lang('global.app_view') @else <i class="fa fa-eye" aria-hidden="true"></i> @endif</a>
        <?php
    } elseif ( in_array($controller, array( 'InvoiceTasksController', 'InvoiceRemindersController', 'InvoiceNotesController' )) ) {
        ?>
    <a href="{{ route( $routeKey.'.show', [ 'invoice_id' => $row->invoice_id, 'id' => $row->id ] ) }}"
       class="primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_view')}}">@if( 'button' === $addnew_type ) @lang('global.app_view') @else <i class="fa fa-eye" aria-hidden="true"></i> @endif</a>
        <?php
    } elseif ( in_array($controller, array( 'ProjectTasksController', 'TimeEntriesController', 'ProjectRemindersController', 'ProjectNotesController', 'MileStonesController', 'ProjectTicketsController', 'ProjectTicketsController', 'ProjectDiscussionController' )) ) {
        if ( ! in_array( $action, array('projectDiscussionComments') ) ) {
		?>
		<a href="{{ route( $routeKey.'.show', [ 'project_id' => $row->project_id, 'id' => $row->id ] ) }}"
       class="primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_view')}}">@if( 'button' === $addnew_type ) @lang('global.app_view') @else <i class="fa fa-eye" aria-hidden="true"></i> @endif</a>
        <?php
		}
    } elseif ( in_array($controller, array( 'ProposalTasksController', 'ProposalsRemindersController', 'ProposalsNotesController' )) ) {
        ?>
    <a href="{{ route( $routeKey.'.show', [ 'proposal_id' => $row->proposal_id, 'id' => $row->id ] ) }}"
       class="primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_view')}}">@if( 'button' === $addnew_type ) @lang('global.app_view') @else <i class="fa fa-eye" aria-hidden="true"></i> @endif</a>
        <?php
    }elseif ( in_array($controller, array( 'ContractTasksController', 'ContractsRemindersController', 'ContractsNotesController' )) ) {
        ?>
    <a href="{{ route( $routeKey.'.show', [ 'contract_id' => $row->contract_id, 'id' => $row->id ] ) }}"
       class="primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_view')}}">@if( 'button' === $addnew_type ) @lang('global.app_view') @else <i class="fa fa-eye" aria-hidden="true"></i> @endif</a>
        <?php
    }


    else {
    
    ?>
    <a href="{{ route( $routeKey.'.show', $row->id ) }}"
       class="primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_view')}}">@if( 'button' === $addnew_type ) @lang('global.app_view')
        @else <i class="fa fa-eye" aria-hidden="true"></i> @endif</a>
   <?php } ?>
    @endif
@endcan
@can($gateKey.'edit')
    <?php
    $noeditcontrollers = [ 'DatabaseBackupsController', 'PaymentGatewaysController' ];
    if ( ! isEnable('debug') ) {
        array_push($noeditcontrollers, 'ModulesManagementsController');
    }
    if ( 'TimeEntriesController' === $controller ) {
        if ( ! empty( $row->task->billed ) && 'yes' === $row->task->billed ) {
            array_push( $noeditcontrollers, 'TimeEntriesController' );
        }
    }
    ?>
    @if ( ! in_array( $controller, $noeditcontrollers ) )
    <?php
	$title = trans('global.app_edit');
	if ( 'SendSmsController' === $controller ) {
		$title = trans('sendsms::global.send-sms.re-send');
	}
	?>
    <?php
    if ( in_array($controller, array( 'QuoteTasksController', 'QuotesRemindersController', 'QuotesNotesController' )) ) {
    ?>
    &nbsp;|&nbsp;<a href="{{ route($routeKey.'.edit', [ 'quote_id' => $row->quote_id, 'id' => $row->id ]) }}" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$title}}">
    @if( 'button' === $addnew_type ) <?php echo $title; ?> @else <i class="fa fa-pencil-square-o" aria-hidden="true"></i> @endif    
    </a>
    <?php } elseif ( in_array($controller, array( 'InvoiceTasksController', 'InvoiceRemindersController', 'InvoiceNotesController' )) ) {
        ?>
        &nbsp;|&nbsp;<a href="{{ route($routeKey.'.edit', [ 'invoice_id' => $row->invoice_id, 'id' => $row->id ]) }}" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$title}}">
        @if( 'button' === $addnew_type ) <?php echo $title; ?> @else <i class="fa fa-pencil-square-o" aria-hidden="true"></i> @endif 
        </a>
        <?php
    } elseif ( in_array($controller, array( 'ProjectTasksController', 'TimeEntriesController', 'ProjectRemindersController', 'ProjectNotesController', 'MileStonesController', 'ProjectTicketsController', 'ProjectDiscussionController' )) ) {
        if ( ! in_array( $action, array('projectDiscussionComments') ) ) {
		?>
    &nbsp;|&nbsp;<a href="{{ route( $routeKey.'.edit', [ 'project_id' => $row->project_id, 'id' => $row->id ] ) }}"
       class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$title}}">@if( 'button' === $addnew_type ) <?php echo $title; ?> @else <i class="fa fa-pencil-square-o" aria-hidden="true"></i> @endif </a>
        <?php
		}
    } elseif ( in_array($controller, array( 'ProposalTasksController', 'ProposalsRemindersController', 'ProposalsNotesController' )) ) {
        ?>
    &nbsp;|&nbsp;<a href="{{ route( $routeKey.'.edit', [ 'proposal_id' => $row->proposal_id, 'id' => $row->id ] ) }}"
       class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_edit')}}">@if( 'button' === $addnew_type ) @lang('global.app_edit') @else <i class="fa fa-pencil-square-o" aria-hidden="true"></i> @endif </a>
        <?php
    }elseif ( in_array($controller, array( 'ContractTasksController', 'ContractsRemindersController', 'ContractsNotesController' )) ) {
        ?>
    &nbsp;|&nbsp;<a href="{{ route( $routeKey.'.edit', [ 'contract_id' => $row->contract_id, 'id' => $row->id ] ) }}"
       class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_edit')}}">@if( 'button' === $addnew_type ) @lang('global.app_edit') @else <i class="fa fa-pencil-square-o" aria-hidden="true"></i> @endif</a>
        <?php
    }
    elseif( 'ClientProjectsController' === $controller && 'invoices' === $action ) {
	?>
		&nbsp;|&nbsp;<a href="{{ route( 'admin.client_projects.invoice-project-edit', [ 'project_id' => $row->project_id, 'id' => $row->id ] ) }}"
       class="primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$title}}">@if( 'button' === $addnew_type ) <?php echo $title; ?> @else <i class="fa fa-pencil-square-o" aria-hidden="true"></i> @endif</a>
	<?php	
	}else { ?>
	&nbsp;|&nbsp;<a href="{{ route($routeKey.'.edit', $row->id) }}" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$title}}">@if( 'button' === $addnew_type ) <?php echo $title; ?> @else <i class="fa fa-pencil-square-o" aria-hidden="true"></i> @endif</a>
    <?php } ?>
    @endif
@endcan

<?php
$candelete = true;
$nodeletecontrollers = array( 'SiteThemesController', 'PaymentGatewaysController' );
if( ! isEnable('debug') ) {
    array_push($nodeletecontrollers, 'MasterSettingsController', 'ModulesManagementsController');
}

if ( 'TimeEntriesController' === $controller ) {
    if ( ! empty( $row->task->billed ) && 'yes' === $row->task->billed ) {
        array_push( $nodeletecontrollers, 'TimeEntriesController' );
    }
}

if ( in_array($controller,  $nodeletecontrollers) ) {
    if ( 'default' === $row->slug ) {
        $candelete = false;
    }
    $candelete = false;
}

if ( in_array($controller, array( 'UsersController' ) ) ) {
    if ( Auth::id() == $row->id ) {
        $candelete = false;
    }
}
if( $candelete ) { ?>
@can($gateKey.'delete')
    <?php
   
    $id = $row->id;
	if ( in_array($controller, array( 'QuoteTasksController', 'QuotesRemindersController', 'QuotesNotesController' )) ) {
		$route = [$routeKey.'.destroy',$row->quote_id, $id ];
	} elseif ( in_array($controller, array( 'InvoiceTasksController', 'InvoiceRemindersController', 'InvoiceNotesController' )) ) {
        $route = [$routeKey.'.destroy',$row->invoice_id, $id ];
    } elseif ( in_array($controller, array( 'ProjectTasksController', 'TimeEntriesController', 'ProjectRemindersController', 'ProjectNotesController', 'MileStonesController', 'ProjectTicketsController', 'ProjectDiscussionController' )) ) {
        $route = [$routeKey.'.destroy',$row->project_id, $id ];
    } elseif ( in_array($controller, array( 'ProposalTasksController', 'ProposalsRemindersController', 'ProposalsNotesController' )) ) {
        
        $route = [$routeKey.'.destroy',$row->proposal_id, $id ];
        
    }elseif ( in_array($controller, array( 'ContractTasksController', 'ContractsRemindersController', 'ContractsNotesController' )) ) {
        
        $route = [$routeKey.'.destroy',$row->contract_id, $id ];
        
    }
    else {
        $route = [$routeKey.'.destroy', $id];
	}
    if ( 'DatabaseBackupsController' === $controller ) {
        $id = $row->file_name;
        $route = ['admin.databasebackups.delete', $id, $type ];
    }
    if ( 'ContactsController' === $controller ) {
        echo '&nbsp;|&nbsp;<a href="'. route('admin.contacts.info', $row->id) .'" class="text-danger"><i class="fas fa-trash"></i> </a>';
    } else {
    ?>&nbsp;|&nbsp;
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
        'route' => $route)) !!}
        @if( 'button' === $addnew_type )
            {!! Form::submit(trans('global.app_delete'), array('class' => 'danger', 'style' => ' border: 0px; color: red; background: none;')) !!}            
        @else
            <button class="danger" style="border: 0px; color: red; background: none; padding:0px;" type="submit" value=""  data-toggle="tooltip" data-placement="bottom" data-original-title=""><i class="fa fa-trash"></i></button> 
        @endif
    {!! Form::close() !!}
    <?php } ?>
@endcan
<?php } ?>
<?php
if ( 'LanguagesController' === $controller ) {
    $current_language = \Cookie::get('language');
    ?>
    @can($gateKey.'edit')
        @if( $current_language === $row->code )
        &nbsp;|&nbsp;<p class="primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_default')}}">@if( 'button' === $addnew_type ) @lang('global.app_default') @else <i class="fa fa-check-circle" aria-hidden="true" style="color: green;"></i>
        @endif</p>
        @else
        &nbsp;|&nbsp;<a href="{{ url('admin/language/' . $row->code) }}" class="success" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_make_default')}}">@if( 'button' === $addnew_type ) @lang('global.app_make_default') @else <i class="fa fa-check-circle" aria-hidden="true"></i>
 @endif</a>
        @endif
    @endcan
    @can($gateKey.'edit')
        <?php
        $direction = trans('global.ltr');
        $title = trans('global.make-rtl');
        if ( 'Yes' === $row->is_rtl ) {
            $direction = trans('global.rtl');
            $title = trans('global.make-ltr');
        }
        ?>
        &nbsp;|&nbsp;<a href="{{ route('admin.language.changedirection', $row->id) }}" class="success" title="{{$title}}">{{$direction}}</a>
    @endcan
    <?php
}
if ( in_array($controller, ['ContactsController'] ) ) {
    $contact_types = $row->contact_type->pluck('id')->toArray();
    ?>
    @can($gateKey.'edit')
    &nbsp;|&nbsp;<a href="javascript:void(0);" class="success" onclick="sendMail('sendcontactemail', '{{$row->id}}', '{{$row->id}}')" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_send_email')}}">@if( 'button' === $addnew_type ) @lang('global.app_send_email') @else <i class="fa fa-envelope" aria-hidden="true"></i> @endif</a>

    @endcan
    @if ( ! in_array( LEADS_TYPE, $contact_types ) )
        @if( 'no' === $row->is_user && Gate::allows('user_create') )
        &nbsp;|&nbsp;<a href="{{route('admin.users.create', $row->id)}}" class="warning" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_create_user')}}">@if( 'button' === $addnew_type ) @lang('global.app_create_user') @else <i class="fa fa-user-circle-o" aria-hidden="true"></i> @endif</a>
        @elseif ( Gate::allows('user_edit') )
        &nbsp;|&nbsp;<a href="{{route('admin.users.edit', $row->id)}}" class="warning" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_edit_user')}}">@if( 'button' === $addnew_type ) @lang('global.app_edit_user') @else <i class="fa fa-user-circle-o" aria-hidden="true"></i> @endif</a>
        @endif
    @endif
    <?php
}
if ( 'CurrenciesController' === $controller ) {
    ?>
    @can($gateKey.'edit')
        @if ( $row->is_default == 'yes')
        &nbsp;|&nbsp;<a href="javascript:void(0);" class="default" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_make_default')}}">@if( 'button' === $addnew_type ) @lang('global.app_make_default') @else <i class="fa fa-money" aria-hidden="true"></i> @endif</a>
		@else
        &nbsp;|&nbsp;<a href="{{ route('admin.currency.makedefault', $row->id) }}" class="success" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_make_default')}}">@if( 'button' === $addnew_type ) @lang('global.app_make_default') @else <i class="fa fa-money" aria-hidden="true"></i> @endif</a>
		@endif
    @endcan
    <?php
}
if ( 'TemplatesController' === $controller ) {
    ?>
    @can($gateKey.'edit')
    &nbsp;|&nbsp;<a href="{{ route('admin.templates.duplicate', $row->id) }}" class="success" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('others.duplicate')}}">@if( 'button' === $addnew_type ) @lang('others.duplicate') @else <i class="fa fa-clone" aria-hidden="true"></i> @endif</a>
    @endcan
    <?php
}
if ( 'ClientProjectsController' === $controller && 'index' === $action ) {
    ?>
    @can($gateKey.'edit')
    &nbsp;|&nbsp;<a href="{{ route('admin.client_projects.duplicate', $row->id) }}" class="success" onclick="return confirm(window.are_you_sure_duplicate)" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('others.duplicate')}}">@if( 'button' === $addnew_type ) @lang('others.duplicate') @else <i class="fa fa-clone" aria-hidden="true"></i> @endif</a>
    @endcan
    <?php
}
if ( 'UsersController' === $controller ) {
    ?>
    @can($gateKey.'change_status')
        @if ( Auth::id() != $row->id )
            @if ( 'Active' === $row->status )
            &nbsp;|&nbsp;<a href="{{ route('admin.users.changestatus', $row->id) }}" class="success" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.users.suspend')}}">@if( 'button' === $addnew_type ) @lang('global.users.suspend') @else <i class="fa fa-battery-quarter" aria-hidden="true"></i> @endif</a>
            @else
            &nbsp;|&nbsp;<a href="{{ route('admin.users.changestatus', $row->id) }}" class="success" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.users.activate')}}">@if( 'button' === $addnew_type ) @lang('global.users.activate') @else <i class="fa fa-battery-full" aria-hidden="true"></i> @endif</a>
            @endif
        @endif
    @endcan
    <?php
}
if ( 'MasterSettingsController' === $controller ) {
    ?>
    @can($gateKey.'edit')
    &nbsp;|&nbsp;<a href="{{ url('admin/mastersettings/settings/view', $row->slug) }}" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_settings')}}">@if( 'button' === $addnew_type ) @lang('global.app_settings') @else <i class="fa fa-cog" aria-hidden="true"></i> @endif</a>
        @if( env('APP_DEV') )
        &nbsp;|&nbsp;<a href="{{ url('admin/mastersettings/settings/add-sub-settings', $row->slug) }}" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_add_key')}}">@if( 'button' === $addnew_type ) @lang('global.app_add_key') @else <i class="fa fa-plus-circle" aria-hidden="true"></i> @endif</a>
        @endif
    @endcan
    <?php
}
if ( 'SiteThemesController' === $controller ) {
    ?>
    @can($gateKey.'settings')
        @if( $row->is_active == 1 )
        &nbsp;|&nbsp;<a href="{{ url('admin/make/default/theme', $row->id) }}" class="success" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_default')}}">@if( 'button' === $addnew_type ) @lang('global.app_default') @else <i class="fa fa-asterisk" aria-hidden="true"></i> @endif</a>
        @else
        &nbsp;|&nbsp;<a href="{{ url('admin/make/default/theme', $row->id) }}" class="primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_default')}}">@if( 'button' === $addnew_type ) @lang('global.app_default') @else <i class="fa fa-asterisk" aria-hidden="true"></i> @endif</a>
        @endif
        @if( ! isDemo() )
        &nbsp;|&nbsp;<a href="{{ url('admin/theme/settings', $row->slug) }}" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_settings')}}">@if( 'button' === $addnew_type ) @lang('global.app_settings') @else <i class="fa fa-cog" aria-hidden="true"></i> @endif</a>
        &nbsp;|&nbsp;<a href="{{ url('admin/theme/settings/add-sub-settings', $row->slug) }}" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_add_key')}}">@if( 'button' === $addnew_type ) @lang('global.app_add_key') @else <i class="fa fa-plus-circle" aria-hidden="true"></i> @endif</a>
        @endif
    @endcan
    <?php
}
if ( 'ModulesManagementsController' === $controller ) {
    $label = trans( 'modulesmanagement::global.modules-management.active');
    $title = trans( 'modulesmanagement::global.modules-management.deactivate');
    $class = 'success';
    
        $label = trans( 'modulesmanagement::global.modules-management.active');
        
        $class = 'success';
        if ( 'No' === $row->enabled ) {
            $label = trans( 'modulesmanagement::global.modules-management.inactive');
            $title = trans( 'modulesmanagement::global.modules-management.activate');
            $class = 'warning';
        }
        ?>
        
        &nbsp;|&nbsp;<a href="{{ route('admin.modules-management.changestatus', $row->id) }}" class="{{$class}} @if( 'no' === $row->can_inactive ) disabled @endif" title="{{$title}}" @if( 'no' === $row->can_inactive ) onclick="return false;" disabled @endif>{{$label}}</a>
  

        @if( ! isDemo() && 'Custom' === $row->type )
        &nbsp;|&nbsp;<a href="{{ url('admin/plugin/settings', $row->slug) }}" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_settings')}}">@if( 'button' === $addnew_type ) @lang('global.app_settings') @else <i class="fa fa-cog" aria-hidden="true"></i> @endif</a>
        &nbsp;|&nbsp;<a href="{{ url('admin/plugin/settings/add-sub-settings', $row->slug) }}" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('global.app_add_key')}}">@if( 'button' === $addnew_type ) @lang('global.app_add_key') @else <i class="fa fa-plus-circle" aria-hidden="true"></i> @endif</a>
        @endif
        <?php
    //}
}

if ( 'IncomesController' === $controller ) {
    ?>
    @can($gateKey.'receipt')
    &nbsp;|&nbsp;<a href="{{ route('admin.incomes.receipt', $row->slug) }}" class="success" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('custom.incomes.receipt')}}">@if( 'button' === $addnew_type ) @lang('custom.incomes.receipt') @else <i class="fa fa-money" aria-hidden="true"></i> @endif</a>
    @endcan
    <?php
}
if ( 'OrdersController' === $controller ) {
        $class = 'info';
        if ( 'Pending' === $row->status ) {
            $class = 'warning';
        }
        if ( 'Accepted' === $row->status || 'Active' === $row->status ) {
            $class = 'success';
        }
        if ( 'Cancelled' === $row->status ) {
            $class = 'warning';
        }
    ?>
    @can('order_cancel')
        @if ( in_array($row->status, array( 'Pending', 'Cancelled', 'Returned' ) ) )
			

            <div class="btn-group ">
                <button type="button" class=" btn-success mb-1 btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: flex;align-items:center;justify-items:center;padding: 2px!important">                                    
                    &nbsp;{{trans('custom.common.mark-as')}}&nbsp;<span class="caret"></span>
                </button>
                <div class="dropdown-menu">                    
                    <li><a class="dropdown-item" href="{{ route('admin.orders.cancel', [ 'slug' => $row->slug, 'status' => 'Cancelled']) }}">{{trans('custom.orders.cancel')}}</a></li>               
                    
                    <li><a class="dropdown-item" href="{{ route('admin.orders.cancel', [ 'slug' => $row->slug, 'status' => 'Active'] ) }}">{{trans('custom.orders.active')}}</a></li>                    
                    
                    <li><a class="dropdown-item" href="{{ route('admin.orders.cancel', [ 'slug' => $row->slug, 'status' => 'Pending'] ) }}">{{trans('custom.orders.pending')}}</a></li>
                    
                    <li><a class="dropdown-item" href="{{ route('admin.orders.cancel', [ 'slug' => $row->slug, 'status' => 'Returned'] ) }}">{{trans('custom.orders.return')}}</a></li>
                    
                </div>
            </div>
		
			<?php
			if ( isCustomer() ) {
			$payment = $row->payment( $row->id );
			
            $isExpired = false;
            if ( $payment ) {
			 $isExpired = \App\Http\Controllers\Admin\PaymentsController::isExpired( $payment );
            }
			
			if ( ! $isExpired ) {
			?>
			&nbsp;|&nbsp;<a href="{{ route('admin.orders.payment-now', $row->slug) }}" class="info" onclick="return confirm('{{trans("orders::global.orders.app_are_you_sure")}}')" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('orders::global.orders.retry')}}">@if( 'button' === $addnew_type ) @lang('orders::global.orders.retry') @else <i class="fa fa-repeat" aria-hidden="true"></i> @endif</a>
			<?php }
			}
			?>
			
		@else
        &nbsp;|&nbsp;<span class="label label-{{$class}} label-many">{{$row->status}}</span>
        @endif
    @endcan
	@if( isCustomer() )
    &nbsp;|&nbsp;<a href="{{ route('admin.orders.reorder', $row->slug) }}" class="info" onclick="return confirm('{{trans("orders::global.orders.app_are_you_sure_reorder")}}')" data-toggle="tooltip" data-placement="bottom" data-original-title="{{trans('orders::global.orders.reorder')}}">@if( 'button' === $addnew_type ) @lang('orders::global.orders.reorder') @else <i class="fa fa-repeat" aria-hidden="true"></i> @endif</a>
    @endif
    <?php
    
}
?>

</span>