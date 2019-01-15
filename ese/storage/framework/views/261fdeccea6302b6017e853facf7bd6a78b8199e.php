<div class="child-item" id="item_<?php echo e(id); ?>">
    <div class="div-block-1172">
        <div class="child-item-name div-block-1172">
            <div class="text-block-80-copy"><?php echo e($name); ?></div>
            <div class="icon-copy"></div>
        </div>
        <div class="child-item-action">
            <i class="fas fa-pencil-alt color-green btn-child-edit" data-id="<?php echo e(id); ?>"></i>
            <i class="fas fa-trash color-red btn-child-delete" data-id="<?php echo e(id); ?>"></i>
        </div>
    </div>
    <div class="text-block-80"><strong>School:</strong> <a href="#">THPT Tân Bình</a></div>
    <div class="text-block-80"><strong>Birthday:</strong> <?php echo e($dob); ?></div>
    <div class="text-block-80"><strong>Genitive:</strong> 
    <?php
        $gen = implode(', ', $genitive);
    ?>
    
    </div>
    </div>
</div>