<?php $__env->startSection('content'); ?>
    <div class="main-section-copy">
        <div class="main-container-copy w-container">
            <div class="div-block-2-column-neewew-2">
                <div class="div-block-97-copy">
                    <h2><?php echo e(trans('front.homepage.login.loginh2')); ?></h2>
                    <p><?php echo e(trans('front.homepage.login.loginp')); ?></p>
                    <div>
                        <a href="<?php echo e(asset('/login/facebook')); ?>" class="link-block-7 w-inline-block">
                            <div class="div-block-94"></div>
                            <div class="text-block-41">Login with facebook</div>
                        </a>
                        <a href="<?php echo e(asset('/login/google')); ?>" class="link-block-7-copy w-inline-block">
                            <div class="div-block-94-copy"></div>
                            <div class="text-block-41">Login with google</div>
                        </a>
                    </div>
                    <div>
                        <div class="text-block-21-copy">- Login with email -</div>

                        <?php if( $errors->count() > 0 ): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo e($message); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="div-block-80-copy">
                            <div class="w-form">
                            <form id="login-form" method="POST" action="<?php echo e(asset('login')); ?>" name="login-form" data-name="Login Form" role="form" data-toggle="validator">
                                            <?php if(!empty(request()->ref)): ?>
                                            <input type="hidden" value="<?php echo e(request()->ref); ?>" name="ref">
                                            <?php endif; ?>
                                            <label class="field-label">Email <strong class="bold-text-12">*</strong></label>
                                            <div class="form-group">
                                              <input type="email" id="email" name="email" maxlength="64" class="text-field w-input"
                                                     required data-required-error="<?php echo e(trans('front.homepage.login.erremail')); ?> "
                                                     data-type-error="<?php echo e(trans('front.homepage.login.erremail2')); ?>." >
                                              <div class="help-block with-errors"></div>
                                            </div>
                                            <label class="field-label"><?php echo e(trans('front.homepage.login.pass')); ?>  <strong class="bold-text-12">*</strong></label>
                                            <div class="form-group">
                                                <input type="password" id="password" name="password" minlength="6" maxlength="20" class="text-field w-input"
                                                      required data-required-error="<?php echo e(trans('front.homepage.login.errpass')); ?> " >
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <?php echo csrf_field(); ?>

                                            <button type="submit" class="link-block-7 w-inline-block" style="width:100%">
                                                <div class="text-block-41"><?php echo e(trans('front.homepage.login.login')); ?></div>
                                            </button>
                                            <div class="div-block-98">
                                                <a href="<?php echo e(asset('reset-password')); ?>" class="link-16">Forgot password?</a>
                                              </div>
                                          </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="login-photo"></div>
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
    <script src="<?php echo e(asset('assets/frontend/js/login.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>