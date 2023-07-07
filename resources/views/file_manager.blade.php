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
    <script src="{{ url('assets/editor/laravel-ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            var funcNum= <?php echo $_GET['CKEditorFuncNum'] . ';'; ?>
            $('#fileExplorer').on('click','img', function (){
                var fileUrl='{{url('/')}}'+'/'+$(this).attr('title');
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
    @foreach($fileNames as $fileName)
        <div class="thumbnail">
            <img src="{{url('assets/uploads/editor/'.$fileName)}}" alt="thumb" title="assets/uploads/editor/{{$fileName}}" width="120" height="100">
            <br/>
            {{$fileName}}
        </div>
    @endforeach
</div>
</body>
</html>