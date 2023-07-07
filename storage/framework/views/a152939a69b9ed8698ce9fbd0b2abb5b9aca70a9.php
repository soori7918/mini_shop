<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .gallery-item{

            }
            .gallery-item img{
                border-radius: 5px;
                margin: 0 3px;
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
            <div class="col-md-12">
                <?php echo $__env->make('panel.villas.searchForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="row" style="border: 0px solid #e5eaef;background-color: rgba(255, 255, 255, 0.2);padding: 10px 0 0 0;">
                        <div class="col-sm-12 col-md-12">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <form action="<?php echo e(route('villa-find',$type)); ?>" method="get">
                                    <label>
                                        <input type="search" name="search" class="form-control form-control-sm" placeholder="عنوان یا کد ملک">
                                        <button type="submit" style="width: 100px" class="btn btn-primary">پیدا کن</button>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php if(count($villas)): ?>
                        <table id="dataTable" class="archive-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>عنوان</th>
                                <?php if(!isMobile()): ?>
                                <th>تصاویر</th>
                                <th>وضعیت</th>
                                <th>کاربر</th>
                                <th>قیمت</th>
                                <th>منطقه</th>
                                <th>بازدید</th>
                                <?php endif; ?>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $villas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $soldout=\App\Contract::where('villa_id',$villa->id)->first(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($villa->id); ?>

                                    </td>
                                    <td>
                                        <?php if($soldout): ?>
                                        <span class="badge badge-danger">فروخته شده</span>
                                        <?php endif; ?>
                                        <?php echo e($villa->name); ?>

                                    </td>

                                    <?php $status_villa="" ?>
                                    <?php if(!isMobile()): ?>
                                    <td>
                                        <div class="" style="display: flex">
                                            <?php $__currentLoopData = $villa->photos->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="gallery-item" data-id="<?php echo e($photo->id); ?>">
                                                    <a href="<?php echo e(url($photo->path)); ?>" target="_blank"><img style="width: 30px;" src="<?php echo e(url($photo->path)); ?>"></a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php switch($villa->status):
                                            case ('pending'): ?>
                                            <span class="badge badge-warning">درانتظار تایید</span>
                                            <?php break; ?>
                                            <?php case ('published'): ?>
                                            <span class="badge badge-success"><?php echo e($status_villa='تایید شده'); ?></span>
                                            <?php break; ?>
                                            <?php case ('failed'): ?>
                                            <span class="badge badge-danger"><?php echo e($status_villa='رد شده'); ?></span>
                                            <?php break; ?>
                                            <?php default: ?>
                                        <?php endswitch; ?>
                                    </td>
                                    <td>
                                        <?php if($villa->user_id==auth()->id() || auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('تعیین کننده ملک')): ?>
                                        <?php echo e(($villa->user) ? $villa->user->first_name . ' ' . $villa->user->last_name : 'بودن ادمین'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning py-2"><?php echo e(number_format($villa->price)); ?></span>
                                    </td>
                                    <td><?php echo e($villa->location?$villa->location->name:''); ?></td>
                                    <td class="text-center"><?php echo e($villa->view); ?></td>
                                    <?php endif; ?>
                                    <td width="140">
                                        <?php if(!auth()->user()->hasRole('watcher')): ?>
                                        <div class="row">
                                            <div class="col-md-12 px-1 pb-1">
                                                <a href="<?php echo e(route('front.villas.preview',[$villa->id,auth()->id()])); ?>"
                                                   class="btn btn-success float-left w-100" target="_blank">
                                                    <i class="fa fa-paper-plane"></i>  اشتراک گذاری
                                                </a>
                                            </div>
                                            <?php if(auth()->check() && auth()->user()->hasRole('تعیین کننده ملک')): ?>
                                            <div class="col-md-12 px-1 pb-1">
                                                <a href="<?php echo e(route('villa-show', $villa->id)); ?>"
                                                   class="btn  btn-info float-left w-100 "><i
                                                            class="fa fa-eye ml-1"></i>بررسی
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                                            <?php if($villa->status=='published' || $villa->status=='failed'): ?>
                                            <div class="col-md-6 px-1 pb-1">
                                                <a href="javascript:void(0);"
                                                   class="btn  btn-info float-left  modal_show w-100" data-name="<?php echo e($villa->name); ?>" data-user="<?php echo e($villa->user_active?$villa->user_active->first_name.' '.$villa->user_active->last_name : 'ثبت نشده'); ?>" data-create="<?php echo e(my_jdate($villa->created_at,'Y/m/d')); ?>" data-date="<?php echo e(is_null($villa->date_active)?'ثبت نشده':my_jdate($villa->date_active,'Y/m/d')); ?>" data-status="<?php echo e($status_villa); ?>">
                                                    <i class="fa fa-info"></i>  جزئیات
                                                </a>
                                            </div>
                                            <div class="col-md-6 px-1 pb-1">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['villa-destroy', $villa->id] ]); ?>

                                                <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn  btn-danger float-left w-100 ', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                                <?php echo Form::close(); ?>

                                                </div>
                                            <?php endif; ?>
                                            <div class="col-md-6 px-1 pb-1">
                                                <a href="<?php echo e(route('villa-show', $villa->id)); ?>"
                                                   class="btn  btn-info float-left w-100 "><i
                                                        class="fa fa-eye ml-1"></i><?php echo e((Auth::user()->id == 1) ? 'بررسی' : 'مشاهده'); ?>

                                                </a>
                                            </div>

                                            <div class="col-md-6 px-1 pb-1">
                                                <a href="<?php echo e(route('villa-edit', $villa->id)); ?>"
                                                   class="btn  btn-info float-left w-100 "><i
                                                            class="fa fa-edit ml-1"></i>ویرایش</a>
                                            </div>

                                            <?php endif; ?>
                                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                                            <div class="col-md-6 px-1 pb-1">
                                                <a href="<?php echo e(route('villa-show', $villa->id)); ?>"
                                                   class="btn  btn-info float-left w-100 "><i
                                                            class="fa fa-eye ml-1"></i><?php echo e((Auth::user()->id == 1) ? 'بررسی' : 'مشاهده'); ?>

                                                </a>
                                            </div>
                                            <?php if($villa->user_id==auth()->id()): ?>
                                            <div class="col-md-6 px-1 pb-1">
                                                <a href="<?php echo e(route('villa-edit', $villa->id)); ?>"
                                                   class="btn  btn-warning float-left w-100 "><i
                                                            class="fa fa-edit ml-1"></i>ویرایش</a>
                                            </div>
                                            <?php endif; ?>
                                            <div class="col-md-6 px-1 pb-1">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['villa-destroy', $villa->id] ]); ?>

                                                <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn  btn-danger float-left w-100 ', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                                <?php echo Form::close(); ?>

                                            </div>
                                            <?php endif; ?>
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
                </div>
                <div class="paginate p-3">
                    <?php echo e($villas->links()); ?>

                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                    <a href="<?php echo e(route('villa-create')); ?>" class="btn btn-rounded btn-primary float-left"><i
                            class="fa fa-circle-o ml-1"></i>افزودن</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_info_villa" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_villa_name"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">وضعیت : </label>
                                <span id="modal_status_show"></span>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">توسط: </label>
                                <span id="modal_user_show"></span>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">زمان تغییر وضعیت: </label>
                                <span id="modal_date_show"></span>
                            </div>
                        <div class="form-group">
                                <label for="message-text" class="col-form-label">زمان ایجاد : </label>
                                <span id="modal_create_show"></span>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $('.modal_show').click(function () {
                var villa_name=$(this).attr('data-name');
                var status=$(this).attr('data-status');
                var user_name=$(this).attr('data-user');
                var tarikh=$(this).attr('data-date');
                var create=$(this).attr('data-create');
                $('#modal_villa_name').text(villa_name);
                $('#modal_status_show').text(status);
                $('#modal_user_show').text(user_name);
                $('#modal_date_show').text(tarikh);
                $('#modal_create_show').text(create);
                $('#modal_info_villa').modal('show')
            })
        </script>
        
            
                
                    
                    
                        
                        
                    
                        
                        
                    
                        
                        
                    
                        
                        
                    
                
            
        
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
