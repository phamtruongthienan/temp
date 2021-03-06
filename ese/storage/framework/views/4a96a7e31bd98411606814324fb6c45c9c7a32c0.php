<?php if(count($client) > 0): ?>
    <div class="div-block-1103 w">
        <h1 class="homepage-title"><?php echo e(trans('front.homepage.ourclient')); ?></h1>
    </div>
    <div data-delay="3000" data-animation="cross" data-autoplay="1" data-nav-spacing="7" data-duration="1000"
         data-infinite="1" class="slider-3 w-slider">
        <div class="mask-2 w-slider-mask">
            <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="slide-11 w-slide">
                    <a href="<?php echo e(asset($v->mClienttranslations[0]->mSchool->mSchooltranslations[0]->slug)); ?>" target="_blank">
                        <div class="div-block-46">
                            <?php
                                $logo_client =  Imgfly::imgPublic($v->mClienttranslations[0]->logo.'?w=180');
                            ?>
                            <div class="div-block-47" style=" background-image: url(<?php echo e($logo_client); ?>);"></div>
                            <div class="div-block-48-copy">
                                <p class="paragraph-3-copy"><?php echo e($v->mClienttranslations[0]->content); ?></p>
                                <div class="text-block-17"><?php echo e($v->mClienttranslations[0]->name); ?></div>
                                <div class="text-block-40"><strong><em
                                                class="italic-text-6"><?php echo e($v->mClienttranslations[0]->address); ?></em></strong>
                                </div>
                                <div class="text-block-40"><strong><em
                                                class="italic-text-6"><?php echo e($v->mClienttranslations[0]->email); ?></em></strong>
                                </div>
                                <div class="text-block-40"><strong><em
                                                class="italic-text-6">Tel: <?php echo e($v->mClienttranslations[0]->phone); ?><br>Fax:
                                            <?php echo e($v->mClienttranslations[0]->fax); ?>

                                            <br>Website: <?php echo e($v->mClienttranslations[0]->website); ?></em></strong></div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="left-arrow-2 w-slider-arrow-left">
            <div class="icon-2 w-icon-slider-left"></div>
        </div>
        <div class="right-arrow-2 w-slider-arrow-right">
            <div class="icon-2 w-icon-slider-right"></div>
        </div>
        <div class="slide-nav-2 w-slider-nav w-slider-nav-invert w-round"></div>
    </div>
<?php endif; ?>