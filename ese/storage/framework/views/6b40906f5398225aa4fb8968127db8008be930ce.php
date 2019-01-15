<nav role="navigation" class="nav-menu-2 w-nav-menu">
    <div class="div-block-2">
        <div class="div-block-5"></div>
        <a href="<?php echo e(asset('/schools')); ?>" class="nav-menu w-nav-link"><?php echo e(trans('front.homepage.schoolandcourse')); ?></a>
        <a href="<?php echo e(asset('/promotion')); ?>" class="nav-menu w-nav-link"><?php echo e(trans('front.homepage.promotions')); ?></a>
        <?php if(!empty($menu)): ?>
            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($v->position == 1): ?>
                    <a href="<?php if(empty($v->news_id)): ?><?php echo e(asset($v->mMenuTranslations[0]->slug)); ?><?php else: ?><?php echo e(asset($v->mNews->mNewsTranslations[0]->slug)); ?><?php endif; ?>"
                       class="nav-menu w-nav-link"><?php echo e($v->mMenuTranslations[0]->name); ?></a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>

    <div class="div-block">
        <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(LaravelLocalization::getCurrentLocale() != $properties['regional']): ?>
                <a class="lead margin-right-10" id="switch-language" rel="alternate" hreflang="<?php echo e($localeCode); ?>"
                   href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                    <span style="font-size:20px" class="flag-icon flag-icon-<?php echo e($properties['regional']); ?>"></span>
                </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="div-block-5-short"></div>
        <?php if(empty(Auth::user())): ?>
            <a href="<?php echo e(asset('/login')); ?>"
               class="nav-menu w-nav-link"><?php echo e(mb_strtoupper(trans('front.homepage.signin'))); ?></a>
            <a href="<?php echo e(asset('/sign-up')); ?>"
               class="nav-menu-login w-nav-link"><?php echo e(mb_strtoupper(trans('front.homepage.createaccount'))); ?></a>
        <?php else: ?>
            <div data-delay="0" class="w-dropdown">
                <div class="dropdown-toggle-3 w-dropdown-toggle">
                    <?php if(Auth::user()->logo !== null): ?>
                        <?php if(filter_var(Auth::user()->logo, FILTER_VALIDATE_URL) === FALSE): ?>
                            <?php $logo_avatar = asset('img/'.Auth::user()->logo); ?>
                        <?php else: ?>
                            <?php $logo_avatar = Auth::user()->logo; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php $logo_avatar = $noimage; ?>
                    <?php endif; ?>
                    <div class="div-block-102" style="background-image: url(<?php echo e($logo_avatar); ?>);"></div>
                    <div class="w-icon-dropdown-toggle"></div>
                    <div class="text-block-44"><?php echo e(Auth::user()->name); ?></div>
                </div>
                <nav class="dropdown-list-2 w-dropdown-list">
                    <a href="<?php echo e(asset('/account')); ?>" class="dropdown-link-2 w-dropdown-link">Account</a>
                    <a href="<?php echo e(asset('logout')); ?>" class="dropdown-link-2 w-dropdown-link">Log out</a>
                </nav>
            </div>
        <?php endif; ?>
    </div>
    <div class="div-block-72-23-copy-copy">
        <div class="div-block-1121">
            <a href="#" class="div-block-1281 w-inline-block">
                <div class="icon low"></div>
                <div>Price low to high</div>
            </a>
            <a href="#" class="div-block-1281 w-inline-block">
                <div class="icon high"></div>
                <div>Price high to low</div>
            </a>
            <a href="#" class="div-block-1281 w-inline-block">
                <div class="icon near"></div>
                <div>Near me</div>
            </a>
        </div>
        <div class="div-block-74"><a href="#" data-w-id="8d4f4dc9-53e4-97fc-4148-7cebf3adfe86"
                                     class="button-6-copy-copy w-button">Advanced search</a></div>
    </div>
</nav>