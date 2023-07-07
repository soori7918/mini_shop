<?php if(isset($item)): ?>
    <div class="ltn__search-by-place-item">
        <div class="search-by-place-img">
            <h6 class="address_project progect_addres_box"><a href="<?php echo e(route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])); ?>"><i class="flaticon-pin"></i> <?php echo e($item->state->name . ' / '.$item->city->name); ?> </a></h6>

            <a href="<?php echo e(route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])); ?>">

                <?php if(count($item->photos)>0): ?>
                    <img src="<?php echo e(url($item->photos[0]->path)); ?>" alt="<?php echo e($item->name); ?>">
                <?php else: ?>
                    <img src="<?php echo e($item->pic?url($item->pic):url('assets/user/pic/product.jpg')); ?>" alt="<?php echo e($item->name); ?>">
                <?php endif; ?>
            </a>
            <div class="search-by-place-badge">
                <ul>
                    <li><?php echo e($item->code); ?></li>
                </ul>
            </div>
        </div>
        <div class="search-by-place-info">
            <h6><a href="<?php echo e(route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])); ?>">شروع قیمت از : <?php echo e(number_format($item->price)); ?> لیر </a></h6>
            <h6><a href="<?php echo e(route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])); ?>">تعداد واحد های باقی مانده : <?php echo e($item->count_all_unit-$item->count_sale_unit); ?> واحد </a></h6>

            <h5><a href="<?php echo e(route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])); ?>"><?php echo e($item->name); ?></a></h5>
            <div class="search-by-place-btn text-right">
                <a href="<?php echo e(route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])); ?>">مشاهده <i class="fas fa-angle-left top_i"></i></a>
            </div>
        </div>
    </div>
<?php endif; ?>