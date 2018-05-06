<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>Kho hàng</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <a href="/index.php" class="waves-effect btn blue">Về trang chủ</a>
                <a href="themsp.html" class="waves-effect btn blue">Thêm sản phẩm mới</a>
                <a href="xoasp.html" class="waves-effect btn white blue-text">Xóa sản phẩm</a>
            </div>
            <div class="card-action">
                <span class="card-title">Kho hàng của bạn</span>
                <p>Các mặt hàng hiện có trong kho hàng:</p>
                <div id="sp"></div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        var sp = [<?php $sp = fopen($_SERVER['DOCUMENT_ROOT'].'/sp/sp.txt', "r");
                do {
                    $s = fgets($sp);
                    echo '"'.str_replace("\n", "", $s).'",';
                } while ($s !== false); ?>];
        var html = '';        
        for (var s in sp)
            html += '<a href="/sp/detail.php?p='+sp[s]+'">'+sp[s]+'</a> ';
        $('#sp').append(html);
        $('.card-action').find('a').addClass('blue-text');
    </script>
</body>
</html>