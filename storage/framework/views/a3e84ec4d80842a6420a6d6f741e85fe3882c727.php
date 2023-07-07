
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
                        <img style="height:64px" src="https://www.khaneistanbul.com.tr/source/assets/new/img/logo/logo-white-big.png" alt="">
                    </div>
                    <div class="info1">
                        <h1><?php echo e($item->name); ?></h1>
                        <span>شروع قیمت :
                        <span class="start_price"><?php if($item->price!=null and $item->price!='' and $item->price!=0): ?><?php echo e(number_format($item->price)); ?> لیر<?php else: ?> تماس بگیرید<?php endif; ?></span></span>
                        <ul class="nano-list text-right">
                            <li class="nano-item">
                                <a target="_blank"
                                   href="https://web.whatsapp.com/send?text=<?php echo e(route('front.projects.show', $item->slug)); ?>"
                                   onclick="window.open('https://api.whatsapp.com/send?text=<?php echo e(route('front.projects.show', $item->slug)); ?>')">
                                    <span class="title">اشتراک گذاری واتساپ</span>
                                    <img class="icon" src="<?php echo e(asset('new/img/icon/share.png')); ?>">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="pic mt-4">
                        <?php if($item->pic_1): ?>
                            <img src="<?php echo e(url($item->pic_1->path)); ?>" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>
                        <div class="up_box" style="background-color: transparent !important;">
                            <div class="up_box_inner">
                                <img style="width: 140px;padding: 0 !important;" src="<?php echo e(asset('img/khaneistanbul-stars.png')); ?>" class="py-3 px-3" alt="<?php echo e($item->name); ?>">

                            </div>
                        </div>
                        <div class="info_bottom_pic row">
                            <div class="col-md-9 py-3">
                                <h2><?php echo e($item->place_description); ?></h2>
                                <p><?php echo e($item->short_text_1); ?></p>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="box_top">
                </div>
                <div class="whit_pic">
                    <?php if($item->pic_2): ?>
                        <img src="<?php echo e(url($item->pic_2->path)); ?>" alt="<?php echo e($item); ?>">
                    <?php endif; ?>
                    <div class="up_left">
                        <img style="height:64px" src="https://www.khaneistanbul.com.tr/source/assets/new/img/logo/logo-white-big.png"
                             alt="<?php echo e($item->name); ?>">
                    </div>
                    <div class="bottom_info">
                        <p class="text-center py-4 px-5"><?php echo e($item->count_description); ?></p>
                    </div>
                </div>
                <div class="whit_pic">
                    <?php if($item->pic_3): ?>
                        <img src="<?php echo e(url($item->pic_3->path)); ?>" alt="<?php echo e($item->name); ?>">
                    <?php endif; ?>
                    <div class="up_left">
                        <?php echo e($item->meter_description); ?>

                    </div>
                </div>
                <?php if($item->map_pic): ?>
                    <div class="whit_pic">
                        <img src="<?php echo e(url($item->map_pic->path)); ?>" alt="">
                        
                            
                        
                    </div>
                <?php endif; ?>
                <div class="whit_pic bg-light overflow-hidden">
                    <div class="row access_box"
                         style="background-image:url('<?php echo e($item->access_bg?url($item->access_bg->path):''); ?>')">
                        <div class="col-md-6 py-4 px-5">
                            <span class="access_title">دسترسی ها</span>
                            <?php echo $item->access_text; ?>

                        </div>

                    </div>
                    <div class="up_left up_bottom_1">
                        <img style="height:64px" src="https://www.khaneistanbul.com.tr/source/assets/new/img/logo/logo-white-big.png" alt="">
                    </div>
                </div>
                
                    
                        
                            
                        
                        
                    
                
                <?php if($item->pic_4): ?>
                    <div class="whit_pic">
                        <div class="box_bottom pt-0">
                            <div class="pic">
                                <img src="<?php echo e(url($item->pic_4->path)); ?>" alt="">
                            </div>
                        </div>
                        
                            
                        
                        
                            
                        
                    </div>
                <?php endif; ?>
                <?php if($item->pic_5): ?>
                    <div class="whit_pic">
                        <img src="<?php echo e(url($item->pic_5->path)); ?>" alt="<?php echo e($item->name); ?>">
                        
                            
                                 
                        
                    </div>
                <?php endif; ?>
                <?php if($item->single_sample): ?>
                    <div class="whit_pic mt-5">
                        <div class="pic">
                            <img src="<?php echo e(url($item->single_sample->path)); ?>" alt="<?php echo e($item->name); ?>">
                        </div>
                        
                            
                        
                        
                            
                        
                    </div>
                <?php endif; ?>
                <?php if($item->possibilities): ?>
                    <div class="whit_pic mt-5">
                        <div class="pic">
                            <img src="<?php echo e(url($item->possibilities->path)); ?>" alt="<?php echo e($item->name); ?>">
                        </div>
                        
                            
                        
                        
                            
                        
                    </div>
                <?php endif; ?>
                <?php if($item->icon_possibilities): ?>
                    <div class="whit_pic mt-5">
                        <div class="pic">
                            <img src="<?php echo e(url($item->icon_possibilities->path)); ?>" alt="<?php echo e($item->name); ?>">
                        </div>
                        
                            
                        
                        
                            
                        
                    </div>
                <?php endif; ?>
                <?php if($item->map_home): ?>
                    <div class="whit_pic mt-5">
                        <div class="pic">
                            <img src="<?php echo e(url($item->map_home->path)); ?>" alt="">
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