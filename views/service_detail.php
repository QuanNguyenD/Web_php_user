<?php
// Lấy ID từ URL
$uri = trim($_SERVER['REQUEST_URI'], '/'); // Xóa dấu '/' 2 đầu
$segments = explode('/', $uri); // Tách URL thành mảng
$service_id = isset($segments[2]) ? intval($segments[2]) : 0;

if ($service_id <= 0) {
    die("<h2 style='color:red'>Dịch vụ không hợp lệ!</h2>");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết dịch vụ</title>
    <link rel="stylesheet" href="<?= APPURL.'/css/bootstrap.css' ?>">
    <script src="<?= APPURL.'/js/jquery-3.4.1.min.js' ?>"></script>
      <!-- font awesome style -->
  <link href="<?= APPURL."/css/font-awesome.min.css"?> "rel="stylesheet" />

<!-- Custom styles for this template -->
<link href= "<?=APPURL."/css/style.css"?> "rel="stylesheet" />
<!-- responsive style -->
<link href="<?= APPURL."/css/responsive.css"?>" rel="stylesheet" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<style>
    html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.main-content {
    flex: 1; /* Đẩy footer xuống đáy */
}
</style>
</head>
<body class="sub_page">
    <div class="hero_area">
        <?php require_once(APPPATH.'/views/header_section_strats.php'); ?>
    </div>
    <div class="main-content">
        <section class="service_detail layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-box">
                            <img id="service-image" src="" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2 id="service-name"></h2>
                            </div>
                            <p id="service-description"></p>
                            <a id="booking-link" href="#" class="btn btn-primary">Đặt lịch khám</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div>

    <?php require_once(APPPATH.'/views/foodter_section.php'); ?>

    <script>
        $(document).ready(function () {
            var serviceId = <?= json_encode($service_id) ?>;
            var apiUrl = "http://localhost/API/services/" + serviceId;
            
            $.get(apiUrl, function (response) {
                if (response.result === 1) {
                    var service = response.data;
                    $("#service-name").text(service.name);
                    $("#service-description").text(service.description);
                    $("#service-image").attr("src", "<?= APPURL . '/' ?>" + service.image);
                    $("#service-image").attr("alt", service.name);
                    $("#booking-link").attr("href", "booking.php?service_id=" + service.id);
                } else {
                    alert("Không tìm thấy dịch vụ!");
                }
            }).fail(function () {
                alert("Lỗi khi tải dữ liệu từ API!");
            });
        });
    </script>
</body>
</html>
