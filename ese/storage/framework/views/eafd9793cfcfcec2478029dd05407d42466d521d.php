<?php $__env->startSection('news'); ?>
    <?php if(isset($details)): ?>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-12">
                <div class="div-block-2-column-2-copy-copy w-100 h-100"
                    style="unset:margin;background-color:#fff; padding:10px;margin-top:-1px;margin: 0px;">
                    <div class="div-block-1205">
                        <div class="div-block-1283">
                            <div class="div-block-1282">
                                <h1 class="heading-title-2">
                                    <strong class="bold-text-28">
                                    <a href='<?php echo e(asset("$list_news[0]->slug")); ?>'> <?php echo e($list_news[0]->title); ?> </a>
                                    </strong>
                                </h1>
                            </div>
                        </div>
                    </div>                      
                        <?php echo $list_news[0]->content; ?>                
                    </div>
                </div>
            </div>
    <?php else: ?>
        <?php $__currentLoopData = $list_news[0]->mNewstranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row" style="margin-bottom:10px;">
                <div class="col-12">
                    <div class="div-block-2-column-2-copy-copy w-100 h-100"
                        style="unset:margin;background-color:#fff; padding:10px;margin-top:-1px;margin: 0px;">
                        <div class="div-block-1205">
                            <div class="div-block-1283">
                                <div class="div-block-1282">
                                    <h1 class="heading-title-2">
                                        <strong class="bold-text-28">
                                        <a href="<?php echo e(asset($items->slug)); ?>"> <?php echo e($items->title); ?> </a>
                                        </strong>
                                    </h1>
                                </div>
                            </div>
                        </div>
                            <?php if(count($list_news[0]->mNewstranslations) == 1): ?>
                                <div class="w-richtext">
                            <?php else: ?>
                                <div class="w-richtext b-description_readmore text-justify">
                            <?php endif; ?>
                                <?php echo $items->content; ?>

                            </div>
                        </div>

                    </div>
                </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
