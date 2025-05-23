<style>
        .Lo-topnavbar {
            /* background-color:white !important; */
        }
        .Lo-main-logo {
            /* background-color: #343a40 !important; */
        }
        .skin-blue .main-header .navbar .sidebar-toggle {
            color: white;
        }
        .dark-mode .skin-blue .main-header .navbar .sidebar-toggle {
    color: white !important;
}
.skin-blue .main-header .navbar .sidebar-toggle {
    background-color: #367fa9;
}
body.dark-mode .skin-blue .main-header .logo {
    color: #222d32 !important;
}
body.dark-mode .skin-blue-light .main-sidebar {
    color: #222d32 !important;
}

        .nav-link.lo-fullscreen {
    border: none; /* Remove border */
    background-color: transparent; /* Set background color to transparent */
    padding:0px;
    margin-top: 3px;
}
.la-navbar-top {
    padding: 0px 10px;
    /* margin: 0px 4px; */
}
svg.bi.bi-fullscreen {
    width: 15px !important;
    height: 15px !important;
    margin-top: 2px;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
    background-color: #111;
    overflow-x: none;
    transition: 0.5s;
    padding-top: 5px;
    margin-top: 50px;
    
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    left: 25px;
    font-size: 36px;
    margin-right: 50px;
}

.Lo-rightsidebar {
    color: black;
}
body.dark-mode .Lo-rightsidebar {
    color: white;
}
.la-navbar-right {
    padding: 1px 10px;
}


.fa-expand-arrows-alt {
    font-size: 17px;
    color: #222d32;
}

@media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 15px;
    }

    .sidenav a {
        font-size: 18px;
    }
}

.custom-button-container {
    /* display: flex;
    justify-content: space-evenly; */
    color: white;
    padding-left: 38px;
    padding-top: 10px;
}
.full-screen-size {
    width: 17px; /* Specify the width you want */
    height: auto; 
}
.navbar-nav>.user-menu .user-image {
    margin-top: 0px !important;
}
.rounded-button {
    border-radius: 50%;
    width: 25px;
    height: 25px;
    text-align: center;
    padding: 0;
    background-color: #343a40;
    border: 1px solid #0000008a;
    margin-top: 2px;
    margin-right: -5px;
    color: #d9c6c6;
  }
  .Lo-dropdown-item {
    padding-top: 5px;
    padding-left: 10px;
}
body.dark-mode .skin-blue .main-header .navbar .sidebar-toggle {
    color: #ffffff !important;
}
.Lo-user-header {
    background-color: #343a40 !important;
}
.Lo-quicklink-pa {
    padding-left: 10px;
}
/* right side plate color css start */
.palette-container:hover .fa-palette {
	color: #fff;
}
.plaette-colors {
    /* position: absolute; */
    list-style: none;
    padding: 15px;
  /* margin-top: -45px; */
    display: none;
  right: 100%; 
  overflow: none;
}
/* hover aslo chnage */
.palette-container .plaette-colors {
    display: flex;
  flex-direction: row;
}

.colors {
    width: 30px;
    height: 30px;
    border: 1px solid #ccc;
    border-radius: 50%;
/*     margin: 10px; */
    cursor: pointer;
  margin-left: 4px;
}
.white {
	background-color: #fff;
}
.toggleNavblue {
	background-color: #00b29c
}
.yellow {
	background-color: #0096d3;
}
.purple {
	background-color: #c9d3e8;
}
.skin-yellow {
	background-color: #f39c12;
}
.skin-green {
	background-color: green;
}
.skin-purple {
	background-color: #605ca8;
}
/* .content-wrapper, .right-side {
    background-color: var(--color);
} */
.Lo-color-theam {
    padding:2px !important;
}
.Lo-color-skin {
    padding:2px !important;
}

/* right side plate color css end */
.hw-quick-create {
    font-size: 16px;
    font-weight: 700;
    padding-left: 15px;
}
.hw-dropdown-menu-drop {
    width: 175px;
}
.topbar-list{
    display: flex;
    align-items: center;
    justify-items: center;
}
    </style>
