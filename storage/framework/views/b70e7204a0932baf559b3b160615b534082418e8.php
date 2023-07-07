<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .dd-list {
                direction: rtl;
                text-align: right;
            }

            .dd-item {
                background: #ca5858;
                margin-bottom: 10px;
                padding: 5px 15px;
                line-height: 40px;
                border-radius: 3px;
            }

            .dd-handle {
                display: inline-block;
            }

            .btn-inline {
                display: inline-flex;
                float: left;
            }

            .archive-table thead {
                background: #b41f25;
                line-height: 4;
            }

            .archive-table tbody tr {
                border-bottom: 2px solid #fd7a7a;
            }

            form input[type="number"] {
                width: 55px;
                text-align: center;
                border-radius: 50px;
                border: unset;
                box-shadow: 0 0 1px 1px #343333;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">

                    <?php if(count($categories)): ?>
                        <table id="dataTable" class="archive-table">
                            <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>وضعیت</th>
                                <th>کل واحد ها</th>
                                <th>فروخته شده</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e($category->pic!=null?url($category->pic):''); ?>" width="55" alt="">
                                    </td>
                                    <td>
                                        <?php echo e($category->name); ?>

                                        ( <?php echo e($category->user?$category->user['first_name'].' '.$category->user['last_name']:'مریم کیامرام'); ?>

                                        )
                                    </td>
                                    <td>
                                        <?php switch($category->status):
                                            case ('pending'): ?>
                                            <span class="badge badge-danger">عدم نمایش</span>
                                            <a href="<?php echo e(route('villa-category-active',[$category->id,'published'])); ?>"><span class="badge badge-success"><i class="fa fa-check"></i> </span></a>
                                            <?php break; ?>
                                            <?php case ('published'): ?>
                                            <span class="badge badge-success">نمایش</span>
                                            <a href="<?php echo e(route('villa-category-active',[$category->id,'pending'])); ?>"><span class="badge badge-danger"><i class="fa fa-close"></i> </span></a>
                                            <?php break; ?>
                                            <?php default: ?>
                                        <?php endswitch; ?>
                                    </td>
                                    <td>
                                        <?php echo e($category->count_all_unit); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::open(['method' => 'POST', 'route' => ['villa-category-update-count', $category->id],'id'=>'form_count_'.$key ]); ?>

                                        فروش رفته

                                        <input type="number" name="count" value="<?php echo e($category->count_sale_unit); ?>" class="counter" data-id="<?php echo e($key); ?>">
                                        <?php echo Form::close(); ?>

                                    </td>
                                    <td width="160">
                                        <?php if(!auth()->user()->hasRole('watcher')): ?>
                                            <div class="btn-inline pt-0">
                                                <a href="<?php echo e(route('villa-category-edit', $category->id)); ?>"
                                                   class="btn btn-warning float-left mx-1 mb-0"><i
                                                            class="fa fa-edit ml-1"></i>ویرایش</a>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['villa-category-destroy', $category->id] ]); ?>

                                                <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                                <?php echo Form::close(); ?>

                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        موردی وجود ندارد
                    <?php endif; ?>

            
                <?php if(!auth()->user()->hasRole('watcher')): ?>
                    <div class="paginate p-3 d-flex">
                        <a href="<?php echo e(route('villa-category-create')); ?>" class="btn btn-rounded btn-primary float-left"><i
                                    class="fa fa-circle-o ml-1"></i>افزودن</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(url('assets/admin/js/easing.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(url('assets/admin/js/nestable.min.js')); ?>"></script>
        <script type="text/javascript">
            $('.dd').nestable();
            
                
                    
                    
                
                    
                
            
            $(".counter").on('change', function () {
                var id=$(this).attr('data-id');
                $('#form_count_'+id).submit();
            })
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>