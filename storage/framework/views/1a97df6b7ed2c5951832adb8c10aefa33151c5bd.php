<?php if(isset($villa)): ?>
    <div class="ltn__product-item ltn__product-item-4 text-center---">
        <div class="product-img">
            <?php if($villa->sale_status=='active'): ?>
                <img src="<?php echo e(url('source/assets/user/pic/sale1.png')); ?>" class="img_sale_png" alt="vandidad">
            <?php endif; ?>
            <a href="<?php echo e(route('user.villa.show',$villa->id)); ?>">
                <img src="<?php echo e(count($villa->photos)?url($villa->photos[0]->path):url('source/assets/user/rtl/img/product-3/1.jpg')); ?>" alt="<?php echo e($villa->name); ?>">
            </a>
            <div class="product-badge">
                <ul>





                        <li class="sale-badge <?php echo e($villa->types_villa_color($villa->type_villa)); ?>">
                            <?php echo e($villa->types_villa(true,$villa->type_villa)); ?>

                        </li>

                </ul>
            </div>
            <div class="product-img-location-gallery">
                <?php if($villa->city): ?>
                    <div class="product-img-location">
                        <ul>
                            <li>
                                <a href="<?php echo e(route('user.villa.show',$villa->id)); ?>"><i class="flaticon-pin"></i> <?php echo e($villa->state?$villa->state->name:''); ?> / <?php echo e($villa->city?$villa->city->name:''); ?></a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="product-img-gallery">
                    <ul>
                        <li>
                            <a href="<?php echo e(route('user.villa.show',$villa->id)); ?>"><i class="fas fa-camera"></i> <?php echo e(count($villa->photos)); ?></a>
                        </li>
                        <?php if($villa->video!=null && $villa->video!=''): ?>
                            <li>
                                <a href="<?php echo e(route('user.villa.show',$villa->id)); ?>"><i class="fas fa-film"></i> </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-info">
            <div class="product-price">
                <span class="lira_price<?php echo e($villa->id); ?> price_all<?php echo e($villa->id); ?> price_villa  price_villa1"><i class="fas fa-money-bill-wave mr-1"></i> <?php echo e(number_format($villa->price)); ?>/لیر</span>
                <span class="dollar_price<?php echo e($villa->id); ?> price_all<?php echo e($villa->id); ?> price_villa  price_villa2"><i class="fas fa-money-bill-wave mr-1"></i><?php echo e(number_format($villa->convertPrice($villa->price,'dollar'))); ?>/دلار</span>
                <span class="toman_price<?php echo e($villa->id); ?> price_all<?php echo e($villa->id); ?> price_villa price_villa3"><i class="fas fa-money-bill-wave mr-1"></i><?php echo e(number_format($villa->convertPrice($villa->price,'toman'))); ?>/تومان</span>










            </div>
            <h3 class="product-title"><a href="<?php echo e(route('user.villa.show',$villa->id)); ?>"><?php echo e($villa->name); ?></a></h3>
            
            
            
            
            <ul class="ltn__list-item-2 ltn__list-item-2-before text-center">
                <li><span><?php echo e($villa->room_num); ?> <i class="flaticon-bed"></i></span>
                    خواب
                </li>
                <li><span><?php echo e($villa->number_of_wc); ?> <i class="flaticon-clean"></i></span>
                    WC
                </li>
                <li><span><?php echo e($villa->area); ?> <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                    متراژ
                </li>
                <li><span><?php echo e($villa->type_sale); ?> <i class="fas fa-hand-holding-usd"></i></span>
                    فروش
                </li>
            </ul>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
<?php endif; ?>
