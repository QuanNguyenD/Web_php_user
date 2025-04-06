<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="<?=APPURL."/images/favicon.png"?>" type="">

  <title> Orthoc </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?=APPURL."/css/bootstrap.css"?>" />


  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="<?= APPURL."/css/font-awesome.min.css"?> "rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href= "<?=APPURL."/css/style.css"?> "rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?= APPURL."/css/responsive.css"?>" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <?php require_once(APPPATH.'/views/header_section_strats.php'); ?>
    <!-- end header section -->
  </div>

  <!-- contact section -->
  <section class="contact_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>
        Get In Touch
      </h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form_container contact-form">
          <form id="booking-form">
            <div class="form-row">
              <div class="col-lg-6">
                <div>
                  <input type="text" id="name" placeholder="Your Name" required />
                </div>
              </div>
              <div class="col-lg-6">
                <div>
                  <input type="text" id="phone" placeholder="Phone Number" required />
                </div>
              </div>
            </div>
            <div>
              <input type="text" id="service-id" placeholder="Service" value="<?= $_GET['service_id'] ?? '' ?>" readonly />
            </div>
            <div class="form-row">
              <div class="col-lg-6">
                <div>
                  <input type="date" id="appointment-date" placeholder="Appointment Date"  />
                </div>
              </div>
              <div class="col-lg-6">
                <div>
                  <input type="time" id="appointment-time" placeholder="Appointment Time"  />
                </div>
              </div>
            </div>
            <div>
              <input type="text" id="message" class="message-box" placeholder="Message" />
            </div>
            <div class="btn_box">
              <button type="submit">SEND</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- end contact section -->

  <!-- footer section -->
  <?php require_once(APPPATH.'/views/foodter_section.php'); ?>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="<?= APPURL."/js/jquery-3.4.1.min.js"?>"></script>

  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="<?= APPURL."/js/bootstrap.js"?>"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="<?= APPURL."/js/custom.js"?>"></script>
  <!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
  <script>
  $("#booking-form").submit(function(e) {
    e.preventDefault();

    const data = {
      name: $("#name").val(),
      phone: $("#phone").val(),
      service_id: $("#service-id").val(),
      appointment_date: $("#appointment-date").val(),
      appointment_time: $("#appointment-time").val(),
      message: $("#message").val()
    };

    $.ajax({
      url: "http://localhost/API/patient/booking",
      method: "POST",
      data: data,
      contentType: "application/x-www-form-urlencoded",
      success: function(response) {
        alert("Đặt lịch thành công!");
        console.log(response);
      },
      error: function(xhr) {
        alert("Lỗi khi đặt lịch: " + xhr.responseText);
      }
    });
  });
</script>
</body>

</html>