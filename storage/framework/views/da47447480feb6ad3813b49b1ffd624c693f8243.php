<html>
<head>
    <title>File Browser</title>
    <style>
        body{
            font-family: 'Segoe UI', Verdana, Helvetica, Sans-serif;
            font-size: 80%;
        }
        #form{
            width: 600px;
        }
        #folderExplorer
        {
            float: left;
            width: 100px;
        }
        #fileExplorer
        {
            float: left;
            width: 680px;
            border-left: 1px solid #dff0ff;
        }
        .thumbnail
        {
            float: left;
            margin: 3px;
            padding: 3px;
            border: 1px solid #dff0ff;
        }
        ul{
           list-style-type: none;
            margin: 0;
            padding: 0;
        }
        li{
            padding: 0;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('editor/laravel-ckeditor/ckeditor.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            var funcNum= <?php echo $_GET['CKEditorFuncNum'] . ';'; ?>
            $('#fileExplorer').on('click','img', function (){
                var fileUrl='<?php echo e(url('/')); ?>'+'/'+$(this).attr('title');
                window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
                window.close();
            }).hover(function (){
                $(this).css('cursor','pointer');
            });
        });
    </script>
</head>
<body>
<div id="fileExplorer">
    <?php $__currentLoopData = $fileNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="thumbnail">
            <img src="<?php echo e(url('source/assets/uploads/editor/'.$fileName)); ?>" alt="thumb" title="source/assets/uploads/editor/<?php echo e($fileName); ?>" width="120" height="100">
            <br/>
            <?php echo e($fileName); ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</body>
</html>