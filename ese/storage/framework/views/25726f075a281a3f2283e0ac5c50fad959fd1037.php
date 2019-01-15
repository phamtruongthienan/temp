<div class="div-block-2-column-2-copy">
    <div class="div-block-72-23-copy block-search-advanced-top">
      <div class="div-block-1121">
      <a href="<?php echo e($sorts_query_high); ?>" class="div-block-1281 w-inline-block">
          <div class="icon low"></div>
          <div><?php echo e(trans('front.homepage.search.pricelowtohigh')); ?></div>
        </a>
        <a href="<?php echo e($sorts_query_low); ?>" class="div-block-1281 w-inline-block">
          <div class="icon high"></div>
          <div><?php echo e(trans('front.homepage.search.pricehightolow')); ?></div>
        </a>
        <a class="div-block-1281 w-inline-block open-map">
          <div class="icon near"></div>
          <div><?php echo e(trans('front.homepage.search.near')); ?></div>
        </a>
      </div>
    </div>

    <?php if(count($schools) == 0): ?>
        <blockquote class="block-quote-2" style="color:#ccc">Không tìm thấy kết quả nào phù hợp.</blockquote>
    <?php endif; ?>

    <?php if(count($ads) > 0): ?> 
    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ka => $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($va->link == null): ?>
        <?php break; ?>;
        <?php endif; ?>
        <?php if($va->position == 1 && $va->type==3): ?>
            <?php if(filter_var($va->link, FILTER_VALIDATE_URL) === FALSE): ?>
                <?php $ads_link = asset($va->link); ?>
            <?php else: ?>
                <?php $ads_link = $va->link; ?>
            <?php endif; ?>

            <?php if(!empty($va->mAdvertstranslations[0]->image)): ?>
                <?php $ads_image = Imgfly::imgPublic($va->mAdvertstranslations[0]->image.'?w=850'); ?>
            <?php else: ?>
                <?php $ads_image = $noimage; ?>
            <?php endif; ?>
            <div class="advertising" style=" background-image: url(<?php echo e($ads_image); ?>);">
                <a href="<?php echo e($ads_link); ?>" target="_blank" class="link-block-promotion w-inline-block w--current"></a>
            </div>
            <?php break; ?>;
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>

    <?php 
      $inads = true;
    ?>
    <?php if(count($schools) > 0): ?>
      <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($k > 0): ?>
        <?php if(((count($schools)%$k))): ?>
          <?php if($inads): ?>

            <?php if(count($ads) > 0): ?> 
              <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ka => $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($va->link == null): ?>
              <?php break; ?>;
              <?php endif; ?>
                  <?php if($va->position == 4 && $va->type==3): ?>
                      <?php if(filter_var($va->link, FILTER_VALIDATE_URL) === FALSE): ?>
                          <?php $ads_link = asset($va->link); ?>
                      <?php else: ?>
                          <?php $ads_link = $va->link; ?>
                      <?php endif; ?>
          
                      <?php if(!empty($va->mAdvertstranslations[0]->image)): ?>
                          <?php $ads_image = Imgfly::imgPublic($va->mAdvertstranslations[0]->image.'?w=850'); ?>
                      <?php else: ?>
                          <?php $ads_image = $noimage; ?>
                      <?php endif; ?>
                      <div class="advertising" style=" background-image: url(<?php echo e($ads_image); ?>);">
                          <a href="<?php echo e($ads_link); ?>" target="_blank" class="link-block-promotion w-inline-block w--current"></a>
                      </div>
                      <?php break; ?>;
                  <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php 
              $inads = false;
            ?>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>

        <div class="product">
            <?php
                $image_avatar = $noimage;
            ?>
            <?php $__currentLoopData = $v->mSchoolimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($image->is_avatar == 1): ?>
                    <?php
                        $image_avatar =  Imgfly::imgPublic($image->image.'?w=300');
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          <div class="product-photo _1" style="background-image: url(<?php echo e($image_avatar); ?>);height:250px"></div>
          <div class="div-block-1176">
            <div class="div-block-71">
              <div class="div-block-1119">
                <h3 class="h2-school-name"><a href="<?php echo e(asset($v->mSchooltranslations[0]->slug)); ?>"><?php echo e($v->mSchooltranslations[0]->name); ?></a></h3>
                <div class="div-block-diamond">
                    <?php for($rating = 1; $rating <= $v->rating; $rating++): ?>
                    <i class="fas fa-star text-warning"></i>
                    <?php endfor; ?>
                </div>
              </div>
              <div class="div-block-1105-copy">
                <div class="div-icon-text">
                  <div class="div-block-ico"></div>
                  <div class="text-language-copy"><?php echo e($v->configCity->name); ?></div>
                </div>
                <div class="div-icon-text">
                  <div class="div-block-ico _1"></div>
                  <div class="text-language-copy"><?php echo e($v->mSchoollevel->mSchoolleveltranslations[0]->name); ?></div>
                </div>
                <div class="div-icon-text">
                  <div class="div-block-ico _2"></div>
                  <div class="text-language-copy">
                      <?php $array_language = []; ?>
                      <?php $__currentLoopData = $v->mSchoollanguagecourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                              if(!empty($items->mSchoollanguage->mSchoollanguagetranslations[0]->name)) {
                                  array_push($array_language, $items->mSchoollanguage->mSchoollanguagetranslations[0]->name);
                              }
                          ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php echo e(implode(', ', $array_language)); ?>


                  </div>
                </div>
              </div>
            </div>
            <div class="div-block-69 w-clearfix"><a href="#" class="link-block-4 w-inline-block"></a>
              <a target="_blank" href="https://www.google.com/maps/search/<?php echo e(urlencode($v->mSchooltranslations[0]->name.' '.$v->mSchooltranslations[0]->address)); ?>" class="link-7" style="font-size:13px"><?php echo e($v->mSchooltranslations[0]->address); ?></a></div>
            <p class="paragraph-6">
              <?php if(mb_strlen($v->mSchooltranslations[0]->description) > 150): ?>
                <?php echo e(mb_substr($v->mSchooltranslations[0]->description, 0, 150)); ?>...
              <?php else: ?>
                <?php echo e($v->mSchooltranslations[0]->description); ?>

              <?php endif; ?>
            </p>
            <div class="div-block-70">
                <?php $__currentLoopData = $v->mSchoolattributeratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($key < 8): ?>
                    <div data-toggle="tooltip" data-placement="top" title="<?php echo e($val->mSchoolattribute->mSchoolattributetranslations[0]->name); ?>" style="width:25px;height:25px;margin-left:10px" class="<?php echo e($val->mSchoolattribute->icon); ?>"></div>
                  <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          <div class="div-block-1177">
            <div class="list-div">
                <div class="div-block-1228">
                
                <div class="div-bloock-1178-copy-2 hover-school" id="show-rating-<?php echo e($v->id); ?>">
                    <div id="w-node-59f22195f889-6e55e55e">
                        <?php
                            $count = 0;
                            $index = 1;
                        ?>
                        <?php $__currentLoopData = $v->mSchoolcategoryratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="text-block-facility-2"><?php echo e($val->mSchoolcategory->mSchoolcategorytranslations[0]->name); ?>: <strong class="bold"><?php echo e($val->rating); ?>/10</strong></div>
                        <div class="div-block-1267">
                            <?php $count += $val->rating; $index++;?>
                            <?php if($val->rating < 10): ?>
                                <?php for($i = 1;$i <= $val->rating; $i++): ?>
                                    <div class="div-block-1245"></div>
                                <?php endfor; ?>
                                <?php
                                    $grey = 10 - $val->rating;
                                ?>
                                <?php for($i = 1;$i <= $grey; $i++): ?>
                                    <div class="div-block-1245 grey"></div>
                                <?php endfor; ?>
                            <?php else: ?>
                                <?php for($i = 1;$i <= 10; $i++): ?>
                                    <div class="div-block-1245"></div>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                  <div data-w-id="f4314a5f-d739-f26c-7632-67ea6fe28e91" class="text-block-94 hover-rating" data-id="<?php echo e($v->id); ?>"><?php echo e(round($count/$index)); ?>/10</div>
                </div>
                
                <div class="text-block-32"><b class="text-danger"><?php echo e($v->review); ?> </b><span class="margin-left-5">reviews</span><br></div>
              </div>
              
            <a href="<?php echo e(asset($v->mSchooltranslations[0]->slug)); ?>" class="button-8 w-button">View more</a></div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
 

    <?php if(count($ads) > 0): ?> 
    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ka => $va): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($va->link == null): ?>
        <?php break; ?>;
        <?php endif; ?>
        <?php if($va->position == 2 && $va->type==3): ?>
            <?php if(filter_var($va->link, FILTER_VALIDATE_URL) === FALSE): ?>
                <?php $ads_link = asset($va->link); ?>
            <?php else: ?>
                <?php $ads_link = $va->link; ?>
            <?php endif; ?>

            <?php if(!empty($va->mAdvertstranslations[0]->image)): ?>
                <?php $ads_image = Imgfly::imgPublic($va->mAdvertstranslations[0]->image.'?w=850'); ?>
            <?php else: ?>
                <?php $ads_image = $noimage; ?>
            <?php endif; ?>
            <div class="advertising" style=" background-image: url(<?php echo e($ads_image); ?>);">
                <a href="<?php echo e($ads_link); ?>" target="_blank" class="link-block-promotion w-inline-block w--current"></a>
            </div>
            <?php break; ?>;
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>

    <?php echo e($schools->links()); ?>


  </div>