<?php $title='Đặt hàng thành công' ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/header.php" ?>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        $filename = "qldh/".(count(scandir("qldh/"))+count(scandir("qldh/done/"))-8).". ".$_POST['name'];
        $file = fopen($filename, "w");
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        fwrite($file, date("h:ia d/m/Y")."\n");
        fwrite($file, "Họ tên: ".$_POST['name']."\n");
        fwrite($file, "Số điện thoại: ".$_POST['phone']."\n");
        fwrite($file, "Facebook: ".$_POST['fb']."\n");
        fwrite($file, "Địa chỉ giao hàng: ".$_POST['address']."\n");
        fwrite($file, "Ghi chú: ".$_POST['note']."\n");
        fwrite($file, $_POST['dssp']);
        fclose($file);
    ?>
    <?php
        $to = "phatnhse63348@fpt.edu.vn";
        $subject = "Đơn đặt hàng của ".$_POST['name'];
        $message = 'Phát, '.$_POST['name'].' vừa mới đặt hàng tại cửa hàng của bạn. Bấm vào đây để xem đơn hàng: http://phatphone.000webhostapp.com/qldh/xem.php?dh='.str_replace(" ", "%20", substr($filename, 5));
        $headers = 'From: Phát Phone Store <phatphone@example.com>' . "\r\n";

        mail($to,$subject,$message,$headers);
    ?>
    <div class="section"></div>
    <div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-dismissible alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Đặt hàng thành công!</strong> Chúng tôi đã nhận được đơn đặt hàng của bạn và sẽ sớm liên lạc với bạn để xác nhận đơn hàng. Bạn có thể <a href="index.php" class="alert-link">quay trở về trang chủ</a> và tiếp tục mua hàng. Chúc bạn có một ngày vui vẻ!
            </div>
    </div>
    </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/function.js"></script>
    <script>if (localStorage.getItem("cart-no") !== null && localStorage.getItem("cart-no") != 0){
        localStorage.clear();
        updateCartNo(0);
    }
    </script>
</body>
</html>