    <script>
        var base_url = '<?php echo e(url('/')); ?>';
        var base_admin = '<?php echo e(route('admin.index')); ?>';
        var lang_id = <?php echo e(LaravelLocalization::getCurrentLocaleID()); ?>;
        var lang_code = '<?php echo e(LaravelLocalization::getCurrentLocale()); ?>';
        var debug = <?php echo e((env('APP_DEBUG')) ? 1 : 0); ?>;
    </script>
    <script type='text/javascript' src='<?php echo e(asset('assets/backend/bower_components/jquery/dist/jquery.min.js')); ?>'></script>
    <script type='text/javascript' src='<?php echo e(asset('assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/chart.js/Chart.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/bootstrap-validator/validator.min.js')); ?>'></script>
    <script type='text/javascript' src='<?php echo e(asset('assets/backend/bower_components/fastclick/lib/fastclick.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/moment/min/moment-with-locales.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/iCheck/icheck.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/input-mask/inputmask.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/input-mask/inputmask.date.extensions.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/input-mask/inputmask.extensions.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/input-mask/jquery.inputmask.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/bootstrap-slider/bootstrap-slider.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/moment/min/moment.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.ja.min.js')); ?>' charset='UTF-8'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/timepicker/bootstrap-timepicker.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/datatables.net-bs/js/dataTables.checkboxes.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/summernote/summernote.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/lightbox/js/lightbox.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/fileupload/js/vendor/jquery.ui.widget.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/fileupload/js/jquery.fileupload.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/fileupload/js/jquery.fileupload-process.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/fileupload/js/jquery.fileupload-validate.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/waitme/js/waitMe.min.js')); ?>'></script>
    <script src='<?php echo e(asset('assets/backend/bower_components/darktooltip/dist/jquery.darktooltip.js')); ?>'></script>
    <script type='text/javascript' src='<?php echo e(asset('assets/backend/js/adminlte.min.js')); ?>'></script>
    <script src="<?php echo e(asset('assets/backend/js/pages/main.min.js')); ?>"></script>
    <script type='text/javascript' src='<?php echo e(asset('assets/backend/js/pages/modal.min.js')); ?>'></script>
    <?php echo $__env->yieldContent('script'); ?>