<nav class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(url('/admin/dashboard')); ?>" class="logo Lo-main-logo" style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <?php
        $site_title = getSetting('site_title','site_settings', 'LaraOffice');
        $site_logo = getSetting('site_logo','site_settings');        
        $destinationPath = getSettingsPath();
        ?>
        <?php if( ! empty( $site_logo ) && file_exists($destinationPath.$site_logo)): ?>
        <img src="<?php echo e(IMAGE_PATH_SETTINGS.$site_logo); ?>" class="logo-main" alt="<?php echo e($site_title); ?>" title="<?php echo e($site_title); ?>">
        <?php else: ?>
        <img src="<?php echo e(asset('images/logo3.png')); ?>" class="logo-main" alt="<?php echo e($site_title); ?>" title="<?php echo e($site_title); ?>">
        <?php endif; ?>
        <!-- logo for regular state and mobile devices -->        
        <span class="logo-mini"><?php echo e($site_title); ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?php echo e($site_title); ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top Lo-topnavbar">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <!-- logo for regular state and mobile devices -->        
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar" style="background-color: white;"></span>
    <span class="icon-bar" style="background-color: white;"></span>
    <span class="icon-bar" style="background-color: white;"></span>
</a>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
       <i class="fa fa-angle-double-down" style="font-size:19px; color:black;"></i>

</button>
        
        <div class="navbar-custom-menu collapse navbar-collapse">
            <ul class="nav navbar-nav topbar-list">
                 <!-- Languages Menu -->
                 <?php
                $languages = getLanguages();
                $languages_arr = array();
                ?>
                  
    <li class="nav-item dropdown">
      <button class="rounded-button dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Add New">
        <i class="fas fa-plus" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Quick Create"></i> <!-- Font Awesome plus icon -->
      </button>
      <div class="dropdown-menu hw-dropdown-menu-drop" aria-labelledby="dropdownMenuButton">
        <h5 class="dropdown-item hw-quick-create"><i class="fas fa-plus"></i> <?php echo app('translator')->get('custom.menu.sales'); ?></h5>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.invoices.create')); ?>"><i class="fa fa-credit-card mr-2"></i> <?php echo app('translator')->get('global.invoices.title'); ?></a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.credit_notes.create')); ?>"><i class="fa fa-file"></i> <?php echo app('translator')->get('global.credit_notes.title'); ?></a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.quotes.create')); ?>"><i class="fa fa-question-circle"></i> <?php echo app('translator')->get('global.quotes.title'); ?></a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.proposals.create')); ?>"><i class="fa fa-sticky-note-o"></i> <?php echo app('translator')->get('proposals::custom.proposals.title'); ?></a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.contracts.create')); ?>"><i class="fa fa-paper-plane"></i> <?php echo app('translator')->get('contracts::global.contracts.title'); ?></a></p>

        <h5 class="dropdown-item hw-quick-create"><i class="fas fa-plus"></i> <?php echo app('translator')->get('global.recurring-invoices.title'); ?></h5>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.recurring_invoices.create')); ?>"><i class="fa fa-recycle"></i> <?php echo app('translator')->get('global.recurring-invoices.title'); ?></a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.recurring_periods.create')); ?>"><i class="fa fa-recycle"></i> <?php echo app('translator')->get('global.recurring-periods.title'); ?></a></p>

        <h5 class="dropdown-item hw-quick-create"><i class="fas fa-plus"></i> <?php echo app('translator')->get('custom.menu.stock'); ?></h5>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.products.create')); ?>"><i class="fa fa-shopping-cart"></i> <?php echo app('translator')->get('global.products.title'); ?></a></p>
        
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.purchase_orders.create')); ?>"><i class="fa fa-anchor"></i> <?php echo app('translator')->get('global.purchase-orders.title'); ?></a></p>

        <h5 class="dropdown-item hw-quick-create"><i class="fas fa-plus"></i> <?php echo app('translator')->get('custom.menu.project'); ?></h5>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.client_projects.create')); ?>"><i class="fa fa-briefcase" aria-hidden="true"></i><?php echo app('translator')->get('global.client-projects.title'); ?></a></p>
        

        <h5 class="dropdown-item hw-quick-create"><i class="fas fa-plus"></i> <?php echo app('translator')->get('custom.menu.balance'); ?></h5>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.incomes.create')); ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <?php echo app('translator')->get('global.income.title-incomes'); ?></a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.expenses.create')); ?>"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> <?php echo app('translator')->get('global.expense.title'); ?></a></p>
        
        <h5 class="dropdown-item hw-quick-create"><i class="fas fa-plus"></i> <?php echo app('translator')->get('custom.menu.crm'); ?></h5>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.contacts.create')); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo app('translator')->get('global.contact-management.title'); ?></a></p>

        <h5 class="dropdown-item hw-quick-create"><i class="fas fa-plus"></i> <?php echo app('translator')->get('custom.menu.miscellaneous'); ?></h5>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.support.create')); ?>"><i class="fa fa-sun-o" aria-hidden="true"></i> Support</a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.assets.create')); ?>"><i class="fa fa-book" aria-hidden="true"></i> <?php echo app('translator')->get('global.assets-management.title'); ?></a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.tasks.create')); ?>"><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo app('translator')->get('modulesmanagement::global.modules-management.title'); ?></a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.orders.create')); ?>"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('orders::global.orders.title'); ?></a></p>
        <p class="Lo-quicklink-pa"><a class="dropdown-item Lo-dropdown-item" href="<?php echo e(route('admin.articles.create')); ?>"><i class="fa fa-bookmark-o" aria-hidden="true"></i> <?php echo app('translator')->get('global.articles.title'); ?></a></p>
      </div>
    </li>
                
                  <li class="la-navbar-top">
    <button class="nav-link lo-fullscreen" data-widget="fullscreen" role="button" onclick="toggleFullScreen()">
    <img class="full-screen-size" ><span id="boot-icon" class="bi bi-arrows-fullscreen" style="font-size: 14px;-webkit-text-stroke-width: 0.1px;"></span>
    </button>
