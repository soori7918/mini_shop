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
                        <?php echo e($title??''); ?>

                    </h4>
                </div>
            </div>
            <div class="card-body">











                <div class="table-responsive">
                    <style>
                        #dataTable_wrapper .col-md-6{
                            padding: 0 10px;
                        }
                    </style>
                    <table id="dataTable" class="archive-table table">
                        <thead>
                            <tr>
                                <th>نام</th>
                                <?php if(request()->type!='all'): ?>
                                <?php if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')): ?>
                                <th>معرف</th>
                                <?php endif; ?>
                                <th>شغل</th>
                                <th>جنسیت</th>
                                <th>نوع درخواست</th>
                                <th>خواب</th>
                                <th>تاریخ اعلام</th>
                                <th>تاریخ ثبت نام</th>
                                <th>مناطق</th>
                                <th>نوع</th>
                                <th>کاربری</th>
                                <th>بودجه</th>
                                <th>موقعیت جغرافیایی</th>
                                <th>مشاوره آنلاین</th>
                                <th>عجله دارد</th>
                                <?php if(!auth()->user()->hasRole('مدیر ملک')): ?>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php if(request()->type=='all'): ?>
                                <th>دسترسی ها</th>
                                <?php endif; ?>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>#<?php echo e($user->id); ?> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>









                                    <?php if($user->user): ?>
                                        <span
                                            class="badge badge-warning">نام کارشناس معرف : <?php echo e($user->user->first_name .' ' . $user->user->last_name); ?></span>
                                <?php endif; ?>
                                <?php if(request()->type!='all'): ?>
                                <?php if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')): ?>
                                <td><?php echo e($user->user?$user->first_name.' '.$user->last_name:'بدون معرف'); ?></td>
                                <?php endif; ?>
                                <td><?php echo e($user->job); ?></td>
                                <td><?php echo e($user->gender == 0 ? 'مرد' : 'زن'); ?></td>
                                <td>
                                    <?php if(!is_null($user->type_request)): ?>
                                    <?php
                                        $is_serialized=is_serialized($user->type_request);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e($user->type_request == 'rent' ? 'اجاره' : 'خرید'); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->type_request))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->type_request); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($property == 'rent' ? 'اجاره' : 'خرید'); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(!is_null($user->room_number)): ?>
                                    <?php
                                        $is_serialized=is_serialized($user->room_number);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e($user->room_number); ?>

                                    <?php else: ?>
                                    <?php if(gettype(unserialize($user->room_number))=='array'): ?>
                                        <?php $__currentLoopData = unserialize($user->room_number); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($property); ?> ,
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($user->date); ?></td>
                                <td><?php echo e($user->created_at); ?></td>
                                <td>
                                    <?php if(!is_null($user->location)): ?>
                                    <?php
                                        $is_serialized=is_serialized($user->location);
                                    ?>
                                    <?php if($is_serialized): ?>
                                        <?php if(gettype(unserialize($user->location))=='array'): ?>
                                        <?php $__currentLoopData = unserialize($user->location); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php echo e($property); ?> ,



                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(!is_null($user->property_type)): ?>
                                        <?php
                                            $is_serialized=is_serialized($user->property_type);
                                        ?>
                                        <?php if(!$is_serialized): ?>
                                            <?php echo e(\App\Villa::types()[$user->property_type]??''); ?>

                                        <?php else: ?>
                                            <?php if(gettype(unserialize($user->property_type))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->property_type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e(\App\Villa::types()[$property]??''); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(!is_null($user->property_usage)): ?>
                                    <?php
                                        $is_serialized=is_serialized($user->property_usage);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e(\App\Villa::usering()[$user->property_usage]); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->property_usage))=='array'): ?>
                                        <?php $__currentLoopData = unserialize($user->property_usage); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e(\App\Villa::usering()[$property]); ?> ,
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(auth()->user()->hasRole('call center(sales)')): ?>
                                        <?php if($user->budget_sales): ?>
                                        <?php echo e($user->budget_sales); ?>

                                        <?php echo e($user->budget_type); ?>

                                        <?php endif; ?>
                                    <?php elseif(auth()->user()->hasRole('call center')): ?>
                                        <?php echo e($user->budget_sales?'(اجاره '.$user->budget_sales. ' لیر)':''); ?>

                                        <?php echo e($user->budget?'(خرید '.$user->budget. ' لیر)':''); ?>                                    <?php else: ?>
                                        <?php echo e($user->budget_sales?'(اجاره '.$user->budget_sales. ' لیر)':''); ?>

                                        <?php echo e($user->budget?'(خرید '.$user->budget. ' لیر)':''); ?>                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($user->living_country == 'iran'): ?>
                                        ایران
                                    <?php elseif($user->living_country == 'turkey'): ?>
                                        ترکیه
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($user->consulting == 0): ?>
                                        ندارد
                                    <?php elseif($user->consulting == 1): ?>
                                        دارد
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($user->instant); ?></td>
                                <?php if(!auth()->user()->hasRole('مدیر ملک')): ?>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->mobile); ?></td>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php if(request()->type=='all'): ?>
                                    <td>
                                        <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($role_name); ?> ,
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                <?php endif; ?>
                                <td width="140">
                                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                                    <div class="btn-inline">
                                        <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                                        
                                        
                                        <a href="<?php echo e(route('user-edit', [$user->id])); ?>?callback_url=<?php echo e(url(\Request::getRequestUri())); ?>"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        <?php if($user->account_status != 'blocked'): ?>
                                            <?php echo Form::open(['method' => 'POST', 'route' => ['user-block', $user->id] ]); ?>

                                            <?php echo Form::button('<i class="fa fa-ban ml-1"></i>بلاک', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger float-left mr-1', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>

                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['user-destroy', $user->id] ]); ?>

                                        <?php echo Form::button('<i class="fa fa-times ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger float-left mr-1', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                        <?php echo Form::close(); ?>


                                        <?php endif; ?>

                                        <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                                            <a href="<?php echo e(route('customer-show', $user->id)); ?>" class="btn btn-sm btn-warning mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                        <?php endif; ?>
                                        <?php if(auth()->check() && auth()->user()->hasRole('call center')): ?>
                                            <a href="<?php echo e(route('user-questionnaire',$user->id)); ?>" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-info ml-1"></i>پرسش نامه</a>
                                            <a href="<?php echo e(route('user-edit', [$user->id])); ?>?callback_url=<?php echo e(url(\Request::getRequestUri())); ?>"
                                               class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i></a>
                                            <a href="javascript:void(0)" data-target="#removeModal" onclick="$('#remove_user_id').val('<?php echo e($user->id); ?>')" data-toggle="modal" class="btn btn-warning float-left mr-1">
                                                <i class="fa fa-ban ml-1"></i>حذف
                                            </a>
                                        <?php endif; ?>
                                        <?php if(auth()->check() && auth()->user()->hasRole('call center(sales)')): ?>
                                            <a href="<?php echo e(route('user-questionnaire',$user->id)); ?>" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-info ml-1"></i>پرسش نامه</a>
                                            <a href="<?php echo e(route('user-edit', [$user->id])); ?>?callback_url=<?php echo e(url(\Request::getRequestUri())); ?>"
                                               class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i></a>
                                            <a href="javascript:void(0)" data-target="#removeModal" onclick="$('#remove_user_id').val('<?php echo e($user->id); ?>')" data-toggle="modal" class="btn btn-warning float-left mr-1">
                                                <i class="fa fa-ban ml-1"></i>حذف
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal" id="removeModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('user-remove')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">حذف کار بر از لیست</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="remove_user_id" type="hidden" name="id" value="">
                                    <textarea name="remove_reason" class="form-control" id="" cols="30" rows="10" placeholder="دلیل"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="paginate p-3">

                    
                    
                    
                    
                    

                    
                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                        <a href="<?php echo e(route('user-create')); ?>?callback_url=<?php echo e(url(\Request::getRequestUri())); ?>"
                           class="btn btn-rounded btn-primary float-left"><i
                                class="fa fa-circle-o ml-1"></i>افزودن</a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable( {
                    pageLength: 10,
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0 ]
                    } ]
                } );
            } );
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
