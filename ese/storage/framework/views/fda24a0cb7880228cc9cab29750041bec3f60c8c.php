<div class="section">
    <div class="main-container-left w-container">
        <div class="title">
            <h1 class="hero-heading dark-bg">E-search</h1>
            <p class="hero-subtitle">Là nơi để tìm kiếm thông tin chi tiết chính xác và rõ ràng về mỗi cấp bậc giáo dục
                (Mầm Non, Tiểu Học cho tới Cao Học và các khoá học ngôn ngữ). Sự nhận xét đánh giá khách quan của người
                sử dụng  là một trong tiêu chí hàng đầu để quyết định tính xác thực cho Esearch.</p>
        </div>
    </div>
</div>
<div class="main-section white">
    <div class="main-container w-container">
        <div class="div-block-breadcumb"><a href="<?php echo e(asset('/')); ?>" class="link-breadcumb-2">Home</a>
            <div class="div-block-24"></div>
            <a href="<?php echo e(asset('/'.$view->slug)); ?>" class="link-breadcumb-now-2"><?php echo e($view->title); ?></a></div>
        <div class="div-block-2-column">
            <div class="div-block-2-column-3">
                <div class="w-richtext text-justify">
                        <?php echo e($view->content); ?>

                </div>
            </div>
            <div class="div-block-2-column-4">
                <div class="sidebar-wrapper">
                    <div class="div-block-1221">
                        <div class="sidebar-image"></div>
                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($val->position == 2): ?>
                            <a href="<?php echo e(asset('/'.$val->mMenutranslations[0]->slug)); ?>"
                               class="link-24"><?php echo e($val->mMenutranslations[0]->name); ?></a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="w-embed">
                            <style>
                                .sidebar-wrapper {
                                    position: -webkit-sticky;
                                    position: -moz-sticky;
                                    position: -ms-sticky;
                                    position: -o-sticky;
                                    position: sticky;
                                    top: 50px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>