<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Adib-it - Multipurpose Bootstrap4 Admin Template</title>
    <!-- loader-->
    <link href="<?php echo e(asset('dashboard/pace.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('dashboard/pace.js')); ?>"></script>
    <!--favicon-->
    <link rel="icon" href="https://codervent.com/Adib-it/demo/transparent-admin/vertical-layout/assets/images/favicon.ico" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="<?php echo e(asset('dashboard/jquery-jvectormap-2.css')); ?>" rel="stylesheet">
    <!-- simplebar CSS-->
    <link href="<?php echo e(asset('dashboard/simplebar.css')); ?>" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="<?php echo e(asset('dashboard/bootstrap.css')); ?>" rel="stylesheet">
    <!-- animate CSS-->
    <link href="<?php echo e(asset('dashboard/animate.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Icons CSS-->
    <link href="<?php echo e(asset('dashboard/icons.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Metismenu CSS-->
    <link href="<?php echo e(asset('dashboard/metisMenu.css')); ?>" rel="stylesheet">
    <!-- Custom Style-->
    <link href="<?php echo e(asset('dashboard/app-style.css?v=0.1')); ?>" rel="stylesheet">

    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes  chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0);background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
    </style>
    <?php echo $__env->yieldPushContent('stylesheets'); ?>
    <style>
        .archive-card-header{
            display: none;
        }
        .archive-table{
            width: 100%;
        }
    </style>
</head>

<body class="bg-theme bg-theme1  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>

<!-- Start wrapper-->
<div id="wrapper" class="">

    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="init" data-simplebar-auto-hide="true" class="mm-active"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 81px; height: 240px;"></div></div><div class="simplebar-track horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">

                <div class="brand-logo">
                    <img src="<?php echo e(asset('new/img/logo/logo-4.png')); ?>" class="logo-icon h-100" alt="logo icon">
                    <h5 class="logo-text">Dashboard</h5>
                    <div class="close-btn"><i class="zmdi zmdi-close"></i></div>
                </div>

                <ul class="metismenu mm-show" id="menu">
                    <li class="">
                        <a class="" href="<?php echo e(route('dashboard')); ?>" aria-expanded="false">
                            <div class="parent-icon"><i class="zmdi zmdi-view-dashboard"></i></div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"> <i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">Admin Management</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('user-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست کاربران سایت</a></li>
                                <li><a href="<?php echo e(route('user-property-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست کارشناسان</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"> <i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">Content Management</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('post-category-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست دسته بندی نوشته‌ها</a></li>
                                <li><a href="<?php echo e(route('post-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست نوشته‌ها</a></li>
                                <li><a href="<?php echo e(route('comment-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست کامنت‌ها</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"> <i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">Estates Management</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('villa-category-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست پروژه ها</a></li>
                                <li><a href="<?php echo e(route('property-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ویژگی‌ها</a></li>
                                <li><a href="<?php echo e(route('villa-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ملک‌ها
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
                                </a></li>
                                <li><a href="<?php echo e(route('city-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست شهرها</a></li>
                                <li><a href="<?php echo e(route('location-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست مناطق</a></li>
                                <li><a href="<?php echo e(route('re-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست درخواست ها</a></li>
                                <li><a href="<?php echo e(route('share-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لینک شبگه اجتماعی</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"> <i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">Newsletter Members</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('newsletter-list-home')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست عضوهای صفحه اصلی</a></li>
                                <li><a href="<?php echo e(route('newsletter-list-location')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست عضوهای هر محله</a></li>
                                <li><a href="<?php echo e(route('newsletter-list-villa')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست عضوهای هر ملک</a></li>
                                <li><a href="<?php echo e(route('newsletter-list-blog')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست عضوهای مجله</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"> <i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">Icall Management</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('ical-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست آیکاله ها</a></li>
                                <li><a href="<?php echo e(route('ical-create','0')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> ساخت آیکال</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                        <li class="">
                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                                <div class="parent-icon"> <i class="zmdi zmdi-layers"></i></div>
                                <div class="menu-title">Estates Management</div>
                            </a>
                            <ul class="mm-collapse" style="height: 2px;">
                                <li><a href="<?php echo e(route('villa-list')); ?>"><i class="zmdi zmdi-dot-circle-alt"></i> لیست ملک‌ها</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                </ul>

            </div></div></div>
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
                        <button class="btn btn-search-back" type="button"><i class="zmdi zmdi-long-arrow-left"></i></button>
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
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void(0);">
                        <i class="zmdi zmdi-comment-outline align-middle"></i><span class="bg-danger text-white badge-up">12</span></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                New Messages <a href="javascript:void(0);" class="extra-small-font">Clear All</a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3" src="<?php echo e(asset('dashboard/avatar-5.png')); ?>" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">Jhon Deo</h6>
                                            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                            <small>Today, 4:10 PM</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3" src="<?php echo e(asset('dashboard/avatar-6.png')); ?>" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">Sara Jen</h6>
                                            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                            <small>Yesterday, 8:30 AM</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3" src="<?php echo e(asset('dashboard/avatar-7.png')); ?>" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">Dannish Josh</h6>
                                            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                            <small>5/11/2018, 2:50 PM</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3" src="<?php echo e(asset('dashboard/avatar-8.png')); ?>" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">Katrina Mccoy</h6>
                                            <p class="msg-info">Lorem ipsum dolor sit amet.</p>
                                            <small>1/11/2018, 2:50 PM</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item text-center"><a href="javascript:void(0);">See All Messages</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void(0);">
                        <i class="zmdi zmdi-notifications-active align-middle"></i><span class="bg-info text-white badge-up">14</span></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                New Notifications <a href="javascript:void(0);" class="extra-small-font">Clear All</a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">New Registered Users</h6>
                                            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <i class="zmdi zmdi-coffee fa-2x mr-3 text-warning"></i>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">New Received Orders</h6>
                                            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <i class="zmdi zmdi-notifications-active fa-2x mr-3 text-danger"></i>
                                        <div class="media-body">
                                            <h6 class="mt-0 msg-title">New Updates</h6>
                                            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item text-center"><a href="javascript:void(0);">See All Notifications</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown language">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void(0);"><i class="flag-icon flag-icon-gb align-middle"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item"><i class="flag-icon flag-icon-gb mr-3"></i>English</li>
                        <li class="dropdown-item"><i class="flag-icon flag-icon-fr mr-3"></i>French</li>
                        <li class="dropdown-item"><i class="flag-icon flag-icon-cn mr-3"></i>Chinese</li>
                        <li class="dropdown-item"><i class="flag-icon flag-icon-de mr-3"></i>German</li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void(0);">
                        <span class="user-profile"><img src="<?php echo e(asset('dashboard/avatar-13.png')); ?>" class="img-circle" alt="user avatar"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item user-details">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avatar"><img class="align-self-start mr-3" src="<?php echo e(asset('dashboard/avatar-13.png')); ?>" alt="user avatar"></div>
                                    <div class="media-body">
                                        <h6 class="mt-2 user-title"><?php echo e(auth()->user()->email); ?></h6>
                                        <p class="user-subtitle">khaneistanbul.com.tr</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item" onclick="window.open('<?php echo e(route('profile-show', Auth::user()->id)); ?>','_parent')"><i class="zmdi zmdi-balance-wallet mr-3"></i>Profile</li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item" onclick="window.open('<?php echo e(route('profile-password', Auth::user()->id)); ?>','_parent')"><i class="zmdi zmdi-settings mr-3"></i>Password Setting</li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item" onclick="$('.logout').submit()"><i class="zmdi zmdi-power mr-3"></i>
                            <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout hidden"><?php echo e(csrf_field()); ?></form>
                            Logout
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!--End topbar header-->

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

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

    <!--start color switcher-->
    <div class="right-sidebar">
        <div class="switcher-icon">
            <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
        </div>
        <div class="right-sidebar-content">

            <p class="mb-0">Gaussion Texture</p>
            <hr>

            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
            </ul>

            <p class="mb-0">Gradient Background</p>
            <hr>

            <ul class="switcher">
                <li id="theme7"></li>
                <li id="theme8"></li>
                <li id="theme9"></li>
                <li id="theme10"></li>
                <li id="theme11"></li>
                <li id="theme12"></li>
                <li id="theme13"></li>
                <li id="theme14"></li>
                <li id="theme15"></li>
            </ul>

        </div>
    </div>
    <!--end color switcher-->

</div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('dashboard/jquery_002.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/popper.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/bootstrap.js')); ?>"></script>

