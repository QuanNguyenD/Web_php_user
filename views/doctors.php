<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Orthoc</title>
  <link rel="stylesheet" type="text/css" href="<?=APPURL.'/css/bootstrap.css'?>" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link href="<?=APPURL.'/css/font-awesome.min.css'?>" rel="stylesheet" />
  <link href="<?=APPURL.'/css/style.css'?>" rel="stylesheet" />
  <link href="<?=APPURL.'/css/responsive.css'?>" rel="stylesheet" />
  <style>
    .doctor_section .detail-box h5 {
        font-size: 30px; /* Cỡ chữ lớn hơn */
        font-weight: bold; /* Chữ in đậm */
    }
    .doctor_section .img-box img {
    width: 100%; /* Ảnh luôn đầy khung */
    height: 250px; /* Đặt chiều cao cố định */
    object-fit: cover; /* Cắt ảnh cho vừa khung mà không méo */
    border-radius: 10px; /* Tùy chỉnh bo góc nếu cần */

    
    }
    .btn-box{
    display: flex;
    justify-content: center; /* Căn giữa theo chiều ngang */
    align-items: center; /* Căn giữa theo chiều dọc */
    gap: 15px; /* Tạo khoảng cách giữa các phần tử */
    margin-top: 20px; /* Thêm khoảng cách trên */
}

.btn-box button{
        background-color:rgb(91, 126, 117);
    }




</style>
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
    <div class="hero_bg_box">
      <img src="<?=APPURL.'/images/hero-bg.png'?>" alt="">
    </div>
    <?php require_once(APPPATH.'/views/header_section_strats.php'); ?>
  </div>

  <section class="doctor_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Our Doctors</h2>
        <p class="col-md-10 mx-auto px-0">Danh sách bác sĩ chuyên khoa hàng đầu của chúng tôi.</p>
      </div>
      <div class="row" id="doctor-list">
        <!-- Danh sách bác sĩ sẽ được AJAX load vào đây -->
      </div>
      <div class="btn-box">
        <button id="prev-page" class="btn btn-primary disabled">Previous</button>
        <span id="current-page">1</span>
        <button id="next-page" class="btn btn-primary">Next</button>
      </div>
    </div>
  </section>

  <?php require_once(APPPATH.'/views/foodter_section.php'); ?>
  
  <script type="text/javascript" src="<?= APPURL.'/js/jquery-3.4.1.min.js'?>"></script>
  <script type="text/javascript" src="<?= APPURL.'/js/bootstrap.js'?>"></script>
  <script>
    $(document).ready(function() {
      const apiUrl = "http://localhost/API/doctors";
      const doctorsPerPage = 5;
      let currentPage = 1;
      let totalPages = 1;
      
      function loadDoctors(page) {
        $.ajax({
          type: "GET",
          url: apiUrl,
          data: { start: (page - 1) * doctorsPerPage, length: doctorsPerPage },
          dataType: "json",
          success: function(response) {
            if (response.result === 1) {
              let doctors = response.data;
              let html = "";
              if (doctors.length > 0) {
                doctors.forEach(function(doctor) {
                  html += `
                    <div class="col-sm-6 col-lg-4 mx-auto">
                      <div class="box">
                        <div class="img-box">
                          <img src="${doctor.avatar || 'images/d1.jpg'}" alt="${doctor.name}">
                        </div>
                        <div class="detail-box">
                          <h5>${doctor.name}</h5>
                          <h6>${doctor.speciality.name}</h6>
                          <p>Phòng: ${doctor.room.name} (${doctor.room.location})</p>
                          <p>Email: ${doctor.email}</p>
                          <p>Điện thoại: ${doctor.phone}</p>
                        </div>
                      </div>
                    </div>`;
                });
              } else {
                html = "<p>Không có bác sĩ nào.</p>";
              }
              $("#doctor-list").html(html);
              totalPages = Math.ceil(response.quantity / doctorsPerPage);
              updatePagination();
            } else {
              console.log("Lỗi:", response.msg);
            }
          },
          error: function(error) {
            console.log("Lỗi khi gọi API:", error);
          }
        });
      }
      
      function updatePagination() {
        $("#current-page").text(currentPage);
        $("#prev-page").toggleClass("disabled", currentPage === 1);
        $("#next-page").toggleClass("disabled", currentPage >= totalPages);
      }
      
      $("#prev-page").click(function() {
        if (currentPage > 1) {
          currentPage--;
          loadDoctors(currentPage);
        }
      });
      
      $("#next-page").click(function() {
        if (currentPage < totalPages) {
          currentPage++;
          loadDoctors(currentPage);
        }
      });
      
      loadDoctors(currentPage);
    });
  </script>
</body>
</html>
