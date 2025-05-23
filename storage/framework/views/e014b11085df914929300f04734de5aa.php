<style>
    .lo-sidebar-search .select2-container--default .select2-selection--single {

    border-radius: 2px !important;
    border: 1px solid gray;
}
</style>

<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar Lo-main-sidebar">
    <?php
    $parts = getController();
    $controller = $parts['controller'];
    $action = $parts['action'];

    // dd($parts ,$controller ,$action);
    ?>
 

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            

            <?php if( isAdmin() ): ?>
            <li class="lo-sidebar-search">
                <select class="searchable-field form-control "></select>
            </li>
            <?php endif; ?>

            

                <li class="Lo-left-sidebar header-dashboard <?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('admin/dashboard')); ?>">
                        <i class="fa fa-wrench"></i>
                        <span class="title"><?php echo app('translator')->get('global.app_dashboard'); ?></span>
                    </a>
                </li>

                <?php if( isPluginActive( ['invoice', 'credit_note', 'quotes'] ) ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_access')): ?>
                <li class="header Lo-header"><?php echo app('translator')->get('custom.menu.sales'); ?></li>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-life-saver"></i>
                        <span><?php echo app('translator')->get('global.sales.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if( isPluginActive('invoice') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.invoices.index')); ?>">
                                <i class="fa fa-credit-card"></i>
                                <span><?php echo app('translator')->get('global.invoices.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_create')): ?>
                        <!-- <li>
                                        <a href="<?php echo e(route('admin.invoices.create')); ?>">
                                            <i class="fa fa-plus"></i>
                                            <span><?php echo app('translator')->get('custom.menu.create-invoice'); ?></span>
                                        </a>
                                    </li> -->
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if( isPluginActive('credit_note') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('credit_note_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.credit_notes.index')); ?>">
                                <i class="fa fa-file"></i>
                                <span><?php echo app('translator')->get('global.credit_notes.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('credit_note_create')): ?>
                        <!-- <li>
                                        <a href="<?php echo e(route('admin.credit_notes.create')); ?>">
                                            <i class="fa fa-plus"></i>
                                            <span>New credit note</span>
                                        </a>
                                    </li> -->
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if( File::exists(config('modules.paths.modules') .
                        '/Quotes') && Module::find('quotes') &&
                        isPluginActive('quotes')): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('quote_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.quotes.index')); ?>">
                                <i class="fa fa-question-circle"></i>
                                <span><?php echo app('translator')->get('global.quotes.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('quote_create')): ?>
                        <!-- <li>
                                        <a href="<?php echo e(route('admin.quotes.create')); ?>">
                                            <i class="fa fa-plus"></i>
                                            <span><?php echo app('translator')->get('custom.menu.create-quote'); ?></span>
                                        </a>
                                    </li> -->
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if( File::exists(config('modules.paths.modules') .
                        '/Proposals') && Module::find('proposals') &&
                        isPluginActive('proposals')): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proposal_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.proposals.index')); ?>">
                                <i class="fa fa-sticky-note-o"></i>
                                <span><?php echo app('translator')->get('proposals::custom.proposals.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proposal_create')): ?>
                        <!-- <li>
                                        <a href="<?php echo e(route('admin.proposals.create')); ?>">
                                            <i class="fa fa-plus"></i>
                                            <span><?php echo app('translator')->get('custom.menu.create-proposal'); ?></span>
                                        </a>
                                    </li> -->
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if( File::exists(config('modules.paths.modules') .
                        '/Contracts') && Module::find('contracts') &&
                        isPluginActive('contracts')): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contract_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.contracts.index')); ?>">
                                <i class="fa fa-paper-plane"></i>
                                <span><?php echo app('translator')->get('contracts::global.contracts.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contract_create')): ?>
                        <!-- <li>
                                        <a href="<?php echo e(route('admin.contracts.create')); ?>">
                                            <i class="fa fa-plus"></i>
                                            <span><?php echo app('translator')->get('custom.menu.create-contract'); ?></span>
                                        </a>
                                    </li> -->
                        <?php endif; ?>

                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( File::exists(config('modules.paths.modules') .
                '/RecurringInvoices') && Module::find('recurringinvoices') &&
                isPluginActive('recurringinvoices')): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recurring_invoice_access')): ?>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-recycle"></i>
                        <span><?php echo app('translator')->get('global.recurring-invoices.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recurring_invoice_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.recurring_invoices.index')); ?>">
                                <i class="fa fa-recycle"></i>
                                <span><?php echo app('translator')->get('global.recurring-invoices.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recurring_period_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.recurring_periods.index')); ?>">
                                <i class="fa fa-recycle"></i>
                                <span><?php echo app('translator')->get('global.recurring-periods.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive('product') ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_management_access')): ?>
                <li class="header Lo-header"><?php echo app('translator')->get('custom.menu.stock'); ?></li>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span><?php echo app('translator')->get('global.product-management.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.products.index')); ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php echo app('translator')->get('global.products.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php if( isPluginActive('productcategory') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_category_access')): ?>
                        <li>
                            <a href="<?php echo e(url('admin/product_categories')); ?>">
                                <i class="fa fa-folder"></i>
                                <span><?php echo app('translator')->get('global.product-categories.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products_transfer_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.products_transfers.index')); ?>">
                                <i class="fa fa-transgender-alt"></i>
                                <span><?php echo app('translator')->get('global.products-transfer.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if( isPluginActive('productbrand') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.brands.index')); ?>">
                                <i class="fa fa-adn"></i>
                                <span><?php echo app('translator')->get('global.brands.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php endif; ?>
                        <?php if( isPluginActive('productmeasurementunits') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('measurement_unit_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.measurement_units.index')); ?>">
                                <i class="fa fa-dot-circle-o"></i>
                                <span><?php echo app('translator')->get('global.measurement-units.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php endif; ?>
                        <?php if( isPluginActive('productwarehouse') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('warehouse_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.warehouses.index')); ?>">
                                <i class="fa fa-life-bouy"></i>
                                <span><?php echo app('translator')->get('global.warehouses.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive('purchase_order') ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_order_access')): ?>
                <li class="Lo-left-sidebar">
                    <a href="<?php echo e(route('admin.purchase_orders.index')); ?>">
                        <i class="fa fa-anchor"></i>
                        <span><?php echo app('translator')->get('global.purchase-orders.title'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( Gate::allows('contact_access')
                && Gate::allows('contact_create')
                && Gate::allows('contact_company_access')
                && Gate::allows('country_access')
                && Gate::allows('contact_group_access')
                && Gate::allows('contact_type_access')
                && Gate::allows('contact_note_access')
                && Gate::allows('contact_document_access')
                && Gate::allows('contact_mailchimp_email_campaigns')
                ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_access')): ?>
                <li class="header Lo-header"><?php echo app('translator')->get('custom.menu.crm'); ?></li>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-phone-square"></i>
                        <span><?php echo app('translator')->get('global.contact-management.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.contacts.index')); ?>">
                                <i class="fa fa-user-plus"></i>
                                <span><?php echo app('translator')->get('global.contacts.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_create ')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.contacts.create')); ?>">
                                <i class="fa fa-plus"></i>
                                <span><?php echo app('translator')->get('custom.menu.create-contact'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_company_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.contact_companies.index')); ?>">
                                <i class="fa fa-building-o"></i>
                                <span><?php echo app('translator')->get('global.contact-companies.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('country_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.countries.index')); ?>">
                                <i class="fa fa-globe"></i>
                                <span><?php echo app('translator')->get('global.countries.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_group_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.contact_groups.index')); ?>">
                                <i class="fa fa-connectdevelop"></i>
                                <span><?php echo app('translator')->get('global.contact-groups.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_type_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.contact_types.index')); ?>">
                                <i class="fa fa-align-justify"></i>
                                <span><?php echo app('translator')->get('global.contact-types.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_note_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.contact_notes.index')); ?>">
                                <i class="fa fa-sticky-note-o"></i>
                                <span><?php echo app('translator')->get('global.contact-notes.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_document_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.contact_documents.index')); ?>">
                                <i class="fa fa-files-o"></i>
                                <span><?php echo app('translator')->get('global.contact-documents.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_mailchimp_email_campaigns')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.contacts.mailchimp-email-campaigns')); ?>">
                                <i class="fa fa-files-o"></i>
                                <span><?php echo app('translator')->get('global.contacts.mailchimp-email-campaigns'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive('user') ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span><?php echo app('translator')->get('global.user-management.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.users.index')); ?>">
                                <i class="fa fa-user"></i>
                                <span><?php echo app('translator')->get('global.users.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if( isEnable('debug') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                        <li>
                            <a href="<?php echo e(url('admin/permissions')); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span><?php echo app('translator')->get('global.permissions.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                        <li>
                            <a href="<?php echo e(url('admin/roles')); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span><?php echo app('translator')->get('global.roles.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_action_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.user_actions.index')); ?>">
                                <i class="fa fa-th-list"></i>
                                <span><?php echo app('translator')->get('global.user-actions.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.departments.index')); ?>">
                                <i class="fa fa-codepen"></i>
                                <span><?php echo app('translator')->get('global.departments.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive('lead') ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_access')): ?>
                <li class="Lo-left-sidebar">
                    <a
                        href="<?php echo e(route('admin.list_contacts.index', [ 'type' => 'contact_type', 'type_id' => LEADS_TYPE ])); ?>">
                        <i class="fa fa-tty"></i>
                        <span><?php echo app('translator')->get('global.contacts.title_leads'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive('client_project') ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project_access')): ?>
                <li class="header Lo-header"><?php echo app('translator')->get('custom.menu.project'); ?></li>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-cubes"></i>
                        <span><?php echo app('translator')->get('global.projects.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_project_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.client_projects.index')); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span><?php echo app('translator')->get('global.client-projects.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project_status_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.project_statuses.index')); ?>">
                                <i class="fa fa-flask"></i>
                                <span><?php echo app('translator')->get('global.project-statuses.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if( isEnable('debug') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project_billing_type_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.project_billing_types.index')); ?>">
                                <i class="fa fa-dollar"></i>
                                <span><?php echo app('translator')->get('global.project-billing-types.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project_tab_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.project_tabs.index')); ?>">
                                <i class="fa fa-gears"></i>
                                <span><?php echo app('translator')->get('global.project-tabs.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive('account') ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_management_access')): ?>
                <li class="header Lo-header"><?php echo app('translator')->get('custom.menu.balance'); ?></li>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span><?php echo app('translator')->get('global.expense-management.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.incomes.index')); ?>">
                                <i class="fa fa-arrow-circle-right"></i>
                                <span><?php echo app('translator')->get('global.income.title-incomes'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.expenses.index')); ?>">
                                <i class="fa fa-arrow-circle-left"></i>
                                <span><?php echo app('translator')->get('global.expense.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_category_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.income_categories.index')); ?>">
                                <i class="fa fa-list"></i>
                                <span><?php echo app('translator')->get('global.income-category.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_category_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.expense_categories.index')); ?>">
                                <i class="fa fa-list"></i>
                                <span><?php echo app('translator')->get('global.expense-category.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('monthly_report_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.monthly_reports.index')); ?>">
                                <i class="fa fa-line-chart"></i>
                                <span><?php echo app('translator')->get('global.monthly-report.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transfer_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.transfers.index')); ?>">
                                <i class="fa fa-bank"></i>
                                <span><?php echo app('translator')->get('global.transfers.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.accounts.index')); ?>">
                                <i class="fa fa-anchor"></i>
                                <span><?php echo app('translator')->get('global.accounts.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive('order') ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_access')): ?>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-cart-plus"></i>
                        <span><?php echo app('translator')->get('orders::global.orders.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.orders.index')); ?>">
                                <i class="fa fa-server"></i>
                                <span><?php echo app('translator')->get('orders::global.orders.list'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_create')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.orders.create')); ?>">
                                <i class="fa fa-plus"></i>
                                <span><?php echo app('translator')->get('orders::global.orders.place-new-order'); ?></span>
                            </a>
                        </li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <li class="header Lo-header"><?php echo app('translator')->get('custom.menu.miscellaneous'); ?></li>

                <?php if( isPluginActive('task') ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_management_access')): ?>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-list"></i>
                        <span><?php echo app('translator')->get('global.task-management.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.tasks.index')); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span><?php echo app('translator')->get('global.tasks.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_status_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.task_statuses.index')); ?>">
                                <i class="fa fa-server"></i>
                                <span><?php echo app('translator')->get('global.task-statuses.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_calendar_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.task_calendars.index')); ?>">
                                <i class="fa fa-calendar"></i>
                                <span><?php echo app('translator')->get('global.task-calendar.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_calendar_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.calendartasks.calendar.taskstatus')); ?>">
                                <i class="fa fa-server"></i>
                                <span><?php echo app('translator')->get('global.task-calendar.status-wise'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive('asset') ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets_management_access')): ?>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span><?php echo app('translator')->get('global.assets-management.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asset_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.assets.index')); ?>">
                                <i class="fa fa-book"></i>
                                <span><?php echo app('translator')->get('global.assets.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets_category_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.assets_categories.index')); ?>">
                                <i class="fa fa-tags"></i>
                                <span><?php echo app('translator')->get('global.assets-categories.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets_location_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.assets_locations.index')); ?>">
                                <i class="fa fa-map-marker"></i>
                                <span><?php echo app('translator')->get('global.assets-locations.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets_status_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.assets_statuses.index')); ?>">
                                <i class="fa fa-server"></i>
                                <span><?php echo app('translator')->get('global.assets-statuses.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets_history_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.assets_histories.index')); ?>">
                                <i class="fa fa-th-list"></i>
                                <span><?php echo app('translator')->get('global.assets-history.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive(['quick_notification', 'Sendsms']) ): ?>
                <li
                    class="treeview Lo-left-sidebar <?php echo e(( in_array( $request->segment(1), array( 'internal_notifications' ) ) || ( in_array($controller, array('SendSmsController') ) && in_array($action, array('index', 'create', 'edit', 'show', 'destroy') ) ) ) ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        <span><?php echo app('translator')->get('global.internal-notifications.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if( isPluginActive('quick_notification') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('internal_notification_access')): ?>
                        <li class="<?php echo e(( $request->segment(1) == 'internal_notifications' ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.internal_notifications.index')); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span><?php echo app('translator')->get('global.internal-notifications.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if( File::exists(config('modules.paths.modules') .
                        '/Sendsms') && Module::find('sendsms') &&
                        isPluginActive('Sendsms')): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send_sm_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('SendSmsController') ) && in_array($action, array('index', 'create', 'edit', 'show', 'destroy') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.send_sms.index')); ?>">
                                <i class="fa fa-envelope-open" aria-hidden="true"></i>
                                <span><?php echo app('translator')->get('sendsms::global.send-sms.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if( isPluginActive( ['support', 'faq'] ) ): ?>
                <?php if( Gate::allows('support_access') ||
                Gate::allows('faq_management_access') ||
                Gate::allows('faq_category_access') ): ?>
                <li
                    class="treeview Lo-left-sidebar <?php echo e(( in_array( $request->segment(1), array( 'support' ) ) || in_array( $request->segment(2), array(  'articles', 'faq_questions', 'faq_categories' ) ) ) ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-building-o"></i>
                        <span><?php echo app('translator')->get('global.knowledgebase.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if( isPluginActive('support') ): ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('support_access')): ?>
                        <li class="<?php echo e(( $request->segment(1) == 'support' ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.support.index')); ?>">
                                <i class="fa fa-sun-o"></i>
                                <span>Support</span>
                            </a>
                        </li>

                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if( isPluginActive('faq') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq_management_access')): ?>
                        <li class="<?php echo e(( $request->segment(2) == 'faq_questions' ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.faq_questions.index')); ?>">
                                <i class="fa fa-question"></i>
                                <span><?php echo app('translator')->get('global.faq-management.faq'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq_category_access')): ?>
                        <li class="<?php echo e(( $request->segment(2) == 'faq_categories' ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.faq_categories.index')); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span><?php echo app('translator')->get('global.faq-categories.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if( isPluginActive( ['content_management', 'article'] ) ): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('content_management_access')): ?>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span><?php echo app('translator')->get('global.content-management.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if( isPluginActive( 'content_management' ) ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('content_category_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.content_categories.index')); ?>">
                                <i class="fa fa-folder"></i>
                                <span><?php echo app('translator')->get('global.content-categories.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('content_tag_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.content_tags.index')); ?>">
                                <i class="fa fa-tags"></i>
                                <span><?php echo app('translator')->get('global.content-tags.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('content_page_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.content_pages.index')); ?>">
                                <i class="fa fa-file-o"></i>
                                <span><?php echo app('translator')->get('global.content-pages.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if( isPluginActive( 'article' ) ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('article_access')): ?>
                        <li class="<?php echo e(( $request->segment(2) == 'articles' ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.articles.index')); ?>">
                                <i class="fa fa-bookmark-o"></i>
                                <span><?php echo app('translator')->get('global.articles.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('global_setting_access')): ?>
                <li class="treeview Lo-left-sidebar">
                    <a href="#">
                        <i class="fa fa-gears"></i>
                        <span><?php echo app('translator')->get('global.global-settings.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master_setting_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.master_settings.index')); ?>">
                                <i class="fa fa-gear"></i>
                                <span><?php echo app('translator')->get('global.master-settings.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if( File::exists(config('modules.paths.modules') .
                        '/DynamicOptions') && Module::find('dynamicoptions') &&
                        isPluginActive('dynamicoptions')): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dynamic_option_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dynamic_options.index')); ?>">
                                <i class="fa fa-money"></i>
                                <span><?php echo app('translator')->get('global.dynamic-options.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.currencies.index')); ?>">
                                <i class="fa fa-money"></i>
                                <span><?php echo app('translator')->get('global.currencies.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('template_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.templates.index')); ?>">
                                <i class="fa fa-sitemap"></i>
                                <span><?php echo app('translator')->get('templates::global.templates.email-templates'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if( File::exists(config('modules.paths.modules') .
                        '/Sendsms') && Module::find('sendsms') &&
                        isPluginActive('sendsms')): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('smstemplate_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.smstemplates.index')); ?>">
                                <i class="fa fa-commenting-o"></i>
                                <span><?php echo app('translator')->get('smstemplates::global.smstemplates.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_gateway_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.payment_gateways.index')); ?>">
                                <i class="fa fa-creative-commons"></i>
                                <span><?php echo app('translator')->get('global.payment-gateways.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.taxes.index')); ?>">
                                <i class="fa fa-database"></i>
                                <span><?php echo app('translator')->get('global.taxes.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('discount_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.discounts.index')); ?>">
                                <i class="fa fa-dollar"></i>
                                <span><?php echo app('translator')->get('global.discounts.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('translation_manager')): ?>
                        <li>
                            <a href="<?php echo e(URL_TRANSLATIONS); ?>">
                                <i class="fa fa-language"></i>
                                <span><?php echo app('translator')->get('custom.translations.title'); ?></span>
                            </a>
                        </li><?php endif; ?>

                        <?php if( isPluginActive('languages')): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('LanguagesController') ) && in_array($action, array('index', 'create', 'edit', 'show', 'destroy') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.languages.index')); ?>">
                                <i class="fa fa-sign-language"></i>
                                <span><?php echo app('translator')->get('global.languages.title'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>

                        <!-- <?php if( File::exists(config('modules.paths.modules') .
                        '/DatabaseBackup') && Module::find('databasebackup') &&
                        isPluginActive('databasebackup')): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('database_backup_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.database_backups.index')); ?>">
                                <i class="fa fa-database"></i>
                                <span><?php echo app('translator')->get('global.database-backup.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php endif; ?> -->

                        

                        <?php if( isPluginActive('dashboardwidgets') ): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('widget_access')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.home.dashboard-widgets')); ?>">
                                <i class="fa fa-shopping-bag"></i>
                                <span><?php echo app('translator')->get('global.dashboard-widgets.title'); ?></span>
                            </a>
                        </li><?php endif; ?>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_access')): ?>
                <li class=" Lo-left-sidebar <?php echo e(( in_array($controller, array('ReportsController') ) ) ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-line-chart"></i>
                        <span class="title"><?php echo app('translator')->get('custom.reports.generated-reports'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_income_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('ReportsController') ) && in_array($action, array('incomeReport') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/admin/reports/income-report')); ?>">
                                <i class="fa fa-signal"></i>
                                <span class="title"><?php echo app('translator')->get('custom.reports.income-report'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_expense_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('ReportsController') ) && in_array($action, array('expenseReport') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/admin/reports/expense-report')); ?>">
                                <i class="fa fa-area-chart"></i>
                                <span class="title"><?php echo app('translator')->get('custom.reports.expense-report'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_users_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('ReportsController') ) && in_array($action, array('usersReport') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/admin/reports/users-report')); ?>">
                                <i class="fa fa-bar-chart"></i>
                                <span class="title"><?php echo app('translator')->get('custom.reports.users-report'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_users_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('ReportsController') ) && in_array($action, array('rolesUsersReport') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/admin/reports/roles-users-report')); ?>">
                                <i class="fa fa-pie-chart"></i>
                                <span class="title"><?php echo app('translator')->get('others.reports.users-roles-report'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_projects_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('ReportsController') ) && in_array($action, array('contactsProjectsReports') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/admin/reports/contacts-projects-reports')); ?>">
                                <i class="fa fa-bar-chart"></i>
                                <span class="title"><?php echo app('translator')->get('custom.reports.projects-report'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_tasks_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('ReportsController') ) && in_array($action, array('tasksReport') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/admin/reports/tasks-report')); ?>">
                                <i class="fa fa-signal"></i>
                                <span class="title"><?php echo app('translator')->get('custom.reports.tasks-report'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_assets_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('ReportsController') ) && in_array($action, array('assetsReport') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/admin/reports/assets-report')); ?>">
                                <i class="fa fa-bar-chart"></i>
                                <span class="title"><?php echo app('translator')->get('custom.reports.assets-report'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_products_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('ReportsController') ) && in_array($action, array('productsReport') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/admin/reports/products-report')); ?>">
                                <i class="fa fa-line-chart"></i>
                                <span class="title"><?php echo app('translator')->get('custom.reports.products-report'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports_purchase_access')): ?>
                        <li
                            class="<?php echo e(( in_array($controller, array('ReportsController') ) && in_array($action, array('purchaseOrdersReport') ) ) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/admin/reports/purchase-orders-report')); ?>">
                                <i class="fa fa-bar-chart"></i>
                                <span class="title"><?php echo app('translator')->get('custom.reports.purchase-order-report'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if( File::exists(config('modules.paths.modules') .
                '/ModulesManagement') && Module::find('modulesmanagement') &&
                isPluginActive('modulesmanagement')): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modules_management_access')): ?>
                <li
                    class=" Lo-left-sidebar <?php echo e(( in_array($controller, array('ModulesManagementsController') ) && in_array($action, array('index', 'create', 'edit', 'show') ) ) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.modules_managements.index')); ?>">
                        <i class="fa fa-tasks"></i>
                        <span><?php echo app('translator')->get('modulesmanagement::global.modules-management.title'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php ($unread = App\Models\MessengerTopic::countUnread()); ?>
                <li
                    class=" Lo-left-sidebar <?php echo e($request->segment(2) == 'messenger' ? 'active' : ''); ?> <?php echo e(($unread > 0 ? 'unread' : '')); ?>">
                    <a href="<?php echo e(route('admin.messenger.index')); ?>">
                        <i class="fa fa-envelope"></i>

                        <span><?php echo app('translator')->get('custom.app_messages'); ?></span>
                        <?php if($unread > 0): ?>
                        <?php echo e(($unread > 0 ? '('.$unread.')' : '')); ?>

                        <?php endif; ?>
                    </a>
                </li>
          

                <li class=" Lo-left-sidebar <?php echo e($request->segment(1) == 'change_password' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('auth.change_password')); ?>">
                        <i class="fa fa-key"></i>
                        <span class="title"><?php echo app('translator')->get('global.app_change_password'); ?></span>
                    </a>
                </li>

                <li class="Lo-left-sidebar">
                    <a href="#logout" onclick="$('#logout').submit();">
                        <i class="fa fa-arrow-left"></i>
                        <span class="title"><?php echo app('translator')->get('global.app_logout'); ?></span>
                    </a>
                </li>
        </ul>
    </section>
</aside><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>