<div class="row">
    <div class="col-sm-8 col-md-9 col-lg-10"></div>
    <div class="col-sm-4 col-md-3 col-lg-2">
            <select class="form-control select2" id="changeLanguage">
                <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(LaravelLocalization::getCurrentLocale() == $properties['regional']): ?>
                        <option data-href="<?php echo e(LaravelLocalization::getLocalizedURL($properties['regional'], null, [], true)); ?>" value="<?php echo e($properties['regional']); ?>" selected><?php echo e($properties['native']); ?></option>
                    <?php else: ?>
                        <option data-href="<?php echo e(LaravelLocalization::getLocalizedURL($properties['regional'], null, [], true)); ?>"  value="<?php echo e($properties['regional']); ?>"><?php echo e($properties['native']); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
    </div>
</div>