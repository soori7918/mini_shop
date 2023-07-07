
<?php $__env->startSection('content'); ?>
    <style>
        body {
            background: #525659 !important;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 father_box bg-white mt-5">
                <div class="box_top">
                    <div class="head_pic text-center mb-5">
                        <img src="https://www.khaneistanbul.com.tr/source/assets/new/img/logo/logo-white-big.png" alt="">
                    </div>
                    <div class="info1">
                        <h1><?php echo e($project->name); ?></h1>
                        <span>شروع
                        <span class="start_price">قیمت :<?php if($project->price!=null and $project->price!='' and $project->price!=0): ?><?php echo e(number_format($project->price)); ?> لیر<?php else: ?> تماس بگیرید<?php endif; ?></span></span>

                    </div>
                    <div class="pic mt-4">
                        <?php if($project->pic_1): ?>
                            <img src="<?php echo e(url($project->pic_1->path)); ?>" alt="<?php echo e($project->name); ?>">
                        <?php endif; ?>
                        <div class="up_box">
                            <div class="up_box_inner">
                                <img src="<?php echo e(asset('img/up_box.png')); ?>" class="py-3 px-3" alt="<?php echo e($project->name); ?>">

                            </div>
                        </div>
                        <div class="info_bottom_pic row">
                            <div class="col-md-9 py-3">
                                <h2><?php echo e($project->place_description); ?></h2>
                                <p><?php echo e($project->short_text_1); ?></p>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="box_top">
                </div>
                <div class="whit_pic">
                    <?php if($project->pic_2): ?>
                        <img src="<?php echo e(url($project->pic_2->path)); ?>" alt="<?php echo e($project); ?>">
                    <?php endif; ?>
                    <div class="up_left">
                        <img src="https://www.khaneistanbul.com.tr/source/assets/new/img/logo/logo-white-big.png"
                             alt="<?php echo e($project->name); ?>">
                    </div>
                    <div class="bottom_info">
                        <p class="text-center py-4 px-5"><?php echo e($project->count_description); ?></p>
                    </div>
                </div>
                <div class="whit_pic">
                    <?php if($project->pic_3): ?>
                        <img src="<?php echo e(url($project->pic_3->path)); ?>" alt="<?php echo e($project->name); ?>">
                    <?php endif; ?>
                    <div class="up_left">
                        <?php echo e($project->meter_description); ?>

                    </div>
                </div>
                <?php if($project->map_pic): ?>
                    <div class="whit_pic">
                        <img src="<?php echo e(url($project->map_pic->path)); ?>" alt="">
                        
                        
                        
                    </div>
                <?php endif; ?>
                <div class="whit_pic bg-light overflow-hidden">
                    <div class="row access_box"
                         style="background-image:url('<?php echo e($project->access_bg?url($project->access_bg->path):''); ?>')">
                        <div class="col-md-6 py-4 px-5">
                            <span class="access_title">دسترسی ها</span>
                            <?php echo $project->access_text; ?>

                        </div>

                    </div>
                    <div class="up_left up_bottom_1">
                        <img src="https://www.khaneistanbul.com.tr/source/assets/new/img/logo/logo-white-big.png" alt="">
                    </div>
                </div>
                
                
                
                
                
                
                
                
                <?php if($project->pic_4): ?>
                    <div class="whit_pic">
                        <div class="box_bottom pt-0">
                            <div class="pic">
                                <img src="<?php echo e(url($project->pic_4->path)); ?>" alt="">
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                <?php endif; ?>
                <?php if($project->pic_5): ?>
                    <div class="whit_pic">
                        <img src="<?php echo e(url($project->pic_5->path)); ?>" alt="<?php echo e($project->name); ?>">
                        
                        
                        
                        
                    </div>
                <?php endif; ?>
                <?php if($project->single_sample): ?>
                    <div class="whit_pic mt-5">
                        <div class="pic">
                            <img src="<?php echo e(url($project->single_sample->path)); ?>" alt="<?php echo e($project->name); ?>">
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                <?php endif; ?>
                <?php if($project->possibilities): ?>
                    <div class="whit_pic mt-5">
                        <div class="pic">
                            <img src="<?php echo e(url($project->possibilities->path)); ?>" alt="<?php echo e($project->name); ?>">
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                <?php endif; ?>
                <?php if($project->icon_possibilities): ?>
                    <div class="whit_pic mt-5">
                        <div class="pic">
                            <img src="<?php echo e(url($project->icon_possibilities->path)); ?>" alt="<?php echo e($project->name); ?>">
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                <?php endif; ?>
                <?php if($project->map_home): ?>
                    <div class="whit_pic mt-5">
                        <div class="pic">
                            <img src="<?php echo e(url($project->map_home->path)); ?>" alt="">
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                <?php endif; ?>
                <div class="footer_project">
                    <div class="pic">
                        <img src="<?php echo e(asset('img/pro_bg.jpg')); ?>" alt="">
                    </div>
                    <div class="box_bottom ">

                    </div>
                </div>

            </div>
            <div class="col-md-9 father_box py-5">

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>