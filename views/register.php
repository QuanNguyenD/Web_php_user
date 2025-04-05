<!DOCTYPE html>

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content=" <?= WEBSITE_NAME ?> ">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title> <?= WEBSITE_NAME ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= APPURL."/assets/favicon/apple-icon-57x57.png?v=".VERSION ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= APPURL."/assets/favicon/apple-icon-60x60.png?v=".VERSION ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= APPURL."/assets/favicon/apple-icon-72x72.png?v=".VERSION ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= APPURL."/assets/favicon/apple-icon-76x76.png?v=".VERSION ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= APPURL."/assets/favicon/apple-icon-114x114.png?v=".VERSION ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= APPURL."/assets/favicon/apple-icon-120x120.png?v=".VERSION ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= APPURL."/assets/favicon/apple-icon-144x144.png?v=".VERSION ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= APPURL."/assets/favicon/apple-icon-152x152.png?v=".VERSION ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= APPURL."/assets/favicon/apple-icon-180x180.png?v=".VERSION ?>">

    <link rel="icon" type="image/png" sizes="192x192" href="<?= APPURL."/assets/img/murkoff-logo.jpg?v=".VERSION ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= APPURL."/assets/img/murkoff-logo.jpg?v=".VERSION ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= APPURL."/assets/img/murkoff-logo.jpg?v=".VERSION ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= APPURL."/assets/img/murkoff-logo.jpg?v=".VERSION ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= APPURL."/assets/img/murkoff-logo.jpg?v=".VERSION ?>">

    <!-- <link rel="manifest" href="<?= APPURL."/assets/favicon/manifest.json?v=".VERSION ?>"> -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= APPURL."/assets/favicon/ms-icon-144x144.png?v=".VERSION ?>" >
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= APPURL."/assets/vendors/simplebar/css/simplebar.css?v=".VERSION ?>">
    <link rel="stylesheet" href="<?= APPURL."/assets/css/vendors/simplebar.css?v=".VERSION ?>">
    <!-- Main styles for this application-->
    <link href="<?= APPURL."/assets/css/style.css?v=".VERSION ?>" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">


    <link href="<?= APPURL."/assets/css/examples.css?v=".VERSION ?>" rel="stylesheet">

    <!-- CoreUI icons -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/all.min.css">

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>

    <!-- CONTENT -->
    <?php require_once(APPPATH.'/views/fragments/register.fragment.php'); ?>
    <!-- end CONTENT -->

    <!-- JAVA SCRIPT -->
    <?php require_once(APPPATH.'/views/fragments/javascript.fragment.php'); ?>
    <script>
      $(document).ready(function() {
        
        $("#submitButton").click(function(){
            /**Step 1 - declare */
            let email = $("#email").val();
            let phone = $("#phone").val();
            let name = $("#name").val();
            let password = $("#password").val();
            let passwordConfirm = $("#passwordConfirm").val();

            let data = {
              email: email,
              phone: phone,
              name: name,
              password: password,
              passwordConfirm: passwordConfirm
            };



            /**Step 2 - show loading */
            Swal.fire({
              title: 'Hệ thống đang xử lý yêu cầu của bạn',
              html: 'Xin vui lòng đợi trong giây lát...',
              allowEscapeKey: false,
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading()
              }
            });


            /**Step 3 - make AJAX request */
            let title = 'success';
            let msg = "";
            $.ajax({
                  type: "POST",
                  url: "<?= API_URL ?>/signup",
                  data: data,
                  dataType: "JSON",
                  success: function(resp) {
                    Swal.close();// close loading screen
                    msg = resp.msg;
                    if(resp.result == 1)
                    {
                      Swal.fire({
                            title: 'Success',
                            text: "Tài khoản đăng kí thành công",
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonText: 'Đăng nhập',
                            cancelButtonText: 'Đóng',
                            confirmButtonColor: '#FF0000',
                            cancelButtonColor: '#0000FF',
                            reverseButtons: false
                          }).then((result) => 
                              {
                                if (result.isConfirmed) 
                                {
                                   window.location.replace('<?=APPURL?>/login');
                                } 
                                else
                                {
                                    Swal.close();
                                }
                              });
                    }
                    else
                    {
                        title = 'error';
                        Swal.fire({
                          position: 'center',
                          icon: 'warning',
                          title: 'Warning',
                          text: msg,
                          showConfirmButton: false,
                          timer: 1500
                        });
                    }
                  },
                  error: function(err) {
                    Swal.fire('Oops...', "Oops! An error occured. Please try again later!", 'error');
                  }
            });

        });
      })
    </script>

</html>