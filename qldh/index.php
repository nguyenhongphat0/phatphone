<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>Đơn hàng mới</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="card darken-1">
                <div class="card-content">
                    <a href="/index.php" class="waves-effect btn orange">Về trang chủ</a>
                    <a href="done/index.php" class="waves-effect btn white orange-text">Đơn hàng đã giao</a>
                </div>
                <div class="card-action">
                    <span class="card-title">Quản lý đơn hàng</span>
                    <p>Tất cả đơn đặt hàng nhận được sẽ hiện ở đây (theo thứ tự thời gian).</p>
                    <?php
                        $list = array_diff(scandir(__DIR__, 1), array('..', '.', 'index.php', 'xem.php', 'done'));
                        foreach ($list as $item) {
                            echo '<a href="xem.php?dh='.$item.'">'.$item.'</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>