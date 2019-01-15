<div class="school-section">
    <div class="love-container _1 w-container">
        <div class="div-block-1103">
            <h1 class="homepage-title orange"><?php echo e(trans('front.homepage.topschoolcourse')); ?></h1>
        </div>
        <div class="div-block-1158">
            <?php if(count($school) > 0): ?>
                <?php $__currentLoopData = $school; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <a href="<?php echo e(asset($v->mSchooltranslations[0]->slug)); ?>" title="<?php echo e($v->mSchooltranslations[0]->name); ?>"
                       alt="<?php echo e($v->mSchooltranslations[0]->name); ?>" class="div-product w-inline-block">
                        <?php
                            $image_avatar = $noimage;
                        ?>
                        <?php $__currentLoopData = $v->mSchoolimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($image->is_avatar == 1): ?>
                                <?php
                                    $image_avatar =  Imgfly::imgPublic($image->image.'?w=300');
                                ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($v->logo !== null): ?>
                            <?php if(filter_var($v->logo, FILTER_VALIDATE_URL) === FALSE): ?>
                                <?php $logo_school = asset('img/'.$v->logo); ?>
                            <?php else: ?>
                                <?php $logo_school = $v->logo; ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php $logo_school = ''; ?>
                        <?php endif; ?>

                        <div class="div-photo-school" style="background-image: url(<?php echo e($image_avatar); ?>);">
                            <div class="div-block-1104">
                                <div class="text-block-58"><?php echo e($v->review); ?> reviews<br></div>
                            </div>
                        </div>
                        <?php if($logo_school != ''): ?>
                        <div class="logo-background">
                            <div class="logo-background-inside" style="background-image: url(<?php echo e($logo_school); ?>);"></div>
                        </div>
                        <?php endif; ?>
                        <div class="div-block-1102">
                            <div class="div-block-1106">
                                <h3 class="h2-school-name pink"><?php echo e($v->mSchooltranslations[0]->name); ?></h3>
                                <div class="div-block-diamond">
                                    <?php for($rating = 1; $rating <= $v->rating; $rating++): ?>
                                    <i class="fas fa-star text-warning"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="div-block-1105">
                                <div class="div-icon-text">
                                    <div class="div-block-ico"></div>
                                    <div class="text-language"><?php echo e($v->configCity->name); ?></div>
                                </div>
                                <div class="div-icon-text">
                                    <div class="div-block-ico _1"></div>
                                    <div class="text-language"><?php echo e($v->mSchoollevel->mSchoolleveltranslations[0]->name); ?></div>
                                </div>
                                <div class="div-icon-text">
                                    <div class="div-block-ico _2"></div>
                                    <div class="text-language">
                                        <?php $array_language = []; ?>
                                        <?php $__currentLoopData = $v->mSchoollanguagecourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                if(!empty($items->mSchoollanguage->mSchoollanguagetranslations[0]->name)) {
                                                    array_push($array_language, $items->mSchoollanguage->mSchoollanguagetranslations[0]->name);
                                                }
                                            ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e(implode(', ', $array_language)); ?>

                                        <br>‍
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="div-block-1103"><a href="<?php echo e(asset('schools')); ?>"
                                       class="view-promotion-copy"><?php echo e(trans('front.homepage.viewall.school')); ?></a></div>
    </div>
</div>