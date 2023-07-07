<?php $__env->startComponent('layouts.back'); ?>
    <?php
    if($user->location!=null)
    {
        $user_loc = unserialize($user->location);
    }
    else {
        $user_loc=null;
    }
    ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h4><?php echo e($title); ?></h4>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('user-permissions-update', ['id' => $user->id])); ?><?php echo e(request('callback_url')?'?callback_url='.request('callback_url'):''); ?>" method="post"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-row">

                        <div class="col-md-12">
                            <label for="instant">دسترسی ها</label>
                            <?php echo Form::select('role_name[]',array_pluck(\App\Role::all(),'name','name'),$user->getRoleNames(),['class'=>'form-control selectpicker','multiple']); ?>

                        </div>
                        <div class="col-md-6">
                            <label for="instant">بخش ها</label>
                            <?php echo Form::select('model',\App\User::models(),null,['class'=>'form-control selectpicker']); ?>

                        </div>
                        <div class="col-md-6">
                            <label for="instant">امکانات</label>
                            <?php echo Form::select('permissions[]',\App\User::permissionNames(),$user->getRoleNames(),['class'=>'form-control selectpicker','multiple']); ?>

                        </div>

                        <div class="col-md-12 mt-5">
                            <div class="col-md-12">
                                <table id="dataTable" class="archive-table">
                                    <thead>
                                    <tr>
                                        <th>بخش</th>
                                        <th>امکان</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $user->getDirectPermissions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $model=explode('_',$item->name)[1];$permission=explode('_',$item->name)[0]; ?>
                                        <tr>
                                            <td>
                                                <?php echo e(\App\User::models()[$model]); ?>

                                            </td>
                                            <td>
                                                <?php echo e(\App\User::permissionNames()[$permission]); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-3 mt-4 mr-auto">
                            <button type="submit" class="btn btn-block btn-success">ویرایش</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
        <style>
            .set-bg {
                text-align: center;
                background: #eeeeee61;
                color: #000;
                padding: 20px;
                border-radius: 5px;
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable( {
                    pageLength: 25,
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0 ]
                    } ]
                } );
            } );
        </script>
        <script>
            $('#budget').mask("#,##0", {reverse: true});
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
        <script type="text/javascript">
            $('.date-picker').each(function () {
                $(this).datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
            $('.select2').each(function () {
                $(this).select2();
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
