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


                    <table id="dataTable" class="archive-table">
                        <thead>
                        <tr>
                            <th>تعداد اتاق</th>
                            <th>قیمت</th>
                            <th>مساحت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $project->metrages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->room); ?>

                                </td>
                                <td>
                                    <?php echo e($item->price); ?>

                                </td>
                                <td>
                                    <?php echo e($item->metrage); ?>

                                </td>

                                <td width="160">
                                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                                        <div class="btn-inline pt-0">
                                            <a href="<?php echo e(route('meterage.edit',[ $project->id, $item->id])); ?>"
                                               class="btn btn-warning float-left mx-1 mb-0"><i
                                                        class="fa fa-edit ml-1"></i>ویرایش</a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['meterage.destroy', $project->id] ]); ?>

                                            <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                            <?php echo Form::close(); ?>

                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>





                <?php if(!auth()->user()->hasRole('watcher')): ?>
                    <div class="paginate p-3 d-flex">
                        <a href="<?php echo e(route('meterage.create',$project->id)); ?>" class="btn btn-rounded btn-primary float-left"><i
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