<?php $__env->startSection('nav'); ?>
    <?php if(auth()->check()): ?>
        <nav class="site-header sticky-top py-1">
            <div class="px-3 d-flex flex-column flex-md-row">
                
                
                
                
                
                
                <p class="logo_p_view text-center">
                    <span>Live Your Dreams</span>
                </p>
            </div>
        </nav>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .link-selected {
            color: #000;
            display: block;
            font-size: 9px;
            text-align: center;
        }
    </style>
    <?php if(!isset($location)): ?>
        <div id="mySidenavR" class="sidenavr">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNavR()">&times;</a>
            <a href="javascript:void(0)" class="filter_name"><img class="link-icon"
                                                                  src="<?php echo e(asset('new/img/icon/filter.png')); ?>"
                                                                  width="17"
                                                                  onclick="openNavR()"> فیلتر ها</a>
            <hr>
            <div class="dropdown-content_filter" id="filters">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 with-border">
                            <h6 style="padding-right: 14px;font-size: 18px !important;
    font-weight: 600;"><img class="link-icon" onclick="filter('city')"
                            src="<?php echo e(asset('new/img/icon/location.png')); ?>"
                            width="17">
                                آدرس</h6>
                            <ul class="nav farei">
                                <li class="nav-item dropdown_city">
                    <span class="nav-link span_hover">
                        <img class="link-icon" onclick="filter('city')" src="<?php echo e(asset('new/img/icon/location.png')); ?>"
                             width="17">
                        <a href="javascript:void(0);" onclick="filter('city')"
                           class="link-title  dropbtn_city">منطقه</a>
                        <i class="fas fa-chevron-down dis_none1"></i>
                         <div class="dropdown-content_city div_drop dis_none1" id="city_select">
                              <a href="javascript:void(0);" onclick="set_city(0,'همه')"> <?php if(isset($_GET['city']) and $_GET['city']==0): ?>
                                      <i class="far fa-dot-circle i_city i_city_0"
                                         id="i_city_0"></i> <?php elseif(\Request::route()->getName() == 'front.villas.index'): ?>
                                      <i class="far fa-dot-circle i_city i_city_0" id="i_city_0"></i> <?php else: ?> <i
                                          class="i_city far fa-circle i_city i_city_0" id="i_city_0"></i> <?php endif; ?> همه</a>
                             <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$cit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <a href="javascript:void(0);" onclick="set_city('<?php echo e($cit->id); ?>','<?php echo e($cit->name); ?>')"><?php if(isset($_GET['city']) and $_GET['city']==$cit->id): ?>
                                         <i class="i_city i_city_<?php echo e($cit->id); ?>  far fa-dot-circle "
                                            id="i_city_<?php echo e($cit->id); ?>"></i> <?php else: ?> <i
                                             class="i_city i_city_<?php echo e($cit->id); ?> far fa-circle"
                                             id="i_city_<?php echo e($cit->id); ?>"></i> <?php endif; ?> <?php echo e($cit->name); ?></a>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </span>
                                    <span id="city_span_check" class="span_check"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                            (همه) <?php endif; ?></span>
                                    <hr>
                                </li>
                                <li class="nav-item dropdown_locate">
                                        <span class="nav-link  span_hover">
                                            <img class="link-icon" onclick="filter('locate')"
                                                 src="<?php echo e(asset('new/img/icon/location.png')); ?>" width="17">
                                            <a href="javascript:void(0);" onclick="filter('locate')"
                                               class="link-title  dropbtn_locate">ناحیه</a>
                                            <i class="fas fa-chevron-down dis_none1"></i>
                                             <div class="dropdown-content_locate div_drop dis_none1" id="locate_select"
                                                  dir="ltr">
                                                   <?php if(isset($_GET['location'])): ?>
                                                     <?php
                                                     $loc_arr = explode(',', $_GET['location'])
                                                     ?>
                                                 <?php endif; ?>
                                                 <?php
                                                 $city_id = '';
                                                 ?>
                                                 <?php $__currentLoopData = $locate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <?php if($city_id!=$loc['city_id']): ?>
                                                         <?php $city_id = $loc['city_id']; ?>
                                                         <p class="loc_name_arr a_locate a_locate_<?php echo e($loc->city_id); ?> <?php if(isset($_GET['city']) and $_GET['city']>0 and $_GET['city']!=$loc->city_id): ?>  dis_none <?php endif; ?>"><?php echo e($loc->city->name); ?></p>
                                                     <?php endif; ?>
                                                     <a href="javascript:void(0);" onclick="set_locate('<?php echo e($loc->id); ?>')"
                                                        class="a_locate a_locate_<?php echo e($loc->city_id); ?> <?php if(isset($_GET['city']) and $_GET['city']>0 and $_GET['city']!=$loc->city_id): ?>  dis_none <?php endif; ?>"><?php if(isset($_GET['location'])): ?> <?php $locetion_type=false; ?> <?php $__currentLoopData = $loc_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(intval($l_id)==$loc->id): ?> <?php $locetion_type=true ?>  <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         <?php if($locetion_type==true): ?> <i
                                                             class="far fa-dot-circle i_locate i_locate_<?php echo e($loc->id); ?>"
                                                             id="locate_id_<?php echo e($loc->id); ?>"></i> <?php else: ?> <i
                                                             class="far fa-circle i_locate i_locate_<?php echo e($loc->id); ?>"
                                                             id="locate_id_<?php echo e($loc->id); ?>"></i> <?php endif; ?> <?php else: ?> <i
                                                             class="far fa-circle i_locate i_locate_<?php echo e($loc->id); ?>"
                                                             id="locate_id_<?php echo e($loc->id); ?>"></i> <?php endif; ?>  <?php echo e($loc->name); ?></a>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </span>
                                    <span id="locate_span_check" class="span_check"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                            (همه) <?php endif; ?></span>
                                    <hr>
                                </li>
                                <li class="nav-item dropdown_arr">
                    <span class="nav-link span_hover">
                        <img class="link-icon" onclick="filter('arr')" src="<?php echo e(asset('new/img/icon/location.png')); ?>"
                             width="17">
                        <a href="javascript:void(0);" onclick="filter('arr')" class="link-title  dropbtn_arr">محله</a>
                        <i class="fas fa-chevron-down dis_none1"></i>
                         <div class="dropdown-content_arr div_drop dis_none1" id="arr_select" dir="ltr">
                                 <?php if(isset($_GET['district'])): ?>
                                 <?php
                                 $dis_arr = explode(',', $_GET['district']);
                                 ?>
                             <?php endif; ?>
                             <?php
                             $loc_name = '';
                             ?>
                             <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$arr_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($loc_name!=$arr_1['lname']): ?>
                                     <?php $loc_name = $arr_1['lname']; ?>
                                     <p class="loc_name_arr a_arr a_arr_<?php echo e($arr_1['id']); ?> <?php if(isset($_GET['district']) and in_array($arr_1['id'],$arr_locate)): ?> <?php else: ?> dis_none <?php endif; ?>"><?php echo e($arr_1['lname']); ?></p>
                                 <?php endif; ?>
                                 <a href="javascript:void(0);"
                                    onclick="set_arr('<?php echo e($key); ?>','<?php echo e($arr_1['item']); ?>','<?php echo e($arr_1['id']); ?>')"
                                    class="a_arr a_arr_<?php echo e($arr_1['id']); ?> <?php if(isset($_GET['district']) and in_array($arr_1['id'],$arr_locate)): ?> <?php else: ?> dis_none <?php endif; ?>"><?php if(isset($_GET['district'])): ?> <?php $arr_type=false; ?>  <?php $__currentLoopData = $dis_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($l_id==$arr_1['item'].'_'.$arr_1['id']): ?> <?php $arr_type=true; ?>  <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if($arr_type==true): ?>
                                         <i class="far fa-dot-circle locate_arr_i_<?php echo e($arr_1['id']); ?> i_arr i_arr_<?php echo e($key); ?>"
                                            id="arr_id_<?php echo e($key); ?>"></i> <?php else: ?> <i
                                             class="far fa-circle locate_arr_i_<?php echo e($arr_1['id']); ?> i_arr i_arr_<?php echo e($key); ?>"
                                             id="arr_id_<?php echo e($key); ?>"></i> <?php endif; ?> <?php else: ?> <i
                                         class="far fa-circle locate_arr_i_<?php echo e($arr_1['id']); ?> i_arr i_arr_<?php echo e($key); ?>"
                                         id="arr_id_<?php echo e($key); ?>"></i> <?php endif; ?>  <?php echo e($arr_1['item']); ?></a>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </span>
                                    <span id="arr_span_check" class="span_check"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                            (همه) <?php endif; ?></span>
                                    <hr>
                                </li>
                            </ul>
                            <hr>
                        </div>
                        <div class="col-md-8 with-border">
                            <ul class="nav farei">
                                <li class="nav-item dropdown_tip_info">
                    <span class="nav-link span_hover">
                        <img class="link-icon" onclick="filter('tip_info')"
                             src="<?php echo e(asset('new/img/icon/category1.png')); ?>" width="17">
                        <a href="javascript:void(0);" onclick="filter('tip_info')" class="link-title  dropbtn_tip_info"
                           style="color: black!important;
    top: -5px;
    font-size: 17px !important;
    width: 100%;">نوع خدمات ملک</a>
                        <i class="fas fa-chevron-down dis_none1"></i>
                         <div class="dropdown-content_tip_info div_drop dis_none1" id="tip_info_select">
                              <a href="javascript:void(0);" class="property_type_item" onclick="set_tip_info('all')"> <?php if(isset($_GET['tip_info']) and $_GET['tip_info']=='all'): ?>
                                      <i class=" far fa-dot-circle i_tip_info i_tip_info_all"></i> <?php elseif(\Request::route()->getName() == 'front.villas.index'): ?>
                                      <i class="far fa-dot-circle i_tip_info i_tip_info_all"></i> <?php else: ?> <i
                                          class="far fa-circle i_tip_info i_tip_info_all"></i> <?php endif; ?> هردو </a>
                              <a href="javascript:void(0);" class="property_type_item" onclick="set_tip_info('1')"> <?php if(isset($_GET['tip_info']) and $_GET['tip_info']=='1'): ?>
                                      <i class=" far fa-dot-circle i_tip_info i_tip_info_1"></i> <?php else: ?> <i
                                          class="far fa-circle i_tip_info i_tip_info_1"></i> <?php endif; ?> مناسب برای اخذ شهروندی و پاسپورت ترکیه </a>
                              <a href="javascript:void(0);" class="property_type_item" onclick="set_tip_info('2')"> <?php if(isset($_GET['tip_info']) and $_GET['tip_info']=='2'): ?>
                                      <i class=" far fa-dot-circle i_tip_info i_tip_info_2"></i> <?php else: ?> <i
                                          class="far fa-circle i_tip_info i_tip_info_2"></i> <?php endif; ?> مناسب برای اخذ اقامت ترکیه </a>
                        </div>
                    </span>
                                    <span id="tip_info_span_check" class="span_check"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                            (همه) <?php endif; ?></span>
                                    <hr>
                                </li>
                            </ul>
                            <hr>
                        </div>
                        <div class="col-md-8 with-border">
                            <ul class="nav farei">
                                <li class="nav-item dropdown_cat">
                    <span class="nav-link span_hover">
                        <img class="link-icon" onclick="filter('cat')" src="<?php echo e(asset('new/img/icon/category1.png')); ?>"
                             width="17">
                        <a href="javascript:void(0);" onclick="filter('cat')"
                           class="link-title  dropbtn_cat" style="color: black!important;
    top: -5px;
    font-size: 17px !important;
    width: 100%;">دسته بندی</a>
                        <i class="fas fa-chevron-down dis_none1"></i>
                         <div class="dropdown-content_cat div_drop dis_none1" id="cat_select">
                              <a href="javascript:void(0);" class="category_item" onclick="set_cat('all')"> <?php if(isset($_GET['cat']) and $_GET['cat']=='all' or isset($type) and $type=='all'): ?>
                                      <i class=" far fa-dot-circle i_cat i_cat_all"></i> <?php else: ?> <i
                                          class="far fa-circle i_cat i_cat_all"></i> <?php endif; ?> همه</a>
                              <a href="javascript:void(0);" class="category_item" onclick="set_cat('new')"> <?php if(isset($_GET['cat']) and $_GET['cat']=='new' or isset($type) and $type=='new'): ?>
                                      <i class=" far fa-dot-circle i_cat i_cat_new"></i> <?php else: ?> <i
                                          class="far fa-circle i_cat i_cat_new"></i> <?php endif; ?> پروژه های نوساز </a>
                              <a href="javascript:void(0);" class="category_item" onclick="set_cat('old')"> <?php if(isset($_GET['cat']) and $_GET['cat']=='old' or isset($type) and $type=='old'): ?>
                                      <i class=" far fa-dot-circle i_cat i_cat_old"></i> <?php else: ?> <i
                                          class="far fa-circle i_cat i_cat_old"></i> <?php endif; ?> املاک دسته دوم </a>
                              <a href="javascript:void(0);" class="category_item" onclick="set_cat('vila')"> <?php if(isset($_GET['cat']) and $_GET['cat']=='vila' or isset($type) and $type=='vila'): ?>
                                      <i class=" far fa-dot-circle i_cat i_cat_vila"></i> <?php else: ?> <i
                                          class="far fa-circle i_cat i_cat_vila"></i> <?php endif; ?> تجاری </a>
                        </div>
                    </span>
                                    <span id="cat_span_check" class="span_check"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                            (همه) <?php endif; ?></span>
                                    <hr>
                                </li>
                            </ul>
                            <hr>
                        </div>
                        <div class="col-md-8 with-border">
                            <ul class="nav farei">
                                <li class="nav-item dropdown_price">
                    <span class="nav-link span_hover span_hover_tag container-fluid">
                        <img class="link-icon" onclick="filter('price')" src="<?php echo e(asset('new/img/icon/price1.png')); ?>"
                             width="17">
                        <span href="javascript:void(0);" onclick="filter('price')" class="link-title  dropbtn_price"
                              style="color: black!important;top:-5px">قیمت</span>
                        <div class="dropdown-content_price div_drop row dis_none1" id="price_select">
                            <div class="w100">
                                <input type="text" name="price_down" id="price_down" onkeyup="set_price_down()"
                                       placeholder="حداقل قیمت"
                                       value="<?php if(isset($_GET['price_down']) and $_GET['price_down']!=null): ?> <?php echo e($_GET['price_down']); ?> <?php endif; ?>"
                                       class="form-control price">
                                <span
                                    class="type_price_note type_price_note_down <?php if(isset($_GET['price_down']) and $_GET['price_down']==null): ?> dis_none <?php elseif(!isset($_GET['price_down'])): ?> dis_none <?php endif; ?>"><?php if(isset($_GET['type_price']) and $_GET['type_price']=='lir'): ?>
                                        لیر <?php elseif(isset($_GET['type_price']) and $_GET['type_price']=='dolar'): ?>
                                        دلار <?php elseif(isset($_GET['type_price']) and $_GET['type_price']=='rial'): ?>
                                        ریال <?php elseif(isset($_GET['type_price']) and $_GET['type_price']=='euro'): ?>
                                        یورو <?php else: ?> لیر <?php endif; ?></span>
                            </div>
                             <div class="w100">
                                <input type="text" name="price_up" id="price_up" onkeyup="set_price_up()"
                                       placeholder="حداکثر قیمت"
                                       value="<?php if(isset($_GET['price_up']) and $_GET['price_up']!=null): ?> <?php echo e($_GET['price_up']); ?> <?php endif; ?>"
                                       class="form-control price">
                                 <span
                                     class="type_price_note type_price_note_up <?php if(isset($_GET['price_up']) and $_GET['price_up']==null): ?> dis_none <?php elseif(!isset($_GET['price_up'])): ?> dis_none <?php endif; ?>"><?php if(isset($_GET['type_price']) and $_GET['type_price']=='lir'): ?>
                                         لیر <?php elseif(isset($_GET['type_price']) and $_GET['type_price']=='dolar'): ?>
                                         دلار <?php elseif(isset($_GET['type_price']) and $_GET['type_price']=='rial'): ?>
                                         ریال <?php elseif(isset($_GET['type_price']) and $_GET['type_price']=='euro'): ?>
                                         یورو <?php else: ?> لیر <?php endif; ?></span>
                            </div>
                             <div class="w100  dropdown_type_price">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('type_price')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('type_price')"
                                       class="link-title  dropbtn_type_price">انتخاب نوع پول</a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_type_price div_drop dis_none1" id="type_price_select">
                                          <a href="javascript:void(0);" class="price_type_item"
                                             onclick="set_type_price('lir')"> <?php if(isset($_GET['type_price']) and $_GET['type_price']=='lir'): ?>
                                                  <i class=" far fa-dot-circle i_type_price i_type_price_lir"></i> <?php elseif(\Request::route()->getName() == 'front.villas.index'): ?>
                                                  <i class="far fa-dot-circle i_type_price i_type_price_lir"></i> <?php else: ?>
                                                  <i class="far fa-circle i_type_price i_type_price_lir"></i> <?php endif; ?> لیر </a>
                                          <a href="javascript:void(0);" class="price_type_item"
                                             onclick="set_type_price('dolar')"> <?php if(isset($_GET['type_price']) and $_GET['type_price']=='dolar'): ?>
                                                  <i class=" far fa-dot-circle i_type_price i_type_price_dolar"></i> <?php else: ?>
                                                  <i class="far fa-circle i_type_price i_type_price_dolar"></i> <?php endif; ?> دلار </a>
                                          <a href="javascript:void(0);" class="price_type_item"
                                             onclick="set_type_price('rial')"> <?php if(isset($_GET['type_price']) and $_GET['type_price']=='rial'): ?>
                                                  <i class=" far fa-dot-circle i_type_price i_type_price_rial"></i> <?php else: ?>
                                                  <i class="far fa-circle i_type_price i_type_price_rial"></i> <?php endif; ?> ریال </a>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <hr class="m-top21">
                    </span>
                                    <span id="price_span_check" class="span_check"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                            (همه) <?php endif; ?></span>
                                </li>
                            </ul>
                            <hr>
                        </div>
                        <div class="col-md-8 p-0">
                            <ul class="nav farei">
                                <li class="nav-item dropdown_tag w100">
                    <span class="nav-link span_hover span_hover_tag container-fluid p-0">
                        <img class="link-icon info_melk" src="<?php echo e(asset('new/img/icon/melk.png')); ?>" width="17"
                             style="top:0">
                        <span href="javascript:void(0);" class="link-title  dropbtn_tag"
                              style="color: black!important;top:-7px">جزئیات ملک</span>
                            <div class="w100 w32  dropdown_salon">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('salon')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('salon')"
                                       class="link-title  dropbtn_salon">تعداد سالن</a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_salon div_drop dis_none1" id="salon_select">
                                          <a href="javascript:void(0);" class="salon_item" onclick="set_salon(1)"> <?php if(isset($_GET['salon']) and $_GET['salon']=='1'): ?>
                                                  <i class=" far fa-dot-circle i_salon i_salon_1 "
                                                     id="i_salon_1"></i> <?php else: ?> <i
                                                      class="far fa-circle i_salon i_salon_1"
                                                      id="i_salon_1"></i> <?php endif; ?> 1</a>
                                          <a href="javascript:void(0);" class="salon_item" onclick="set_salon(2)"> <?php if(isset($_GET['salon']) and $_GET['salon']=='2'): ?>
                                                  <i class=" far fa-dot-circle i_salon i_salon_2 "
                                                     id="i_salon_2"></i> <?php else: ?> <i
                                                      class="far fa-circle i_salon i_salon_2"
                                                      id="i_salon_2"></i> <?php endif; ?> 2 </a>
                                          <a href="javascript:void(0);" class="salon_item" onclick="set_salon(3)"> <?php if(isset($_GET['salon']) and $_GET['salon']=='3'): ?>
                                                  <i class=" far fa-dot-circle i_salon i_salon_3 "
                                                     id="i_salon_3"></i> <?php else: ?> <i
                                                      class="far fa-circle i_salon i_salon_3"
                                                      id="i_salon_3"></i> <?php endif; ?> 3 </a>
                                    </div>
                                </span>
                               <span id="salon_span_check" class="span_check1"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                       (همه) <?php endif; ?></span>
                            </div>
                            <div class="w100 w32  dropdown_khab">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('khab')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('khab')"
                                       class="link-title  dropbtn_khab">تعداد اتاق خواب</a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_khab div_drop dis_none1" id="khab_select">

                                          <a href="javascript:void(0);" class="sleep_item" onclick="set_khab(1)"> <?php if(isset($_GET['khab']) and $_GET['khab']=='1'): ?>
                                                  <i class=" far fa-dot-circle i_khab i_khab_1" id="i_khab_1"></i> <?php else: ?>
                                                  <i class="far fa-circle i_khab i_khab_1"
                                                     id="i_khab_1"></i> <?php endif; ?> 1</a>
                                          <a href="javascript:void(0);" class="sleep_item" onclick="set_khab(2)"> <?php if(isset($_GET['khab']) and $_GET['khab']=='2'): ?>
                                                  <i class=" far fa-dot-circle i_khab i_khab_2" id="i_khab_2"></i> <?php else: ?>
                                                  <i class="far fa-circle i_khab i_khab_2" id="i_khab_2"></i> <?php endif; ?> 2 </a>
                                          <a href="javascript:void(0);" class="sleep_item" onclick="set_khab(3)"> <?php if(isset($_GET['khab']) and $_GET['khab']=='3'): ?>
                                                  <i class=" far fa-dot-circle i_khab i_khab_3" id="i_khab_3"></i> <?php else: ?>
                                                  <i class="far fa-circle i_khab i_khab_3" id="i_khab_3"></i> <?php endif; ?> 3 </a>
                                          <a href="javascript:void(0);" class="sleep_item" onclick="set_khab(4)"> <?php if(isset($_GET['khab']) and $_GET['khab']=='4'): ?>
                                                  <i class=" far fa-dot-circle i_khab i_khab_4" id="i_khab_4"></i> <?php else: ?>
                                                  <i class="far fa-circle i_khab i_khab_4" id="i_khab_4"></i> <?php endif; ?> 4 </a>
                                          <a href="javascript:void(0);" class="sleep_item" onclick="set_khab(5)"> <?php if(isset($_GET['khab']) and $_GET['khab']=='5'): ?>
                                                  <i class=" far fa-dot-circle i_khab i_khab_5" id="i_khab_5"></i> <?php else: ?>
                                                  <i class="far fa-circle i_khab i_khab_5" id="i_khab_5"></i> <?php endif; ?> 5 </a>
                                          <a href="javascript:void(0);" class="sleep_item" onclick="set_khab(6)"> <?php if(isset($_GET['khab']) and $_GET['khab']=='6'): ?>
                                                  <i class=" far fa-dot-circle i_khab i_khab_6" id="i_khab_6"></i> <?php else: ?>
                                                  <i class="far fa-circle i_khab i_khab_6" id="i_khab_6"></i> <?php endif; ?> 6 </a>
                                    </div>
                                </span>
                                <span id="khab_span_check" class="span_check1"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                        (همه) <?php endif; ?></span>
                            </div>
                            <div class="w100 w32  dropdown_sen">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('sen')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('sen')"
                                       class="link-title  dropbtn_sen">سن ساختمان</a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_sen div_drop dis_none1" id="sen_select">

                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(1)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='1'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_1" id="i_sen_1"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_1" id="i_sen_1"></i> <?php endif; ?> 1</a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(2)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='2'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_2" id="i_sen_2"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_2"
                                                      id="i_sen_2"></i> <?php endif; ?> 2 </a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(3)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='3'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_3" id="i_sen_3"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_3"
                                                      id="i_sen_3"></i> <?php endif; ?> 3 </a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(4)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='4'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_4" id="i_sen_4"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_4"
                                                      id="i_sen_4"></i> <?php endif; ?> 4 </a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(5)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='5'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_5" id="i_sen_5"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_5"
                                                      id="i_sen_5"></i> <?php endif; ?> 5 </a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(6)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='6'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_6" id="i_sen_6"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_6"
                                                      id="i_sen_6"></i> <?php endif; ?> 6 </a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(7)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='7'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_7" id="i_sen_7"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_7"
                                                      id="i_sen_7"></i> <?php endif; ?> 7 </a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(8)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='8'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_8" id="i_sen_8"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_8"
                                                      id="i_sen_8"></i> <?php endif; ?> 8 </a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(9)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='9'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_9" id="i_sen_9"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_9"
                                                      id="i_sen_9"></i> <?php endif; ?> 9 </a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen(10)"> <?php if(isset($_GET['sen']) and $_GET['sen']=='10'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_10" id="i_sen_10"></i> <?php else: ?>
                                                  <i class="far fa-circle i_sen i_sen_10" id="i_sen_10"></i> <?php endif; ?> 10 </a>
                                          <a href="javascript:void(0);" class="age_item" onclick="set_sen('more')"> <?php if(isset($_GET['sen']) and $_GET['sen']=='more'): ?>
                                                  <i class=" far fa-dot-circle i_sen i_sen_more"
                                                     id="i_sen_more"></i> <?php else: ?> <i
                                                      class="far fa-circle i_sen i_sen_more"
                                                      id="i_sen_more"></i> <?php endif; ?> بیشتر از 10 </a>
                                    </div>
                                </span>
                                <span id="sen_span_check" class="span_check1"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                        (همه) <?php endif; ?></span>
                            </div>
                        <hr>
                            <div class="w100 w32  dropdown_floor">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('floor')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('floor')"
                                       class="link-title  dropbtn_floor">موقعیت طبقه</a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_floor div_drop dis_none1" id="floor_select">

                                          <a href="javascript:void(0);" class="floor_item" onclick="set_floor('up')"> <?php if(isset($_GET['floor']) and $_GET['floor']=='up'): ?>
                                                  <i class=" far fa-dot-circle i_floor i_floor_up"
                                                     id="i_floor_up"></i> <?php else: ?> <i
                                                      class="far fa-circle i_floor i_floor_up"
                                                      id="i_floor_up"></i> <?php endif; ?> طبقات بالا </a>
                                          <a href="javascript:void(0);" class="floor_item"
                                             onclick="set_floor('middle')"> <?php if(isset($_GET['floor']) and $_GET['floor']=='middle'): ?>
                                                  <i class=" far fa-dot-circle i_floor i_floor_middle"
                                                     id="i_floor_middle"></i> <?php else: ?> <i
                                                      class="far fa-circle i_floor i_floor_middle"
                                                      id="i_floor_middle"></i> <?php endif; ?> طبقات میانی </a>
                                          <a href="javascript:void(0);" class="floor_item" onclick="set_floor('down')"> <?php if(isset($_GET['floor']) and $_GET['floor']=='down'): ?>
                                                  <i class=" far fa-dot-circle i_floor i_floor_down"
                                                     id="i_floor_down"></i> <?php else: ?> <i
                                                      class="far fa-circle i_floor i_floor_down"
                                                      id="i_floor_down"></i> <?php endif; ?> طبقات پایین </a>
                                    </div>
                                </span>
                                <span id="floor_span_check" class="span_check1"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                        (همه) <?php endif; ?></span>
                            </div>
                            <div class="w100 w32  dropdown_wc">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('wc')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('wc')" class="link-title  dropbtn_wc">تعداد سرویس بهداشتی</a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_wc div_drop dis_none1" id="wc_select">

                                          <a href="javascript:void(0);" class="wc_item" onclick="set_wc(1)"> <?php if(isset($_GET['wc']) and $_GET['wc']=='1'): ?>
                                                  <i class=" far fa-dot-circle i_wc i_wc_1" id="i_wc_1"></i> <?php else: ?> <i
                                                      class="far fa-circle i_wc i_wc_1"
                                                      id="i_wc_1"></i> <?php endif; ?> 1</a>
                                          <a href="javascript:void(0);" class="wc_item" onclick="set_wc(2)"> <?php if(isset($_GET['wc']) and $_GET['wc']=='2'): ?>
                                                  <i class=" far fa-dot-circle i_wc i_wc_2" id="i_wc_2"></i> <?php else: ?> <i
                                                      class="far fa-circle i_wc i_wc_2"
                                                      id="i_wc_2"></i> <?php endif; ?> 2 </a>
                                          <a href="javascript:void(0);" class="wc_item" onclick="set_wc(3)"> <?php if(isset($_GET['wc']) and $_GET['wc']=='3'): ?>
                                                  <i class=" far fa-dot-circle i_wc i_wc_3" id="i_wc_3"></i> <?php else: ?> <i
                                                      class="far fa-circle i_wc i_wc_3"
                                                      id="i_wc_3"></i> <?php endif; ?> 3 </a>
                                          <a href="javascript:void(0);" class="wc_item" onclick="set_wc(4)"> <?php if(isset($_GET['wc']) and $_GET['wc']=='4'): ?>
                                                  <i class=" far fa-dot-circle i_wc i_wc_4" id="i_wc_4"></i> <?php else: ?> <i
                                                      class="far fa-circle i_wc i_wc_4"
                                                      id="i_wc_4"></i> <?php endif; ?> 4 </a>
                                    </div>
                                </span>
                                <span id="wc_span_check" class="span_check1"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                        (همه) <?php endif; ?></span>
                            </div>
                            <div class="w100 w32  dropdown_tras">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('tras')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('tras')"
                                       class="link-title  dropbtn_tras">دارای بالکن</a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_tras div_drop dis_none1" id="tras_select">
                                          <a href="javascript:void(0);" class="tras_item" onclick="set_tras('all')"> <?php if(isset($_GET['tras']) and $_GET['tras']=='all'): ?>
                                                  <i class=" far fa-dot-circle i_tras i_tras_all"></i> <?php elseif(\Request::route()->getName() == 'front.villas.index'): ?>
                                                  <i class="far fa-dot-circle i_tras i_tras_all"></i> <?php else: ?> <i
                                                      class="far fa-circle i_tras i_tras_all"></i> <?php endif; ?> همه</a>
                                          <a href="javascript:void(0);" class="tras_item" onclick="set_tras('yes')"> <?php if(isset($_GET['tras']) and $_GET['tras']=='yes'): ?>
                                                  <i class=" far fa-dot-circle i_tras i_tras_yes"></i> <?php else: ?> <i
                                                      class="far fa-circle i_tras i_tras_yes"></i> <?php endif; ?> بله </a>
                                          <a href="javascript:void(0);" class="tras_item" onclick="set_tras('no')"> <?php if(isset($_GET['tras']) and $_GET['tras']=='no'): ?>
                                                  <i class=" far fa-dot-circle i_tras i_tras_no"></i> <?php else: ?> <i
                                                      class="far fa-circle i_tras i_tras_no"></i> <?php endif; ?> خیر </a>
                                    </div>
                                </span>
                                <span id="tras_span_check" class="span_check1"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                        (همه) <?php endif; ?></span>

                            </div>
                        <hr>
                            <div class="w100 w32  dropdown_fernish">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('fernish')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('fernish')"
                                       class="link-title  dropbtn_fernish"> فرنیش</a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_fernish div_drop dis_none1" id="fernish_select">
                                          <a href="javascript:void(0);" class="fernish_item"
                                             onclick="set_fernish('all')"> <?php if(isset($_GET['fernish']) and $_GET['fernish']=='all'): ?>
                                                  <i class=" far fa-dot-circle i_fernish i_fernish_all"></i> <?php elseif(\Request::route()->getName() == 'front.villas.index'): ?>
                                                  <i class="far fa-dot-circle i_fernish i_fernish_all"></i> <?php else: ?> <i
                                                      class="far fa-circle i_fernish i_fernish_all"></i> <?php endif; ?> همه</a>
                                          <a href="javascript:void(0);" class="fernish_item"
                                             onclick="set_fernish('yes')"> <?php if(isset($_GET['fernish']) and $_GET['fernish']=='yes'): ?>
                                                  <i class=" far fa-dot-circle i_fernish i_fernish_yes"></i> <?php else: ?> <i
                                                      class="far fa-circle i_fernish i_fernish_yes"></i> <?php endif; ?> بله </a>
                                          <a href="javascript:void(0);" class="fernish_item"
                                             onclick="set_fernish('no')"> <?php if(isset($_GET['fernish']) and $_GET['fernish']=='no'): ?>
                                                  <i class=" far fa-dot-circle i_fernish i_fernish_no"></i> <?php else: ?> <i
                                                      class="far fa-circle i_fernish i_fernish_no"></i> <?php endif; ?> خیر </a>
                                    </div>
                                </span>
                                                    <span id="fernish_span_check" class="span_check1"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                                            (همه) <?php endif; ?></span>

                            </div>
                            <div class="w100 w32  dropdown_view">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('view')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('view')"
                                       class="link-title  dropbtn_view"> منظره </a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_view div_drop dis_none1" id="view_select">

                                          <a href="javascript:void(0);" class="view_item" onclick="set_view('sea')"> <?php if(isset($_GET['view']) and $_GET['view']=='sea'): ?>
                                                  <i class=" far fa-dot-circle i_view i_view_sea"
                                                     id="i_view_sea"></i> <?php else: ?> <i
                                                      class="far fa-circle i_view i_view_sea"
                                                      id="i_view_sea"></i> <?php endif; ?> دریا </a>
                                          <a href="javascript:void(0);" class="view_item" onclick="set_view('jungle')"> <?php if(isset($_GET['view']) and $_GET['view']=='jungle'): ?>
                                                  <i class=" far fa-dot-circle i_view i_view_jungle"
                                                     id="i_view_jungle"></i> <?php else: ?> <i
                                                      class="far fa-circle i_view i_view_jungle"
                                                      id="i_view_jungle"></i> <?php endif; ?> جنگل </a>
                                          <a href="javascript:void(0);" class="view_item" onclick="set_view('city')"> <?php if(isset($_GET['view']) and $_GET['view']=='city'): ?>
                                                  <i class=" far fa-dot-circle i_view i_view_city"
                                                     id="i_view_city"></i> <?php else: ?> <i
                                                      class="far fa-circle i_view i_view_city"
                                                      id="i_view_city"></i> <?php endif; ?> شهر </a>
                                    </div>
                                </span>
                                                    <span id="view_span_check" class="span_check1"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                                            (همه) <?php endif; ?></span>

                            </div>
                            <div class="w100 w32  dropdown_type_info">
                                <span class="nav-link span_hover">
                                    <img class="link-icon" onclick="filter('type_info')"
                                         src="<?php echo e(asset('new/img/icon/hand.png')); ?>" width="17">
                                    <a href="javascript:void(0);" onclick="filter('type_info')"
                                       class="link-title  dropbtn_type_info"> نوع ملک </a>
                                    <i class="fas fa-chevron-down dis_none1"></i>
                                     <div class="dropdown-content_type_info div_drop dis_none1" id="type_info_select">

                                          <a href="javascript:void(0);" class="type_info_item"
                                             onclick="set_type_info('1')"> <?php if(isset($_GET['type_info']) and $_GET['type_info']=='1'): ?>
                                                  <i class=" far fa-dot-circle i_type_info i_type_info_1"
                                                     id="i_type_info_1"></i> <?php else: ?> <i
                                                      class="far fa-circle i_type_info i_type_info_1"
                                                      id="i_type_info_1"></i> <?php endif; ?> دوبلکس </a>
                                          <a href="javascript:void(0);" class="type_info_item"
                                             onclick="set_type_info('2')"> <?php if(isset($_GET['type_info']) and $_GET['type_info']=='2'): ?>
                                                  <i class=" far fa-dot-circle i_type_info i_type_info_2"
                                                     id="i_type_info_2"></i> <?php else: ?> <i
                                                      class="far fa-circle i_type_info i_type_info_2"
                                                      id="i_type_info_2"></i> <?php endif; ?> باغچه کات </a>
                                          <a href="javascript:void(0);" class="type_info_item"
                                             onclick="set_type_info('3')"> <?php if(isset($_GET['type_info']) and $_GET['type_info']=='3'): ?>
                                                  <i class=" far fa-dot-circle i_type_info i_type_info_3"
                                                     id="i_type_info_3"></i> <?php else: ?> <i
                                                      class="far fa-circle i_type_info i_type_info_3"
                                                      id="i_type_info_3"></i> <?php endif; ?> تیریبلکس </a>
                                    </div>
                                </span>
                                                    <span id="type_info_span_check" class="span_check1"><?php if(\Request::route()->getName() == 'front.villas.index'): ?>
                                                            (همه) <?php endif; ?></span>

                            </div>
                        <hr>
                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 m-auto">
                            <button class="btn btn_filter" onclick="send_filter()">فیلتر</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>
    <div class="pl-4 pb-4 pr-4  mobile-no-padding">
        <div class="bg-white">
            <?php if(!isset($location)): ?>
                <ul class="nav asli">
                    <li class="nav-item dropdown_filter w50  text-center" onclick="openNavR()">
                    <span class="nav-link filter class_abs">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/filter.png')); ?>" width="17"
                             onclick="openNavR()">
                        <a href="javascript:void(0);" class="link-title dropbtn_filter" onclick="openNavR()">فیلتر</a>
                    </span>
                    </li>
                    <li class="nav-item dropdown_sort w50 text-center" onclick="filter_click(2)">
                    <span class="nav-link">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/sort.png')); ?>" width="17">
                        <a href="javascript:void(0);" class="link-title dropbtn_sort">ترتیب</a>
                        <div class="dropdown-content_sort dis_none1" id="sorts">
                            <a href="javascript:void(0);" onclick="set_sort('new')"> <?php if(isset($_GET['sort']) and $_GET['sort']=='new'): ?>
                                    <i class="far fa-dot-circle"></i> <?php elseif(\Request::route()->getName() == 'front.villas.index'): ?>
                                    <i class="far fa-dot-circle"></i> <?php else: ?> <i class="far fa-circle"></i> <?php endif; ?> جدیدترین </a>
                            <a href="javascript:void(0);" onclick="set_sort('price_down')"><?php if(isset($_GET['sort']) and $_GET['sort']=='price_down'): ?>
                                    <i class="far fa-dot-circle"></i> <?php else: ?> <i class="far fa-circle"></i> <?php endif; ?> ارزانترین</a>
                            <a href="javascript:void(0);" onclick="set_sort('price_up')"><?php if(isset($_GET['sort']) and $_GET['sort']=='price_up'): ?>
                                    <i class="far fa-dot-circle"></i> <?php else: ?> <i class="far fa-circle"></i> <?php endif; ?> گرانترین </a>
                        </div>
                    </span>
                    </li>

                </ul>
            <?php endif; ?>
            <div class="container-fluid mt-5" style="overflow:hidden;">
                <?php if(isset($location) && $location): ?>
                    <div class="row mb-5">
                        <input type="hidden" id="map_selected" value="<?php echo e($location->name); ?>">
                        <div class="col-md-12 mb-5">
                            <?php echo $__env->make('map.map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="product-slider minimal-slider">
                                <div class="swiper-container gallery-top">
                                    <div class="swiper-wrapper">
                                        <?php $__currentLoopData = $location->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="swiper-slide"
                                                 style="background-image:url(<?php echo e(url($photo->path)); ?>)"></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next swiper-button-white"></div>
                                    <div class="swiper-button-prev swiper-button-white"></div>
                                </div>
                                <div class="swiper-container gallery-thumbs">
                                    <div class="swiper-wrapper">
                                        <?php $__currentLoopData = $location->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="swiper-slide"
                                                 style="background-image:url(<?php echo e(url($photo->path)); ?>)"></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="pr-2"><?php echo e($location->name); ?></h1>
                            <?php echo $location->summary; ?>

                        </div>
                        <div class="col-md-12">
                            <hr>
                            <p>
                                <?php echo $location->body; ?>

                            </p>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <h3>ملک های یافت شده در <?php echo e($location->name); ?></h3>
                    <hr>
                <?php endif; ?>
                <?php if(!count($items)): ?>
                    <div class="no-data">
                        <svg height="512pt" viewBox="0 -12 512.00032 512" width="512pt"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m455.074219 172.613281 53.996093-53.996093c2.226563-2.222657 3.273438-5.367188 2.828126-8.480469-.441407-3.113281-2.328126-5.839844-5.085938-7.355469l-64.914062-35.644531c-4.839844-2.65625-10.917969-.886719-13.578126 3.953125-2.65625 4.84375-.890624 10.921875 3.953126 13.578125l53.234374 29.230469-46.339843 46.335937-166.667969-91.519531 46.335938-46.335938 46.839843 25.722656c4.839844 2.65625 10.921875.890626 13.578125-3.953124 2.660156-4.839844.890625-10.921876-3.953125-13.578126l-53.417969-29.335937c-3.898437-2.140625-8.742187-1.449219-11.882812 1.695313l-54 54-54-54c-3.144531-3.144532-7.988281-3.832032-11.882812-1.695313l-184.929688 101.546875c-2.757812 1.515625-4.644531 4.238281-5.085938 7.355469-.445312 3.113281.601563 6.257812 2.828126 8.480469l53.996093 53.996093-53.996093 53.992188c-2.226563 2.226562-3.273438 5.367187-2.828126 8.484375.441407 3.113281 2.328126 5.839844 5.085938 7.351562l55.882812 30.6875v102.570313c0 3.652343 1.988282 7.011719 5.1875 8.769531l184.929688 101.542969c1.5.824219 3.15625 1.234375 4.8125 1.234375s3.3125-.410156 4.8125-1.234375l184.929688-101.542969c3.199218-1.757812 5.1875-5.117188 5.1875-8.769531v-102.570313l55.882812-30.683594c2.757812-1.515624 4.644531-4.242187 5.085938-7.355468.445312-3.113282-.601563-6.257813-2.828126-8.480469zm-199.074219 90.132813-164.152344-90.136719 164.152344-90.140625 164.152344 90.140625zm-62.832031-240.367188 46.332031 46.335938-166.667969 91.519531-46.335937-46.335937zm-120.328125 162.609375 166.667968 91.519531-46.339843 46.339844-166.671875-91.519531zm358.089844 184.796875-164.929688 90.5625v-102.222656c0-5.523438-4.476562-10-10-10s-10 4.476562-10 10v102.222656l-164.929688-90.5625v-85.671875l109.046876 59.878907c1.511718.828124 3.167968 1.234374 4.808593 1.234374 2.589844 0 5.152344-1.007812 7.074219-2.929687l54-54 54 54c1.921875 1.925781 4.484375 2.929687 7.074219 2.929687 1.640625 0 3.296875-.40625 4.808593-1.234374l109.046876-59.878907zm-112.09375-46.9375-46.339844-46.34375 166.667968-91.515625 46.34375 46.335938zm0 0"/>
                            <path
                                d="m404.800781 68.175781c2.628907 0 5.199219-1.070312 7.070313-2.933593 1.859375-1.859376 2.929687-4.4375 2.929687-7.066407 0-2.632812-1.070312-5.210937-2.929687-7.070312-1.859375-1.863281-4.441406-2.929688-7.070313-2.929688-2.640625 0-5.210937 1.066407-7.070312 2.929688-1.871094 1.859375-2.929688 4.4375-2.929688 7.070312 0 2.628907 1.058594 5.207031 2.929688 7.066407 1.859375 1.863281 4.441406 2.933593 7.070312 2.933593zm0 0"/>
                            <path
                                d="m256 314.925781c-2.628906 0-5.210938 1.066407-7.070312 2.929688-1.859376 1.867187-2.929688 4.4375-2.929688 7.070312 0 2.636719 1.070312 5.207031 2.929688 7.078125 1.859374 1.859375 4.441406 2.921875 7.070312 2.921875s5.210938-1.0625 7.070312-2.921875c1.859376-1.871094 2.929688-4.441406 2.929688-7.078125 0-2.632812-1.070312-5.203125-2.929688-7.070312-1.859374-1.863281-4.441406-2.929688-7.070312-2.929688zm0 0"/>
                        </svg>
                        <p>متاسفانه چیزی یافت نشد</p>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="<?php echo e(isset($location) ? 'col-md-2' : 'col-md-3'); ?> m_bot_15">
                            <a href="<?php echo e(route('front.villas.show', $item->id)); ?>">
                                <div class="product-item <?php echo e(isset($location) ? 'product-sm' : ''); ?>">
                                    <div class="product-image">
                                        <img
                                            src="<?php echo e($item->photo? url($item->photo->path): asset('new/img/slider-1.png')); ?>">
                                        <?php if($item->tip_info==1): ?>
                                            <img src="<?php echo e(asset('new/img/icon/passport.png')); ?>"
                                                 class="img_passs img_passs1 ">
                                        <?php elseif($item->tip_info==2): ?>
                                            <img src="<?php echo e(asset('new/img/icon/kimilik.png')); ?>" class="img_passs">
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-title-1">
                                        <button class="like">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <h6><?php echo e($item->name); ?></h6>
                                        <h5><?php echo $item->brief ? $item->brief : 'بهترین پروژه'; ?> </h5>
                                        <p class="summary-price">







                                            کد <?php echo e($item->id); ?>

                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php if(isset($location) && $location): ?>
                    <h3 class="mt-5">پروژه های یافت شده در <?php echo e($location->name); ?></h3>
                    <hr>

                    <?php if(!count($projects)): ?>
                        <div class="no-data">
                            <svg height="512pt" viewBox="0 -12 512.00032 512" width="512pt"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m455.074219 172.613281 53.996093-53.996093c2.226563-2.222657 3.273438-5.367188 2.828126-8.480469-.441407-3.113281-2.328126-5.839844-5.085938-7.355469l-64.914062-35.644531c-4.839844-2.65625-10.917969-.886719-13.578126 3.953125-2.65625 4.84375-.890624 10.921875 3.953126 13.578125l53.234374 29.230469-46.339843 46.335937-166.667969-91.519531 46.335938-46.335938 46.839843 25.722656c4.839844 2.65625 10.921875.890626 13.578125-3.953124 2.660156-4.839844.890625-10.921876-3.953125-13.578126l-53.417969-29.335937c-3.898437-2.140625-8.742187-1.449219-11.882812 1.695313l-54 54-54-54c-3.144531-3.144532-7.988281-3.832032-11.882812-1.695313l-184.929688 101.546875c-2.757812 1.515625-4.644531 4.238281-5.085938 7.355469-.445312 3.113281.601563 6.257812 2.828126 8.480469l53.996093 53.996093-53.996093 53.992188c-2.226563 2.226562-3.273438 5.367187-2.828126 8.484375.441407 3.113281 2.328126 5.839844 5.085938 7.351562l55.882812 30.6875v102.570313c0 3.652343 1.988282 7.011719 5.1875 8.769531l184.929688 101.542969c1.5.824219 3.15625 1.234375 4.8125 1.234375s3.3125-.410156 4.8125-1.234375l184.929688-101.542969c3.199218-1.757812 5.1875-5.117188 5.1875-8.769531v-102.570313l55.882812-30.683594c2.757812-1.515624 4.644531-4.242187 5.085938-7.355468.445312-3.113282-.601563-6.257813-2.828126-8.480469zm-199.074219 90.132813-164.152344-90.136719 164.152344-90.140625 164.152344 90.140625zm-62.832031-240.367188 46.332031 46.335938-166.667969 91.519531-46.335937-46.335937zm-120.328125 162.609375 166.667968 91.519531-46.339843 46.339844-166.671875-91.519531zm358.089844 184.796875-164.929688 90.5625v-102.222656c0-5.523438-4.476562-10-10-10s-10 4.476562-10 10v102.222656l-164.929688-90.5625v-85.671875l109.046876 59.878907c1.511718.828124 3.167968 1.234374 4.808593 1.234374 2.589844 0 5.152344-1.007812 7.074219-2.929687l54-54 54 54c1.921875 1.925781 4.484375 2.929687 7.074219 2.929687 1.640625 0 3.296875-.40625 4.808593-1.234374l109.046876-59.878907zm-112.09375-46.9375-46.339844-46.34375 166.667968-91.515625 46.34375 46.335938zm0 0"/>
                                <path
                                    d="m404.800781 68.175781c2.628907 0 5.199219-1.070312 7.070313-2.933593 1.859375-1.859376 2.929687-4.4375 2.929687-7.066407 0-2.632812-1.070312-5.210937-2.929687-7.070312-1.859375-1.863281-4.441406-2.929688-7.070313-2.929688-2.640625 0-5.210937 1.066407-7.070312 2.929688-1.871094 1.859375-2.929688 4.4375-2.929688 7.070312 0 2.628907 1.058594 5.207031 2.929688 7.066407 1.859375 1.863281 4.441406 2.933593 7.070312 2.933593zm0 0"/>
                                <path
                                    d="m256 314.925781c-2.628906 0-5.210938 1.066407-7.070312 2.929688-1.859376 1.867187-2.929688 4.4375-2.929688 7.070312 0 2.636719 1.070312 5.207031 2.929688 7.078125 1.859374 1.859375 4.441406 2.921875 7.070312 2.921875s5.210938-1.0625 7.070312-2.921875c1.859376-1.871094 2.929688-4.441406 2.929688-7.078125 0-2.632812-1.070312-5.203125-2.929688-7.070312-1.859374-1.863281-4.441406-2.929688-7.070312-2.929688zm0 0"/>
                            </svg>
                            <p>متاسفانه چیزی یافت نشد</p>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 m_bot_15">
                                <a href="<?php echo e(route('front.projects.show', $project->slug)); ?>">
                                    <div class="project-item">
                                        <div class="project-image">
                                            <?php if(count($project->photos)>0): ?>
                                                
                                                <img style='--i: 1' src="<?php echo e(url($project->photos[0]->path)); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('new/img/slider-1.png')); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="project-title-1">
                                            <button class="like">
                                                <i class="far fa-heart"></i>
                                            </button>
                                            <h6><span><?php echo e($project->name); ?></span>
                                                <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="gear-icon">
                                            </h6>
                                            <h5><?php echo $project->brief ? $project->brief : 'بهترین پروژه'; ?> </h5>
                                            <p class="summary-price">
                                                <?php if($project->price): ?>
                                                    شروع قیمت از
                                                    <span class="price"><?php echo e(number_format($project->price)); ?></span>
                                                    لیر
                                                <?php else: ?>
                                                    تماس بگیرید
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="paginate p-3">
            <?php echo e($items->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var i_arr = 0;
        var filter_sort = <?php if(isset($_GET['sort'])): ?> '<?php echo e($_GET['sort']); ?>'
        <?php else: ?> 'new' <?php endif; ?>;
        var filter_city = <?php if(isset($_GET['city'])): ?> '<?php echo e($_GET['city']); ?>'
        <?php else: ?> 0 <?php endif; ?>;
        var filter_locate = <?php if(isset($_GET['location'])): ?> '<?php echo e($_GET['location']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_locate_v = <?php if(isset($_GET['location'])): ?> '<?php echo e($_GET['location']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_arr = <?php if(isset($_GET['district'])): ?> '<?php echo e($_GET['district']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_arr_v = <?php if(isset($_GET['district'])): ?> '<?php echo e($_GET['district']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_price_down = <?php if(isset($_GET['price_down'])): ?> '<?php echo e($_GET['price_down']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_price_up = <?php if(isset($_GET['price_up'])): ?> '<?php echo e($_GET['price_up']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_type_price = <?php if(isset($_GET['type_price'])): ?> '<?php echo e($_GET['type_price']); ?>'
        <?php else: ?> 'lir' <?php endif; ?>;
        var filter_cat = <?php if(isset($type)): ?> '<?php echo e($type); ?>'
        <?php elseif(isset($_GET['cat'])): ?> '<?php echo e($_GET['cat']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_salon = <?php if(isset($_GET['salon'])): ?> '<?php echo e($_GET['salon']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_khab = <?php if(isset($_GET['khab'])): ?> '<?php echo e($_GET['khab']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_sen = <?php if(isset($_GET['sen'])): ?> '<?php echo e($_GET['sen']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_floor = <?php if(isset($_GET['floor'])): ?> '<?php echo e($_GET['floor']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_wc = <?php if(isset($_GET['wc'])): ?> '<?php echo e($_GET['wc']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_tras = <?php if(isset($_GET['tras'])): ?> '<?php echo e($_GET['tras']); ?>'
        <?php else: ?> 'all' <?php endif; ?>;
        var filter_fernish = <?php if(isset($_GET['fernish'])): ?> '<?php echo e($_GET['fernish']); ?>'
        <?php else: ?> 'all' <?php endif; ?>;
        var filter_view = <?php if(isset($_GET['view'])): ?> '<?php echo e($_GET['view']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_type_info = <?php if(isset($_GET['type_info'])): ?> '<?php echo e($_GET['type_info']); ?>'
        <?php else: ?> '' <?php endif; ?>;
        var filter_tip_info = <?php if(isset($_GET['tip_info'])): ?> '<?php echo e($_GET['tip_info']); ?>'
        <?php else: ?> 'all' <?php endif; ?>;

        // menu filter mobile
        function openNavR() {
            if ($(window).width() <= 768) {
                document.getElementById("mySidenavR").style.width = "100%";
            } else {
                document.getElementById("mySidenavR").style.width = "100%";
                // document.getElementById("mySidenavR").style.height = "auto";
            }
        }

        function closeNavR() {
            document.getElementById("mySidenavR").style.width = "0";
        }

        var specifiedElement = document.getElementById('mySidenavR');


        // filter mobile
        function filter(a) {

            if ($('#' + a + '_select').hasClass("dis_none1")) {
                if (a != 'type_price') {
                    let div_drop = '.div_drop';
                    let fa_drop = '.fa-chevron-down';
                    $(div_drop).addClass('dis_none1');
                    $(fa_drop).addClass('dis_none1');
                }

                $('#' + a + '_select').removeClass('dis_none1');
                if (a != 'price') {
                    $('.dropdown_' + a + ' .fa-chevron-down').removeClass('dis_none1');
                }
            } else {
                $('#' + a + '_select').addClass('dis_none1');
                if (a != 'price') {
                    $('.dropdown_' + a + ' .fa-chevron-down').addClass('dis_none1');
                }
            }
        }

        //set_filter
        function set_sort(a) {
            $('#spinner_id').removeClass('dis_none');
            filter_sort = a;
            var url = '<?php echo e(route('front.villas.filter',$type!=null?$type:'')); ?>'
                + '?sort=' + filter_sort + '&city=' + filter_city
                + '&location=' + filter_locate + '&district=' + filter_arr
                + '&price_down=' + filter_price_down + '&price_up=' + filter_price_up
                + '&type_price=' + filter_type_price + '&cat=' + filter_cat
                + '&salon=' + filter_salon + '&khab=' + filter_khab
                + '&sen=' + filter_sen + '&floor=' + filter_floor
                + '&wc=' + filter_wc + '&tras=' + filter_tras
                + '&fernish=' + filter_fernish + '&view=' + filter_view
                + '&type_info=' + filter_type_info + '&tip_info=' + filter_tip_info;
            location.href = url;
        }

        function send_filter(a) {
            $('#spinner_id').removeClass('dis_none');
            filter_price_down = $('#price_down').val();
            filter_price_up = $('#price_up').val();
            var url = '<?php echo e(route('front.villas.filter',$type)); ?>'
                + '?sort=' + filter_sort + '&city=' + filter_city
                + '&location=' + filter_locate + '&district=' + filter_arr
                + '&price_down=' + filter_price_down + '&price_up=' + filter_price_up
                + '&type_price=' + filter_type_price + '&cat=' + filter_cat
                + '&salon=' + filter_salon + '&khab=' + filter_khab
                + '&sen=' + filter_sen + '&floor=' + filter_floor
                + '&wc=' + filter_wc + '&tras=' + filter_tras
                + '&fernish=' + filter_fernish + '&view=' + filter_view
                + '&type_info=' + filter_type_info + '&tip_info=' + filter_tip_info;
            location.href = url;
        }

        function set_city(a, b) {
            filter_city = a;
            filter_locate = '';
            filter_arr = '';
            if (a == 0) {
                let locate_set = '.a_locate';
                let locate_set_i = '.i_locate';

                $(locate_set).removeClass('dis_none');

                // $(locate_set_i).removeClass('fa-dot-circle');
                // $(locate_set_i).addClass('fa-circle');

                $('.i_city').removeClass('fa-dot-circle');
                $('.i_city').addClass('fa-circle');

                $('.i_city_' + a).removeClass('fa-circle');
                $('.i_city_' + a).addClass('fa-dot-circle');
            } else {
                var test = $('#i_city_' + a).hasClass("fa-circle");
                if (test == true) {
                    let locate_set_i = '.i_locate';
                    $('.a_arr ').addClass('dis_none');
                    filter_locate = '';
                    filter_arr = '';

                    $(locate_set_i).removeClass('fa-dot-circle');
                    $(locate_set_i).addClass('fa-circle');
                }

                let locate_set = '.a_locate_' + a;

                $('.a_locate').addClass('dis_none');
                $(locate_set).removeClass('dis_none');


                $('.i_city').removeClass('fa-dot-circle');
                $('.i_city').addClass('fa-circle');

                $('.i_city_' + a).removeClass('fa-circle');
                $('.i_city_' + a).addClass('fa-dot-circle');
            }
            filter_city = a;
            $('#city_span_check').html('(' + b + ')')
            $('.dropdown-content_city').addClass('dis_none1')
        }

        $('#locate_select .a_locate').click(function () {
            if ($(this).find('i').hasClass('fa-circle')) {
                $(this).find('i').removeClass('fa-circle')
                $(this).find('i').addClass('fa-dot-circle')
            } else {
                $(this).find('i').removeClass('fa-dot-circle')
                $(this).find('i').addClass('fa-circle')
            }
        })

        function set_locate(a, b) {
            if (filter_locate == null || filter_locate == '') {
                filter_locate = filter_locate + a;
            } else {
                var res = filter_locate.split(",");
                var val_t = 0;
                filter_locate = ''
                $.each(res, function (key, value) {
                    if (value == a) {
                        val_t = 1;
                    } else {
                        if (filter_locate == null || filter_locate == '') {
                            filter_locate = filter_locate + value;
                        } else {
                            filter_locate = filter_locate + ',' + value;
                        }
                    }
                });
                if (val_t == 0) {
                    if (filter_locate == null || filter_locate == '') {
                        filter_locate = filter_locate + a;
                    } else {
                        filter_locate = filter_locate + ',' + a;
                    }
                }
            }

            var test = $('#locate_id_' + a).hasClass("fa-circle");
            if (test == true) {

                let arr_set = '.a_arr_' + a;
                if (i_arr == 0) {
                    $('.a_arr').addClass('dis_none');
                }
                $(arr_set).removeClass('dis_none');
                i_arr++;
            }
            if (test == false) {
                var item_val = a;
                if (filter_arr == null || filter_arr == '') {
                } else {
                    var res = filter_arr.split(",");
                    var val_a = 0;
                    filter_arr = ''
                    $.each(res, function (key, value) {
                        var val_loc = value.split("_");
                        if (val_loc[1] == item_val) {
                            val_a = 1;
                        } else {
                            if (filter_arr == null || filter_arr == '') {
                                filter_arr = filter_arr + value;
                            } else {
                                filter_arr = filter_arr + ',' + value;
                            }
                        }
                    });
                }

                let arr_set = '.a_arr_' + a;
                $(arr_set).addClass('dis_none');

                i_arr--;
                if (i_arr == 0) {
                    $('.arr_a').removeClass('dis_none');
                }
            }

            if (filter_locate_v == null || filter_locate_v == '') {
                filter_locate_v = filter_locate_v + b;
            } else {
                var res = filter_locate_v.split(",");
                var val_t = 0;
                filter_locate_v = ''
                $.each(res, function (key, value) {
                    if (value == a) {
                        val_t = 1;
                    } else {
                        if (filter_locate_v == null || filter_locate_v == '') {
                            filter_locate_v = filter_locate_v + value;
                        } else {
                            filter_locate_v = filter_locate_v + ',' + value;
                        }
                    }
                });
                if (val_t == 0) {
                    if (filter_locate_v == null || filter_locate_v == '') {
                        filter_locate_v = filter_locate_v + a;
                    } else {
                        filter_locate_v = filter_locate_v + ',' + a;
                    }
                }
            }

            var test = $('#locate_id_' + a).hasClass("fa-circle");
            if (test == true) {

                let arr_set = '.a_arr_' + a;
                if (i_arr == 0) {
                    $('.a_arr').addClass('dis_none');
                }
                $(arr_set).removeClass('dis_none');
                i_arr++;
            }
            if (test == false) {
                var item_val = a;
                if (filter_arr_v == null || filter_arr_v == '') {
                } else {
                    var res = filter_arr_v.split(",");
                    var val_a = 0;
                    filter_arr_v = ''
                    $.each(res, function (key, value) {
                        var val_loc = value.split("_");
                        if (val_loc[1] == item_val) {
                            val_a = 1;
                        } else {
                            if (filter_arr_v == null || filter_arr_v == '') {
                                filter_arr_v = filter_arr_v + value;
                            } else {
                                filter_arr_v = filter_arr_v + ',' + value;
                            }
                        }
                    });
                }

                let arr_set = '.a_arr_' + a;
                $(arr_set).addClass('dis_none');

                i_arr--;
                if (i_arr == 0) {
                    $('.arr_a').removeClass('dis_none');
                }

            }
        }

        function set_arr(a, b, c) {
            var item_val = b + '_' + c;
            if (filter_arr == null || filter_arr == '') {
                filter_arr = filter_arr + item_val;
            } else {
                var res = filter_arr.split(",");
                var val_a = 0;
                filter_arr = ''
                $.each(res, function (key, value) {
                    if (value == item_val) {
                        val_a = 1;
                    } else {
                        if (filter_arr == null || filter_arr == '') {
                            filter_arr = filter_arr + value;
                        } else {
                            filter_arr = filter_arr + ',' + value;
                        }
                    }
                });
                if (val_a == 0) {
                    if (filter_arr == null || filter_arr == '') {
                        filter_arr = filter_arr + item_val;
                    } else {
                        filter_arr = filter_arr + ',' + item_val;
                    }
                }
            }
            var test = $('#arr_id_' + a).hasClass("fa-circle");
            if (test == true) {
                $('.i_arr_' + a).removeClass('fa-circle');
                $('.i_arr_' + a).addClass('fa-dot-circle');
            }
            if (test == false) {
                $('.i_arr_' + a).removeClass('fa-dot-circle');
                $('.i_arr_' + a).addClass('fa-circle');
            }
        }

        function set_price_down() {
            var a = $('#price_down').val();
            if (a.length > 0) {
                $('.type_price_note_down').removeClass('dis_none')
            } else {
                $('.type_price_note_down').addClass('dis_none')
            }
            $('#price_down').val(function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        }

        function set_price_up() {
            var a = $('#price_up').val();
            if (a.length > 0) {
                $('.type_price_note_up').removeClass('dis_none')
            } else {
                $('.type_price_note_up').addClass('dis_none')
            }
            $('#price_up').val(function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        }

        function set_type_price(a) {
            if (a == 'lir') {
                $('.type_price_note_down').empty();
                $('.type_price_note_down').append('لیر');
                $('.type_price_note_up').empty();
                $('.type_price_note_up').append('لیر');
            }
            if (a == 'dolar') {
                $('.type_price_note_down').empty();
                $('.type_price_note_down').append('دلار');
                $('.type_price_note_up').empty();
                $('.type_price_note_up').append('دلار');
            }
            if (a == 'rial') {
                $('.type_price_note_down').empty();
                $('.type_price_note_down').append('ریال');
                $('.type_price_note_up').empty();
                $('.type_price_note_up').append('ریال');
            }
            if (a == 'euro') {
                $('.type_price_note_down').empty();
                $('.type_price_note_down').append('یورو');
                $('.type_price_note_up').empty();
                $('.type_price_note_up').append('یورو');
            }
            $('.i_type_price').removeClass('fa-dot-circle')
            $('.i_type_price').addClass('fa-circle')
            $('.i_type_price_' + a).removeClass('fa-circle')
            $('.i_type_price_' + a).addClass('fa-dot-circle')
            filter_type_price = a;

            $('.dropdown-content_type_price').addClass('dis_none1')
        }

        function set_cat(a) {
            $('.i_cat').removeClass('fa-dot-circle')
            $('.i_cat').addClass('fa-circle')
            $('.i_cat_' + a).removeClass('fa-circle')
            $('.i_cat_' + a).addClass('fa-dot-circle')
            filter_cat = a;

            $('.dropdown-content_cat').addClass('dis_none1')
        }

        function set_salon(a) {
            var test = $('#i_salon_' + a).hasClass("fa-circle");
            if (test == true) {
                $('.i_salon_' + a).removeClass('fa-circle');
                $('.i_salon_' + a).addClass('fa-dot-circle');
            }
            if (test == false) {
                $('.i_salon_' + a).addClass('fa-circle');
                $('.i_salon_' + a).removeClass('fa-dot-circle');
            }
            if (filter_salon == null || filter_salon == '') {
                filter_salon = filter_salon + a;
            } else {
                var res = filter_salon.split(",");
                var val_t = 0;
                filter_salon = ''
                $.each(res, function (key, value) {
                    if (value == a) {
                        val_t = 1;
                    } else {
                        if (filter_salon == null || filter_salon == '') {
                            filter_salon = filter_salon + value;
                        } else {
                            filter_salon = filter_salon + ',' + value;
                        }
                    }
                });
                if (val_t == 0) {
                    if (filter_salon == null || filter_salon == '') {
                        filter_salon = filter_salon + a;
                    } else {
                        filter_salon = filter_salon + ',' + a;
                    }
                }
            }
        }

        function set_khab(a) {
            var test = $('#i_khab_' + a).hasClass("fa-circle");
            if (test == true) {
                $('.i_khab_' + a).removeClass('fa-circle');
                $('.i_khab_' + a).addClass('fa-dot-circle');
            }
            if (test == false) {
                $('.i_khab_' + a).addClass('fa-circle');
                $('.i_khab_' + a).removeClass('fa-dot-circle');
            }
            if (filter_khab == null || filter_khab == '') {
                filter_khab = filter_khab + a;
            } else {
                var res = filter_khab.split(",");
                var val_t = 0;
                filter_khab = ''
                $.each(res, function (key, value) {
                    if (value == a) {
                        val_t = 1;
                    } else {
                        if (filter_khab == null || filter_khab == '') {
                            filter_khab = filter_khab + value;
                        } else {
                            filter_khab = filter_khab + ',' + value;
                        }
                    }
                });
                if (val_t == 0) {
                    if (filter_khab == null || filter_khab == '') {
                        filter_khab = filter_khab + a;
                    } else {
                        filter_khab = filter_khab + ',' + a;
                    }
                }
            }
        }

        function set_sen(a) {
            var test = $('#i_sen_' + a).hasClass("fa-circle");
            if (test == true) {
                $('.i_sen_' + a).removeClass('fa-circle');
                $('.i_sen_' + a).addClass('fa-dot-circle');
            }
            if (test == false) {
                $('.i_sen_' + a).addClass('fa-circle');
                $('.i_sen_' + a).removeClass('fa-dot-circle');
            }
            if (filter_sen == null || filter_sen == '') {
                filter_sen = filter_sen + a;
            } else {
                var res = filter_sen.split(",");
                var val_t = 0;
                filter_sen = ''
                $.each(res, function (key, value) {
                    if (value == a) {
                        val_t = 1;
                    } else {
                        if (filter_sen == null || filter_sen == '') {
                            filter_sen = filter_sen + value;
                        } else {
                            filter_sen = filter_sen + ',' + value;
                        }
                    }
                });
                if (val_t == 0) {
                    if (filter_sen == null || filter_sen == '') {
                        filter_sen = filter_sen + a;
                    } else {
                        filter_sen = filter_sen + ',' + a;
                    }
                }
            }
        }

        function set_floor(a) {
            var test = $('#i_floor_' + a).hasClass("fa-circle");
            if (test == true) {
                $('.i_floor_' + a).removeClass('fa-circle');
                $('.i_floor_' + a).addClass('fa-dot-circle');
            }
            if (test == false) {
                $('.i_floor_' + a).addClass('fa-circle');
                $('.i_floor_' + a).removeClass('fa-dot-circle');
            }
            if (filter_floor == null || filter_floor == '') {
                filter_floor = filter_floor + a;
            } else {
                var res = filter_floor.split(",");
                var val_t = 0;
                filter_floor = ''
                $.each(res, function (key, value) {
                    if (value == a) {
                        val_t = 1;
                    } else {
                        if (filter_floor == null || filter_floor == '') {
                            filter_floor = filter_floor + value;
                        } else {
                            filter_floor = filter_floor + ',' + value;
                        }
                    }
                });
                if (val_t == 0) {
                    if (filter_floor == null || filter_floor == '') {
                        filter_floor = filter_floor + a;
                    } else {
                        filter_floor = filter_floor + ',' + a;
                    }
                }
            }
        }

        function set_wc(a) {
            var test = $('#i_wc_' + a).hasClass("fa-circle");
            if (test == true) {
                $('.i_wc_' + a).removeClass('fa-circle');
                $('.i_wc_' + a).addClass('fa-dot-circle');
            }
            if (test == false) {
                $('.i_wc_' + a).addClass('fa-circle');
                $('.i_wc_' + a).removeClass('fa-dot-circle');
            }
            if (filter_wc == null || filter_wc == '') {
                filter_wc = filter_wc + a;
            } else {
                var res = filter_wc.split(",");
                var val_t = 0;
                filter_wc = ''
                $.each(res, function (key, value) {
                    if (value == a) {
                        val_t = 1;
                    } else {
                        if (filter_wc == null || filter_wc == '') {
                            filter_wc = filter_wc + value;
                        } else {
                            filter_wc = filter_wc + ',' + value;
                        }
                    }
                });
                if (val_t == 0) {
                    if (filter_wc == null || filter_wc == '') {
                        filter_wc = filter_wc + a;
                    } else {
                        filter_wc = filter_wc + ',' + a;
                    }
                }
            }
        }

        function set_tras(a) {
            $('.i_tras').removeClass('fa-dot-circle')
            $('.i_tras').addClass('fa-circle')
            $('.i_tras_' + a).removeClass('fa-circle')
            $('.i_tras_' + a).addClass('fa-dot-circle')
            filter_tras = a;

            $('.dropdown-content_tras').addClass('dis_none1')
        }

        function set_fernish(a) {
            $('.i_fernish').removeClass('fa-dot-circle')
            $('.i_fernish').addClass('fa-circle')
            $('.i_fernish_' + a).removeClass('fa-circle')
            $('.i_fernish_' + a).addClass('fa-dot-circle')
            filter_fernish = a;

            $('.dropdown-content_fernish').addClass('dis_none1')
        }

        function set_view(a) {
            var test = $('#i_view_' + a).hasClass("fa-circle");
            if (test == true) {
                $('.i_view_' + a).removeClass('fa-circle');
                $('.i_view_' + a).addClass('fa-dot-circle');
            }
            if (test == false) {
                $('.i_view_' + a).addClass('fa-circle');
                $('.i_view_' + a).removeClass('fa-dot-circle');
            }
            if (filter_view == null || filter_view == '') {
                filter_view = filter_view + a;
            } else {
                var res = filter_view.split(",");
                var val_t = 0;
                filter_view = ''
                $.each(res, function (key, value) {
                    if (value == a) {
                        val_t = 1;
                    } else {
                        if (filter_view == null || filter_view == '') {
                            filter_view = filter_view + value;
                        } else {
                            filter_view = filter_view + ',' + value;
                        }
                    }
                });
                if (val_t == 0) {
                    if (filter_view == null || filter_view == '') {
                        filter_view = filter_view + a;
                    } else {
                        filter_view = filter_view + ',' + a;
                    }
                }
            }
        }

        function set_type_info(a) {
            var test = $('#i_type_info_' + a).hasClass("fa-circle");
            if (test == true) {
                $('.i_type_info_' + a).removeClass('fa-circle');
                $('.i_type_info_' + a).addClass('fa-dot-circle');
            }
            if (test == false) {
                $('.i_type_info_' + a).addClass('fa-circle');
                $('.i_type_info_' + a).removeClass('fa-dot-circle');
            }
            if (filter_type_info == null || filter_type_info == '') {
                filter_type_info = filter_type_info + a;
            } else {
                var res = filter_type_info.split(",");
                var val_t = 0;
                filter_type_info = ''
                $.each(res, function (key, value) {
                    if (value == a) {
                        val_t = 1;
                    } else {
                        if (filter_type_info == null || filter_type_info == '') {
                            filter_type_info = filter_type_info + value;
                        } else {
                            filter_type_info = filter_type_info + ',' + value;
                        }
                    }
                });
                if (val_t == 0) {
                    if (filter_type_info == null || filter_type_info == '') {
                        filter_type_info = filter_type_info + a;
                    } else {
                        filter_type_info = filter_type_info + ',' + a;
                    }
                }
            }
        }

        function set_tip_info(a) {
            $('.i_tip_info').removeClass('fa-dot-circle')
            $('.i_tip_info').addClass('fa-circle')
            $('.i_tip_info_' + a).removeClass('fa-circle')
            $('.i_tip_info_' + a).addClass('fa-dot-circle')
            filter_tip_info = a;
            $('.dropdown-content_tip_info').addClass('dis_none1')
        }

        filter

        function filter_click(a) {
            if (a == 1) {
                if (!$('#sorts').hasClass("dis_none1")) {
                    $('.dropdown-content_sort').addClass('dis_none1');
                }
                if ($('#filters').hasClass("dis_none1")) {
                    $('.dropdown-content_filter').removeClass('dis_none1');
                } else {
                    $('.dropdown-content_filter').addClass('dis_none1');
                }
            }
            if (a == 2) {
                if (!$('#filters').hasClass("dis_none1")) {
                    $('.dropdown-content_filter').addClass('dis_none1');
                }
                if ($('#sorts').hasClass("dis_none1")) {
                    $('.dropdown-content_sort').removeClass('dis_none1');
                } else {
                    $('.dropdown-content_sort').addClass('dis_none1');
                }
            }

        }

        $(document).click(function (e) {
            if (!$(e.target).hasClass('nav-item') && !$(e.target).parents().hasClass('nav-item')) {
                $('.div_drop').addClass('dis_none1')
            }
        });

        multi_selection('a_locate', $('#locate_span_check'))
        multi_selection('a_arr', $('#arr_span_check'))
        multi_selection('property_type_item', $('#tip_info_span_check'))
        multi_selection('price_type_item', $('#price_span_check'))
        multi_selection('category_item', $('#cat_span_check'))
        multi_selection('salon_item', $('#salon_span_check'))
        multi_selection('sleep_item', $('#khab_span_check'))
        multi_selection('age_item', $('#sen_span_check'))
        multi_selection('floor_item', $('#floor_span_check'))
        multi_selection('wc_item', $('#wc_span_check'))
        multi_selection('tras_item', $('#tras_span_check'))
        multi_selection('fernish_item', $('#fernish_span_check'))
        multi_selection('view_item', $('#view_span_check'))
        multi_selection('type_info_item', $('#type_info_span_check'))

        function multi_selection(class_name, span) {
            $(`.${class_name}`).click(function () {
                let selectedLocales = detect_locales(class_name)
                if (selectedLocales.length > 0) {
                    span.text(selectedLocales.join())
                } else {
                    span.text('(همه)')
                }
            })
        }


        function detect_locales(class_name) {
            let arr = [];
            $(`.${class_name} .fa-dot-circle`).each(function () {
                let name = $(this).parent().text()
                name = name.trim()
                arr.push(name)
            })

            return arr;
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>