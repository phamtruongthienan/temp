<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('meta'); ?>
    <link href="<?php echo e(asset('assets/frontend/css/normalize.css')); ?>?v=1.0.0" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css?v=1.0.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/libs/jquery-ui/jquery-ui.css')); ?>?v=1.0.0">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/libs/slick/slick.css')); ?>?v=1.0.0"/>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css?v=1.0.0'>
    <link href="<?php echo e(asset('assets/frontend/libs/lobibox-master/dist/css/lobibox.min.css')); ?>?v=1.0.0" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/frontend/libs/flag-icon/css/flag-icon.min.css')); ?>?v=1.0.0" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/frontend/libs/typeahead/jquery.typeahead.min.css')); ?>?v=1.0.0" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/frontend/libs/button-loading/button-loading.min.css')); ?>?v=1.0.0" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/frontend/libs/ibutton/all.min.css')); ?>?v=1.0.0" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/frontend/libs/skeleton/skeleton.min.css')); ?>?v=1.0.0" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/libs/jquery-bar-rating/themes/bars-movie.css')); ?>?v=1.0.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/libs/jquery-bar-rating/themes/fontawesome-stars.css')); ?>?v=1.0.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/libs/fancybox/ryxren.css')); ?>?v=1.0.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/libs/pagination/pagination.min.css')); ?>?v=1.0.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/libs/sweet-select/jquery.sweet-dropdown.min.css')); ?>?v=1.0.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/libs/fastselect/fastselect.min.css')); ?>?v=1.0.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/libs/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>?v=1.0.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')); ?>?v=1.0.0">
    <link href="<?php echo e(asset('assets/frontend/css/webflow.css')); ?>?v=1.0.0" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/frontend/css/e-search.webflow.css')); ?>?v=1.0.0" rel="stylesheet" type="text/css">
    <?php echo $__env->yieldContent('style'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js?v=1.0.0" type="text/javascript"></script>
    <!-- [if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js?v=1.0.0"
            type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="<?php echo e(asset('assets/frontend/images/favicon.png')); ?>?v=1.0.0" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo e(asset('assets/frontend/images/webclip.png')); ?>?v=1.0.0" rel="apple-touch-icon">
    <style>.w-container {
            max-width: 1170px;
        }</style>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/iamceege/tooltipster/master/dist/css/tooltipster.bundle.min.css?v=1.0.0"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/iamceege/tooltipster/master/src/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-borderless.css?v=1.0.0"> -->
    <style>
        .sticky-aside {
            position: -webkit-sticky;
            position: sticky;
        }
        #booking .modal-body {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    </style>
</head>
<body class="body">
<?php echo $__env->make('theme.layout.frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('theme.layout.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('theme.frontend.page.map', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(count($ads) > 0): ?> 
<?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ka => $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($va->link == null): ?>
    <?php break; ?>;
    <?php endif; ?>
    <?php if($va->position == 1 && $va->type==2): ?>
        <?php if(filter_var($va->link, FILTER_VALIDATE_URL) === FALSE): ?>
            <?php $ads_link = asset($va->link); ?>
        <?php else: ?>
            <?php $ads_link = $va->link; ?>
        <?php endif; ?>

        <?php if(!empty($va->mAdvertstranslations[0]->image)): ?>
            <?php $ads_image = Imgfly::imgPublic($va->mAdvertstranslations[0]->image.'?w=850'); ?>
        <?php else: ?>
            <?php $ads_image = $noimage; ?>
        <?php endif; ?>
        <div class="popup_this" style="display:none">
            <a href="<?php echo e($ads_link); ?>" target="_blank"><img src="<?php echo e($ads_image); ?>" width="500px"></a>
        </div>
        <?php break; ?>;
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<script>
    var base_url = '<?php echo e(url('/')); ?>';
    var lang_id = <?php echo e(LaravelLocalization::getCurrentLocaleID()); ?>;
    var lang_code = '<?php echo e(LaravelLocalization::getCurrentLocale()); ?>';
    var imageAvatar = "<?php echo e($noimage); ?>";
    var debug = <?php echo e((env('APP_DEBUG')) ? 1 : 0); ?>;
    var url_map_callback_api  = "/api/map";
    var url_map_lat_api  = "10.7546664";
    var url_map_lng_api  = "106.4150402";
    var map_click = false;
    var url_map_current, data_center, school_map_id, temp_map;
    var url_map_zoom = 14;
    var url_map_distance = '<?php echo e($config_main[0]->configMaintranslations[0]->distance_google); ?>';
</script>
<script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>?v=1.0.0" type="text/javascript"></script>
<script src="<?php echo e(asset('js/jquery.cookie.min.js')); ?>?v=1.0.0" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/frontend/libs/slick-1.8.1/slick/slick.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('js/popper.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/momentjs/moment-with-locales.js')); ?>"></script>
<!-- [if lte IE 9]>
<script src="<?php echo e(asset('js/placeholders.min.js')); ?>?v=1.0.0"></script><![endif] -->
<!-- <script src="<?php echo e(asset('js/tooltipster.bundle.min.js')); ?>?v=1.0.0"></script> -->
<!-- <script src="<?php echo e(asset('js/tooltipster-for-webflow.js')); ?>?v=1.0.0"></script> -->
<script src="<?php echo e(asset('assets/frontend/libs/typeahead/jquery.typeahead.min.js')); ?>?v=1.0.0" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/frontend/libs/bootstrap-validator/validator.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/lobibox-master/dist/js/lobibox.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/jquery-bar-rating/jquery.barrating.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/clipboard/clipboard.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/readmore/readmore.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/button-loading/button-loading.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/skeleton/skeleton.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/slimscroll/slimscroll.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/jquery-bar-rating/jquery.barrating.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/gallery/three.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/gallery/photo-sphere-viewer.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/fancybox/ryxren.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/jpopup/jpopup.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/pagination/pagination.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/sweet-select/jquery.sweet-dropdown.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/fastselect/fastselect.min.js')); ?>?v=1.0.0"></script>
<script src="<?php echo e(asset('assets/frontend/libs/jsontotable/jquery.jsontotable.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.js')); ?>?v=1.0.0"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php $__currentLoopData = $config_other; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($v->key == 'GG_KEY_MAP'): ?>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo e($v->value); ?>&libraries=places"></script>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script src="<?php echo e(asset('assets/frontend/js/webflow.js')); ?>?v=1.0.0" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/frontend/js/map.js')); ?>?v=1.0.0" type="text/javascript"></script>


<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js?v=1.0.0"></script><![endif] -->
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>