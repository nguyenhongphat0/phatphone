<?php switch ($_GET['m']) {
	case 'all':
		$title = 'Điện thoại';
		break;
	case 'other':
		$title = 'Hãng khác';
		break;
	default:
		$title = ucfirst($_GET['m']);} ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/header.php" ?>
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
        
    </script>
	<div class="section"></div>
	<div class="container">
		<div class="row grid" id="cargo">
		</div>
	</div>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script>
		var m = '<?php echo $_GET['m'] ?>'.toLowerCase();
		$.each(sp, function(){
			var t = JSON.parse(this);
			if (t.price == '0') t.price = 'Giá thương lượng'; else t.price = Number(t.price).toLocaleString('vi')+"đ";
			switch (m){
				case 'all': $('#cargo').append('<div class="col-md-4 col-sm-6 col-xs-12 p-card grid-item"><div class="well well-lg"><a href="/sp/detail.php?p='+t.code+'"><img src="/sp/'+t.code+'/pic1.jpg"></a><div class="well-content"><a href="/sp/detail.php?p='+t.code+'"><h2 class="light-text" style="display: inline;">'+t.name+'</h2></a> <span class="label label-primary">'+t.maker+'</span><h4 class="light-text text-success">'+t.price+'</h4><p>'+t.des+'</p></div></div></div>');
					break;
				case 'other': var tm = t.maker.toLowerCase();
					if (tm!='samsung' && tm!='apple' && tm!='nokia' && tm!='oppo' && tm!='htc' && tm!='sony') $('#cargo').append('<div class="col-md-4 col-sm-6 col-xs-12 p-card grid-item"><div class="well well-lg"><a href="/sp/detail.php?p='+t.code+'"><img src="/sp/'+t.code+'/pic1.jpg"></a><div class="well-content"><a href="/sp/detail.php?p='+t.code+'"><h2 class="light-text" style="display: inline;">'+t.name+'</h2></a> <span class="label label-primary">'+t.maker+'</span><h4 class="light-text text-success">'+t.price+'</h4><p>'+t.des+'</p></div></div></div>');
					break;
				default: if (t.maker.toLowerCase() == m) $('#cargo').append('<div class="col-md-4 col-sm-6 col-xs-12 p-card grid-item"><div class="well well-lg"><a href="/sp/detail.php?p='+t.code+'"><img src="/sp/'+t.code+'/pic1.jpg"></a><div class="well-content"><a href="/sp/detail.php?p='+t.code+'"><h2 class="light-text" style="display: inline;">'+t.name+'</h2></a> <span class="label label-primary">'+t.maker+'</span><h4 class="light-text text-success">'+t.price+'</h4><p>'+t.des+'</p></div></div></div>');
			}
		});
		if ($('#cargo').html().trim() == '') $('#cargo').html('<div class="section"></div><div class="container alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Xin lỗi!</strong> Hiện tại cửa hàng của chúng tôi chưa có sản phẩm nào của hãng này. Bạn có thể <a href="/index.php" class="alert-link">trờ về trang chủ</a> hoặc thử xem sản phẩm của một hãng nào đó khác.</div>');
		$(window).on('load', function(){
			$('.grid').masonry({
				itemSelector: '.grid-item'
			});
		});
		$('nav li a').each(function(){
			if ($(this).text().toLowerCase() == m) {$(this).parent().addClass('active'); $('#nav-maker').addClass('active');}
		});
		if (m == 'all') $('#nav-phone').addClass('active');
		if (m == 'other'){$('#nav-other').addClass('active'); $('#nav-maker').addClass('active');}
	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/footer.php" ?>