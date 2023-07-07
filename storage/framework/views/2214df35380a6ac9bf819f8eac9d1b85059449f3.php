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
                        لیست ارزیابی ها
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
                    <table class="archive-table has-lines">
                        <tr>
                            <th>نام</th>
                            <?php if(!auth()->user()->hasRole('مدیر ملک')): ?>
                            <th>کارشناس</th>
                            <?php endif; ?>
                            <td>نوع درخواست</td>
                            <th>منزل مد نظر</th>
                            <th>منظره</th>
                            <th>منطقه</th>
                            <th>امکانات داخلی</th>
                            <th>امکانات رفاهی</th>
                            <th>حیوان خانگی</th>
                            <th>وسیله نقلیه</th>
                            <th>حداکثر سال ساخت</th>
                            <th>بودجه</th>
                            <th>مشخصات مشتری</th>
                            <th>دلیل کنسلی</th>
                            <th>عملیات</th>
                        </tr>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr style="background: <?php echo e($user->rent_status==3?'brown':''); ?> <?php echo e($user->rent_status==4?'burlywood':''); ?>">
                                <td>
                                    <?php echo e($user->id); ?>#
                                    <?php if(!auth()->user()->hasRole('مدیر ملک')): ?>
                                        <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                                        <?php if($user->questionnaire->account_status == 'active'): ?>
                                            <span class="badge badge-success">فعال</span>
                                        <?php elseif($user->questionnaire->account_status == 'pending'): ?>
                                            <span class="badge badge-warning">در انتظار تایید</span>
                                        <?php elseif($user->questionnaire->account_status == 'blocked'): ?>
                                            <span class="badge badge-secondary">مسدود شده</span>
                                        <?php endif; ?>

                                        <?php if(auth()->user()->hasRole('call center') ||auth()->user()->hasRole('call center(sales)')): ?>
                                        <?php if($user->questionnaire->user): ?>
                                            <?php if($user->user): ?>
                                                <span
                                                        class="badge badge-warning">نام کارشناس معرف : <?php echo e($user->user->first_name .' ' . $user->user->last_name); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <?php if(!auth()->user()->hasRole('مدیر ملک')): ?>
                                <td>
                                    <?php echo e($user->refer?$user->refer->first_name.' '.$user->refer->last_name:''); ?>

                                </td>
                                <?php endif; ?>
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
                                    <?php
                                        $is_serialized=is_serialized($user->questionnaire->property_type);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e(\App\Villa::types()[$user->questionnaire->property_type]); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->questionnaire->property_type))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->questionnaire->property_type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e(\App\Villa::types()[$property]); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        $is_serialized=is_serialized($user->questionnaire->villa_view);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e(\App\Villa::types()[$user->questionnaire->villa_view]); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->questionnaire->villa_view))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->questionnaire->villa_view); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($property); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(!is_null($user->location)): ?>
                                        <?php
                                            $is_serialized=is_serialized($user->location);
                                        ?>
                                        <?php if($is_serialized): ?>
                                            <?php if(gettype(unserialize($user->location))=='array'): ?>
                                                <?php $__currentLoopData = unserialize($user->location); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $loc=\App\Location::find($property); ?>
                                                    <?php echo e($loc?$loc->name:''); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        $is_serialized=is_serialized($user->questionnaire->properties_in);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e(\App\Villa::types()[$user->questionnaire->properties_in]); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->questionnaire->properties_in))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->questionnaire->properties_in); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e(\App\Property::find($property)["name"]); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        $is_serialized=is_serialized($user->questionnaire->properties_out);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e(\App\Villa::types()[$user->questionnaire->properties_out]); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->questionnaire->properties_out))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->questionnaire->properties_out); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e(\App\Property::find($property)["name"]); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($user->questionnaire->pet); ?></td>
                                <td><?php echo e($user->questionnaire->vehicle); ?></td>
                                <td><?php echo e($user->questionnaire->built_year); ?></td>





                                <td><?php echo e(number_format((int)$user->questionnaire->price)); ?> <?php echo e($user->questionnaire->price_type); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('customer-show', $user->id)); ?>" class="btn btn-sm btn-warning mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                </td>
                                <td><?php echo e($user->questionnaire->cancel_reasons); ?></td>
                                <td>
                                    <div class="d-flex">
                                        <?php if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')): ?>
                                            <?php $isRaised=\App\QuestionnaireReadyExperts::where('user_id',auth()->id())->where('questionnaire_id',$user->questionnaire->id)->get(); ?>
                                            <?php if(count($isRaised)): ?>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('raisedUsers',$user->questionnaire->id)); ?>" class="btn btn-warning float-left mr-1"><i class="fa fa-hand-o-up ml-1"></i>درخواست ها</a>
                                            <a href="javascript:void(0)" data-target="#referModal" onclick="$('#refer_id').val('<?php echo e($user->id); ?>')" data-toggle="modal" class="btn btn-info float-left mr-1"><i class="fa fa-share-square ml-1"></i>ارجاع</a>
                                        <?php if($user->rent_status==3 || $user->rent_status==4): ?>
                                            <?php if($user->cancel_reason): ?>
                                                <a href="javascript:void(0)" data-target="#descriptionModal" onclick="$('#cancel_reason').val('<?php echo e($user->cancel_reason); ?>')" data-toggle="modal" class="btn btn-secondary float-left mr-1"><i class="fa fa-info ml-1"></i>توضیحات</a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                            <?php echo Form::open(['method' => 'POST', 'route' => ['contract-cancel'],'class'=>'mb-0' ]); ?>

                                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                                            <input type="hidden" name="refer_id" value="<?php echo e($user->user_id); ?>">
                                            <input type="hidden" name="status" value="5">
                                            <?php echo Form::button('<i class="fa fa-ban ml-1"></i>کنسل', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger float-left mr-1', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                        <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                                            <?php $isRaised=\App\QuestionnaireReadyExperts::where('user_id',auth()->id())->where('questionnaire_id',$user->questionnaire->id)->first(); ?>
                                            <a href="javascript:void(0)" class="mr-1" onclick="raise_hand('<?php echo e($user->questionnaire->id); ?>')"><i class="fa fa-2x fa-hand-o-<?php echo e($isRaised?'down':'up'); ?> raise_hand<?php echo e($user->questionnaire->id); ?>"></i>
                                                <div style="vertical-align: middle;" class="like-loader<?php echo e($user->questionnaire->id); ?> spinner-grow spinner-grow-sm text-danger d-none"></div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <!-- The Modal -->
                <div class="modal" id="referModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('user-refer')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">ارجاع به کارشناس</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <input id="refer_id" type="hidden" name="id" value="">
                                <select class="form-control select2" id="user_id" name="user_id" required>
                                    <option value="0" <?php echo e(old('user_id') == 0 ? 'selected' : ''); ?>>ندارد</option>
                                    <?php $__currentLoopData = \App\User::role('مدیر ملک')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                                value="<?php echo e($admin_user->id); ?>"
                                                <?php echo e(old('user_id') == $admin_user->id ? 'selected' : ''); ?>>
                                            <?php echo e($admin_user->first_name .' '.$admin_user->last_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">ارجاع</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- The Modal -->
                <div class="modal" id="descriptionModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">توضیحات کنسلی</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <textarea disabled class="form-control" id="cancel_reason" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">خواندم</button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="paginate p-3">
                    <?php echo e($users->links()); ?>

                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            function raise_hand(id) {
                $('.like-loader'+id).toggleClass('d-none');
                //$(el).toggleClass('d-none');
                $.ajax({
                    url:  '<?php echo e(url('/')); ?>'+'/panel/raise_hand/'+id,
                    context: document.body
                }).done(function(data) {
                    $('.like-loader'+id).toggleClass('d-none');
                    if(data=='false'){
                        $('.raise_hand'+id).removeClass('fa-hand-o-down');
                        $('.raise_hand'+id).addClass('fa-hand-o-up');
                    }else{
                    $('.raise_hand'+id).addClass('fa-hand-o-down');
                    $('.raise_hand'+id).removeClass('fa-hand-o-up');
                    }
                    // $(el).toggleClass('d-none');
                });
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
