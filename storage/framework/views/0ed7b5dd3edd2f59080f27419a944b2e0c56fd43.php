<form action="" method="get" class="search_project">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mt-2">
                <select name="room_num" class="chosen-select form-control">
                    <option value="">تعداد خواب</option>
                    <?php $__currentLoopData = range(1,10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($key); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4 mt-2">
                <select name="type_info" class="chosen-select form-control">
                    <option value="">نوع ملک</option>
                    <?php $__currentLoopData = \App\Villa::types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($type); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4 mt-2">
                <select name="city_id" class="chosen-select form-control">
                    <option value="">منطقه</option>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-8 mt-3">
                <div class="container-fluid">
                    <div class="row px-3">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group bootstrap-selects <?php if($errors->has('price')): ?> has-danger <?php endif; ?>" style="direction: ltr">
                                <input type="text" class="js-range-slider" id="demo_2" name="price" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 btn_search mt-3">
                <button type="submit" class="btn_default">
                    <span></span>
                    <span>جستجوی ملک</span>
                </button>
            </div>
        </div>
    </div>
</form>