<?php $__env->startSection('style'); ?>
<style>
    .dd-selected-text { 
        font-size:15px !important;
    }
    .dd-select {
        height: 60px !important;
    }
    .select-holder {
        font-size: 15px !important;
    }
    .search-sticky {
        height:60px !important
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="main-section">
    <div class="main-container _1 w-container">
        <div class="div-block-2-column">
            <?php echo $__env->make('theme.frontend.section.schools.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('theme.frontend.section.schools.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
        var searchLanguage = [
            <?php $__currentLoopData = $school_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                text: "<?php echo e(trans('front.homepage.school.language')); ?> <?php echo e($v->mSchoollanguagetranslations[0]->name); ?>",
                value: '<?php echo e($v->id); ?>',
                selected: false,
                description: " <?php echo e(trans('front.homepage.school.languagedes')); ?> <?php echo e($v->mSchoollanguagetranslations[0]->name); ?>",
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
    <script src="<?php echo e(asset('assets/frontend/js/school-course.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>