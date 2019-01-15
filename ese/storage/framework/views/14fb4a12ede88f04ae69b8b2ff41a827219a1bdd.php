<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>AdminLTE 2 | General UI</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php echo $__env->yieldContent('meta'); ?>
    <?php echo $__env->make('theme.layout.backend.main_css', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php echo $__env->make('theme.layout.backend.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('theme.layout.backend.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <!-- START CUSTOM TABS -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- END CUSTOM TABS -->
            </section>
            <!-- /.content -->
        </div>

        <?php echo $__env->make('theme.layout.backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <?php echo $__env->make('theme.layout.backend.main_js', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>