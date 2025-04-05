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
      <img src="../images/hero-bg.png" alt="">
    </div>

    <!-- header section strats -->
    <?php require_once(APPPATH.'/views/header_section_strats.php'); ?>
    <!-- end header section -->
  </div>

  <!-- department section -->
<div class="main-content">
  <section class="department_section layout_padding">
    <div class="department_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our Departments
          </h2>
          <p>
            Asperiores sunt consectetur impedit nulla molestiae delectus repellat laborum dolores doloremque accusantium
          </p>
        </div>
        <div class="row" id="service-list">
          <!-- Dữ liệu dịch vụ sẽ được tải bằng AJAX -->
        </div>
        <!-- <div class="btn-box">
          <button id="prev-page" class="btn btn-primary disabled">Previous</button>
          <span id="current-page">1</span>
          <button id="next-page" class="btn btn-primary">Next</button>
        </div> -->
        <div class="btn-box">
          <a href="">
            View All
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

  <!-- end department section -->

  <!-- footer section -->
  <?php require_once(APPPATH.'/views/foodter_section.php'); ?>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="<?= APPURL."/js/jquery-3.4.1.min.js"?>"></script>
  
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="<?= APPURL." /js/bootstrap.js"?>"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="<?= APPURL. "/js/custom.js"?>"></script>

  <!-- End Google Map -->
<script>
const API_URL = "http://localhost/API/services";
let currentPage = 1;
const itemsPerPage = 4;

function fetchServices(page) {
    $.ajax({
        url: `${API_URL}`,
        method: "GET",
        dataType: "json",
        success: function(response) {
            if (response.result === 1) {
                renderServices(response.data);
                updatePagination(response.quantity);
            }
        },
        error: function() {
            $("#service-list").html("<p class='text-danger'>Lỗi khi tải dịch vụ!</p>");
        }
    });
}

function renderServices(services) {
    let html = "";
    services.forEach(service => {
        html += `
            <div class="col-md-3">
                <div class="box">
                    <div class="img-box">
                        <a href="services/${service.id}">
                            <img src="${service.image ? service.image : '<?= APPURL."/images/default-service.png"?>'}" alt="${service.name}">
                        </a>
                    </div>
                    <div class="detail-box">
                        <h5><a href="services?id=${service.id}">${service.name}</a></h5>
                        <p>${service.description}</p>
                    </div>
                </div>
            </div>
        `;
    });
    $("#service-list").html(html);
}

function updatePagination(totalItems) {
    let totalPages = Math.ceil(totalItems / itemsPerPage);
    $("#current-page").text(currentPage);
    
    if (currentPage === 1) {
        $("#prev-page").addClass("disabled");
    } else {
        $("#prev-page").removeClass("disabled");
    }

    if (currentPage === totalPages) {
        $("#next-page").addClass("disabled");
    } else {
        $("#next-page").removeClass("disabled");
    }
}

// $("#prev-page").click(function() {
//     if (currentPage > 1) {
//         currentPage--;
//         fetchServices(currentPage);
//     }
// });

// $("#next-page").click(function() {
//     currentPage++;
//     fetchServices(currentPage);
// });

// Load dữ liệu ban đầu
fetchServices(currentPage);
</script>


</body>

</html>