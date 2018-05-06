<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>Xóa sản phẩm</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="card darken-1">
                <div class="card-content">
                    <span class="card-title" id="status"></span>
                    <p id="message"></p>
                </div>
                <div class="card-action">
                    <a href="index.php" class="waves-effect btn blue">Về kho hàng</a>
                    <a href="/index.php" class="waves-effect btn blue">Về trang chủ</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        <?php
            error_reporting(E_ERROR | E_PARSE);
            $path = $_SERVER['DOCUMENT_ROOT']."/sp/".$_POST['code']."/";
            if (!is_dir($path)) {
                echo "$('#status').text('Xóa sản phẩm không thành công.'); $('#message').text('Mã sản phẩm không tồn tại.');";
            } else {        
                unlink($path.'data.json');
                unlink($path.'pic1.jpg');
                unlink($path.'pic2.jpg');
                unlink($path.'pic3.jpg');
                rmdir($path);
                $path = $_SERVER['DOCUMENT_ROOT']."/sp/";
                $text = '';
                $sp = fopen($path.'sp.txt', "r");
                do {
                    $s = fgets($sp);
                    if (str_replace("\n", "", $s) != $_POST['code']) $text = $text.$s;
                } while ($s !== false);
                fclose($sp);
                file_put_contents($path.'sp.txt', $text);
                echo "$('#status').text('Xóa sản phẩm thành công.'); $('#message').text('Sản phẩm đã được xóa khỏi cửa hàng.');";
            }
        ?>
    </script>
</body>
</html>