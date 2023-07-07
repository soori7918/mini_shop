<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <meta name="base-url" content="<?php echo e(url('/')); ?>"/>
    <title>vandidad Admin Panel</title>
    <!--favicon-->
    <link rel="icon"
          href="<?php echo e(url('assets/user/pic/logo.png')); ?>"
          type="image/x-icon">
    <!-- Vector CSS -->
    <link href="<?php echo e(url('assets/admin/css/jquery-jvectormap-2.css')); ?>" rel="stylesheet">
    <!-- simplebar CSS-->
    <link href="<?php echo e(url('assets/admin/css/simplebar.css')); ?>" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="<?php echo e(url('assets/admin/css/bootstrap.css')); ?>" rel="stylesheet">
    <!-- animate CSS-->
    <link href="<?php echo e(url('assets/admin/css/animate.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Icons CSS-->
    <link href="<?php echo e(url('assets/admin/css/icons.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Metismenu CSS-->
    <link href="<?php echo e(url('assets/admin/css/metisMenu.css?v=').time()); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('assets/admin/css/jquery-ui.css')); ?>">
    <!-- Chosen css -->
    <link rel="stylesheet" href="<?php echo e(url('assets/admin/chosen/css.css')); ?>">
    <!-- Custom Style-->
    <link href="<?php echo e(url('assets/admin/css/app-style.css?v=').time()); ?>" rel="stylesheet">
    <link href="<?php echo e(url('assets/admin/css/fonts.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/admin/css/jgrowl.min.css')); ?>"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <style type="text/css">/* Chart.js */
        .chosen-single{
            background: #8694ce!important;
        }
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes  chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
        .dd {
            position: relative;
            display: block;
            margin: 1rem auto;
            padding: 0;
            max-width: 480px;
            list-style: none;
            font-size: 13px;
            line-height: 20px;
        }

        .dd-list {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .dd-list .dd-list {
            padding-right: 30px;
        }

        .dd-collapsed .dd-list {
            display: none;
        }

        .dd-item,
        .dd-empty,
        .dd-placeholder {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            min-height: 20px;
            font-size: 13px;
            line-height: 20px;
        }

        .dd-handle {
            display: block;
            margin: 5px 0;
            padding: 10px 10px;
            text-decoration: none;
            border: 1px solid #ebebeb;
            background: #fff;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            color: #000;
        }

        .dd-handle:hover {
            background: #fff;
        }

        .dd-item > button {
            display: block;
            position: relative;
            cursor: pointer;
            float: right;
            width: 25px;
            height: 30px;
            margin: 5px 0;
            padding: 0;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 0;
            background: transparent;
            font-size: 12px;
            line-height: 1;
            text-align: center;
            font-weight: bold;
        }

        .dd-item > button:before {
            content: '+';
            display: block;
            position: absolute;
            width: 100%;
            text-align: center;
            text-indent: 0;
        }

        .dd-item > button[data-action="collapse"]:before {
            content: '-';
        }

        .dd-placeholder,
        .dd-empty {
            margin: 5px 0;
            padding: 0;
            min-height: 30px;
            background: #f2fbff;
            border: 1px dashed #b6bcbf;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .dd-empty {
            border: 1px dashed #bbb;
            min-height: 100px;
            background-color: #e5e5e5;
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
        }

        .dd-dragel {
            position: absolute;
            pointer-events: none;
            z-index: 9999;
        }

        .dd-dragel > .dd-item .dd-handle {
            margin-top: 0;
        }

        .dd-dragel .dd-handle {
            -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
            box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
        }
        .dd-item .btn-inline {
            float: left;
            position: relative;
            z-index: 9999;
            margin: -40px 0 0 10px;
        }
    </style>
    <style type="text/css">.jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            box-sizing: content-box;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
    </style>
    <?php echo $__env->yieldPushContent('stylesheets'); ?>
    <style>
        .archive-card-header {
            text-align: center;
        }

        .archive-card-header h2 {
            color: #fff !important;
        }

        .archive-table {
            width: 100%;
        }

        .content-wrapper {
            min-height: 100vh;
        }

        .btn-inline {
            display: flex;
            padding-top: 30px;
        }

        .btn-inline a.btn {
            margin-bottom: 30px;
        }

        td {
            padding: 5px;
        }

        /*.col-md-6 button[type="submit"] {*/
        /*    color: #fff;*/
        /*    background-color: #7934f3;*/
        /*    border-color: #7934f3;*/
        /*    font-size: .70rem;*/
        /*    font-weight: 500;*/
        /*    letter-spacing: 1px;*/
        /*    padding: 9px 19px;*/
        /*    border-radius: .25rem;*/
        /*    text-transform: uppercase;*/
        /*    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);*/
        /*}*/

        .table-responsive form {
            margin-bottom: 30px;
        }

        .dropdown-menu.show ul {
            display: block !important;
        }

        .dropdown-menu.show ul a {
            display: block;
        }

        .bootstrap-select.btn-group .dropdown-menu li {
            text-align: right;
        }

        .bootstrap-select.btn-group .dropdown-toggle .filter-option {
            text-align: center;
        }

        .custom-file {
            text-align: left;
        }
    </style>
    <style>
        body
        {
            overflow-x: hidden;
        }
        .select2-container
        {
            width: 100% !important;
        }
        .select2-results__option
        {
            color: #666!important;
        }
        .select2-container .select2-search--inline .select2-search__field
        {
            position: relative;
            top: -20px!important;
            margin-top: unset!important;
        }
        .select2-results__option--disabled
        {
            background: rgba(122,122,122,0.36);
        }
    </style>



</head>

<body class="bg-theme bg-theme1  pace-done">








<!-- Start wrapper-->
<div id="wrapper" class="toggled">

    <style>
        .userIdConrainer {
            position: fixed;
            left: 96px;
            bottom: 6px;
            width: 250px;
            height: 36px;
            z-index: 100000;
            cursor: pointer;
        }
        #userId {
            position: fixed;
            bottom: 8px;
            left: 96px;
            background: #2ab27b;
            background-image: none;
            border-radius: 3px;
            background-image: linear-gradient(230deg, #759bff, #843cf6);
            z-index: 1;
            color: #fff;
            padding: 3px 10px;
            padding-left: 10px;
            line-height: 30px;
            padding-right: 35px;
        }
        .userIdIcon {
            font-size: 20px;
            position: absolute;
            right: 5px;
            bottom: 8px;
        }
    </style>
    <?php if(session()->has('user_id')): ?>
    <div class="userIdConrainer" onclick="window.open('<?php echo e(route('user-sign-in-back',session('user_id'))); ?>','_parent')">
        <span id="userId">
            بازگشت به اکانت مدیریت
            <i class="fa fa-sign-out fa-2x userIdIcon"></i>
        </span>
    </div>
    <?php endif; ?>
    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="init" data-simplebar-auto-hide="true" class="mm-active">
        <div class="simplebar-track vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="visibility: visible; top: 81px; height: 240px;"></div>
        </div>
        <div class="simplebar-track horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar"></div>
        </div>
        <div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
            <div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">

                <div class="brand-logo" style="cursor: pointer">
                    <img onclick="window.open('<?php echo e(route('user.index')); ?>','_blank')" src="<?php echo e(url('assets/user/pic/logo.png')); ?>" class="logo-icon h-100 full" alt="logo icon">
                    <img onclick="window.open('<?php echo e(route('user.index')); ?>','_blank')" src="<?php echo e(url('assets/user/pic/logo.png')); ?>" class="logo-icon h-100 mini" alt="logo icon">
                    <h5 class="logo-text"> مدیریت</h5>
                    <div class="close-btn"><i class="zmdi zmdi-close"></i></div>
                </div>

                <ul class="metismenu mm-show" id="menu">






                    <?php if(auth()->check() && auth()->user()->hasRole('call center')): ?>
                        <li class="" hidden>
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">مدیریت کاربری</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('user-list')); ?>?type=customers"><i class="zmdi zmdi-dot-circle-alt"></i> لیست زیر مجموعه من</a></li>
                                <li><a href="<?php echo e(route('user-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست مشتریان</a></li>
                                <li><a href="<?php echo e(route('user-list')); ?>?removed=true"><i class="zmdi zmdi-dot-circle-alt"></i> لیست مشتریان حذف شده</a></li>
                                <li><a href="<?php echo e(route('user_questionnaire_list')); ?>?type=rent"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارزیابی شده ها</a></li>
                                <li><a href="<?php echo e(route('user-refer-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارجاع</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">گزارشات</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('contract-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>معاملات انجام شده</a></li>
                                <li><a href="<?php echo e(route('contract-list')); ?>?type=canceled"><i class="zmdi zmdi-dot-circle-alt"></i>معاملات انجام نشده</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('call center(sales)')): ?>
                        <li class="" hidden>
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">مدیریت کاربری</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('user-list')); ?>?type=customers"><i class="zmdi zmdi-dot-circle-alt"></i> لیست زیر مجموعه من</a></li>
                                <li><a href="<?php echo e(route('user-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست مشتریان</a></li>
                                <li><a href="<?php echo e(route('user-list')); ?>?removed=true"><i class="zmdi zmdi-dot-circle-alt"></i> لیست مشتریان حذف شده</a></li>
                                <li><a href="<?php echo e(route('user_questionnaire_list')); ?>?type=sales"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارزیابی شده ها</a></li>
                                <li><a href="<?php echo e(route('user-refer-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارجاع</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">گزارشات</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('contract-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>گزارشات انجام شده</a></li>
                                <li><a href="<?php echo e(route('contract-list')); ?>?type=canceled"><i class="zmdi zmdi-dot-circle-alt"></i>گزارشات انجام نشده</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                    <li class="" hidden>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">مدیریت کاربری</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">

                            <li class="">
                                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                    <div class="menu-title">لیست مشتریان</div>
                                </a>
                                <ul class="mm-collapse" style="height: 2px;">
                                    <li><a href="<?php echo e(route('user-list')); ?>?type=sales"><i class="zmdi zmdi-dot-circle-alt"></i> لیست مشتریان فروش</a></li>
                                    <li><a href="<?php echo e(route('user-list')); ?>?type=rent"><i class="zmdi zmdi-dot-circle-alt"></i> لیست مشتریان اجاره</a></li>
                                    <li><a href="<?php echo e(route('user-list')); ?>?type=myCustomers"><i class="zmdi zmdi-dot-circle-alt"></i> لیست مشتریان من</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(route('user-list')); ?>?type=customers"><i class="zmdi zmdi-dot-circle-alt"></i> لیست زیر مجموعه من</a></li>
                            <li class="">
                                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                    <div class="menu-title">کارشناسان</div>
                                </a>
                                <ul class="mm-collapse" style="height: 2px;">
                                    <li><a href="<?php echo e(route('user-property-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>لیست کارشناسان</a></li>
                                    <li><a href="<?php echo e(route('user-pending-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>کارشناسان ( در انتظار تایید )</a></li>
                                    <li><a href="<?php echo e(route('user-rejected-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>کارشناسان ( رد شده )</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(route('arz-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>ارز ها</a></li>
                            <li class="">
                                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                    <div class="menu-title"> لیست ارزیابی شده ها</div>
                                </a>
                                <ul class="mm-collapse" style="height: 2px;">
                                    <li><a href="<?php echo e(route('user_questionnaire_list')); ?>?type=sales" style="font-size: 12px"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارزیابی شده ها(فروش)</a></li>
                                    <li><a href="<?php echo e(route('user_questionnaire_list')); ?>?type=rent" style="font-size: 12px"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارزیابی شده ها(اجاره)</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(route('user-refer-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارجاع</a></li>
                            <li><a href="<?php echo e(route('user-report')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>گزارش فعالیت ها</a></li>
                        </ul>
                    </li>

                    <li class="" hidden>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">گزارشات</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('contract-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>معاملات انجام شده</a></li>
                            <li><a href="<?php echo e(route('contract-list')); ?>?type=canceled"><i class="zmdi zmdi-dot-circle-alt"></i>معاملات انجام نشده</a></li>
                            <li><a href="<?php echo e(route('contract-canceled-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>گزارش کنسل شده ها</a></li>
                            <li><a href="<?php echo e(route('user-refer-report-list')); ?>?type=canceled"><i class="zmdi zmdi-dot-circle-alt"></i>گزارش ارجاعات</a></li>
                        </ul>
                    </li>

                    <li class="" >
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">مدیریت محتوا</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('slider-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    اسلایدر</a></li>
                            <li><a href="<?php echo e(route('faq-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> سوالات متداول</a></li>
                            <li><a href="<?php echo e(route('about-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> درباره ما/خدمات</a></li>
                        </ul>
                    </li>
                    <li class="" >
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">مدیریت نوشته ها</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('post-category-list','article')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست دسته بندی مقالات</a></li>
                            <li><a href="<?php echo e(route('post-category-list','eghamat')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست دسته اقامت ترکیه</a></li>
                            <li><a href="<?php echo e(route('post-category-list','shahrvandi')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست دسته شهروندی ترکیه</a></li>
                            <li><a href="<?php echo e(route('post-category-list','job')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست دسته کسب و کار در ترکیه</a></li>
                            <li><a href="<?php echo e(route('post-category-list','radio_vandidad')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست دسته رادیو وندیداد</a></li>
                            
                            
                            
                            
                            <li><a href="<?php echo e(route('article-list','article')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    مقالات</a></li>
                            <li><a href="<?php echo e(route('article-list','eghamat')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    نوشته اقامت ترکیه</a></li>
                            <li><a href="<?php echo e(route('article-list','shahrvandi')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    نوشته شهروندی ترکیه</a></li>
                            <li><a href="<?php echo e(route('article-list','job')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    نوشته کسب و کار در ترکیه</a></li>
                            <li><a href="<?php echo e(route('article-list','radio_vandidad')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    نوشته رادیو وندیداد</a></li>
                            <li><a href="<?php echo e(route('article-list','migration')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    نوشته فرهنگ مهاجرت</a></li>


                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">مدیریت املاک</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('villa-category-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست پروژه ها</a></li>
                            <li><a href="<?php echo e(route('property-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ویژگی‌ها</a>
                            </li>







                            <li>
                                <a href="<?php echo e(route('villa-list')); ?>">
                                    <i class="zmdi zmdi-dot-circle-alt"></i>

                                    لیست ملک‌ها
                                </a>
                            </li>


















                            
                                    
                            <li><a href="<?php echo e(route('location-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    مناطق ازمیر</a></li>




                        </ul>
                    </li>
















                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('watcher')): ?>
                    <li class="" hidden>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">مدیریت کاربری</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('user-list')); ?>?type=customers"><i class="zmdi zmdi-dot-circle-alt"></i> لیست زیر مجموعه من</a></li>
                            <li class="">
                                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                    <div class="menu-title">کارشناسان</div>
                                </a>
                                <ul class="mm-collapse" style="height: 2px;">
                                    <li><a href="<?php echo e(route('user-property-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>لیست کارشناسان</a></li>
                                    <li><a href="<?php echo e(route('user-pending-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>کارشناسان ( در انتظار تایید )</a></li>
                                    <li><a href="<?php echo e(route('user-rejected-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>کارشناسان ( رد شده )</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(route('arz-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>ارز ها</a></li>
                            <li class="">
                                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                    <div class="menu-title"> لیست ارزیابی شده ها</div>
                                </a>
                                <ul class="mm-collapse" style="height: 2px;">
                                    <li><a href="<?php echo e(route('user_questionnaire_list')); ?>?type=sales" style="font-size: 12px"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارزیابی شده ها(فروش)</a></li>
                                    <li><a href="<?php echo e(route('user_questionnaire_list')); ?>?type=rent" style="font-size: 12px"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارزیابی شده ها(اجاره)</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(route('user-refer-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارجاع</a></li>
                            <li><a href="<?php echo e(route('user-report')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>گزارش فعالیت ها</a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">گزارشات</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('contract-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>معاملات انجام شده</a></li>
                            <li><a href="<?php echo e(route('contract-list')); ?>?type=canceled"><i class="zmdi zmdi-dot-circle-alt"></i>معاملات انجام نشده</a></li>
                            <li><a href="<?php echo e(route('contract-canceled-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>گزارش کنسل شده ها</a></li>
                            <li><a href="<?php echo e(route('user-refer-report-list')); ?>?type=canceled"><i class="zmdi zmdi-dot-circle-alt"></i>گزارش ارجاعات</a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">مدیریت محتوا</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('slider-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    اسلایدر</a></li>
                            <li><a href="<?php echo e(route('post-category-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست دسته بندی نوشته‌ها</a></li>
                            <li><a href="<?php echo e(route('post-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    نوشته‌ها</a></li>
                            <li><a href="<?php echo e(route('comment-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    کامنت‌ها</a></li>
                            <li><a href="<?php echo e(route('article-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    مقالات</a></li>
                            <li><a href="<?php echo e(route('passports.index')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> درخواست تماس پاسپورت</a></li>
                            <li><a href="<?php echo e(route('faq-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> سوالات متداول</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">مدیریت املاک</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('villa-category-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست پروژه ها</a></li>
                            <li><a href="<?php echo e(route('property-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ویژگی‌ها</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('villa-search-index')); ?>">
                                    <i class="zmdi zmdi-dot-circle-alt"></i>
                                    <span class="badge badge-primary">همه ملک ها</span>
                                    جستجوی ملک
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('villa-list','published')); ?>">
                                    <i class="zmdi zmdi-dot-circle-alt"></i>
                                    <span class="badge badge-success">تایید شده</span>
                                    لیست ملک‌ها
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('villa-list','pending')); ?>">
                                    <i class="zmdi zmdi-dot-circle-alt"></i>
                                    <span class="badge badge-warning">درانتظار تایید</span>
                                    لیست ملک‌ها
                                    <?php
                                        $villa_pending = 0;
                                        if (Auth::user()->id == 1) {
                                            $villa_pending = App\Villa::where('status', 'pending')->get();
                                            $villa_pending = count($villa_pending);
                                        }
                                    ?>
                                    <?php if($villa_pending > 0): ?>
                                        <div class="badge badge-light ml-auto"><?php echo e($villa_pending); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('villa-list','failed')); ?>">
                                    <i class="zmdi zmdi-dot-circle-alt"></i>
                                    <span class="badge badge-danger">رد شده</span>
                                    لیست ملک‌ها
                                </a>
                            </li>
                            <li><a href="<?php echo e(route('city-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    مناطق</a></li>
                            <li><a href="<?php echo e(route('location-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست
                                    نواحی</a></li>
                            <li><a href="<?php echo e(route('re-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست درخواست
                                    ها</a></li>
                            <li><a href="<?php echo e(route('share-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لینک شبگه
                                    اجتماعی</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">اعضای خبرنامه</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('newsletter-list-home')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست عضوهای صفحه اصلی</a></li>
                            <li><a href="<?php echo e(route('newsletter-list-location')); ?>"><i
                                            class="zmdi zmdi-dot-circle-alt"></i> لیست عضوهای هر محله</a></li>
                            <li><a href="<?php echo e(route('newsletter-list-villa')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست عضوهای هر ملک</a></li>
                            <li><a href="<?php echo e(route('newsletter-list-blog')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست عضوهای مجله</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                    <?php if(auth()->user()->account_status == 'active'): ?>
                        <li class="" hidden>
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">مدیریت کاربری</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('user-list')); ?>?type=myCustomers"><i class="zmdi zmdi-dot-circle-alt"></i>مشتریان من</a></li>
                                <li><a href="<?php echo e(route('user-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست زیر مجموعه من</a></li>
                                <li class="">
                                    <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                        <div class="menu-title"> لیست ارزیابی شده ها</div>
                                    </a>
                                    <ul class="mm-collapse" style="height: 2px;">
                                        <li><a href="<?php echo e(route('user_questionnaire_list')); ?>?type=sales" style="font-size: 12px"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارزیابی شده ها(فروش)</a></li>
                                        <li><a href="<?php echo e(route('user_questionnaire_list')); ?>?type=rent" style="font-size: 12px"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارزیابی شده ها(اجاره)</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo e(route('user-refer-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ارجاع</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">گزارشات</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('contract-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>معاملات انجام شده</a></li>
                                <li><a href="<?php echo e(route('contract-list')); ?>?type=canceled"><i class="zmdi zmdi-dot-circle-alt"></i>معاملات انجام نشده</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">مدیریت املاک</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li>
                                    <a href="<?php echo e(route('villa-search-index')); ?>">
                                        <i class="zmdi zmdi-dot-circle-alt"></i>
                                        <span class="badge badge-primary">همه ملک ها</span>
                                        جستجوی ملک
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('villa-list','published')); ?>">
                                        <i class="zmdi zmdi-dot-circle-alt"></i>
                                        <span class="badge badge-success">تایید شده</span>
                                        لیست ملک‌ها

                                        <?php
                                            $villa_published = 0;
                                            if (auth()->user()->hasRole('مدیر')) {
                                                $villa_published = App\Villa::where('status', 'published')->count();
                                            }else{
                                               $villa_pending = App\Villa::where('status', 'published')->where('user_id',auth()->id())->count();
                                            }
                                        ?>
                                        <?php if($villa_published > 0): ?>
                                            <div class="badge badge-light ml-auto"><?php echo e($villa_published); ?></div>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('villa-list','pending')); ?>">
                                        <i class="zmdi zmdi-dot-circle-alt"></i>
                                        <span class="badge badge-warning">درانتظار تایید</span>
                                        لیست ملک‌ها
                                        <?php
                                            $villa_pending = 0;
                                            if (auth()->user()->hasRole('مدیر')) {
                                                $villa_pending = App\Villa::where('status', 'pending')->count();
                                            }else{
                                               $villa_pending = App\Villa::where('status', 'pending')->where('user_id',auth()->id())->count();
                                            }
                                        ?>
                                        <?php if($villa_pending > 0): ?>
                                            <div class="badge badge-light ml-auto"><?php echo e($villa_pending); ?></div>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('villa-list','failed')); ?>">
                                        <i class="zmdi zmdi-dot-circle-alt"></i>
                                        <span class="badge badge-danger">رد شده</span>
                                        لیست ملک‌ها
                                    </a>
                                </li>
                            </ul>
                        </li>

                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('کارشناس فروش')): ?>
                        <li class="" hidden>
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">مدیریت کاربری</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('user-list')); ?>?type=myCustomers"><i class="zmdi zmdi-dot-circle-alt"></i>مشتریان من</a></li>
                                <li><a href="<?php echo e(route('user-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست زیر مجموعه من</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('تعیین کننده ملک')): ?>
                    <?php if(auth()->user()->account_status == 'active'): ?>
                        <li><a href="<?php echo e(route('user-list')); ?>?type=customers"><i class="zmdi zmdi-dot-circle-alt"></i> لیست زیر مجموعه من</a></li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">مدیریت املاک</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li>
                                    <a href="<?php echo e(route('villa-list','published')); ?>">
                                        <i class="zmdi zmdi-dot-circle-alt"></i>
                                        <span class="badge badge-success">تایید شده</span>
                                        لیست ملک‌ها

                                        <?php
                                            $villa_published = 0;
                                            if (auth()->user()->hasRole('مدیر')) {
                                                $villa_published = App\Villa::where('status', 'published')->count();
                                            }else{
                                               $villa_pending = App\Villa::where('status', 'published')->where('user_id',auth()->id())->count();
                                            }
                                        ?>
                                        <?php if($villa_published > 0): ?>
                                            <div class="badge badge-light ml-auto"><?php echo e($villa_published); ?></div>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('villa-list','pending')); ?>">
                                        <i class="zmdi zmdi-dot-circle-alt"></i>
                                        <span class="badge badge-warning">درانتظار تایید</span>
                                        لیست ملک‌ها
                                        <?php
                                            $villa_pending = 0;
                                            if (auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('تعیین کننده ملک')) {
                                                $villa_pending = App\Villa::where('status', 'pending')->count();
                                            }else{
                                               $villa_pending = App\Villa::where('status', 'pending')->where('user_id',auth()->id())->count();
                                            }
                                        ?>
                                        <?php if($villa_pending > 0): ?>
                                            <div class="badge badge-light ml-auto"><?php echo e($villa_pending); ?></div>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('مدیریت پروژه')): ?>
                    <li class="">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">مدیریت پروژه ها</div>
                        </a>
                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('villa-category-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    لیست پروژه ها</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>












                    <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>


                    <li class="">
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                            <div class="menu-title">تماس ها <?php if($count_contact+$count_consulting>0): ?> <span class="badge badge-danger"><?php echo e($count_contact+$count_consulting); ?></span> <?php endif; ?></div>
                        </a>

                        <ul class="mm-collapse" style="height: 2px;">
                            <li><a href="<?php echo e(route('consulting-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>مشاوره <?php if($count_consulting>0): ?> <span class="badge badge-danger"><?php echo e($count_consulting); ?></span> <?php endif; ?> </a></li>
                            <li><a href="<?php echo e(route('contact-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>تماس با ما <?php if($count_contact>0): ?> <span class="badge badge-danger"><?php echo e($count_contact); ?></span> <?php endif; ?> </a></li>
                            <li><a href="<?php echo e(route('contact-info-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>اطلاعات تماس با ما </a></li>
                        </ul>
                    </li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"><i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">تنظیمات</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('meta-list')); ?>?type=myCustomers"><i class="zmdi zmdi-dot-circle-alt"></i>meta </a></li>
                                <li><a href="<?php echo e(route('price-convert')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i>قیمت روز دلار و تومان </a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </div>
    <!--End sidebar-wrapper-->

    <!--Start topbar header-->
    <header class="topbar-nav">
        <nav class="navbar navbar-expand fixed-top">

            <div class="toggle-menu">
                <i class="zmdi zmdi-menu"></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="input-group">
                    <div class="input-group-prepend search-arrow-back">
                        <button class="btn btn-search-back" type="button"><i class="zmdi zmdi-long-arrow-left"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="search">
                    <div class="input-group-append">
                        <button class="btn btn-search" type="button"><i class="zmdi zmdi-search"></i></button>
                    </div>
                </div>
            </div>

            <ul class="navbar-nav align-items-center right-nav-link ml-auto">
                <li class="nav-item dropdown search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:void(0);">
                        <i class="zmdi zmdi-search align-middle"></i>
                    </a>
                </li>
             
                <style>
                    .resetLang{
                        border: 0px solid #e5eaef;
                        background-color: rgba(255, 255, 255, 0.2);
                        color: #fff !important;
                        height: 27px;
                        line-height: 29px;
                        padding: 0 10px;
                        border-radius: 3px;
                        margin: 0 5px;
                        cursor: pointer;
                    }
                    .control_box{
                        background-color: rgb(152 63 63 / 60%);
                        margin: 5px 0;
                        padding: 8px;
                    }
                    .modal-backdrop{z-index: unset!important;}
                </style>

                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                       href="<?php echo e(route('notification-list')); ?>">
                        <i class="zmdi zmdi-email align-middle"></i>
                        <?php $notifications=\App\Notification::where('user_id',auth()->id())->where('seen',0)->count(); ?>
                        <?php if($notifications>0): ?>
                        <span class="bg-info text-white badge-up"><?php echo e($notifications); ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown"
                       href="javascript:void(0);">
                        <i class="zmdi zmdi-case align-middle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php $wallet=\App\Wallet::where('user_id',auth()->id())->first() ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center text-right">
                                کیف پول شما
                            </li>
                            <li class="list-group-item">
                                <a href="">
                                    <div class="media">
                                        <i class="zmdi zmdi-money-box fa-2x mr-3 text-info"></i>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">درآمد دلار</h6>
                                            <p class="msg-info">دلار <?php echo e($wallet?number_format($wallet->dollar):0); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="">
                                    <div class="media">
                                        <i class="zmdi zmdi-money-box fa-2x mr-3 text-info"></i>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">درآمد ریال</h6>
                                            <p class="msg-info">ریال <?php echo e($wallet?number_format($wallet->rial):0); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="">
                                    <div class="media">
                                        <i class="zmdi zmdi-money-box fa-2x mr-3 text-info"></i>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">درآمد لیر</h6>
                                            <p class="msg-info">لیر <?php echo e($wallet?number_format($wallet->lira):0); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="">
                                    <div class="media">
                                        <i class="zmdi zmdi-money-box fa-2x mr-3 text-info"></i>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">درآمد یورو</h6>
                                            <p class="msg-info">یورو <?php echo e($wallet?number_format($wallet->euro):0); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item text-center">
                                <a href="<?php echo e(route('transaction-list')); ?>">مشاهده تراکنش ها</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <?php if(auth()->check() && auth()->user()->hasRole('کارشناس فروش')): ?>
                <?php if(auth()->user()->account_status=='active'): ?>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        درخواست سطح نقره ای
                    </a>

                </li>
                <?php endif; ?>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown"
                       href="javascript:void(0);">
                        <i class="zmdi zmdi-notifications-active align-middle"></i><span
                                class="bg-info text-white badge-up"><?php echo e(count($pending_users)+$notifications+count(\App\User::where('refer_id',auth()->id())->get())); ?></span></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php if(count($pending_users)): ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                کاربر در انتظار
                            </li>
                            <?php $__currentLoopData = $pending_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pending_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <a href="<?php echo e(route('user-show', [$pending_user->id,url()->current()])); ?>">
                                        <div class="media">
                                            <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">در انتظار تایید</h6>
                                                <p class="msg-info"><?php echo e($pending_user->first_name . ' ' . $pending_user->last_name); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item text-center"><a href="<?php echo e(route('user-pending-list')); ?>">مشاهده
                                    همه کاربران در انتظار</a></li>
                        </ul>
                        <?php endif; ?>
                        <?php if(count(\App\User::where('refer_id',auth()->id())->get())): ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                مشتریان شما
                            </li>
                            <?php $__currentLoopData = \App\User::where('refer_id',auth()->id())->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <a href="">
                                        <div class="media">
                                            <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">در انتظار اقدام</h6>
                                                <p class="msg-info"><?php echo e($user->first_name . ' ' . $user->last_name); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item text-center">
                                <a href="<?php echo e(route('user-refer-list')); ?>">مشاهده ارجاع شده</a>
                            </li>
                        </ul>
                        <?php endif; ?>
                        <?php if(count(\App\Notification::where('user_id',auth()->id())->where('seen',0)->get())): ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    نوتیفیکیشن ها
                                </li>
                                <?php $__currentLoopData = \App\Notification::where('user_id',auth()->id())->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notifiy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <a href="<?php echo e(route('notification-show',$notifiy->id)); ?>">
                                            <div class="media">
                                                <i class="zmdi zmdi-money-box fa-2x mr-3 text-info"></i>
                                                <div class="media-body">
                                                    <h6 class="mt-0 msg-title"><?php echo e($notifiy->message); ?></h6>
                                                    
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endif; ?>

                <?php $refers=\App\User::where('refer_id',auth()->id())->where('referred',1)->where('reserved',0)->get(); ?>
                <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown"
                       href="javascript:void(0);">
                        <i class="zmdi zmdi-notifications-active align-middle"></i>
                        <?php if(count($refers)+$notifications>0): ?>
                        <span class="bg-info text-white badge-up"><?php echo e(count($refers)+$notifications); ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php if(count($refers)): ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    مشتریان شما
                                </li>
                                <?php $__currentLoopData = $refers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <a href="">
                                            <div class="media">
                                                <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                                                <div class="media-body">
                                                    <h6 class="mt-0 msg-title">در انتظار اقدام</h6>
                                                    <p class="msg-info"><?php echo e($user->first_name . ' ' . $user->last_name); ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item text-center">
                                    <a href="<?php echo e(route('user-pending-list')); ?>">مشاهده همه کاربران در انتظار</a>
                                </li>
                            </ul>
                        <?php endif; ?>
                        <?php if(count(\App\Notification::where('user_id',auth()->id())->where('seen',0)->get())): ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    نوتیفیکیشن ها
                                </li>
                                <?php $__currentLoopData = \App\Notification::where('user_id',auth()->id())->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notifiy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <a href="<?php echo e(route('notification-show',$notifiy->id)); ?>">
                                            <div class="media">
                                                <i class="zmdi zmdi-money-box fa-2x mr-3 text-info"></i>
                                                <div class="media-body">
                                                    <h6 class="mt-0 msg-title"><?php echo e($notifiy->message); ?></h6>
                                                    
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown"
                       href="javascript:void(0);">
                        <span class="user-profile">
                            <img src="<?php echo e(auth()->user()->photo ? url(auth()->user()->photo->path) : url('assets/admin/pic/avatar-13.png')); ?>"
                                 class="img-circle"
                                 alt="user avatar">
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item user-details">
                            <a href="<?php echo e(route('profile-show', Auth::user()->id)); ?>">
                                <div class="media">
                                    <div class="avatar"><img class="align-self-start mr-3"
                                                             src="<?php echo e(auth()->user()->photo ? url(auth()->user()->photo->path) : url('assets/admin/pic/avatar-13.png')); ?>"
                                                             alt="user avatar"></div>
                                    <div class="media-body">
                                        <h6 class="mt-2 user-title"><?php echo e(auth()->user()->email); ?></h6>
                                        <p class="user-subtitle"><?php echo e(auth()->user()->first_name .' ' . auth()->user()->last_name); ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item"
                            onclick="window.open('<?php echo e(route('profile-show', Auth::user()->id)); ?>','_parent')"><i
                                    class="zmdi zmdi-balance-wallet mr-3"></i>پروفایل
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item"
                            onclick="window.open('<?php echo e(route('profile-password', Auth::user()->id)); ?>','_parent')"><i
                                    class="zmdi zmdi-settings mr-3"></i>تغییر رمزعبور
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item" onclick="document.getElementById('loggg').submit()"><i class="zmdi zmdi-power mr-3"></i>
                            خروج
                        </li>
                    </ul>
                    <form action="<?php echo e(route('logout')); ?>" method="POST"
                          class="logout hidden" id="loggg"><?php echo e(csrf_field()); ?></form>
                </li>
            </ul>
        </nav>
    </header>
    <!--End topbar header-->

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid text-right" dir="rtl">

            <!--Start Dashboard Content-->

        <?php echo e(isset($body) ? $body : 'بدون محتوا'); ?>


        <!--End Dashboard Content-->
            <!--start overlay-->
            <div class="overlay"></div>
            <!--end overlay-->

        </div>
        <!-- End container-fluid-->

    </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javascript:void(0);" class="back-to-top" style="display: none;"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
                Copyright © 2020 Adib-it Admin
            </div>
        </div>
    </footer>
    <!--End footer-->

