<?php $__env->startSection('content'); ?>
    <div class="section-16">
        <div class="w-container">
            <div class="utility-page-wrap">
                <div class="utility-page-content-copy">
                    <div class="div-block-1219"></div>
                    <h2>Page not found</h2>
                    <div class="text-block-88">The page you are looking for doesn&#x27;t exist or has been moved.</div>
                    <a href="<?php echo e(asset('/')); ?>" class="button-2 w-button">Return to Homepage</a></div>
            </div>
        </div>
    </div>
    <div class="section-email-enter">
        <div class="container w-container">
            <?php echo $__env->make('theme.frontend.section.homepage.subscribe', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>