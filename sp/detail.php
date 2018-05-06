<?php $title='Thông tin chi tiết' ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/header.php" ?>
	<div id="p-detail">
		<div class="section"></div>
		<div class="container">
			<button class="btn btn-success" onclick="toLocalStorage(sp); incCartNo()">Bỏ vào giỏ hàng</button>
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<h2 id="pname" class="light-text" style="display: inline-block;"></h2> <span id="pmaker" class="label label-primary"></span>
					<h4 id="pprice" class="light-text text-success"></h4>
					<p id="pdes"></p>
					<hr>
				</div>
				<div class="col-md-4 col-sm-12">
					<table class="table table-striped">
						<thead>
							<tr class="warning">
								<th>Thông số</th>
								<th>Chi tiết</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>CPU</td>
								<td id="pcpu"></td>
							</tr>
							<tr>
								<td>RAM</td>
								<td id="pram"></td>
							</tr>
							<tr>
								<td>Màn hình</td>
								<td id="pdisplay"></td>
							</tr>
							<tr>
								<td>Hệ điều hành</td>
								<td id="pos"></td>
							</tr>
							<tr>
								<td>Camera trước</td>
								<td id="pfcam"></td>
							</tr>
							<tr>
								<td>Camera sau</td>
								<td id="pbcam"></td>
							</tr>
							<tr>
								<td>Bộ nhớ trong</td>
								<td id="pmemory"></td>
							</tr>
							<tr>
								<td>Sim</td>
								<td id="psim"></td>
							</tr>
							<tr>
								<td>Pin</td>
								<td id="ppin"></td>
							</tr>
						</tbody>
					</table>
					<hr>
				</div>
				<div class="col-md-4 col-sm-12">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<div class="img-wrapper"><img id="ppic1"></div>
							</div>

							<div class="item">
								<div class="img-wrapper"><img id="ppic2"></div>
							</div>

							<div class="item">
								<div class="img-wrapper"><img id="ppic3"></div>
							</div>
						</div>
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="sr-only">Next</span>
						</a>
					</div>
					<hr>
				</div>
			</div>
		</div>
		<?php 
			$f = fopen($_GET['p']."/data.json", 'r');
			$line = fgets($f);
			fclose($f); 
		?>
	</div>
	<script>
		try{
			var sp = JSON.parse('<?php echo $line ?>');
			$('#pmaker').html(sp.maker);
			$('#pname').html(sp.name);
			document.title = sp.name;
			if (sp.price == '0') $('#pprice').html('Giá thương lượng'); else $('#pprice').html(Number(sp.price).toLocaleString('vi')+"đ");
			$('#pdes').html(sp.des);
			$('#pcpu').html(sp.cpu);
			$('#pram').html(sp.ram);
			$('#pdisplay').html(sp.display);
			$('#pos').html(sp.os);
			$('#pfcam').html(sp.fcam);
			$('#pbcam').html(sp.bcam);
			$('#pmemory').html(sp.memory);
			$('#psim').html(sp.sim);
			$('#ppin').html(sp.pin);
			$('#ppic1').attr('src', sp.code+'/pic1.jpg');
			$('#ppic2').attr('src', sp.code+'/pic2.jpg');
			$('#ppic3').attr('src', sp.code+'/pic3.jpg');
		} catch(e) {
			$('#p-detail').html('<div class="section"></div><div class="container alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Sản phẩm không tồn tại!</strong> Đường dẫn này đưa bạn tới một sản phẩm không tồn tại. <a href="#" class="alert-link">Trờ về trang chủ</a> hoặc thử xem sản phẩm nào đó khác.</div>');
		}
	</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/footer.php" ?>