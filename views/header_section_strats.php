<!-- header section starts -->
<header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="index.html">
        <span>Orthoc</span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="">☰</span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= APPURL.'/home' ?>">
              <i class="fas fa-home"></i> Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <!-- <li class="nav-item"><a class="nav-link" href="<?= APPURL.'/about' ?>"><i class="fas fa-info-circle"></i> About</a></li> -->
          <li class="nav-item"><a class="nav-link" href="<?= APPURL.'/service' ?>"><i class="fas fa-building"></i> Service</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= APPURL.'/doctors' ?>"><i class="fas fa-user-md"></i> Doctors</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= APPURL.'/contact' ?>"><i class="fas fa-envelope"></i> Contact Us</a></li>

          <?php if (isset($_COOKIE['accessToken'])): ?>
            <?php 
              // Giả sử AuthUser chứa thông tin user đã đăng nhập
              //$AuthUser = $_COOKIE['AuthUser'];
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= $AuthUser['avatar'] ?>" alt="Avatar" class="rounded-circle" width="40" height="40">
              </a>
              <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                <!-- Thông tin user -->
                
                <li><hr class="dropdown-divider"></li>
                
                <!-- Các tùy chọn -->
                <li><a class="dropdown-item" href="<?= APPURL ?>/profile"><i class="fas fa-user"></i> Thông tin cá nhân</a></li>
                <li><a class="dropdown-item" href="<?= APPURL ?>/profile/edit"><i class="fas fa-edit"></i> Thay đổi thông tin cá nhân</a></li>
                <li><a class="dropdown-item" href="<?= APPURL ?>/change-password"><i class="fas fa-key"></i> Thay đổi mật khẩu</a></li>
                
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="<?= APPURL ?>/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
              </ul>
            </li>

          <?php else: ?>
            <li class="nav-item">
              <a href="<?= APPURL ?>/login" class="btn btn-outline-light">
                <i class="fas fa-sign-in-alt"></i> Login
              </a>
            </li>
          <?php endif; ?>

        </ul>
      </div>
    </nav>
  </div>
</header>
<!-- end header section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<!-- Bootstrap Icons (Font Awesome) -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var dropdownToggle = document.querySelector("#userDropdown");
    var dropdownMenu = new bootstrap.Dropdown(dropdownToggle);

    dropdownToggle.addEventListener("click", function (e) {
      e.preventDefault(); // Ngăn chặn load lại trang
      if (dropdownToggle.classList.contains("show")) {
        dropdownMenu.hide();
      } else {
        dropdownMenu.show();
      }
      
    });
  });
  
</script>
