<?php $__env->startSection('content'); ?>
    <div class="main-section">
        <div class="main-container _1 w-container">
            <div class="div-block-2-column unset-background">
                <div class="row w-100">
                    <div class="col-9">
                        <!-- <?php echo $__env->make('theme.frontend.section.news.content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
                        <?php echo $__env->yieldContent('news'); ?>
                        <div class="load-more-result"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="div-block-1207  w-100">
                                    <a href="#" class="link-5-copy w-button ladda-button" id="view-more-promotion"
                                        data-style="expand-right" data-size="l"><span
                                                class="ladda-label">+ View more</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <?php echo $__env->make('theme.frontend.section.promotion.ads', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>