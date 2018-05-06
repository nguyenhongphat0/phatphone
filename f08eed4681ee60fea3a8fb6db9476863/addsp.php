<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm thành công</title>
</head>
<body>
    <?php
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/sp/sp.txt', $_POST['code']."\n", FILE_APPEND | LOCK_EX);
        $path = $_SERVER['DOCUMENT_ROOT']."/sp/".$_POST['code'];
        mkdir($path);
        $data = fopen($path."/data.json", "w");
        fwrite($data, $_POST['json']);
        fclose($data);
        function saveImg($sentname, $savename, $path){
            $target_dir = $path;
            $target_file = $target_dir."/".$savename;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES[$sentname]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadOk = 0;
            }
            if ($uploadOk != 0) {
                if (move_uploaded_file($_FILES[$sentname]["tmp_name"], $target_file)) {
                }
            }

        }
        saveImg('pic1', 'pic1.jpg', $path);
        saveImg('pic2', 'pic2.jpg', $path);
        saveImg('pic3', 'pic3.jpg', $path);
    ?>

    <div class="container">
        <div class="row">
            <div class="card darken-1">
                <div class="card-content">
                    <span class="card-title">Thêm sản phẩm thành công</span>
                    <p>Sản phẩm của bạn đã được thêm vào kho. Bạn có thể tiếp tục thêm sản phẩm khác hoặc xem sản phẩm vừa được thêm vào tại <a target="_blank" href="/sp/detail.php?p=<?php echo $_POST['code'] ?>">đây.</a></p>
                </div>
                <div class="card-action">
                    <a href="themsp.html" class="waves-effect btn blue">Thêm sản phẩm khác</a>
                    <a href="index.php" class="waves-effect btn blue">Về kho hàng</a>
                    <a href="/index.php" class="waves-effect btn blue">Về trang chủ</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>