</div><!--End wrapper-->
<!-- Modal -->
<div class="modal fade text-right" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">درخواست سطح نقره ای</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>توجه...!
                    <br>
                    بعد از ارسال درخواست و بررسی مدارک آپلود شده ، حساب شما ارتقاء خواهد یافت
                </p>
                <?php echo e(Form::open(array('route' => 'request_expert', 'method' => 'post', 'id' => 'reg_form', 'files' => true))); ?>

                <div class="control_box uk-width-1-1@s">
                    <label for="address_pic" class="float-right">تصویر آدرس (مانند قبض گاز یا برق که نشان دهنده آدرس محل سکونت شما می باشد)</label>
                    <input type="file" accept="image/*" name="address_pic" id="address_pic" required>
                </div>
                <div class="control_box uk-width-1-1@s">
                    <label for="passport_pic" class="float-right">تصویر پاسپورت</label>
                    <input type="file" accept="image/*" name="passport_pic" id="passport_pic" required>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                <button type="submit" class="btn btn-primary">
                    ارسال درخواست
                </button>

            </div>

        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(url('assets/admin/js/jquery_002.js')); ?>"></script>
<script src="<?php echo e(url('assets/admin/js/popper.js')); ?>"></script>
<script src="<?php echo e(url('assets/admin/js/bootstrap.js')); ?>"></script>

