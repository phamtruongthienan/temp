<div data-collapse="medium" data-animation="default" data-duration="400" id="Header"
     data-w-id="e11c814f-9ea2-49e8-a429-f8d05af13029" class="navbar w-nav">
    <a href="<?php echo e(asset('/')); ?>" class="brand w-nav-brand w--current">
        <img src="<?php echo e(asset('assets/frontend/images/logo.svg')); ?>" width="200" height="100" alt="" class="image">
    </a>
    <?php echo $__env->make('theme.layout.frontend.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>