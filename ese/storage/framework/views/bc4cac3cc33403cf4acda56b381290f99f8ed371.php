<?php $__env->startSection('content'); ?>
    <div class="main-section-copy">
        <div class="main-container-copy w-container">
            <div class="div-block-2-column-neewew-2" id="signup_main">
                <div class="div-block-97-copy">
                    <h2>Finding school to suit your child</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros
                        elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor.</p>
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
                        <div class="text-block-21-copy">- Create account with email -</div>


                       <div class="alert alert-danger" role="alert" style="display:none"></div>

                        <div class="div-block-80-copy">
                            <div class="w-form">
                                <form id="form-create-account" name="email-form" data-name="Email Form" role="form" data-toggle="validator">
                                  <label class="field-label">Email <strong class="bold-text-12">*</strong></label>
                                  <div class="form-group">
                                    <input type="email" id="email" name="email" maxlength="64" class="text-field w-input"
                                           required data-required-error="Email không được trống."
                                           data-type-error="Email không đúng định dạng." >
                                    <div class="help-block with-errors"></div>
                                  </div>
                                  <label class="field-label">Số điện thoại <strong class="bold-text-12">*</strong></label>
                                  <div class="form-group">
                                    <input type="text" id="phone" name="phone" maxlength="20" class="text-field w-input"
                                           required data-required-error="Số điện thoại không được trống." >
                                    <div class="help-block with-errors"></div>
                                  </div>
                                  <label class="field-label">Mật khẩu <strong class="bold-text-12">*</strong></label>
                                  <div class="form-group">
                                      <input type="password" id="password" name="password" minlength="6" maxlength="20" class="text-field w-input"
                                            required data-required-error="Mật khẩu không được trống." >
                                      <div class="help-block with-errors"></div>
                                  </div>
                                  <label class="field-label">Nhập lại mật khẩu <strong class="bold-text-12">*</strong></label>
                                  <div class="form-group">
                                    <input type="password" id="repassword" name="repassword" minlength="6" maxlength="20" class="text-field w-input"
                                        data-match="#password" data-match-error="Xác nhận mật khẩu không đúng." required data-required-error="Nhập lại mật khẩu không được trống.">
                                    <div class="help-block with-errors"></div>
                                  </div>
                                  <label class="field-label">Họ & tên <strong class="bold-text-12">*</strong></label>
                                  <div class="form-group">
                                    <input type="text" id="name" name="name" minlength="3" maxlength="100" class="text-field w-input"
                                           required data-required-error="Họ và tên không được trống." >
                                    <div class="help-block with-errors"></div>
                                  </div>
                                  <div class="form-group">
                                        <div class="pretty p-default p-curve p-thick checkbox-field-3 w-checkbox">
                                            <input type="checkbox" name="checkagree"/>
                                            <div class="state p-danger-o">
                                                <label>I agree to Esearch&#x27;s <a href="#" target="_blank" class="link-15">Terms of Use</a> and <a href="#" target="_blank" class="link-15">Privacy Policy</a>.</label>
                                            </div>
                                        </div>
                                    <div class="help-block with-errors"></div>
                                  </div>
                                  <a href="#" class="link-block-7 w-inline-block btn-create" style="width:100%">
                                    <div class="text-block-41">CREATE ACCOUNT</div>
                                  </a>
                                  <div class="div-block-98">
                                    <span class="link-16">Already have an account?</span>
                                  <a href="<?php echo e(asset('login')); ?>" class="link-block-16 w-inline-block">
                                      <div class="button-2new">Sign in</div>
                                    </a>
                                  </div>
                                </form>
                              </div>
                        </div>
                        
                    </div>
                </div>
                <div class="login-photo"></div>
            </div>

            <div class="div-block-2-column-neewew-2" id="signup_ty" style="display:none">
                    <div class="div-block-97-copy">
                        <h2>Đăng ký thành công</h2>
                        <p>Bạn có thể cập nhật thêm thông tin tài khoản hoặc để sau.</p>
                        <div>
                            <a href="<?php echo e(asset('/account')); ?>" class="link-block-7 w-inline-block">
                                <div class="text-block-41">Cập nhật thông tin tài khoản</div>
                            </a>
                            <a href="<?php echo e(asset('/')); ?>" class="link-block-7-copy w-inline-block">
                                <div class="text-block-41">Trở về trang chủ</div>
                            </a>
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
    <script src="<?php echo e(asset('assets/frontend/js/sign-up.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>