<div class="section-footer-copy">
    <div class="container w-container">
        <div class="row-2 w-row">
            <div class="col-foot w-col w-col-3 w-col-small-6 w-col-tiny-tiny-stack">
                <a href="<?php echo e(asset('booking')); ?>" class="link _1">Booking for visit</a>
                <a href="<?php echo e(asset('schools')); ?>" class="link _1">School &amp; Course</a>

            </div>
            <div class="col-foot w-col w-col-3 w-col-small-6 w-col-tiny-tiny-stack">
                <a href="<?php echo e(asset('promotion')); ?>" class="link _2">Promotion</a>
                <a href="<?php echo e(asset('sitemap')); ?>" class="link _1">Sitemap</a>
            </div>
            <div class="col-foot w-col w-col-3 w-col-small-6 w-col-tiny-tiny-stack">
                <?php if(!empty($menu)): ?>
                    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($v->position == 3): ?>
                            <a  class="link _2" href="<?php if(empty($v->news_id)): ?><?php echo e(asset($v->mMenuTranslations[0]->slug)); ?><?php else: ?><?php echo e(asset($v->mNews->mNewsTranslations[0]->slug)); ?><?php endif; ?>"><?php echo e($v->mMenuTranslations[0]->name); ?></a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <div class="col-foot w-col w-col-3 w-col-small-6 w-col-tiny-tiny-stack">
                <div class="div-block-89">
                    <div class="div-block-90">
                        <div class="link-bold-copy">Hotline</div>
                        <a href="tel:+84905473368" class="link-14"><?php echo e($config_main[0]->configMaintranslations[0]->phone); ?></a></div>
                    <div class="div-block-62">
                        <a href="<?php echo e($config_main[0]->configMaintranslations[0]->facebook_page); ?>" class="link-block-6 w-inline-block">
                            <img src="<?php echo e(asset('/assets/frontend/images/fb.png')); ?>">
                        </a>
                        <a href="<?php echo e($config_main[0]->configMaintranslations[0]->googleplus_page); ?>" class="link-block-6 w-inline-block">
                                <img src="<?php echo e(asset('/assets/frontend/images/gg.png')); ?>">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copy-right div-block-20">
        <div class="text-block"><?php echo e($config_main[0]->configMaintranslations[0]->company_name); ?>. All Rights Reserved.</div>
    </div>
</div>
<div class="top-sub-menu">
    <a href="#" class="top w-inline-block" id="back-to-top">
        <div class="div-block-75"></div>
    </a>
</div>
