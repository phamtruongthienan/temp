<div class="div-block-2-column-1-copy">
    <a data-toggle="tooltip" data-placement="left" title="Easily finding school for your child" class="map-finding w-inline-block open-map"></a>
    <div class="sidebar-wrapper">
      <div class="form-block-5-copy w-form">
          <label for="name" class="field-label-3"><?php echo e(trans('front.homepage.search.keyword')); ?> <a href="#" id="delete_keyword" style="float:right;display:none">Xóa</a></label>
           <input placeholder="<?php echo e(trans('front.homepage.search.keyword')); ?>" id="keyword" name="keyword"
                               class="search-sticky txt-search txt-search-keyword basic_search search_sidebar"/>
          <label for="name" class="field-label-3"><?php echo e(trans('front.homepage.search.location')); ?> <a href="#" id="delete_location" style="float:right;display:none">Xóa</a></label>
          <input placeholder="<?php echo e(trans('front.homepage.search.location')); ?>" id="location" name="location"
                               class="search-sticky txt-search  txt-search-area basic_search search_sidebar"/>
          <label for="email-3" class="field-label-3"><?php echo e(trans('front.homepage.search.level')); ?> <a href="#" id="delete_level" style="float:right;display:none">Xóa</a></label>
          <select id="level" name="level" class="search-sticky txt-search advanced_search search_sidebar"><select>
          <label for="email-3" class="field-label-3"><?php echo e(trans('front.homepage.search.type')); ?> <a href="#" id="delete_type" style="float:right;display:none">Xóa</a></label>                
          <select id="type" name="type" class="search-sticky txt-search advanced_search search_sidebar"><select>
            <label for="email-3" class="field-label-3"><?php echo e(trans('front.homepage.search.languages')); ?> <a href="#" id="delete_language" style="float:right;display:none">Xóa</a></label>                
            <select id="language" name="language" class="search-sticky txt-search advanced_search search_sidebar"><select>
      </div>
    </div>
    <div>
      <div class="div-block-65">
        <div class="w-form">
            <label for="name" class="field-label-4"><?php echo e(trans('front.homepage.search.evaluate')); ?>: <a href="#" id="delete_rating" style="float:right;display:none">Xóa</a></label>
            <?php for($i =1; $i <= 5; $i++): ?>
            <div class="pretty p-default p-curve p-thick checkbox-field-3 w-checkbox">
            <input type="radio" data-index="<?php echo e($i-1); ?>"class="radioinput search_sidebar radio_rating" id="rating" name="rating" value="<?php echo e($i); ?>"/>
                <div class="state p-danger-o">
                    <label>
                      <?php for($k= 1; $k <= $i; $k++): ?>
                        <i class="fas fa-star text-warning"></i>
                      <?php endfor; ?>
                    </label>
                </div>
            </div>
            <?php endfor; ?>

           <label for="name" class="field-label-4"><?php echo e(trans('front.homepage.search.price')); ?>: <a href="#" id="delete_price" style="float:right;display:none">Xóa</a></label>
           <div class="pretty p-default p-curve p-thick checkbox-field-3 w-checkbox">
              <input type="radio" class="radioinput search_sidebar radio_price" id="price" name="price" data-index="0" value="1"/>
                <div class="state p-danger-o">
                    <label>1 - 5 triệu</label>
                </div>
            </div>
            <div class="pretty p-default p-curve p-thick checkbox-field-3 w-checkbox">
                <input type="radio" class="radioinput search_sidebar radio_price" id="price" name="price" data-index="1" value="2"/>
                  <div class="state p-danger-o">
                      <label>5 - 10 triệu</label>
                  </div>
            </div>
            <div class="pretty p-default p-curve p-thick checkbox-field-3 w-checkbox">
                <input type="radio" class="radioinput search_sidebar radio_price" id="price" name="price" data-index="2" value="3"/>
                  <div class="state p-danger-o">
                      <label>10 - 15 triệu</label>
                  </div>
            </div>
            <div class="pretty p-default p-curve p-thick checkbox-field-3 w-checkbox">
                <input type="radio" class="radioinput search_sidebar radio_price" id="price" name="price" data-index="3" value="4"/>
                  <div class="state p-danger-o">
                      <label>15 triệu +</label>
                  </div>
            </div>

            <?php if(count($school_service) > 0): ?>
            <label for="name" class="field-label-4"><?php echo e(trans('front.homepage.search.utilities')); ?>: <a href="#" id="delete_service" style="float:right;display:none">Xóa</a></label>
              <?php $__currentLoopData = $school_service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="pretty p-default p-curve p-thick checkbox-field-3 w-checkbox">
              <input type="checkbox" class="checkboxinput" id="service_<?php echo e($k); ?>" name="service[]" value="<?php echo e($v->id); ?>"/>
                  <div class="state p-danger-o">
                  <label><?php echo e($v->mSchoolattributetranslations[0]->name); ?></label>
                  </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>