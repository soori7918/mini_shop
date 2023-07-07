<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>                      <h2>افزودن <?php echo e($title); ?></h2>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo e(Form::model($item, array('route' => array('project-category-update', $item->id), 'method' => 'POST', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important'))); ?>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <?php echo e(Form::label('parent_id', 'دسته بندی')); ?>

                                <select class="form-control" name="parent_id">
                                    <option>انتخاب کنید</option>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <?php echo e(Form::label('title', 'عنوان دسته بندی')); ?>

                                <?php echo e(Form::text('title', $item->title, array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <?php echo e(Form::label('slug', 'نامک')); ?>

                                <?php echo e(Form::text('slug', $item->slug, array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <?php echo e(Form::label('url', 'ادرس')); ?>

                                <?php echo e(Form::text('url', $item->url, array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>انتخاب نوع آیکن</label>
                                <br/>
                                <label>
                                    <input class="icon_type"  type="radio" name="type" <?php echo e($item->type == "icon" ? 'checked' : ''); ?>  value="icon" /> آیکن
                                </label>
                                <label>
                                    <input class="icon_type"  type="radio" name="type" <?php echo e($item->type == "image" ? 'checked' : ''); ?>  value="image" /> تصویر
                                </label>
                            </div>
                        </div>
                        <div class="col-6  <?php echo e($item->type == "icon" ? 'd-block' : 'd-none'); ?> icon">
                            <div class="form-group">
                                <?php echo e(Form::label('icon', 'ایکن')); ?>

                                <?php echo e(Form::text('icon', $item->icon, array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-6 <?php echo e($item->type == "image" ? 'd-block' : 'd-none'); ?> image">
                            <div class="form-group">
                                <?php echo e(Form::label('photo', 'تصویر آیکن  ')); ?>

                                <?php echo e(Form::file('photo', array('accept' => 'image/*'))); ?>

                                <img src="<?php echo e($item->image ? url($item->image ): ''); ?>" alt="no-pic" width="150px" height="150px">
                            </div>
                        </div>
                    </div>

                    <h2 class="py-3">توضیحات سئو</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('title_seo', 'عنوان')); ?>

                                <?php echo e(Form::text('title_seo', $item->metas ? $item->metas->title : '', array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('url_seo', 'آدرس')); ?>

                                <?php echo e(Form::text('url_seo',  $item->metas ? $item->metas->url :  '', array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('h1_seo', 'h1')); ?>

                                <?php echo e(Form::text('h1_seo', $item->metas ? $item->metas->h1 :  '', array('class' => 'form-control'))); ?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('keyword_seo', 'کلمات کلیدی')); ?>

                                <?php echo e(Form::text('keyword_seo', $item->metas ? $item->metas->key_word :  '', array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('schima', 'اسکیما')); ?>

                                <?php echo e(Form::text('schima',$item->metas ? $item->metas->schima :  '', array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::label('description_seo', 'توضیحات مختصر')); ?>

                                <?php echo e(Form::textarea('description_seo', $item->metas ? $item->metas->description :  '', array('class' => 'form-control','rows'=>3))); ?>

                            </div>
                        </div>

                    </div>

                    <br/>
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                                class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                    <?php echo e(Form::close()); ?>

                </div>
            </div>
            <?php $__env->endSlot(); ?>
            <?php $__env->startPush('scripts'); ?>
                <script>
                    $('.icon_type').on('change',function(){
                        let val = $(this).val();
                        if(val== "icon"){
                            $('.icon').removeClass('d-none')
                            $('.image').addClass('d-none')
                        }else{
                            $('.image').removeClass('d-none')
                            $('.icon').addClass('d-none')

                        }
                    })
                </script>
                <script src="<?php echo e(asset('editor/laravel-ckeditor/ckeditor.js')); ?>"></script>
                <script src="<?php echo e(asset('editor/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
                <script type="text/javascript">
                    var textareaOptions = {
                        filebrowserImageBrowseUrl: '<?php echo e(url('filemanager?type=Images')); ?>',
                        filebrowserImageUploadUrl: '<?php echo e(url('filemanager/upload?type=Images&_token=')); ?>',
                        filebrowserBrowseUrl: '<?php echo e(url('filemanager?type=Files')); ?>',
                        filebrowserUploadUrl: '<?php echo e(url('filemanager/upload?type=Files&_token=')); ?>',
                        language: 'fa'
                    };
                    $('.textarea').ckeditor(textareaOptions);
                    slug('#title', '#slug');
                </script>
        <?php $__env->stopPush(); ?>
        <?php echo $__env->renderComponent(); ?>