</li>

                  <!-- darkmode -->
             <li class="la-navbar-top">
    <p id="darkModeButton" class="dark-mode-button nav-item-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sun" viewBox="0 0 16 16">
  <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
</svg>
    </p>
</li>
                <!-- Notifications -->
                <li class="dropdown notifications-menu la-navbar-top">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-bell"></i>
                        <?php ($notificationCount = \Auth::user()->internalNotifications()->where('read_at', null)->count()); ?>
                        <?php if($notificationCount > 0): ?>
                            <span class="label label-warning">
                            <?php echo e($notificationCount); ?>

                        </span>
                        <?php endif; ?>
                    </a>
                    <!-- Notifications dropdown menu -->
                    <ul class="dropdown-menu">
                        <li>
                            <div class="slimScrollDiv" style="position: relative;">
                                <ul class="menu notification-menu">
                                    <?php if(count($notifications = \Auth::user()->internalNotifications()->get()) > 0): ?>
                                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="notification-link <?php echo e($notification->pivot->read_at === null ? "unread" : false); ?>">
                                                <a href="<?php echo e($notification->link ? $notification->link : "#"); ?>"
                                                   class="<?php echo e($notification->link ? 'is-link' : false); ?>">
                                                    <?php echo e($notification->text); ?>

                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <li class="notification-link" style="text-align:center;">
                                            <?php echo app('translator')->get('custom.topbar.no-notifications'); ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- right side bar start -->
                <li class="la-navbar-right">
                    <div id="mySidenav" class="sidenav">
                        <?php $button_hover = config('app.action_buttons_hover'); ?>
                        <div class="custom-button-container">
                            <input type="checkbox" id="hover" name="hover" <?php echo e($button_hover ? 'checked' : ''); ?>>
                        <label class="Lo-rightsidebar-shortcut" for="hover">Hover buttons</label>

                        </div>
                        <div class="custom-button-container" data-toggle="offcanvas" role="button">
                            <input type="checkbox" id="hover" name="hover" <?php echo e($button_hover ? 'checked' : ''); ?>>
                        <label class="Lo-rightsidebar-shortcut" >Collapse</label>

                        </div>
                      
                        <div class="custom-button-container">
                            <div class="palette-container">
                                <i class="fas fa-palette"></i>
                                <label class="Lo-rightsidebar-shortcut">Color Themes</label>
                                <ul class="plaette-colors">
                                    <a class="Lo-color-theam" href="<?php echo e(route('admin.change.color', ['type' => 'color_theme', 'value' => 'default'])); ?>"><li class="colors white" data-color="#0984e3" ></li></a>
                                    <a class="Lo-color-theam" href="<?php echo e(route('admin.change.color', ['type' => 'color_theme', 'value' => 'gradient blue theme.css'])); ?>"><li class="colors toggleNavblue" ></li></a>
                                    <a class="Lo-color-theam" href="<?php echo e(route('admin.change.color', ['type' => 'color_theme', 'value' => 'light blue theme.css'])); ?>"><li class="colors yellow" ></li></a>
                                    <a class="Lo-color-theam" href="<?php echo e(route('admin.change.color', ['type' => 'color_theme', 'value' => 'darkgray theme.css'])); ?>"><li class="colors purple" ></li></a>
                                    
                                </ul>
                            
                       
                    </div> 
                        </div>
                        <div class="custom-button-container">
                            <div class="palette-container">
                                <i class="fas fa-palette"></i>
                                <label class="Lo-rightsidebar-shortcut">Color Skin</label>
                                <ul class="plaette-colors">
                                    <a class="Lo-color-skin" href="<?php echo e(route('admin.change.color', ['type' => 'color_skin', 'value' => 'skin-blue'])); ?>"><li class="colors white" ></li></a>
                                    <a class="Lo-color-skin" href="<?php echo e(route('admin.change.color', ['type' => 'color_skin', 'value' => 'skin-blue-light'])); ?>"><li class="colors yellow" ></li></a>
                                    <!-- <a class="Lo-color-skin" href="<?php echo e(route('admin.change.color', ['type' => 'color_skin', 'value' => 'skin-yellow'])); ?>"><li class="colors" >22</li></a> -->
                                    <a class="Lo-color-skin" href="<?php echo e(route('admin.change.color', ['type' => 'color_skin', 'value' => 'skin-yellow-light'])); ?>"><li class="colors skin-yellow" ></li></a>
                                    <a class="Lo-color-skin" href="<?php echo e(route('admin.change.color', ['type' => 'color_skin', 'value' => 'skin-green-light'])); ?>"><li class="colors skin-green" ></li></a>
                                    <a class="Lo-color-skin" href="<?php echo e(route('admin.change.color', ['type' => 'color_skin', 'value' => 'skin-purple-light'])); ?>"><li class="colors skin-purple" ></li></a>
                            
                                </ul>
                            
                       
                    </div> 
                        </div>
                       

                    </div>
                    <span class="Lo-rightsidebar" style="font-size:15px;cursor:pointer"
                        onclick="toggleNav()">&#9782;</span>
                </li>

                <!-- Icon 4 -->
           
                <li class="dropdown languages-menu la-navbar-top">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php echo e(strtoupper(\App::getLocale())); ?>

                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"></li>
                        <ul class="menu language-menu">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php                            
                            $languages_arr[ $language->code ] = $language->language;
                            ?>
                                <li class="language-link">
                                    <a href="<?php echo e(route('admin.language', $language->code)); ?>">
                                        <?php echo e($language->language); ?> (<?php echo e(strtoupper($language->code)); ?>)
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            config('app.languages', $languages_arr);
                            ?>
                        </ul>
                        <li class="footer"></li>
                    </ul>
                </li>

             

                <!-- User Menu -->
                <li class="dropdown user user-menu la-navbar-top">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php
                        $user = Auth::user();
                        $name = $user->name;
                        $image = '';
                        $placeholderImage = '/images/avatar-32x32.jpg'; // Add the path to your placeholder image here
        
                        if ($user->thumbnail && file_exists(public_path().'/thumb/' . $user->thumbnail)) {
                            $image = asset(env('UPLOAD_PATH').'/thumb/'.$user->thumbnail);
                        } else {
                            $image = asset($placeholderImage); // Use the placeholder image if no thumbnail exists
                        }
                        ?>
                        <img src="<?php echo e($image); ?>" class="user-image" alt="<?php echo e($name); ?>">
                        <span class="hidden-xs"><?php echo e($name); ?></span>
                    </a>
                    <!-- User dropdown menu -->
                    <ul class="dropdown-menu">
                        <!-- User header -->
                        <li class="user-header Lo-user-header">
                            <?php if( ! empty( $image ) ): ?>
                            <img src="<?php echo e($image); ?>" class="img-circle" alt="<?php echo e($name); ?>">
                            <?php endif; ?>
                            <p><?php echo e($name); ?>

                                <small><?php echo app('translator')->get('custom.topbar.last-login'); ?><?php echo e(digiDate( Auth::user()->updated_at, true )); ?> 
                                    <?php if( ! empty( Auth::user()->last_login_from ) ): ?> <br> <?php echo app('translator')->get('custom.topbar.login-from'); ?><?php echo e(Auth::user()->last_login_from); ?> <?php endif; ?></small>
                            </p>
                        </li>
                        <!-- User footer -->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo e(route('admin.contacts.profile.edit')); ?>" class="btn btn-dark Lo-button-profile"><?php echo app('translator')->get('custom.topbar.profile'); ?></a>
                            </div>
                            <div class="pull-right">                          
                                <a href="#logout" onclick="$('#logout').submit();" class="btn btn-warning btn-flat">
                                    <i class="fa fa-arrow-left"></i>
                                    <span class="title"><?php echo app('translator')->get('global.app_logout'); ?></span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>

               

            </ul>
        </div>
    </nav>
