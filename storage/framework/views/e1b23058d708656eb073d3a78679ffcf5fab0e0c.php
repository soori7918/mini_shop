<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <?php if(auth()->user()->hasRole('مدیر ملک')): ?>
                        <h2> مشتری <?php echo e($user->id); ?></h2>
                    <?php else: ?>
                        <h2> مشتری <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="max-with">
                        <ul class="list-group text-right mb-5" style="direction: rtl">
                            <li class="list-group-item"><strong>شغل : </strong>
                                <?php echo e($user->job); ?>

                            </li>
                            <li class="list-group-item"><strong>جنسیت : </strong>
                                <?php echo e($user->gender == 0 ? 'مرد' : 'زن'); ?>

                            </li>
                            <li class="list-group-item"><strong>نوع درخواست : </strong>
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
                            </li>
                            <li class="list-group-item"><strong>خواب : </strong>
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
                            </li>
                            <li class="list-group-item"><strong>تاریخ اعلام : </strong>
                                <?php echo e($user->date); ?>

                            </li>
                            <li class="list-group-item"><strong>مناطق : </strong>
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
                            </li>
                            <li class="list-group-item"><strong>نوع : </strong>
                                <?php if(!is_null($user->property_type)): ?>
                                        <?php
                                            $is_serialized=is_serialized($user->property_type);
                                        ?>
                                        <?php if(!$is_serialized): ?>
                                            <?php echo e(\App\Villa::types()[$user->property_type]); ?>

                                        <?php else: ?>
                                            <?php if(gettype(unserialize($user->property_type))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->property_type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e(\App\Villa::types()[$property]); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>کاربری : </strong>
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
                            </li>
                            <li class="list-group-item"><strong>بودجه : </strong>
                                
                                <?php echo e($user->budget_sales?'(اجاره '.$user->budget_sales. ' لیر)':''); ?>

                                <?php echo e($user->budget?'(خرید '.$user->budget. ' لیر)':''); ?>

                            </li>
                            <li class="list-group-item"><strong>موقعیت جغرافیایی : </strong>
                                <?php if($user->living_country == 'iran'): ?>
                                        ایران
                                    <?php elseif($user->living_country == 'turkey'): ?>
                                        ترکیه
                                    <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>مشاوره آنلاین : </strong>
                                <?php if($user->consulting == 0): ?>
                                        ندارد
                                    <?php elseif($user->consulting == 1): ?>
                                        دارد
                                    <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>عجله دارد : </strong>
                                <?php echo e($user->instant); ?>

                            </li>
                        </ul>
                        <ul class="list-group text-right" style="direction: rtl">
                            <?php if(!auth()->user()->hasRole('مدیر ملک')): ?>
                            <li class="list-group-item"><strong>ایمیل : </strong>
                                <?php echo e($user->email); ?>

                            </li>
                            <li class="list-group-item"><strong>موبایل : </strong>
                                <?php echo e($user->mobile); ?>

                            </li>
                            <?php endif; ?>
                            <li class="list-group-item"><strong>منزل مد نظر : </strong>
                                    <?php if($user->questionnaire): ?>
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
                                    <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>منظره : </strong>
                                <?php if($user->questionnaire): ?>
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
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>امکانات داخلی : </strong>
                                <?php if($user->questionnaire): ?>
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
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>امکانات رفاهی : </strong>
                                <?php if($user->questionnaire): ?>
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
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>حیوان خانگی : </strong>
                                <?php if($user->questionnaire): ?>
                                <?php echo e($user->questionnaire->pet); ?>

                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>وسیله نقلیه : </strong>
                                <?php if($user->questionnaire): ?>
                                <?php echo e($user->questionnaire->vehicle); ?>

                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>حداکثر سال ساخت : </strong>
                                <?php if($user->questionnaire): ?>
                                <?php echo e($user->questionnaire->built_year); ?>

                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>بودجه : </strong>
                                <?php if($user->questionnaire): ?>
                                <?php echo e($user->questionnaire->price); ?> <?php echo e($user->questionnaire->price_type); ?>

                                <?php endif; ?>
                            </li>



                        </ul>
                    <br/>
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                                class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>