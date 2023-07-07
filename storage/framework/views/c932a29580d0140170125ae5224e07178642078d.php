<?php $__env->startSection('content'); ?>
    <style>
        .top-header, .bottom-header {
            background: #404140;
            height: 120px;
        }

        .a-l {
            position: absolute;
            left: 0;
        }

        .a-l img {
            width: 230px;
            margin-top: -2px;
        }

        .a-r {
            position: absolute;
            right: 0;
            bottom: 0;
        }

        .a-r img {
            width: 230px;
            margin-bottom: -2px;
        }

        .year-container {
            position: absolute;
            bottom: -15px;
            right: 0;
        }

        .year-container img {
            width: 140px;
        }

        .box-style-3 {
            border: .02px solid var(--primary-color);
            position:relative;
            background-color:white;
        }

        .box-style-3:hover {
            box-shadow:0px 0px 50px #dc2c2c3d;
            transform:scale(1.03);
            z-index:3
        }
        .box-style-3:hover .title-container{
            margin-right: 50px !important;
        }
        .img-title{
            width: 40px;
            position: absolute;
            top: 15px;
            right: 0px;
        }
        .hrs .hr-r{
            border: 2px solid #93171a;
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
        }
        .hrs .hr-l{
            border: 2px solid #ed3537;
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
        }
        .title-container{
            margin-right: 20px;
            position: relative;
        }
        .content-container{
            padding-right: 20px;
            padding-left: 5px;
        }
        .title-container h1{
            color: #414141;
            font-size: 38px;
        }
        .title-container .empphasize{
            color: #de1f29;
        }
        .title-container .p-en{
            display: block;
            text-transform: uppercase;
            font-weight: 400;
            font-size: 22px;
        }
        @media(max-width: 768px)
        {
            .title-container h1{
                padding-right: 50px!important;
                font-size: 25px;
            }
            .title-container .p-en
            {
                font-size: 17px;
            }
        }
    </style>
    <div class="container bg-white m-auto">
        <div class="row">
            
            <div class="col-md-12">
                <div class="title-container text-center mr-0">

                    <h1 class="text-primary-theme pt-3 mb-0 px-3">
                        تماس با
                        <span class="empphasize">ما</span>
                        <p class="p-en">
                            Contact
                            <span class="empphasize">Us</span>
                        </p>
                    </h1>
                </div>
                <div class="hrs mx-auto col-md-4">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
                <div class="content-container text-center py-5">
                    <?php echo $setting->contact_description; ?>

                </div>
                <div class="hrs col-md-12">
                    <div class="row">






                    </div>
                </div>
            </div>

        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>