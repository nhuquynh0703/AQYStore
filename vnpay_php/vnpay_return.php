<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
</head>

<body>
    <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?php echo $_GET['vnp_Amount'] ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo $_GET['vnp_PayDate'] ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                                $trangthai="Thanh Cong";
                                //  XÓA GIỎ HÀNG
                                // session_start(); // thêm nếu chưa có dòng này ở đầu file
                                // unset($_SESSION['cart']);
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                                $trangthai="GD Khong thanh cong";
                            }
                        } else {
                            echo "<span style='color:red'>Thanh Cong</span>";
                            $trangthai="Thanh Cong";
                        }
                        $host = 'localhost'; // Tên server
                        $dbname = 'aqystore'; // Tên cơ sở dữ liệu
                        $username = 'root'; // Tên người dùng cơ sở dữ liệu
                        $password = ''; // Mật khẩu của người dùng cơ sở dữ liệu

                        // Kết nối MySQLi
                        $mysqli = new mysqli($host, $username, $password, $dbname);

                        // Kiểm tra kết nối
                        if ($mysqli->connect_error) {
                            die('Không thể kết nối database: ' . $mysqli->connect_error);
                        }

                        // Thiết lập bộ mã hóa kết nối
                        $mysqli->set_charset('utf8');



                            // $trangthai="success";
                            $query = $mysqli->query("UPDATE tbl_vnpay SET trangthai = '$trangthai' WHERE code = '" . $_GET['vnp_TxnRef'] . "'");

                            $mysqli->close();   
                        ?>

                </label>
            </div>
        </div>
        <p>
            &nbsp;
        </p>

        <h1>
            <a href="http://localhost/aqystore/"> Chuyển hướng về trang chủ nhé</a>
        </h1>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y')?></p>
        </footer>
    </div>
</body>

</html>