<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h4>
                        <?php echo e($title); ?>

                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="<?php echo e(route('user-search')); ?>" method="post" style="width: 95%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6" style="padding-left: 0;">
                                <input type="text" name="search" class="form-control" placeholder="جستجو...">
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding-right: 0;">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <?php echo e(csrf_field()); ?>

                    </form>
                    <style>
                        #dataTable_wrapper .col-md-6{
                            padding: 0 10px;
                        }
                    </style>
                    <table id="dataTable" class="archive-table table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>کارشناس</th>
                            <th>مبلغ کمیسیون</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td>
                                <?php if($item->expert): ?>
                                    <?php echo e($item->expert->first_name); ?> <?php echo e($item->expert->last_name); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($item->price??'وارد نشده'); ?> <?php echo e($item->price_type); ?></td>
                            <td>
                                <div class="d-flex">
                                    <a href="<?php echo e(route('contract-customers',$item->expert_id)); ?>" class="btn btn-warning float-left mr-1">
                                        <i class="fa fa-users ml-1"></i>مشتریان
                                    </a>
                                    <?php if(!request()->type=='canceled'): ?>
                                        <a href="<?php echo e(route('contract-show',$item->id)); ?>" class="btn btn-info float-left mr-1">
                                            <i class="fa fa-check ml-1"></i>جزئیات
                                        </a>
                                    <?php endif; ?>
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
                <div class="paginate p-3">
                    <?php echo e($items->links()); ?>

                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable( {
                    pageLength: 25,
                    order: [[ 0, "desc" ]],
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0 ]
                    } ],
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
