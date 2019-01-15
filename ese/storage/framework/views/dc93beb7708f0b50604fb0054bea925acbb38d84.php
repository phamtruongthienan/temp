<?php if(count($breadcrumbs)): ?>
    <div class="div-block-breadcumb">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($breadcrumb->url && !$loop->last): ?>
                <a href="<?php echo e($breadcrumb->url); ?>" class="link-breadcumb-2"><?php echo e($breadcrumb->title); ?></a>
                <div class="div-block-24"></div>
            <?php else: ?>
                <?php echo e($breadcrumb->title); ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>