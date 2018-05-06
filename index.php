<?php $title='Trang chủ' ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/header.php' ?>
	<script>
		var sp = [<?php error_reporting(E_ERROR | E_PARSE);
				$sp = fopen($_SERVER['DOCUMENT_ROOT'].'/sp/sp.txt', "r");
                do {
                    $s = trim(fgets($sp));
                    if ($s != '') {
                    	$ss = fgets(fopen($_SERVER['DOCUMENT_ROOT'].'/sp/'.$s.'/data.json', "r"));
                    	echo '\''.str_replace("\n", "", $ss).'\',';
                    }
                } while ($s != ""); ?>];
        $('#nav-home').addClass('active');
    </script>
    <div style="background-color: white">
    	<div class="section"></div>
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12 col-sm-3">
	                <h1 class="light-text black-text">Bạn đang cần gì?</h1>
	                <div class="input-group has-success">
	                	<span class="input-group-addon">&#128270;</span>
	                	<input id="keyword" type="text" class="form-control" name="keyword" placeholder="Ví dụ: oppo rẻ">
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-9">
	                <div class="section"></div>
	                <div id="cargo" class="grid" style="display: none"></div>
	                <div class="well" id="reply">
	                    <div class="well-content">
	                        <div>            
		                        <div class="alert alert-success">
									<i>"Điện thoại rẻ mà xài tốt quá trời"</i><br><a target="_blank" href="https://www.facebook.com/kaisin1505" class="alert-link" style="text-decoration: none">Trương Đại Tín</a>
								</div>        
		                        <div class="alert alert-info">
									<i>"Mình mua cái Lumia 550 hồi 2 tháng trước có 800k, h xài còn tốt"</i><br><a target="_blank" href="https://www.facebook.com/minhvu.ngo.355" class="alert-link" style="text-decoration: none">Minh Vũ Ngô</a>
								</div>        
		                        <div class="alert alert-warning" style="margin-bottom: 0px">
									<i>"Chỉ biết nói 1 từ thôi: TUYỆT VỜI"</i><br><a target="_blank" href="https://www.facebook.com/ctautoiris" class="alert-link" style="text-decoration: none">Út Huy</a>
								</div>          
	                        </div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
    	<div class="section"></div>
    </div>
	<div id="aboutme">
		<div class="fade-bg">
		    <div class="container">
		    	<div class="section"></div>
		        <div class="row">
		            <div class="col-sm-12 col-md-8 col-md-push-4 white-text">
		            	<h1 class="light-text">Xem thêm?</h1>
		            	<p class="white-text">Không rõ bạn muốn gì? Đi dạo quanh và tìm chiếc điện thoại mà bạn thích nhé!</p>
		            	<a href="maker.php?m=samsung" class="btn btn-warning">Samsung</a>
		            	<a href="maker.php?m=apple" class="btn btn-info">Apple</a>
		            	<a href="maker.php?m=nokia" class="btn btn-success">Nokia</a>
		            	<a href="maker.php?m=oppo" class="btn btn-primary">Oppo</a>
		            </div>
		            <div class="col-sm-12 col-md-4 col-md-pull-8">
		                <div class="well well-lg" style="margin: 5%">
		                    <img src="avatar.jpg">
		                    <div class="well-content" style="font-size: 12px">
		                        <p>Xin chào, mình là <span class="text-success"><b>Hồng Phát</b></span>, chủ cửa hàng điện thoại Phát Phone.<hr>Nếu bạn có nhu cầu đặt hàng hoặc tư vấn thì liên hệ với mình qua điện thoại hoặc Facebook nhé!!!</p>
		                        <a href="tel:0903670437" class="btn btn-success">0903670437</a href="tel:0903670437">
		                        <a href="https://www.facebook.com/profile.php?id=100004240774642" target="_blank" class="btn btn-success">Facebook</a>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
    </div>
    <script>
    	var bg = 'http://kenh14cdn.com/2017/samsung-galaxy-note-8-concept-dbs-designing-concept-phones-com-2-1493171137043.jpg';
    	$('#aboutme').css('background', 'url("'+bg+'") no-repeat fixed');
    	$('#aboutme').css('backgroundSize', 'cover');
    </script>
    <div style="background-color: white">
    	<div class="section"></div>
	    <div class="container">
	        <div class="row">
	            <div class="col-xs-12 col-sm-8">
	            	<h1 class="light-text black-text">Những câu hỏi thường gặp</h1>
	                <h3 class="light-text black-text">Phat Phone?</h3>
	                <p class="text-justify">Phat Phone là nơi mua dùm điện thoại thân thiện dành cho bạn. Chúng tôi luôn cập nhật những mẫu điện thoại tốt, giá sinh viên, đưa cho khách hàng những lời khuyên, giúp bạn tạo ra những quyến định đúng đắn trong việc lựa chọn cho mình chiếc điện thoại tốt nhất.</p>
	                <h3 class="light-text black-text">Mua dùm?</h3>
	                <p class="text-justify">Đúng rồi bạn.</p>
	                <h3 class="light-text black-text">Tại sao lại phải mua dùm?</h3>
	                <p class="text-justify">Đây là vấn đề bạn nên hiểu rõ: FPTShop, Thế giới di động, Viễn thông A hiện nay đang có một hình thức kinh doanh mới là máy đổi trả. Mua điện thoại đổi trả có thể giúp bạn tiết kiệm từ 500k đến 1 trịu chi phí so với mua 1 chiếc điện thoại mới. Nhưng hình thức này bắt buộc bạn phải đến tận nơi hiện đang giữ chiếc điện thoại đó để mua về. Ví dụ dễ hiểu: Bạn ở quận 12, đang muốn mua 1 cái Oppo Neo 7 (giá 3 trịu), hiện FPTShop quận 9 đang có một chiếc Oppo đổi trả với giá 2 trịu 200k, vậy nếu mua cái máy này, bạn sẽ tiết kiệm đc 800k, nhưng bạn phải đến tận quận 9 thì mới mua được! Phat Phone sẽ giải quyết vấn đề này cho bạn.</p>
	                <h3 class="light-text black-text">Vậy là hổng có bán điện thoại mới?</h3>
	                <p class="text-justify">Hông nha bạn. Nếu bạn có đủ điều kiện để mua điện thoại mới thì có thể đi qua shop khác giúp mình nha!</p>
	                <h3 class="light-text black-text">Máy đổi trả có tốt không?</h3>
	                <p class="text-justify">Bạn sẽ phải ngạc nhiên khi cầm chiếc máy đổi trả trên tay. Gọi là máy cũ nhưng thật sự nó chẳng thua gì máy mới nhé. Mình biết vì mình đã mua 2 cái rồi. Còn nếu như bạn vẫn không an tâm thì mình có 1 tin vui dành cho bạn: FPTShop có chính sách 1 đổi 1 đối với máy đổi trả bị lỗi trong tháng đầu tiên, từ tháng thứ 2 trở đi có thể bảo hành nếu còn hạn.</p>
	                <h3 class="light-text black-text">Vậy bán cho 1 cái đi?</h3>
	                <p class="text-justify">Rồi cảm ơn bạn nhé!</p>
	            </div>
	            <div class="col-xs-12 col-sm-4">
	                <div class="section"></div>
	                <div class="well">
	                    <div class="well-content">
	                    	<img src="badge.png">
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
    </div>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
		$.each(sp, function(){
			var t = JSON.parse(this);
			if (t.price == '0') t.price = 'Giá thương lượng'; else t.price = Number(t.price).toLocaleString('vi')+"đ";
			$('#cargo').append('<div class="col-sm-6 col-xs-12 p-card grid-item"><div class="well"><div class="well-content"><a href="/sp/detail.php?p='+t.code+'"><h3 class="light-text" style="display: inline;">'+t.name+'</h3></a> <span class="label label-primary">'+t.maker+'</span><h4 class="light-text text-success">'+t.price+'</h4><p>'+t.des+'</p><p style="display: none">'+t.tags+'</p></div></div></div>');
		});
		$(window).on('load', function(){
            $('#keyword').on('input', function (event){
                var tags = $('#keyword').val();
                if (tags == '') {
                    $('#cargo').hide();
                    $('#reply').show();
                } else {
                    $('#reply').hide();
                    $('#cargo').show();
                }
                $('.grid-item').each(function(i){
                    var s = $(this).find('h3').text() + ' ';
                    s += $(this).find('p').text();
                    s = s.toLowerCase();
                    var c = true;
                    tags.split(' ').forEach(function(tag) {
                        if (s.indexOf(tag.toLowerCase()) == -1) c = false;
                    });
                    if (!c) $(this).hide(); else $(this).show();
                });
                $('.grid').masonry({
					itemSelector: '.grid-item'
				});
            });
		});
	</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php' ?>