<div class="section-21">
    <div class="container-16 w-container">
        <div class="div-block-1140">
            <h2 class="heading-product-menu"> <?php echo e(trans('front.homepage.intro.rating')); ?> <em class="italic-text-7"></em></h2>
            <div class="rating-panel">
                    <div class="row div-block-1273">
                        <div class="col-12">
                            <?php if(count($category) > 0): ?>
                            <div class="div-block-1179">
                                <div class="text-block-64"  style="font-size:20px"><?php echo e(trans('front.homepage.intro.facilities')); ?></div>
                                    <div class="div-block-1178-copy-2 row"  style="display:block;width:100%">
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div id="rating-panel-<?php echo e($v->id); ?>">
                                            <div class="text-block-facility-2" id="rating-name-<?php echo e($v->id); ?>"><?php echo e($v->mSchoolCategoryTranslations[0]->name); ?></div>
                                            <div class="div-block-1287">
                                                <select class="ratingBar" id="ratingBar_<?php echo e($v->id); ?>" name="fac[]" required>
                                                    <option value=""></option>
                                                    <?php for($i=1; $i <=10; $i++): ?>
                                                <option value="<?php echo e($i); ?>" data-category-id="<?php echo e($v->id); ?>" data-school-id="<?php echo e($school_detail[0]->id); ?>" data-data-tt="<?php echo e($i); ?> điểm"><?php echo e($i); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>        
            </div>

            <div class="rating-panel">
                    <form id="form-review" role="form" data-toggle="validator" novalidate="true">
                        <div class="row div-block-1273">
                            <div class="col-lg-5 col-xl-5 col-md-5 col-sm-12 col-12 form-group">
                                <div class="text-block-64 rating-star" style="font-size:20px;text-align: center;">How do you feel a bout this school?</div>
                                <div class="div-block-50 rating-star">
                                    <div class="div-block-12-copy">
                                        <?php if($reviewed !== false): ?>
                                            <?php $current_rating = $reviewed->rating; ?>
                                        <?php else: ?> 
                                            <?php $current_rating = ''; ?>
                                        <?php endif; ?>
                                    <select class="ratingStar" name="rating" data-current-rating="<?php echo e($current_rating); ?>">
                                            <option value=""></option>
                                            <?php $__currentLoopData = $config_rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($v->rating); ?>" data-tt="<?php echo e($v->mRatingTranslations[0]->name); ?>" data-html="<?php echo e($v->mRatingTranslations[0]->name); ?>"><?php echo e($v->rating); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="div-block-50 rating-score">
                                    <div class="div-block-12-copy">
                                            <div class="current-rating">
                                                <div class="value badge badge-primary"></div>
                                            </div>
                                            <div class="your-rating hidden">
                                                <div class="value badge badge-primary"></div>
                                            </div>
                                    </div>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-lg-7 col-xl-7 col-md-7 col-sm-12 col-12">
                                    <div class="widget-area no-padding blank">
                                        <div class="text-block-64 rating-star" style="font-size:20px;text-align: center;">Please enter your review</div>
                                        <div class="status-upload form-group">
                                                <textarea name="comment" placeholder="Leave your review..." style=" resize: none;" required></textarea>
                                               
                                                <div>
                                                <div style="margin-top: 10px;float: left;"><?php echo Recaptcha::render(); ?></div>

                                                <a class="w-inline-block btn-review" style="margin-top:2px;float:right">
                                                    <div class="button-review-1">Review</div> 
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>        
                    </form>
                </div>

            <div class="rating-panel row div-block-1273" id="Review">
                    <div class="div-block-1291" id="review_pagination" style="width: 100%;">
                            <div class="text-block-64 rating-star" style="font-size:20px;text-align: center;"><?php echo e($school_detail[0]->review); ?> reviews from other customer</div>
                        <ul id="comments-list" class="comments-list">
                            <?php $page = 1; ?>
                            <?php $__currentLoopData = $school_detail[0]->mSchoolcomments->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key%5 == 0): ?>
                                    <?php if($page > 1): ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($page > 1): ?>
                                        <div class="page-review" id="page-review-<?php echo e($page); ?>" style="display:none">
                                    <?php else: ?>
                                    <div class="page-review" id="page-review-<?php echo e($page); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if($val->mCustomer->logo !== null): ?>
                                    <?php if(filter_var($val->mCustomer->logo, FILTER_VALIDATE_URL) === FALSE): ?>
                                        <?php $logo_avatar = asset('img/'.$val->mCustomer->logo); ?>
                                    <?php else: ?>
                                        <?php $logo_avatar = $val->mCustomer->logo; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php $logo_avatar = $noimage; ?>
                                <?php endif; ?>
                                
                               
                                        <li>
                                            <div class="comment-main-level">
                                                <div class="comment-avatar"><img src="<?php echo e($logo_avatar); ?>" alt=""></div>
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <div  style="float:left;">
                                                            <h6><?php echo e($val->mCustomer->name); ?></h6>
                                                            <small>Thành viên từ năm <?php echo e(\Carbon\Carbon::parse($val->mCustomer->created_at)->format('Y')); ?></small>
                                                        </div>
                                                        <div  style="float:right;">
                                                            <small>Đã nhận xét vào lúc <?php echo e(\Carbon\Carbon::parse($val->created_at)->format($config_language[0]->date_format)); ?></small>
                                                            <p style="text-align: right;">
                                                            <?php for( $i=1; $i <= $val->rating; $i++): ?>
                                                                <span  style="float: right;"><i class="fas fa-star text-warning"></i> </span>
                                                            <?php endfor; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment-content">
                                                       <p class="b-description_readmore"><?php echo e($val->content); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if(!empty($val->mSchoolCommentReplies[0])): ?>
                                            <ul class="comments-list reply-list">
                                                <li>
                                                  
                                                    <div class="comment-box-2">
                                                        <div class="comment-head">
                                                            <h6 class="comment-name"><?php echo e($school_detail[0]->mSchooltranslations[0]->name); ?></h6>
                                                            <div  style="float:right;margin-top: 10px;">
                                                                    <small>Đã phản hồi vào lúc <?php echo e(\Carbon\Carbon::parse($val->mSchoolCommentReplies[0]->created_at)->format($config_language[0]->date_format)); ?></small>
                                                                </div>
                                                        </div>
                                                        <div class="comment-content-2">
                                                                <p class="b-description_readmore"><?php echo e($val->mSchoolCommentReplies[0]->content); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <?php endif; ?>
                                        </li>
                                   
                                    <?php if($key%5 == 0): ?>
                                        <?php $page++; ?>
                                    <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        </div>
                    </div>
                    
            </div>

        </div>
    </div>
</div>