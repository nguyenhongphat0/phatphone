<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>Xem đơn hàng</title>
</head>
<body>
    <?php 
        if (!file_exists($_GET['dh'])) {
            echo "<script>window.location.replace('done/xem.php?dh=".$_GET['dh']."')</script>";
        }
     ?>
    <div class="container">
        <div class="row">
            <div class="card darken-1">
                <div class="card-content">
                    <a href="index.php" class="waves-effect btn orange">Về trang trước</a>
                    <a href="/index.php" class="waves-effect btn orange">Về trang chủ</a>
                    <a href="done/xem.php?dh=<?php echo $_GET['dh']; ?>" class="waves-effect btn green" id="shiped">Đã giao hàng</a>
                </div>
                <div class="card-action">
                    <span class="card-title">Đơn hàng của <span class="orange-text"><?php echo substr($_GET['dh'], strpos($_GET['dh'], '. ')+2); ?></span></span>
                    
                    <span class="grey-text"><br><?php $file = fopen($_GET['dh'], "r"); echo fgets($file)."<br>"; ?></span>
                    <p>
                    <?php
                        for ($i=0; $i < 5; $i++) { 
                            echo fgets($file)."<br>";
                        }
                    ?>
                    </p>
                    <table>
                        <thead> 
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead> 
                        <tbody id="sp-table">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Tổng tiền</th> 
                                <th id="tongtien"></th> 
                                <th></th> 
                            </tr>
                        </tfoot> 
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        <?php echo 's = JSON.parse(\''.fgets($file).'\');'; ?>
        Object.keys(s).forEach(function(t){
            if (t != "" && t != "tongtien" && t != "cart-no")
            {
                var info = s[t].split("|");
                var row = "";
                row += '<tr><td>' + t + '</td><td>' + info[0] + '</td><td>' + info[1] + '</td><td>' + info[2] + '</td><td>' + info[3] + '</td><tr/>';
                $('#sp-table').append(row);
            };
        })
        $('#tongtien').text(Number(s.tongtien).toLocaleString('vi') + " VND");    
    </script>
</body>
</html>