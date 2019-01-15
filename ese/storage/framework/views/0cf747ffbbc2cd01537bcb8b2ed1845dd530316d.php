<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('theme.frontend.section.homepage.search', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('theme.frontend.section.homepage.school', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('theme.frontend.section.homepage.promotion', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="section-email-enter">
        <div class="container w-container">
            <?php echo $__env->make('theme.frontend.section.homepage.client', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('theme.frontend.section.homepage.subscribe', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <div data-w-id="bc089f57-87f3-ceec-1e56-1ac4a399c880" class="section-8 block-search-basic-fix">
        <div class="container-4 w-container block-search">
            <div class="div-block-1095 block-search-basic row">
                <div class="block-search-txt col-md-9 col-sm-12 row">
                    <div class="col-md-6 col-sm-6">
                        <input placeholder="<?php echo e(trans('front.homepage.search.keyword')); ?>"
                                id="txt-search-keyword"
                               class="div-block-109 txt-search txt-search-keyword"/>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <input placeholder="<?php echo e(trans('front.homepage.search.location')); ?>"
                                id="txt-search-area"
                               class="div-block-109 txt-search txt-search-area"/>
                    </div>
                </div>
                <div class="div-block-1108-copy col-md-3 col-sm-12">
                    <div class="div-block-109 search">
                            <button id="searchBtn" class="w-inline-block" style="width: 100%;background-color: unset;">
                                    <div class="text-block-48-copy"><?php echo e(mb_strtoupper(trans('front.homepage.search.button'))); ?></div>
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('theme.frontend.section.homepage.search_location', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        var searchLanguage = [
            <?php $__currentLoopData = $school_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                text: "<?php echo e(trans('front.homepage.school.language')); ?> <?php echo e($v->mSchoollanguagetranslations[0]->name); ?>",
                value: '<?php echo e($v->id); ?>',
                selected: false,
                description: "<?php echo e(trans('front.homepage.school.languagedes')); ?> <?php echo e($v->mSchoollanguagetranslations[0]->name); ?>",
            },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];

        var searchSchoolType = [
            <?php $__currentLoopData = $school_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                text: "<?php echo e($v->mSchooltypetranslations[0]->name); ?>",
                value: '<?php echo e($v->id); ?>',
                selected: false,
                description: "<?php echo e(trans('front.homepage.school.typedes')); ?> <?php echo e($v->mSchooltypetranslations[0]->name); ?>",
            },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];

        var searchSchoolLevel = [
            <?php $__currentLoopData = $school_level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                text: "<?php echo e($v->mSchoolleveltranslations[0]->name); ?>",
                value: '<?php echo e($v->id); ?>',
                selected: false,
                description: "<?php echo e(trans('front.homepage.school.leveldes')); ?> <?php echo e($v->mSchoolleveltranslations[0]->name); ?>",
            },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];
    </script>
    <script src="<?php echo e(asset('assets/frontend/js/home.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>