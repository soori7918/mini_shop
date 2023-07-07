<?php if(isset($service)): ?>
    <?php
    $pic=explode('.',$service->pic);
    $end=end($pic);
    ?>
    <?php if($service->text_input!=null && $service->text_input!=''): ?>
        <a href="<?php echo e(route('user.service.show',$service->id)); ?>">
    <?php endif; ?>
            <?php if(in_array($end,['jpg','jpeg']) && $service->pic): ?>
                <div class="ltn__feature-item ltn__feature-item-6 text-center p-0 <?php echo e($key==1?'active':''); ?>">
                    <img class="w-100" src="<?php echo e($service->pic?url($service->pic):url('source/assets/user/rtl/img/icons/icon-img/12.png')); ?>" alt="<?php echo e($service->title); ?>">
                </div>
                <?php else: ?>
                <div class="ltn__feature-item ltn__feature-item-6 text-center <?php echo e($key==1?'active':''); ?>">
        
                <div class="ltn__feature-icon">
                    <!-- <span><i class="flaticon-house"></i></span> -->
                    <img src="<?php echo e($service->pic?url($service->pic):url('source/assets/user/rtl/img/icons/icon-img/12.png')); ?>" alt="<?php echo e($service->title); ?>">
                </div>
                <div class="ltn__feature-info">
                    <?php if($service->text_input!=null && $service->text_input!=''): ?>
                        <h3><a href="<?php echo e(route('user.service.show',$service->id)); ?>"><?php echo e($service->title); ?></a></h3>
                    <a href="<?php echo e(route('user.service.show',$service->id)); ?>">
                        <?php echo $service->text; ?>

                    </a>
                    <?php else: ?>
                        <h3><a><?php echo e($service->title); ?></a></h3>
                        <?php echo $service->text; ?>

                    <?php endif; ?>
                </div>
                </div>
            <?php endif; ?>
        <?php if($service->text_input!=null && $service->text_input!=''): ?>
            </a>
        <?php endif; ?>
<?php endif; ?>