<div class="hero-section">
    <div class="love-container w-container">
        <h1 class="homepage-title"><?php echo e(mb_strtoupper(trans('front.homepage.intro.text1'))); ?></h1>
        <div class="text-block-49"><?php echo e(trans('front.homepage.intro.text2')); ?></div>
        <div class="block-search">
            <div class="div-block-1095 block-search-basic row">
                <div class="block-search-txt col-lg-9 col-md-12 col-sm-12 row">
                    <div class="col-md-6 col-sm-6">
                        <input placeholder="<?php echo e(trans('front.homepage.search.keyword')); ?>" id="keyword" name="keyword"
                               class="div-block-109 txt-search txt-search-keyword basic_search"/>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <input placeholder="<?php echo e(trans('front.homepage.search.location')); ?>" id="location" name="location"
                               class="div-block-109 txt-search txt-search-area basic_search"/>
                    </div>
                </div>
                <div class="div-block-1108-copy col-lg-3 col-md-12 col-sm-12">
                    <div class="div-block-109 search">
                       <button id="searchBtn" class="w-inline-block" style="width: 100%;background-color: unset;">
                            <div class="text-block-48-copy"><?php echo e(mb_strtoupper(trans('front.homepage.search.button'))); ?></div>
                       </button>

                    </div>
                </div>
            </div>
            <div class="div-block-1111"><a href="#" data-toggle="tooltip" data-placement="top"
                                           title="<?php echo e(trans('front.homepage.search.advanced.text')); ?>"
                                           data-w-id="8d743e4d-96e9-38f7-fe69-8a043e755fc4"
                                           class="button-7 w-button btn-search-advanced" data-current="<?php echo e(mb_strtoupper(trans('front.homepage.search.advanced'))); ?>" data-next="<?php echo e(trans('front.homepage.search.basicsearch')); ?>"><?php echo e(mb_strtoupper(trans('front.homepage.search.advanced'))); ?></a>
                <div data-w-id="24fd5cfe-882c-1ab8-73c1-15877e791798" class="div-block-1112">
                    <div class="div-block-1095 row">
                        <div class="col-lg-6 col-md-12 col-sm-12 row">
                            
                            <div class="col-md-6 col-sm-6">
                                    <select id="type" name="type" class="advanced_search"><select>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                    <select id="level" name="level" class="advanced_search"><select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 row">
                            <div class="col-md-6 col-sm-6">
                                    <select id="language" name="language" class="advanced_search"><select>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                    <select id="rating" name="rating"  class="advanced_search"><select>
                            </div>
                        </div>
                    </div>
                    <div class="div-block-1095 row">
                        <div class="col-lg-3 col-md-12 col-sm-12 row">
                            <div class="col-md-12 col-sm-12">
                                    <select id="price" name="price"><select>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 row">
                            <div class="col-md-12">
                                    <select name="service" id="service" class="div-block-109 txt-search txt-search-service"  multiple="multiple" style="display: none;">
                                        <?php $__currentLoopData = $school_service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($v->id); ?>"><?php echo e($v->mSchoolattributetranslations[0]->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-w-id="24fe96b5-9956-8a11-bf47-b823839baa06" class="div-block-1159">
            <a class="div-block-city w-inline-block open-map-location" data-location="Thành phố Hồ Chí Minh" data-lat="10.7797855" data-lng="106.6968302" data-map="hochiminh">
                <div class="text-block-76">Ho Chi Minh City</div>
            </a>
            <a class="div-block-city _1 w-inline-block open-map-location" data-location="Thủ Đô Hà Nội" data-lat="21.0297957" data-lng="105.8374292" data-map="hanoi">
                <div class="text-block-76">Ha Noi</div>
            </a>
            <a class="div-block-city _2 w-inline-block open-map-location" data-location="Thành phố Huế" data-lat="16.4724863" data-lng="107.577832" data-map="hue">
                <div class="text-block-76">Hue</div>
            </a>
            <a class="div-block-city _4 w-inline-block open-map-location" data-location="Thành phố Đà Nẵng" data-lat="16.0655474" data-lng="108.2018837" data-map="danang">
                <div class="text-block-76">Da Nang</div>
            </a>
        </div>
        <div class="hp-title">
            <h1 class="homepage-title"><?php echo e(trans('front.homepage.whatsnews')); ?></h1>
        </div>
        <div class="div-block-1097">
                <?php $__currentLoopData = $promotion_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($k < 3 && $v->position == 4  && $v->type==3): ?>
                    <?php
                        $logo_promotion =  Imgfly::imgPublic($v->mSchooleventtranslations[0]->logo.'?w=400');
                    ?>
                       <div class="div-banner-square" style="background-image: url(<?php echo e($logo_promotion); ?>);">
                          <a href="<?php echo e(asset($v->mSchooleventtranslations[0]->slug)); ?>" class="link-block-14 w-inline-block"></a>
                       </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
  