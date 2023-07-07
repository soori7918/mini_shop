<?php $__env->startSection('nav'); ?>
    <?php if(auth()->check()): ?>
        <nav class="site-header sticky-top py-1">
            <div class="px-3 d-flex flex-column flex-md-row">
                
                
                
                
                
                
                <p class="logo_p_view text-center">
                    <span>Live Your Dreams</span>
                </p>
            </div>
        </nav>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

        <style>
            .villas
            {
                background: #fff;
                padding: 25px 5px;
            }
            .header-title h1 {
                color: white;
                font-size: 32px;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }
            .table_div
            {
                overflow: auto;
            }
            .table_div>table
            {
                min-width: 600px;
            }
            .table_div>table tr{
                cursor: pointer;
            }
        </style>


        <section class="villas section">
            <div class="container table_div">
                <?php if(auth()->guard()->check()): ?>
                    <table class="table">
                        <tr style="background: var(--primary-color);color: var(--secondary-color)!important">
                            <td style="width: 20px">ردیف</td>
                            <td>نام</td>
                            <td>تصویر</td>
                            <td>نوع</td>
                            <td>توضیحات</td>
                            <td>عملیات</td>
                        </tr>
                        <?php if(count($likes)>0): ?>
                        <?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($like->likable_type=='villa' and $like->villa): ?>
                            <tr onclick="window.open('<?php echo e(route('front.projects.show', $like->project->slug)); ?>','_blank')">
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($like->villa->name); ?></td>
                                <td><img src="<?php echo e(url($like->villa->photos[0]->path)); ?>" style="height: 100px"></td>
                                <td>ملک</td>
                                <td><?php echo mb_strimwidth($like->villa->body,0,100,''); ?></td>
                                <td>
                                    <a onclick="return confirm('برای حذف مطمئن هستید؟')" href="<?php echo e(route('front-favorites-del',$like->id)); ?>" style="color: darkred!important;"> حذف </a>
                                </td>
                            </tr>
                            <?php elseif($like->likable_type=='project' and $like->project): ?>
                                <tr onclick="window.open('<?php echo e(route('front.projects.show', $like->project->slug)); ?>','_blank')">
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($like->project->name); ?></td>
                                    <td><img src="<?php echo e(url($like->project->photos[0]->path)); ?>" style="height: 100px"></td>
                                    <td>پروژه</td>
                                    <td><?php echo mb_strimwidth($like->project->brief,0,100,''); ?></td>
                                    <td>
                                        <a onclick="confirm('برای حذف مطمئن هستید؟')" href="<?php echo e(route('front-favorites-del',$like->id)); ?>" style="color: darkred!important;"> حذف </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">هیچ موردی یافت نشد</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                <?php endif; ?>
            </div>
        </section>
<?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
        <script>
            $(document).ready(function () {
                $('.one-a').click(function () {
                    $('.tab-pane').removeClass('show active');
                    $('.a-one').addClass('show active');

                });
            });
        </script>

        <script type="text/javascript">
            $('.like-icon').click(function (event) {
                var fav = parseInt($('.favourite').text());
                var favp = fav + 1;
                var favm = fav - 1;
                event.preventDefault();
                $(this).toggleClass('active');
                var token = '<?php echo e(csrf_token()); ?>';
                var route = '<?php echo e(route("villa-like")); ?>';
                $.post(route, {_token: token, id: $(this).data('id')}, function (result) {
                    if (result == 1) {
                        $('.favourite').text(favp.toString());
                        $.jGrowl('&#1576;&#1607; &#1593;&#1604;&#1575;&#1602;&#1607; &#1605;&#1606;&#1583;&#1740; &#1607;&#1575; &#1575;&#1590;&#1575;&#1601;&#1607; &#1588;&#1583;.', {
                            life: 3000,
                            position: 'top-right',
                            theme: 'bg-success'
                        });
                    } else if (result == 2) {
                        $('.favourite').text(favm.toString());
                        $.jGrowl('&#1575;&#1586; &#1593;&#1604;&#1575;&#1602;&#1607; &#1605;&#1606;&#1583;&#1740; &#1607;&#1575; &#1581;&#1584;&#1601; &#1588;&#1583;.', {
                            life: 3000,
                            position: 'top-right',
                            theme: 'bg-warning'
                        });
                    } else {
                        $.jGrowl('&#1575;&#1576;&#1578;&#1583;&#1575; &#1608;&#1575;&#1585;&#1583; &#1587;&#1575;&#1740;&#1578; &#1588;&#1608;&#1740;&#1583;!', {
                            life: 3000,
                            position: 'top-right',
                            theme: 'bg-danger'
                        });
                    }
                });
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>