<!-- simplebar js -->
<script src="<?php echo e(asset('dashboard/simplebar.js')); ?>"></script>
<!-- Metismenu js -->
<script src="<?php echo e(asset('dashboard/metisMenu.js')); ?>"></script>
<!-- loader scripts -->
<script src="<?php echo e(asset('dashboard/jquery.htm')); ?>"></script>
<!-- Custom scripts -->
<script src="<?php echo e(asset('dashboard/app-script.js')); ?>"></script>
<!-- Chart js -->

<script src="<?php echo e(asset('dashboard/Chart.js')); ?>"></script>
<!-- Vector map JavaScript -->
<script src="<?php echo e(asset('dashboard/jquery-jvectormap-2.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- Easy Pie Chart JS -->
<script src="<?php echo e(asset('dashboard/jquery_004.js')); ?>"></script>
<!-- Sparkline JS -->
<script src="<?php echo e(asset('dashboard/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/excanvas.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/jquery_003.js')); ?>"></script>

<!--    <script>-->
<!--        $(function() {-->
<!--            $(".knob").knob();-->
<!--        });-->
<!--    </script>-->
<!-- Index js -->
<!--  <script src="dashboard/index.js"></script>-->




<div class="jvectormap-tip"></div>
<?php echo $__env->yieldPushContent('scripts'); ?>
<script>
    setTimeout(function () {
        $('.mm-collapse').removeClass('mm-show');
        $('.mm-collapse').parent().removeClass('mm-active');
    },500)
</script>
</body>
</html>