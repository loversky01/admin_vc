<!-- PHP code -->
<?php
  session_start();
  include('include/config.php');
  if(strlen($_SESSION['alogin'])==0)
	  {	
  header('location:index.php');
  }
  else{
  date_default_timezone_set('Asia/Ho_Chi_Minh');// thay đổi timezone
  $currentTime = date( 'd-m-Y h:i:s A', time () );
  
  
  if(isset($_POST['submit']))
  {
  $sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['password'])."' && username='".$_SESSION['alogin']."'");
  $num=mysqli_fetch_array($sql);
  if($num>0)
  {
   $con=mysqli_query($con,"update admin set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
  $_SESSION['msg']="Đã thay đổi mật khẩu thành công!!";
  }
  else
  {
  $_SESSION['msg']="Mật khẩu cũ không khớp !!";
  }
  }
   
?>

<!-- End code PHP for home index -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Trang chủ</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="./index.php" class="brand-link">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <?php include('include/sidebar.php');?>
            <!-- /.sidebar -->

        </aside>
        <br>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- left column -->

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa tài khoản</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="module-body">

                            <?php if(isset($_POST['submit']))
{?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                            </div>
                            <?php } ?>

                            <form name="chngpwd" method="post" onSubmit="return valid();">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Username</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            name="tUsername" value="<?php echo $fetched_row['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mật khẩu</label>
                                        <input type="password" class="form-control" id="exampleInputEmail1"
                                            name="tPassword" value="<?php echo $fetched_row['password']; ?>">
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-10 offset-md-1">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <button type="submit" class="btn btn-block bg-gradient-primary"
                                                            name="btn-update">Lưu</button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="submit" class="btn btn-block btn-secondary"
                                                            name="btn-cancel">Hủy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

            <!-- =========================================================== -->

            <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
        <!-- /.content-wrapper -->
        <?php include('include/footer.php');?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- jQuery -->
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/adminlte.min.js"></script>
    <!-- Các function cảnh báo -->
    <script type="text/javascript">
    function valid() {
        if (document.chngpwd.password.value == "") {
            alert("Mật khẩu cũ không được để trống !!");
            document.chngpwd.password.focus();
            return false;
        } else if (document.chngpwd.newpassword.value == "") {
            alert("Mật khẩu hiện tại trống !!");
            document.chngpwd.newpassword.focus();
            return false;
        } else if (document.chngpwd.confirmpassword.value == "") {
            alert("Xác nhận mật khẩu trống!!");
            document.chngpwd.confirmpassword.focus();
            return false;
        } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
            alert("Mật khẩu không khớp  !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</body>

</html>
<?php } ?>