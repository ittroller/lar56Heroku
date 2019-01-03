$(document).ready(function(){
	$('#addImages').click(function(){
		$('#insert').append('<div class="form-group"><input class="form-control" type="file" name="fEditDetail[]" /></div>');// ko dc xuống dòng
	});
});

$(document).ready(function(){
	$("a#del_img_demo").on('click',function(){
		var url = "http://lar56-shopcomay.herokuapp.com/admin/san-pham/xoaanh/";
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
        var idHinh = $(this).parent().find("img").attr("idHinh");
        // alert(idHinh); 
		var img = $(this).parent().find("img").attr("src");
		var rid = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			cache: false,
			data: {"idHinh":idHinh},
			success: function(data){
				if(data=="OK"){
					$("#"+rid).remove();
				}else{
					alert("Lỗi rồi");
				}
			}
		});
	});
});

$(document).ready(function() {
	$(window).resize(function(){
		if ($(window).width() >= 980){	
			$(".navbar .dropdown-toggle").hover(function () {
				$(this).parent().toggleClass("show");
				$(this).parent().find(".dropdown-menu").toggleClass("show"); 
			});
			$( ".navbar .dropdown-menu" ).mouseleave(function() {
				$(this).removeClass("show");  
			});
		}
	});
});

$(document).ready(function(){
	$('#thanhtoan_hoten').on('change',function(){
		if($(this).val().length < 5 ){
			$('#err_hoten').html(`<i style="color:red;">Phải nhập họ tên</i>`);
		}
	});
	if($('#thanhtoan_hoten').val().length == ''){
		var nut = $(this).parent();
		console.log(nut);
	}
});