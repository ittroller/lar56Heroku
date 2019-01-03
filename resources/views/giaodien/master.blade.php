<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Shop">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="Cao Kha Minh">
        <title>Shop</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ url('css/toastr.min.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link href="{{ url('css/all.css') }}" rel="stylesheet">

        <link href="{{ url('css/mycss.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .mySlides {display:none;}
        </style>
    </head>

    <body>
        <div id="web">
            @include('giaodien.top.top')
            @include('giaodien.navbar.navbar')
            @include('giaodien.slide.slide')
            <br>
            <div id="content">
                <div class="container">
                    <div class="row">
                        @include('giaodien.menu_trai.menu')
                        <div class="col-9">
                            @yield('main')
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @include('giaodien.footer.footer')
        </div>
        
        
        <!-- jQuery -->
        <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('js/popper.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>

        <script src="{{ url('js/myScript.js') }}"></script>
        
        <script src="{{ url('js/toastr.min.js') }}"></script>
        <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif
            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}")
            @endif
        </script>

        <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        </script>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 9000);    
        }
    </script>
    </body>

</html>
