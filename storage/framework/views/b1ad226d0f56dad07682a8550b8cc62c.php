<?php
$color_theme = 'default';
if (\Cookie::get('color_theme')) { 
  $color_theme = \Cookie::get('color_theme');
}

$is_css = false;
if ( ! empty( $color_theme ) && substr($color_theme, -3) === 'css' ) {
  $is_css = true;
}

$lang = 'en';
if (\Cookie::get('language')) { 
    $lang = \Cookie::get('language');
}
?>
<meta charset="utf-8">
<title><?php echo e(getSetting('site_title', 'site_settings', trans('global.global_title'))); ?>

</title>

<!-- Favicon-->
<link rel="icon" href="<?php echo e(IMAGE_PATH_SETTINGS.getSetting('site_favicon', 'site_settings')); ?>" type="image/x-icon" />
<meta name="description" content="<?php echo e(getSetting('meta_description', 'seo_settings')); ?>">
<meta name="keywords" content="<?php echo e(getSetting('meta_keywords', 'seo_settings')); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 


<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Font Awesome -->
<link href="<?php echo e(asset('css/cdn-styles-css/font-awesome-4.7.0/css/font-awesome.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Ionicons -->
<link href="<?php echo e(asset('css/cdn-styles-css/ionicons-2.0.1/css/ionicons.min.css')); ?>" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>

<![endif]-->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


<link href="<?php echo e(asset('adminlte/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('adminlte/css')); ?>/select2.min.css"/>
<link href="<?php echo e(asset('adminlte/css/AdminLTE.min.css')); ?>" rel="stylesheet">

<link rel="stylesheet" href="<?php echo e(asset('adminlte/css/skins/_all-skins.min.css')); ?>">

<link href="<?php echo e(asset('css/cdn-styles-css/jquery-ui.css')); ?>" rel="stylesheet">


<link href="<?php echo e(asset('css/cdn-styles-css/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/cdn-styles-css/datatables/dataTables.min.css')); ?>" rel="stylesheet">

<link href="<?php echo e(asset('css/cdn-styles-css/datatables/select.dataTables.min.css')); ?>" rel="stylesheet">

<link href="<?php echo e(asset('css/cdn-styles-css/datatables/buttons.dataTables.min.css')); ?>" rel="stylesheet">


<!-- cartpage links -->
<link href="<?php echo e(asset('css/products-cart.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/cart-side-page.css')); ?>" rel="stylesheet">

<link href="<?php echo e(asset('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet"/>

<link href="<?php echo e(asset('css/cdn-styles-css/bootstrap-notify.css')); ?>" rel="stylesheet">

<link href="<?php echo e(asset('css/sweetalert.css')); ?>" rel="stylesheet"/>


<link rel="stylesheet" type="text/css" href="<?php echo e(asset('slick/slick.css')); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('slick/slick-theme.css')); ?>"/>

<link href="<?php echo e(asset('css/stats-style.css')); ?>" rel="stylesheet">

<link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
<?php if( $color_theme != 'default' && $is_css ): ?>
  <link href="<?php echo e(asset('css/' . $color_theme)); ?>" rel="stylesheet">
<?php endif; ?>

<?php if( config('app.action_buttons_hover') ): ?>
<link href="<?php echo e(asset('css/hover-buttons.css')); ?>" rel="stylesheet">
<?php endif; ?>

<script type="text/javascript">
  var baseurl = '<?php echo e(url('/')); ?>';
  var localLang = '<?php echo e($lang); ?>';
  var crsf_token = '_token';
  var crsf_hash = '<?php echo e(csrf_token()); ?>';

  var currency = '<?php echo e(getDefaultCurrency()); ?>';
  var currency_position = '<?php echo e(getCurrencyPosition()); ?>';
  <?php
  $toundsand_separator = App\Models\Settings::getSetting('toundsand_separator', 'currency_settings');
  if ( empty( $toundsand_separator ) ) {
    $toundsand_separator = ',';
  }
  $decimal_separator = App\Models\Settings::getSetting('decimal_separator', 'currency_settings');
  if ( empty( $toundsand_separator ) ) {
    $toundsand_separator = '.';
  }
 $decimals = App\Models\Settings::getSetting('decimals', 'currency_settings');
  if ( empty( $decimals ) ) {
    $decimals = '2';
  }
  ?>
  var toundsand_separator = '<?php echo e($toundsand_separator); ?>';
  var decimal_separator = '<?php echo e($decimal_separator); ?>';
  var decimals = '<?php echo e($decimals); ?>';
  var js_global = {};
  js_global["cartproducts"] = [];
  js_global["months_json"] = ["January","February","March","April","May","June","July","August","September","October","November","December"];
</script>


<?php echo $__env->yieldContent('header_scripts'); ?>
<?php /**PATH C:\xampp\htdocs\laraoffice\resources\views/partials/head.blade.php ENDPATH**/ ?>