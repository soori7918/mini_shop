<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php echo e($villa->name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img
                                    src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2 id="name"><?php echo e($title); ?> <?php echo e($villa->name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php if(Auth::user()->id == 1 && $villa->status == 'pending'): ?>
                    <label>تغییرات</label>
                    <div class="row mt-4 mb-4">
                        <?php $__currentLoopData = $changes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$change): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 text-left">
                                <p><?php echo e($key); ?></p>
                            </div>
                            <div class="col-md-9">
                                <p><?php echo $change; ?></p>
                            </div>
                            <hr style="width: 100%">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <div class="row mt-4 mb-4">
                    <div class="col-md-7 post-text">
                        <p class="text-justify"><?php echo str_limit(strip_tags($villa->body), $limit = 300, $end = '...'); ?></p>
                        <hr/>
                        <div id="body">
                            <?php echo html_entity_decode($villa->body); ?>

                        </div>
                        <?php if($villa->gallery): ?>
                            <hr>
                            <p class="text-grey mt-5">گالری</p>
                            <div class="row villa gallery">
                                <?php $__currentLoopData = $villa->gallery->photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3">
                                        <a data-fancybox="gallery" href="<?php echo e(url($photo->path)); ?>">
                                            <img src="<?php echo e(url($photo->path)); ?>" alt="<?php echo e($villa->gallery->name); ?>"/>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <hr>
                            <p class="text-grey mt-5">بدون گالری</p>
                        <?php endif; ?>
                        <?php if(unserialize($villa->nearest) != null): ?>
                            <hr>
                            <p class="text-grey mt-5">ملکهای نزدیک</p>
                            <?php
                                $nearests = unserialize($villa->nearest);
                            ?>
                            <div class="row mt-4">
                                <?php $__currentLoopData = $nearests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nearest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-subtitle mb-2 text-muted"><?php echo e(nearest($nearest)->name); ?></h6>
                                                <p class="card-text text-justify"><?php echo str_limit(strip_tags(nearest($nearest)->body), $limit = 70, $end = '...'); ?></p>
                                                <a href="<?php echo e(route('villa-show', nearest($nearest)->id)); ?>"
                                                   class="card-link float-left text-grey"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-5 post">
                        <?php if($villa->photo): ?>
                            <img src="<?php echo e(url($villa->photo->path)); ?>" alt="<?php echo e($villa->name); ?>">
                        <?php else: ?>
                            <img src="<?php echo e(asset('img/default.jpg')); ?>" alt="<?php echo e($villa->name); ?>">
                        <?php endif; ?>
                        <ul class="list-group mt-3">
                            <li class="list-group-item"><strong>دسته بندی : </strong><?php echo e($villa->category->name); ?></li>
                            <li class="list-group-item"><strong>نام ملک : </strong><?php echo e($villa->name); ?></li>
                            <li class="list-group-item"><strong>محل ملک : </strong><?php echo e($villa->location->name); ?></li>
                            <?php
                                $properties_in = unserialize($villa->properties_in);
                                $properties_out = unserialize($villa->properties_out);
                                $villa_places = unserialize($villa->villa_place);
                            ?>
                            <li class="list-group-item"><strong>ویژگی های داخل : </strong>
                                <ul class="property">
                                    <?php $__currentLoopData = $properties_in; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e(property($property)->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="list-group-item"><strong>ویژگی های خارج : </strong>
                                <ul class="property">
                                    <?php $__currentLoopData = $properties_out; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e(property($property)->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="list-group-item"><strong>مکان ملک : </strong>
                                <ul class="property">
                                    <?php $__currentLoopData = $villa_places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa_place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e(villa_place($villa_place)); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="list-group-item"><strong>بیشترین تعداد مسافران
                                    : </strong><?php echo e($villa->max_passenger); ?></li>
                            <li class="list-group-item"><strong>تعداد اتاق : </strong><?php echo e($villa->number_of_rooms); ?></li>
                            <li class="list-group-item"><strong>تعداد خدمتکاران
                                    : </strong><?php echo e($villa->number_of_servants); ?></li>
                            <li class="list-group-item"><strong>قیمت
                                    : </strong><?php echo e($villa->price); ?> <?php if($villa->price_type == 'rial'): ?>
                                    ریال <?php elseif($villa->price_type == 'dollar'): ?>
                                    دلار <?php elseif($villa->price_type == 'euro'): ?> یورو <?php endif; ?></li>
                            <li class="list-group-item"><strong>تخفیف : </strong><?php if($villa->discount == null): ?>
                                    ندارد <?php else: ?><?php echo e($villa->discount); ?> <?php if($villa->price_type == 'rial'): ?>
                                        ریال <?php elseif($villa->price_type == 'dollar'): ?>
                                        دلار <?php elseif($villa->price_type == 'euro'): ?>
                                        یورو <?php endif; ?> <?php endif; ?></li>
                            <li class="list-group-item"><strong>تاریخ ثبت
                                    : </strong><?php echo e(my_jdate($villa->created_at, 'd F Y H:i')); ?></li>
                            <li class="list-group-item"><strong>تاریخ بروزرسانی
                                    : </strong><?php echo e(my_jdate($villa->updated_at, 'd F Y H:i')); ?></li>
                            <li class="list-group-item"><strong>وضعیت : </strong><?php if($villa->status == 'published'): ?><span
                                        class="badge badge-success">منتشر شده</span><?php elseif($villa->status == 'pending'): ?>
                                    <span
                                            class="badge badge-warning">در انتظار تایید</span><?php elseif($villa->status == 'draft'): ?>
                                    <span class="badge badge-secondary">پیش نویس</span>
                                <?php elseif($villa->status == 'failed'): ?>
                                    <span class="badge badge-danger">رد شده</span>
                                <?php endif; ?></li>
                        </ul>
                    </div>
                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <a href="<?php echo e(route('villa-edit', $villa->id)); ?>" class="btn btn-rounded btn-primary float-left mr-1"><i
                            class="fa fa-edit ml-1"></i>ویرایش</a>
                <?php if(Auth::user()->id == 1): ?>
                    <form action="<?php echo e(route('villa-verify')); ?>" method="post" class="m-auto">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="status" value="published">
                        <input type="hidden" name="id" value="<?php echo e($villa->id); ?>">
                        <button class="btn btn-rounded btn-success float-left mr-1">تایید</button>
                    </form>
                    <form action="<?php echo e(route('villa-verify')); ?>" method="post" class="m-auto">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="status" value="failed">
                        <input type="hidden" name="id" value="<?php echo e($villa->id); ?>">
                        <button class="btn btn-rounded btn-danger float-left mr-1">رد</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/fancybox.min.css')); ?>"/>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/fancybox.min.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>