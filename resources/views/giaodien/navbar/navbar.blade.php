<div id="nav">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Trang Chủ</a>
                </li>
                <?php 
                    $menu_c1 = DB::table('loaisanphams')->where('id_hientai',0)->get();
                ?>
                @foreach($menu_c1 as $c1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {!! $c1->tenloai !!}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="container">
                            <div class="row" align="center">
                                <?php 
                                    $menu_c2 = DB::table('loaisanphams')->where('id_hientai',$c1->id)->get();
                                ?>
                                @foreach($menu_c2 as $c2)
                                <div class="col-2">
                                    <a class="nav-link" style="color:#a31aff;" href="{!!route('danhmuc',[$c2->id, $c2->alias])!!}">{!! $c2->tenloai !!}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category 2
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="container">
                            <div class="row" align="center">
                                <div class="col-md-3">
                                    <a class="nav-link" style="color:black" href="#">Link item</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="nav-link" style="color:black" href="#">Link item</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="nav-link" style="color:black" href="#">Link item</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="nav-link" style="color:black" href="#">Link item</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="nav-link" style="color:black" href="#">Link item</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Phụ kiện khác
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="container">
                            <div class="row" align="center">
                                <div class="col-md-3">
                                    <a class="nav-link" style="color:black" href="#">Link item</a>
                                </div>
                                <div class="col-md-3">
                                    <a class="nav-link" style="color:black" href="#">Link item</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> --}}
            </ul>
        </div>
    </nav>
</div>