<form action="<?php echo e(route('user-report-search')); ?>" id="searchForm" method="get">
    <div class="row" style="border: 0px solid #e5eaef;background-color: rgba(255, 255, 255, 0.2);padding: 20px;">
        <div class="col-md-3 col-xs-12">
            <label for="user_id">کاربر</label>
            <select class="form-control select2" id="user_id" name="user_id">
                <option value="" <?php echo e(old('user_id') == 0 ? 'selected' : ''); ?>>ندارد</option>
                <?php $__currentLoopData = \App\User::role(['مدیر ملک','مدیر','call center','call center(sales)'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                            value="<?php echo e($admin_user->id); ?>"
                            <?php echo e(request('user_id')==$admin_user->id?'selected':''); ?>>
                        <?php echo e($admin_user->first_name .' '.$admin_user->last_name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group w-100" style="display: inline-grid !important;">
                <?php echo e(Form::label('از تاریخ', '')); ?>

                <input name="from" class="datepicker form-control" value="<?php echo e(request('from')); ?>" data-date-format="yyyy/mm/dd/">
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group w-100" style="display: inline-grid !important;">
                <?php echo e(Form::label('تا تاریخ', '')); ?>

                <input name="to" class="datepicker form-control" value="<?php echo e(request('to')); ?>" data-date-format="mm/dd/">
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group w-100" style="display: inline-grid !important;">
                <?php echo e(Form::label('', 'فیلتر کن',array('style'=>'opacity:0'))); ?>

                <div class="">
                    <button class="btn btn-info" style="height: 38px;width: 70%;" type="submit">فیلتر کن</button>
                    <button type="button" class="btn btn-warning" style="height: 38px;width: 27%;" onclick="$('#searchForm').trigger('reset')">
                        <i class="fa fa-2x fa-retweet ml-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->startPush('stylesheets'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>"/>
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <style>
        .set-bg {
            text-align: center;
            background: #eeeeee61;
            color: #000;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
    <script>
        var custom_values = [200000, 400000, 600000, 800000, 1000000, 1350000, 1700000, 2000000, 2500000, 3000000, 4000000, 5000000, 10000000, 20000000];
        // be careful! FROM and TO should be index of values array
                <?php if(request('price')): ?>
        var my_from = custom_values.indexOf(<?php echo e(explode(';',request('price'))[0]); ?>);
        var my_to = custom_values.indexOf(<?php echo e(explode(';',request('price'))[1]); ?>);
                <?php else: ?>
        var my_from = custom_values.indexOf(400000);
        var my_to = custom_values.indexOf(1350000);
        <?php endif; ?>

        $(".js-range-slider").ionRangeSlider({
            type: "double",
            grid: true,
            from: my_from,
            to: my_to,
            values: custom_values
        });
    </script>
    <script>
        getCityId($('select[name=city_id]').find(":selected").val())
        $('select[name=city_id]').change(function () {
            let selected=$(this).find(":selected").val();
            getCityId(selected)
        })
        function getCityId(selected){
            if(selected==''){
                $('select[name=location_id]').attr('disabled',true)
                // $('select[name=type]').attr('disabled',true)
            }else{
                $('select[name=location_id]').attr('disabled',false)
                // $('select[name=type]').attr('disabled',false)
            }
        }

        checkType($("input[name='type']"));
        $("input[name='type']").click(function() {
            checkType($(this));
        });
        function checkType(el){
            if(el.is(':checked')){
                $('input[name=built_year]').attr('disabled',true)
            }else{
                $('input[name=built_year]').attr('disabled',false)
            }
        }
    </script>
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            // startDate: '-3d'
        });
    </script>
<?php $__env->stopPush(); ?>