</nav>

<script>
function toggleDarkMode() {
    var darkModeEnabled = localStorage.getItem('darkModeEnabled');
    var darkModeButton = document.getElementById('darkModeButton');
    var darkModeIcon = darkModeButton.querySelector('svg');

    if (darkModeEnabled === 'true') {
        document.body.classList.add('dark-mode');
        darkModeIcon.classList.remove('bi-moon');
        darkModeIcon.classList.add('bi-sun');
    }

    darkModeButton.addEventListener('click', function() {
        if (document.body.classList.contains('dark-mode')) {
            document.body.classList.remove('dark-mode');
            darkModeIcon.classList.remove('bi-moon');
            darkModeIcon.classList.add('bi-sun');
            localStorage.setItem('darkModeEnabled', 'false');
        } else {
            document.body.classList.add('dark-mode');
            darkModeIcon.classList.remove('bi-sun');
            darkModeIcon.classList.add('bi-moon');
            localStorage.setItem('darkModeEnabled', 'true');
        }
    });
}

toggleDarkMode();

</script>
<script>
function toggleFullScreen() {
    if (!document.fullscreenElement && // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement
    ) { // current working methods
        var elem = document.documentElement;
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Chrome, Safari and Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE/Edge */
            elem.msRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            /* Firefox */
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            /* Chrome, Safari and Opera */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            /* IE/Edge */
            document.msExitFullscreen();
        }
    }
}
</script>
<!-- side navbar script -->
<script>
function toggleNav() {
    var sidenavWidth = document.getElementById("mySidenav").style.width;
    if (sidenavWidth === "250px") {
        document.getElementById("mySidenav").style.width = "0";
    } else {
        document.getElementById("mySidenav").style.width = "250px";
    }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#hover').change(function(){
       
        $.ajax({
            type: 'GET',
            url: "<?php echo e(route('admin.ajax.request')); ?>",
            data: {
                // Pass any data you need to send to the server
                // Example: name: $('#name').val()
            },
            success: function(response) {
                // Handle success response from the server
                console.log('topbar response', response);
                if (response['status'] == 'success') {
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
   
    });
});

document.documentElement.style.setProperty('--color',localStorage.getItem('pageColor'));

const colors= document.querySelectorAll('.colors');

colors.forEach(function(color) {
    color.addEventListener('click',function() {
        let hex = color.dataset.color;
        document.documentElement.style.setProperty('--color',hex);

        localStorage.setItem('pageColor',color.dataset.color);
        
    })
})
</script><?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/partials/topbar.blade.php ENDPATH**/ ?>