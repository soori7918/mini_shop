<?php if(isset($blog)): ?>
    <div class="ltn__blog-item ltn__blog-item-3">
        <div class="ltn__blog-img">
            <a href="<?php echo e(route('user.blog.show',$blog->id)); ?>"><img src="<?php echo e($blog->photo?url($blog->photo):url('source/assets/user/rtl/img/blog/1.jpg')); ?>" alt="<?php echo e($blog->title); ?>"></a>
        </div>
        <div class="ltn__blog-brief">
            <div class="ltn__blog-meta">
                <ul>
                    <li class="ltn__blog-author">
                        <a href="<?php echo e(route('user.blog.show',$blog->id)); ?>"><i class="far fa-user"></i><?php echo e($blog->user?$blog->user->first_name.' '.$blog->last_name:$blog->author); ?></a>
                    </li>
                    
                    
                    
                </ul>
            </div>
            <h3 class="ltn__blog-title"><a href="<?php echo e(route('user.blog.show',$blog->id)); ?>"><?php echo e($blog->title); ?></a></h3>
            <div class="ltn__blog-meta-btn">
                <div class="ltn__blog-meta">
                    <ul>
                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i><?php echo e(my_jdate($blog->created_at,'Y/m/d')); ?></li>
                    </ul>
                </div>
                <div class="ltn__blog-btn">
                    <a href="<?php echo e(route('user.blog.show',$blog->id)); ?>">بیشتر</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>