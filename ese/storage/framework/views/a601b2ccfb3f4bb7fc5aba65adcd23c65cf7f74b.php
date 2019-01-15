<div class="product_photo">
    <div class="w-container">
        <h2 class="heading-product-menu"><?php echo e(trans('front.homepage.intro.gallery')); ?></h2>
        <div class="gallery-content">
            <div class="gallery-slider">
                    <?php if(!empty($school_detail[0]->file_360)): ?>
                    <div class="gallery-item">
                        <a rel="gallery" class="view-normal image-360"  href="<?php echo e(asset('img/'.$school_detail[0]->file_360)); ?>" data-fancybox="images">
                            <div class="div-block-1276"  draggable="false" style="background-image:url(<?php echo e(asset('img/'.$school_detail[0]->file_360)); ?>);"></div>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($school_detail[0]->file_video)): ?>
                    <?php if(preg_match('![?&]{1}v=([^&]+)!', $school_detail[0]->file_video . '&', $video)): ?>
                        <div class="gallery-item">
                            <a rel="gallery" class="view-normal image-360"  href="<?php echo e($school_detail[0]->file_video); ?>" data-fancybox="images">
                                <div class="div-block-1276"  draggable="false" style="background-image:url(https://img.youtube.com/vi/<?php echo e($video[1]); ?>/maxresdefault.jpg);"></div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php endif; ?>
                <?php if(count($school_detail[0]->mSchoolimages) > 0): ?>
                <?php $__currentLoopData = $school_detail[0]->mSchoolimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($val->is_gallery == 1): ?>
                        <div class="gallery-item">
                            <a rel="gallery" class="view-normal" href="<?php echo e(asset('img/'.$val->image)); ?>" data-fancybox="images">
                                <div class="div-block-1276"  draggable="false" style="background-image:url(<?php echo e(asset('img/'.$val->image)); ?>);"></div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
            <div class="icon-long gallery-next"></div>
            <div class="icon-long _1 gallery-prev"></div>
        </div>
    </div>
</div>