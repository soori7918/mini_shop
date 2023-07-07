<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> &#1605;&#1583;&#1740;&#1585;&#1740;&#1578; <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>                    </div>
                    <h2>&#1604;&#1740;&#1587;&#1578; <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="<?php echo e(route('post-search')); ?>" method="post" style="width: 95%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6" style="padding-left: 0;">
                                <input type="text" name="search" class="form-control" placeholder="&#1580;&#1587;&#1578;&#1580;&#1608;...">
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding-right: 0;">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <?php echo e(csrf_field()); ?>

                    </form>
                    <table class="archive-table">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $final = json_decode($post->reserve);
                            ?>
                            <tr style="cursor: pointer" data-toggle="modal" data-target="#exampleModal<?php echo e($key); ?>">
                                <td><?php echo e($final->first_name . ' ' .$final->last_name); ?></td>
                                <td><?php echo e($final->email); ?></td>
                                <td><?php echo e($final->phone); ?></td>
                                <td><?php echo e($final->checkIn); ?></td>
                                <td><?php echo e($final->checkOut); ?></td>
                                <td><?php echo e($final->person); ?></td>
                                <td>
                                    <?php
                                        $villa = App\Villa::where('id' , $final->villa_id)->first();

                                    ?>
                                    <?php if(isset($villa)): ?>
                                        <?php echo e($villa->name); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e($final->first_name . ' ' .$final->last_name .' ایمیل : '.$final->email); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo e($final->body); ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($data->links()); ?>

                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                    <a href="<?php echo e(route('post-create')); ?>" class="btn btn-rounded btn-primary float-left"><i
                                class="fa fa-circle-o ml-1"></i>&#1575;&#1601;&#1586;&#1608;&#1583;&#1606;</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>