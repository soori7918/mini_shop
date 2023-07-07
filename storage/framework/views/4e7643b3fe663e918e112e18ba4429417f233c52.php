
<?php $__env->startSection('style_css'); ?>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <style>
        .swiper {
            width: 100%;
            height: 500px;
        }
        .swiper-slide img{
            border-radius: 20px;
            width: 100%;
            height: 100%;
        }
        .property_list{
            display: flex;
        }

    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>


    <!-- PAGE DETAILS AREA START (portfolio-details) -->
    <div class="body">
        <section class="project ">
            <div class="container">

                <div class="row card my-4shadow-sm rounded-sm p-3">
                    <div class="image_agent_card">
                        <img src="<?php echo e(url($agent->photo)); ?>"  />
                    </div>
                    <div class="row">
                        <div class="col-lg-3 py-3 col-12">
                            <div class="">
                                <label>نام و نام خانوادگی :</label>
                                <p><?php echo e($agent->name); ?></p>
                            </div>
                        </div>
                        <div class="col-lg-12 py-3 col-12">
                            <div class="">
                                <label>توضیحات : </label>
                                <p><?php echo $agent->description; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3 col-12">
                            <div class="">
                                <label>آدرس :</label>
                                <p><?php echo $agent->address; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- PAGE DETAILS AREA END -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>