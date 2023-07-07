
<header
        class="landing_header d-flex justify-content-center align-items-center shadow-sm position-relative position-relative">
    <nav class="container">

        <div class="d-flex justify-content-center align-items-center landing_m-lg-2rem">
            <button class="landing_btn-menu bg-unset border-0 position-absolute" style="right: 10px; z-index: 2;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                     class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <a href="#" class="logo">
                <img src="https://estate4istanbul.com/wp-content/uploads/2022/02/خرید-ملک-در-استانبول3-1.png"
                     style="width: 35%;" alt="">
            </a>
            <menu class="" id="landing_menu">
                <ul class="d-flex landing_text-menu">
                    <button class="landing_close bg-unset border-0 mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                             class="bi bi-x" viewBox="0 0 16 16">
                            <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        
                        
                        <li class="pad px-2 py-4 <?php echo e($menu->children->count() ? 'position-relative li-hover' : ''); ?>">
                            <a href="../page/about-us.html" class="text-a px-2"><?php echo e($menu->title); ?></a>

                            <?php if($menu->children->count()): ?>
                                <ul class="sub-menu">
                                    <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="menu-item px-lg-3 py-2 ">
                                            <a class="menu-item-link py-2" href="<?php echo e($child->url); ?>"><?php echo e($child->title); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </ul>
            </menu>
        </div>
    </nav>
</header>