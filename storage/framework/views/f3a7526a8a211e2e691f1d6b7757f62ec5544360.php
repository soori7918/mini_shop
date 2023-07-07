
<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="<?php echo e($item->keywords); ?>">
    <meta name="description" content="<?php echo e($item->description); ?>"/>
    <meta property="og:title" content="<?php echo e($item->page_title); ?>"/>
    <meta property="og:description" content="<?php echo e($item->description); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style_css'); ?>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <style>
        .swiper {
            height: 300px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <div class="body">
        <section class="blog py-3">
      <div class="container">
          <div class="row">
              <div class="col-12 col-lg-8 p-2">
                  <div class="col-12 bg-white shadow-sm ">
                    <div class="blog_image">
                        <img src="<?php echo e(url($item->photo ?: 'assets/user/pic/blog1.jpg')); ?>" />
                    </div>
                    <div class="d-flex align-items-center justify-content-center p-2">
                        <div class="text-center text-dark px-2">
                            <i class="far fa-user px-2"></i><a><?php echo e($item->user?$item->user->first_name.' '.$item->last_name:$item->author); ?></a>
                        </div>
                        <div class="text-center text-dark px-2">
                            <i class="far fa-calendar-alt px-2"></i><?php echo e(my_jdate($item->created_at,'Y/m/d')); ?>

                        </div>
                        <div class="text-center text-dark px-2">
                            <a><i class="far fa-eye px-2"></i><?php echo e($item->seen); ?></a>
                        </div>
                    </div>
                    <div class="blog_detail p-2">
                        <h3 class="py-3 text-center"><?php echo e($item->title); ?></h3>
                        <?php echo $item->text; ?>

                    </div>
                      <div class="col-12">
                          <h4 class="text-center py-3">آخرین نوشته ها</h4>
                          <div class="swiper">
                              <!-- Additional required wrapper -->
                              <div class="swiper-wrapper">
                                  <!-- Slides -->
                                  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="swiper-slide"><img src="<?php echo e($blogs->photo?url($blogs->photo):url('assets/user/pic/product.jpg')); ?>" /></div>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                              <!-- If we need pagination -->
                              <div class="swiper-pagination"></div>

                              <!-- If we need navigation buttons -->
                              <div class="swiper-button-prev"></div>
                              <div class="swiper-button-next"></div>

                          </div>
                      </div>
                  </div>
              </div>


              <div class="col-12  col-lg-4 p-2">
                  <div class="col-12 bg-white shadow-sm mx-2">
                        <ul>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="py-2 category_item"><i class="fa fa-hand-o-left px-2" aria-hidden="true"></i><?php echo e($category->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                  </div>

              </div>
          </div>
      </div>
  </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?>

    <script>
        var swiper = new Swiper(".swiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
            },
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>