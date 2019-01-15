<?php $__env->startSection('content'); ?>

    <div class="main-section">
        <div class="main-container _1 w-container">
            <?php if(count($promotion) == 1): ?>
            <?php echo e(Breadcrumbs::render('promotiondetail', $promotion[0], 'home.promotion.detail')); ?>

            <?php else: ?>
            <?php echo e(Breadcrumbs::render('promotions')); ?>

            <?php endif; ?>
            <div class="div-block-2-column unset-background">
                <div class="row w-100">
                    <div class="col-9">
                        <?php echo $__env->make('theme.frontend.section.promotion.content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="div-block-1207  w-100">
                                        <?php echo e($promotion->links()); ?>

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
    <div class="section-email-enter">
        <div class="container w-container">
            <?php echo $__env->make('theme.frontend.section.homepage.subscribe', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        var num_promo = <?php echo e($config_main[0]->configMaintranslations[0]->num_promo); ?>;

        <?php if(count($promotion) == 1): ?>
            var exclude_promo = <?php echo e($promotion[0]->id); ?>;
            var current_page_promotion = 0;
        <?php else: ?>
            var exclude_promo = 0;
            var current_page_promotion = 1;
        <?php endif; ?>
    </script>
    <script src="<?php echo e(asset('assets/frontend/js/promotion.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>