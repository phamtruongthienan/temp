
<?php if(count($ads) > 0): ?> 
    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($v->link == null): ?>
        <?php break; ?>;
        <?php endif; ?>
        <?php if($v->position == 3 && $v->type==3): ?>
            <?php if(filter_var($v->link, FILTER_VALIDATE_URL) === FALSE): ?>
                <?php $ads_link = asset($v->link); ?>
            <?php else: ?>
                <?php $ads_link = $v->link; ?>
            <?php endif; ?>

            <?php if(!empty($v->mAdvertstranslations[0]->image)): ?>
                <?php $ads_image = Imgfly::imgPublic($v->mAdvertstranslations[0]->image.'?w=300'); ?>
            <?php else: ?>
                <?php $ads_image = $noimage; ?>
            <?php endif; ?>

            <div class="div-block-57" style=" background-image: url(<?php echo e($ads_image); ?>);">
                <a href="<?php echo e($ads_link); ?>" target="_blank" class="link-block-promotion w-inline-block w--current"></a>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

