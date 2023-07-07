<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!--    <link rel="stylesheet" type="text/css" href="css/menucss.css">-->
    <title>ورود</title>
    <link rel="shortcut icon" href="<?php echo e(url('source/assets/user/pic/logo.png')); ?>" type="image/x-icon" />
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jgrowl.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('front/css/uikit.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('front/css/uikit-rtl.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('front/css/font.css')); ?>">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!--font fa icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- UIkit CSS -->

    <link rel="stylesheet" href="<?php echo e(asset('front/css/auth.css?v=').time()); ?>"/>
    <!-- UIkit JS -->
    <script src="<?php echo e(asset('front/js/uikit.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/js/uikit-icons.min.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .dir-rtl{
            direction: rtl !important;
        }
        .dir-ltr{
            direction: ltr !important;
        }

        .modal-backdrop{
            z-index: 1 !important;
        }
        .return-home{
            position: absolute;
            width: 110px;
            top: 17px;
            display: block;
            background: #00000040;
            padding: 8px 10px 9px 5px;
            text-align: left;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            color: #fff;
            font-weight: bold;
            font-size: 17px;
            transition: 0.4s all ease;
        }
        .return-home:hover{
            width: 140px;
            color: #fff;
        }
        .return-home img{
            width: 30px;
            margin-right: 10px;
        }
        .karshenash_div {
            position: relative!important;
            top: 0;
            left: 0;
            right: 0;
            width: 170px;
            margin: auto;
        }
        .jGrowl-notification ul
        {
            text-align: right;
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body <?php echo e(isset($body_bg) ? $body_bg : ''); ?>>
<div class="cover_b"></div>
<div class="body">
    <div class="header" uk-grid>
        <a class="return-home" href="<?php echo e(route('front-index')); ?>">
            خانه
            <img src="<?php echo e(isset($logo) ? $logo : asset('new/img/icon/home.png')); ?>" alt="">
        </a>
        <div class="uk-width-1-4@m uk-align-center logo_box_1" style="text-align: center">
            <div class="logo_box karshenash_div">
                <a href="<?php echo e(route('user.index')); ?>">
                    <img src="<?php echo e(asset('user/pic/logo.png')); ?>" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="body_1" uk-grid>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        

        
        
        
        
        <?php echo e(isset($body) ? $body : 'بدون محتوا'); ?>


    </div>
    <div class="footer" uk-grid>
        <div class="uk-width-1-4@m uk-align-center footer_box_1">
            <div class="footer_box">
                <img src="<?php echo e(url('src/images/star.png')); ?>" alt="">
            </div>
        </div>
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jgrowl.min.js')); ?>"></script>
<?php if(count($errors) > 0): ?>

    <script type="text/javascript">
        $.jGrowl('<ul> <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><?php echo e($error); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </ul>', {life: 3000, position: 'bottom-right', theme: 'bg-danger'});
    </script>

<?php endif; ?>
<?php if(Session::has('flash_message')): ?>

    <script type="text/javascript">
        $.jGrowl('<?php echo session("flash_message"); ?>', {life: 4000, position: 'bottom-right', theme: 'bg-success'});
    </script>

<?php endif; ?>

<?php if(Session::has('err_message')): ?>

    <script type="text/javascript">
        $.jGrowl('<?php echo session("err_message"); ?>', {life: 4000, position: 'bottom-right', theme: 'bg-danger'});
    </script>

<?php endif; ?>
<?php echo $__env->yieldContent('js'); ?>;
<?php echo $__env->yieldContent('scripts'); ?>;
<script type="text/javascript">
    // $(".chosen").chosen();
</script>
</body>
</html>