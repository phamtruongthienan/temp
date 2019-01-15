<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('theme.frontend.section.school_detail.slider', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('theme.frontend.section.school_detail.intro', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('theme.frontend.section.school_detail.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('theme.frontend.section.school_detail.facilities', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(!empty(Auth::user())): ?>
        <?php echo $__env->make('theme.frontend.section.school_detail.compare', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('theme.frontend.section.school_detail.review', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <div class="section-email-enter">
        <div class="container w-container">
            <?php echo $__env->make('theme.frontend.section.homepage.subscribe', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <div data-w-id="bb662fc0-80e3-7dc4-7a71-0f3ee4513483" class="section-12 sub-menu-detail-fix" style="">
        <div class="container-7 w-container">
            <div class="div-block-72-copy">
                <div class="div-block-95-copy">
                    <a href="#Introdution" class="link-35 w-button anchor-animation"><?php echo e(trans('front.homepage.intro.intodution')); ?></a>
                    <a href="#Facilities" class="link-35 w-button anchor-animation"><?php echo e(trans('front.homepage.intro.facilities')); ?></a>
                    <a href="#Price" class="link-35 w-button anchor-animation"><?php echo e(trans('front.homepage.intro.price')); ?></a>
                    <?php if(!empty(Auth::user())): ?>
                    <a href="#Review" class="link-35 w-button anchor-animation"><?php echo e(trans('front.homepage.intro.review')); ?></a>
                    <?php endif; ?>
                    <a style="color: #f04e23;" data-id="<?php echo e($school_detail[0]->id); ?>" class="link-35 w-button open-map-location"><?php echo e(trans('front.homepage.intro.map')); ?></a>
                </div>
                <a href="#" class="link-5 w-button" data-toggle="modal" data-target="#booking"><?php echo e(trans('front.homepage.intro.booking')); ?></a></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
        var school_id = '<?php echo e($school_detail[0]->id); ?>';
        var count_all = '<?php echo e(count($school_detail[0]->mSchoolcomments)); ?>';
        var count_page = Math.ceil(count_all/5);
        $('#review_pagination').twbsPagination({
            totalPages: count_page,
            next: '›',
            prev: '‹',
            visiblePages: 5,
            hideOnlyOnePage: true,
            onPageClick: function (event, page) {
                skeleton('#review_pagination');
                $('.page-review').hide();
                $('#page-review-'+page).show();
                $('.review-click').trigger('click');
                $('.b-description_readmore').moreLines({
                        linecount: 5,
                        baseclass: 'b-description', 
                        basejsclass: 'js-description',
                        classspecific: '_readmore',
                        buttontxtmore: "<div class='b-description_readmore_button2'><i class='fas fa-chevron-circle-down'></i> Xem thêm</div>", 
                        buttontxtless: "<div class='b-description_readmore_button2'><i class='fas fa-chevron-circle-up'></i> Thu gọn</div>",
                        animationspeed: 250
                        
                    });
            }
        });
    </script>
    <script src="<?php echo e(asset('assets/frontend/js/detail.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>