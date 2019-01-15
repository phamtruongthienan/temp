<div id="Facilities" class="section-promotion">
    <div class="container-15 w-container">
        <div class="div-block-1270">
            <div class="div-block-1278">
                <div class="div-block-1179">
                    <h2 class="heading-product-menu"><?php echo e(trans('front.homepage.intro.facilities')); ?> </h2>
                    <div class="div-block-1178-copy-2">
                        <div class="div-block-1230">
                            <?php $__currentLoopData = $school_detail[0]->mSchoolcategoryratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="text-block-facility-2"><?php echo e($val->mSchoolcategory->mSchoolcategorytranslations[0]->name); ?>

                                    : <strong class="bold-text-27"><?php echo e($val->rating); ?>/10</strong></div>
                                <div class="div-block-1267 _1">
                                    <?php if($val->rating < 10): ?>
                                        <?php for($i = 1;$i <= $val->rating; $i++): ?>
                                            <div class="div-block-1245"></div>
                                        <?php endfor; ?>
                                        <?php
                                            $grey = 10 - $val->rating;
                                        ?>
                                        <?php for($i = 1;$i <= $grey; $i++): ?>
                                            <div class="div-block-1245 grey"></div>
                                        <?php endfor; ?>
                                    <?php else: ?>
                                        <?php for($i = 1;$i <= 10; $i++): ?>
                                            <div class="div-block-1245"></div>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="div-block-1150">
                    <?php $__currentLoopData = $school_detail[0]->mSchoolattributeratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="div-block-1149">
                            <div class="<?php echo e($val->mSchoolattribute->icon); ?>"></div>
                            <div class="text-block-65"><?php echo e($val->mSchoolattribute->mSchoolattributetranslations[0]->name); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <?php if(!empty($school_detail[0]->file_pdf)): ?>
                <div class="div-block-1269">
                    <?php
                        $link_pdf = asset('view/pdf/'.base64_encode(basename($school_detail[0]->file_pdf,'.pdf')).'.pdf');
                    ?>
                    <h2 class="heading-product-menu"><?php echo e(trans('front.homepage.intro.price')); ?></h2>
                    <?php if(!empty(Auth::user())): ?>
                    <a target="_blank" href="<?php echo e($link_pdf); ?>" class="button-11 w-button">View pdf details school fee<br></a>
                    <?php else: ?>
                    <a href="<?php echo e(asset('login')); ?>?ref=<?php echo e(request()->path()); ?>" class="button-11 w-button"> Login to view<br></a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>


                <?php if(!empty(Auth::user())): ?>
                    <?php if(count($school_detail[0]->mSchoolattributeaddons) > 0): ?>
                        <?php $__currentLoopData = $school_detail[0]->mSchoolattributeaddons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $val->mSchoolattributeaddontranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="div-block-1272">
                                    <div class="text-block-product-fee-2"><?php echo e($item->name); ?></div>
                                    <div class="div-block-1154">
                                        <div class="div-block-1153">
                                        <div data-content="<?php echo e($item->content); ?>" data-keys="<?php echo e($keys); ?>" class="table_render" id="table_render_<?php echo e($keys); ?>"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
            <div class="div-block-1271">
                <div class="sidebar-wrapper">
                    <h2 class="heading-product-menu-copy"><?php echo e(trans('front.homepage.intro.opening')); ?></h2>
                    <div class="div-block-1221">
                        <div class="div-block-1188-copy">
                            <div class="sidebar-non-wrapper">

                                <?php $__currentLoopData = $school_detail[0]->mSchoolcourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($val->end_date)): ?>
                                        <?php if($val->end_date >= $now): ?>
                                            <div class="div-block-1189">
                                                <div class="div-block-1261">
                                                    <div class="icon date"></div>
                                                    <div class="text-block-82"><?php echo e(\Carbon\Carbon::parse($val->start_date)->format($config_language[0]->date_format)); ?></div>
                                                </div>
                                                <div class="div-block-1194-copy">
                                                    <div class="icon school"></div>
                                                    <a href="<?php echo e(asset($val->slug)); ?>"
                                                       class="link-23-copy-2 school-score" data-id="<?php echo e($val->mSchoolcoursetranslations[0]->id); ?>"><?php echo e($val->mSchoolcoursetranslations[0]->name); ?></a>
                                                </div>
                                                <div class="div-block-1194-copy">
                                                    <div class="icon time"></div>
                                                    <div class="text-block-product-opening"><?php echo e($val->mSchoolprograms[0]->time); ?>

                                                        <?php echo e(trans('front.school.detail.unit'.$val->mSchoolprograms[0]->unit_1)); ?>

                                                        / <?php echo e(trans('front.school.detail.unit'.$val->mSchoolprograms[0]->unit_2)); ?>

                                                    </div>
                                                </div>
                                                <div class="div-block-1194-copy">
                                                    <div class="icon money"></div>
                                                    <div class="text-block-product-opening"><?php echo e(number_format($val->mSchoolprograms[0]->fee)); ?> <?php echo e($config_language[0]->currency_code); ?>

                                                        / <?php echo e($val->mSchoolprograms[0]->unit_4); ?> <?php echo e(trans('front.school.detail.unit'.$val->mSchoolprograms[0]->unit_3)); ?></div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="div-block-1189">
                                            <div class="div-block-1261">
                                                <div class="icon date"></div>
                                                <div class="text-block-82"><?php echo e(\Carbon\Carbon::parse($val->start_date)->format($config_language[0]->date_format)); ?></div>
                                            </div>
                                            <div class="div-block-1194-copy">
                                                <div class="icon school"></div>
                                                <a href="#"
                                                   class="link-23-copy-2"><?php echo e($val->mSchoolcoursetranslations[0]->name); ?></a>
                                            </div>
                                            <div class="div-block-1194-copy">
                                                <div class="icon time"></div>
                                                <div class="text-block-product-opening"><?php echo e($val->mSchoolprograms[0]->time); ?>

                                                    <?php echo e(trans('front.school.detail.unit'.$val->mSchoolprograms[0]->unit_1)); ?>

                                                    / <?php echo e(trans('front.school.detail.unit'.$val->mSchoolprograms[0]->unit_2)); ?>

                                                </div>
                                            </div>
                                            <div class="div-block-1194-copy">
                                                <div class="icon money"></div>
                                                <div class="text-block-product-opening"><?php echo e(number_format($val->mSchoolprograms[0]->fee)); ?> <?php echo e($config_language[0]->currency_code); ?>

                                                    / <?php echo e($val->mSchoolprograms[0]->unit_4); ?> <?php echo e(trans('front.school.detail.unit'.$val->mSchoolprograms[0]->unit_3)); ?></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                        <div class="w-embed">
                            <style>
                                .sidebar-wrapper {
                                    position: -webkit-sticky;
                                    position: -moz-sticky;
                                    position: -ms-sticky;
                                    position: -o-sticky;
                                    position: sticky;
                                    top: 50px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Price" class="container-16 w-container"></div>
</div>