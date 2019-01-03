<div class="col-3" id="menu_trai">
    <div id="main" style="width:85%; height:100%;">
        <div id="main_menu">
            <h3 class="text-center">Các Danh Mục</h3>
            <div id="accordion">
                <?php 
                    $menu_c1 = DB::table('loaisanphams')->where('id_hientai',0)->get();
                    $stt = 0;
                ?>
                @foreach($menu_c1 as $c1)
                <?php $stt = $stt + 1; ?>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <p class="text-center">
                            <button class="btn btn-link" style="text-decoration:none; color:#003300;" data-toggle="collapse" data-target="#{{$stt}}" aria-expanded="true" aria-controls="collapseOne">
                                {!! $c1->tenloai !!}
                            </button>
                        </p>
                    </div>
                
                    <div id="{{$stt}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <?php 
                        $menu_c2 = DB::table('loaisanphams')->where('id_hientai',$c1->id)->get();
                    ?>
                    @foreach($menu_c2 as $c2)
                    <ul class="list-group">
                        <li class="list-group-item" style="float:right">
                            <a href="{!!route('danhmuc',[$c2->id, $c2->alias])!!}" class="danhmuc-con" style="text-decoration:none; color:#008000;">{!! $c2->tenloai !!}</a>
                        </li>
                    </ul>
                    @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <hr>
        <h3>Tìm Kiếm Theo Giá</h3>
        <br>
        <form action="{{route('timtheogia')}}" method="get">
            <label for="">Giá từ</label>
            <select name="gia1" id="" class="form-control">
                <?php for($i=0;$i<=2500000;$i+=250000){ ?>
                    <option value="{{$i}}">{{ number_format($i) }} VNĐ</option>    
                <?php } ?>
            </select>
            <br>
            <label for="">Đến</label>
            <select name="gia2" id="" class="form-control">
                <?php for($i=0;$i<=5000000;$i+=500000){ ?>
                    <option value="{{$i}}">{{ number_format($i) }} VNĐ</option>    
                <?php } ?>
            </select>
            <br>
            <p class="text-center"><button type="submit" class="btn btn-secondary">Tìm</button></p>
        </form>
    </div>
</div>