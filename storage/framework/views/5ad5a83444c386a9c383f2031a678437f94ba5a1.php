<form action="<?php echo e(route('villa-search',$type??'')); ?>" id="searchForm" method="get">
    <div class="row" style="border: 0px solid #e5eaef;background-color: rgba(255, 255, 255, 0.2);padding: 20px;">
        <div class="col-md-2 col-xs-12">
            <div class="form-group">
                <label for="city_id">شهر</label>
                <select class="form-control" name="city_id" id="city_id">
                    <option value="">همه استانبول...</option>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option data-target=".cityId<?php echo e($city->id); ?>" <?php echo e(request('city_id')==$city->id?'selected':''); ?> value="<?php echo e($city->id); ?>"
                                data-latitude="<?php echo e($city->latitude); ?>"
                                data-longitude="<?php echo e($city->longitude); ?>"><?php echo e($city->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <div class="form-group">
                <?php echo e(Form::label('location_id', 'منطقه ملک')); ?>

                <select class="form-control" name="location_id" id="location_id">
                    <option value="">همه مناطق...</option>
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option class="cityId<?php echo e($l->city_id); ?>" <?php echo e(request('location_id')==$l->id?'selected':''); ?> value="<?php echo e($l->id); ?>"><?php echo e($l->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>






        <div class="col-md-2 col-xs-12">
            <div class="form-group w-100" style="display: inline-grid !important;">
                <?php echo e(Form::label('type', 'پروژه نوساز')); ?>

                <div class="form-control text-center">
                    <?php echo e(Form::checkbox('type', null , false,array('style' => "vertical-align:middle"))); ?>

                </div>
            </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <div class="form-group <?php if($errors->has('slug')): ?> has-danger <?php endif; ?>">
                <?php echo e(Form::label('built_year', 'سن ساختمان')); ?>

                <?php echo e(Form::number('built_year', null, array('class' => 'form-control','min'=>0))); ?>

            </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <div class="form-group">
                <?php echo e(Form::label('type_info', 'نوع ملک')); ?>

                <?php echo e(Form::select('type_info[]', App\Villa::types(), null, array('class' => 'form-control selectpicker','multiple'))); ?>

            </div>
        </div>
        <div class="col-md-2 col-xs-12">
                <?php echo e(Form::label('type_info', 'تعداد اتاق + سالن')); ?>

                <select class="form-control selectpicker" id="room_number" name="room_number[]" multiple>
                    <option value="" selected>همه موارد</option>
                    <option value="1+0">1+0</option>
                    <option value="1+1">1+1</option>
                    <option value="2+1">2+1</option>
                    <option value="3+1">3+1</option>
                    <option value="3+2">3+2</option>
                    <option value="4+1">4+1</option>
                    <option value="4+2">4+2</option>
                    <option value="+4+2">دیگر</option>
                </select>
        </div>

















































        <div class="col-md-12 col-xs-12">
            <div class="form-group bootstrap-selects <?php if($errors->has('price')): ?> has-danger <?php endif; ?>" style="direction: ltr">
                <?php echo e(Form::label('price', 'قیمت')); ?>

                <input type="text" class="js-range-slider" name="price" value="" />
                <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="ملک‌های کمتر از ۲۰۰ هزار لیر مناسب ‌شان و سلیقه ی هموطنان عزیز ایرانی‌ نیست" style="position: absolute;left: -8px;top: 30px;"><i class="fa fa-info"></i></span>
                <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="ملک‌های بالا تر از ۲۰ میلیون لیر، به دلایل قانونی‌، قابل نمایش در سایت نیستند. در صورت نیاز، از طریق کارشناسان مربوطه ی سازمان، مورد مد نظرتان را پیگیری کنید" style="position: absolute;right: -8px;top: 30px;"><i class="fa fa-info"></i></span>
            </div>
        </div>




















        <div class="col-md-2 col-xs-12">
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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
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
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
    <script>
        var custom_values = ['<?php echo e($price_min); ?>',200000, 400000, 600000, 800000, 1000000, 1350000, 1700000, 2000000, 2500000, 3000000, 4000000, 5000000, 10000000, 20000000,'<?php echo e($price_max); ?>'];
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
        // getCityId($('select[name=city_id]').find(":selected").val())
        // $('select[name=city_id]').change(function () {
        //     let selected=$(this).find(":selected").val();
        //     getCityId(selected)
        // })
        // function getCityId(selected){
        //     if(selected==''){
        //         $('select[name=location_id]').attr('disabled',true)
        //         // $('select[name=type]').attr('disabled',true)
        //     }else{
        //         $('select[name=location_id]').attr('disabled',false)
        //         // $('select[name=type]').attr('disabled',false)
        //     }
        // }

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
<?php $__env->stopPush(); ?>