<?php $__env->startSection('meta'); ?>
    <meta name="<?php echo e($view->meta_title); ?>" content="<?php echo e($view->meta_title); ?>">
    <meta name="<?php echo e($view->meta_keyword); ?>" content="<?php echo e($view->meta_keyword); ?>">
    <meta name="<?php echo e($view->meta_description); ?>" content="<?php echo e($view->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php
        $path = $view->mNews->mLayout->path;
    ?>
    <?php echo $__env->make($path, \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="section-email-enter">
        <div class="container w-container">
            <?php echo $__env->make('theme.frontend.section.homepage.subscribe', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(LaravelLocalization::getCurrentLocale() != $properties['regional']): ?>
            <?php
                $slug_change = asset($properties['regional'].'/'.$view_slug->slug);
            ?>
            <script>
                $(function () {
                    $('#switch-language').attr('href', '<?php echo e($slug_change); ?>');
                });
            </script>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>