<!-- simplebar js -->
<script src="<?php echo e(url('assets/admin/js/simplebar.js')); ?>"></script>
<!-- Metismenu js -->
<script src="<?php echo e(url('assets/admin/js/metisMenu.js')); ?>"></script>
<!-- loader scripts -->
<script src="<?php echo e(url('assets/admin/js/jquery.js')); ?>"></script>
<script src="<?php echo e(url('assets/admin/js/jquery-ui.js')); ?>"></script>




<!-- Custom scripts -->
<script src="<?php echo e(url('assets/admin/js/app-script.js?v=').time()); ?>"></script>
<!-- Chart js -->

<script src="<?php echo e(url('assets/admin/js/Chart.js')); ?>"></script>
<!-- Vector map JavaScript -->
<script src="<?php echo e(url('assets/admin/js/jquery-jvectormap-2.js')); ?>"></script>
<script src="<?php echo e(url('assets/admin/js/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- Easy Pie Chart JS -->
<script src="<?php echo e(url('assets/admin/js/jquery_004.js')); ?>"></script>
<!-- Sparkline JS -->
<script src="<?php echo e(url('assets/admin/js/jquery.js')); ?>"></script>
<script src="<?php echo e(url('assets/admin/js/excanvas.js')); ?>"></script>
<script src="<?php echo e(url('assets/admin/js/jquery_003.js')); ?>"></script>
<!-- Chosen -->
<script src="<?php echo e(url('assets/admin/chosen/js.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/admin/js/jgrowl.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    window.MyReset = () => jQuery('#\\:1\\.container').contents().find('#\\:1\\.restore').click();
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
    $(function () {
        $(".knob").knob();
    });

    function slugify(string) {
        return string.toString().toLowerCase().replace(/\s+/g, '-').replace(/\-\-+/g, '-').replace(/^-+/, '').replace(/-+$/, '');
    }

    function slug(one, two) {
        $(one).change(function () {
            var slug = slugify($(one).val());
            $(two).val(slug);
        });
    }
</script>

<div class="jvectormap-tip"></div>
<?php echo $__env->yieldPushContent('scripts'); ?>
<script>
    $(document).ready(function () {
        $('.numberPrice').text(function (index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
    setTimeout(function () {
        $('.mm-collapse').removeClass('mm-show');
        $('.mm-collapse').parent().removeClass('mm-active');
    }, 500)
</script>
<?php if(count($errors) > 0): ?>
    <script type="text/javascript">
        $.jGrowl('<ul> <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><?php echo e($error); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </ul>', {
            life: 8000,
            position: 'bottom-right',
            theme: 'bg-danger'
        });
    </script>
<?php endif; ?>
<?php if(Session::has('flash_message')): ?>
    <script type="text/javascript">
        $.jGrowl('<?php echo session("flash_message"); ?>', {life: 8000, position: 'bottom-right', theme: 'bg-success'});
    </script>
<?php endif; ?>
<?php if(Session::has('err_message')): ?>
    <script type="text/javascript">
        $.jGrowl('<?php echo session("err_message"); ?>', {life: 8000, position: 'bottom-right', theme: 'bg-danger'});
    </script>
<?php endif; ?>

</body>
</html>
