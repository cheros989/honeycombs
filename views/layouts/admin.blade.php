<!DOCTYPE HTML>
<html>
    <head>
        <script src='{{URL::to('/')}}/lib/jquery-3.2.1.min'></script>
        @yield('head')
    </head>
    <body>
        <div class="left_menu" style='width: 300px; display: inline-block; vertical-align: top;
             background-color: #ccc;'>
            <h1>HONEYCOMBS</h1>
            @foreach($configs as $category => $info)
                <div class='category'>
                    <h2>{{$category}}<h2>
                            <a href="{{URL::to("honeycombs/$category/additem")}}" style="font-size: 14px; text-decoration: none; border: solid black 2px; padding: 10px;">Add new</a>
                            <a href="{{URL::to("honeycombs/$category")}}" style="font-size: 14px; text-decoration: none; border: solid black 2px; padding: 10px;">Edit exists</a>
                </div>
            @endforeach
        </div>
        <div class="content_container" style='width: 600px; display: inline-block;'>
            @yield('content')
        </div>
    </body>
</html>
