<?php $__env->startSection('content'); ?>
    <div class="main-section">
        <div class="main-container _1 w-container">
            <?php echo e(Breadcrumbs::render('course_detail', $detail[0]->mSchool->mSchooltranslations[0]->name , $detail[0]->mSchool->mSchooltranslations[0]->slug , $detail[0]->mSchoolcoursetranslations[0]->name_class,$detail[0]->slug)); ?>

            <div class="div-block-2-column unset-background">
                <div class="row w-100">
                    <div class="col-9">
                    <div class="row" style="margin-bottom:10px;">
                        <div class="col-12">
                            <div class="div-block-2-column-2-copy-copy w-100 h-100 text-justify"
                                style="unset:margin;background-color:#fff; padding:10px;margin-top:-1px;margin: 0px;">
                                <div class="div-block-1205">
                                    <div class="div-block-1283">
                                        <div class="div-block-1282">
                                            <h1 class="heading-title-2">
                                                <strong class="bold-text-28">
                                                <a href="<?php echo e(asset($detail[0]->slug)); ?>"> <?php echo e($detail[0]->mSchoolcoursetranslations[0]->name_class); ?> </a>
                                                </strong>
                                            </h1>
                                        </div>
                                    </div>
                                </div>                      
                                    <?php echo $detail[0]->mSchoolcoursetranslations[0]->content; ?>                
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
<?php echo $__env->make('theme.layout.frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>