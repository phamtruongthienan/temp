<div class="section-promotion-copy">
    <div class="container-2 w-container">
        <?php if(count($promotion) > 0): ?>
            <div class="div-block-1103-copy">
                <h1 class="homepage-title"><?php echo e(trans('front.homepage.promotions')); ?></h1>
            </div>
            <div class="div-block-1288 block-promotion-list">
                <?php $class_promotion = 0; ?>
                <?php $__currentLoopData = $promotion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $logo_promotion =  Imgfly::imgPublic($v->mSchooleventtranslations[0]->logo.'?w=550');
                    ?>
                    <?php if($class_promotion == 0): ?>
                        <div class="div-promotion" style="background-image: url(<?php echo e($logo_promotion); ?>);">
                            <a href="<?php echo e(asset($v->mSchooleventtranslations[0]->slug)); ?>"
                               class="link-promotion w-inline-block"></a>
                        </div>
                    <?php else: ?>
                        <div class="div-promotion _<?php echo e($class_promotion); ?>"
                             style="background-image: url(<?php echo e($logo_promotion); ?>);">
                            <a href="<?php echo e(asset($v->mSchooleventtranslations[0]->slug)); ?>"
                               class="link-promotion w-inline-block"></a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="div-block-1103"><a href="<?php echo e(asset('promotion')); ?>"
                                           class="view-promotion"><?php echo e(trans('front.homepage.viewall.promotions')); ?></a>
            </div>
        <?php endif; ?>
        <?php if(!empty($config_main)): ?>

            <div class="div-block-4">
                <blockquote class="block-quote-2"><strong class="bold-text-17">&quot;</strong>
                    <?php echo e($config_main[0]->configMaintranslations[0]->slogan); ?>

                    <strong class="bold-text-17">&quot;</strong><br></blockquote>
                <div class="text-block-59"><?php echo e($config_main[0]->configMaintranslations[0]->quote); ?></div>
            </div>
        <?php endif; ?>

    </div>
</div>