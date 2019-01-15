<?php $__currentLoopData = $promotion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-12">
            <div class="div-block-2-column-2-copy-copy w-100 h-100"
                 style="unset:margin;background-color:#fff; padding:10px;margin-top:-1px;margin: 0px;">
                <div class="div-block-1205">
                    <div class="div-block-1283">
                        <div class="div-block-1282">
                            <?php if($items->start_date > \Carbon\Carbon::now()): ?>
                                <div class="icon promotion-big"></div>
                            <?php endif; ?>
                            <h1 class="heading-title-2"><strong class="bold-text-28">
                               <a href="<?php echo e(asset($items->mSchooleventtranslations[0]->slug)); ?>"> <?php echo e($items->mSchooleventtranslations[0]->name); ?> </a>
                            </strong>
                        </h1>
                        </div>
                        <div class="text-block-87"><i
                                    class="fas fa-calendar-alt"></i> <?php echo e(\Carbon\Carbon::parse($items->start_date)->format($config_language[0]->date_format)); ?>

                            - <?php echo e(\Carbon\Carbon::parse($items->end_date)->format($config_language[0]->date_format)); ?>

                        </div>


                    </div>
                    
                </div>
                <div class="div-block-1203"></div>
                <div class="text-block-91">Promotion code:</div>
                <div class="div-block-1285">
                    <div id="codePromotion-<?php echo e($items->id); ?>" class="text-block-90"><?php echo e(mb_strtoupper($items->code)); ?></div>
                    <div id="btnCopy" class="text-block-100" style="font-size: 20px;"><i
                                class="fas fa-copy copy-clipboard"
                                data-clipboard-target="#codePromotion-<?php echo e($items->id); ?>"></i></div>
                </div>
                <?php if(count($promotion) == 1): ?>
                    <div class="w-richtext">
                <?php else: ?>
                    <div class="w-richtext b-description_readmore text-justify">
                <?php endif; ?>
                    <?php echo $items->mSchooleventtranslations[0]->content; ?>

                    <?php if($items->type == 2): ?>
                        <?php $array_school = []; ?>
                        <div class="list-unstyled">
                            <?php $__currentLoopData = $items->school; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $name = $items->mSchoolTranslations[0]->name;
                                    $slug = asset($items->mSchoolTranslations[0]->slug);
                                ?>
                                <a href="<?php echo e($slug); ?>"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><i class="fas fa-caret-right"></i> <?php echo e($name); ?></h5>
                                        <small class="text-muted"><i style="font-size:8px"
                                                                     class="fas fa-quote-left"></i> <?php echo e($items->mSchoolTranslations[0]->slogan); ?>

                                            <i style="font-size:8px" class="fas fa-quote-right"></i></small>
                                    </div>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <br>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

