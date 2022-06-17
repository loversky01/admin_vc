<!-- PHP code -->
<?php
   session_start();
   include('include/config.php');
   if(strlen($_SESSION['alogin'])==0) //Check login
     {	
   header('location:index.php');
   }
    $donhang_query = mysqli_query($con,"SELECT * from orders");
    $donhang = mysqli_num_rows($donhang_query);
    $danhmuc_query = mysqli_query($con,"SELECT * from category");
    $danhmuc = mysqli_num_rows($danhmuc_query);
    $khachhang_query = mysqli_query($con,"SELECT * from users");
    $khachhang = mysqli_num_rows($khachhang_query);
    $sanpham_query = mysqli_query($con,"SELECT * from products");
    $sanpham = mysqli_num_rows($sanpham_query);
    $lienhe_query = mysqli_query($con,"SELECT * from lienhe");
    $lienhe = mysqli_num_rows($lienhe_query);
    $admin_query = mysqli_query($con,"SELECT * from admin");
    $admin = mysqli_num_rows($admin_query);
   
?>

<!-- End code PHP for home index -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Trang chủ</title>
    <!-- Google Font: Source Sans Pro -->
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>QUẢN TRỊ WEBSITE</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Small Box (Stat card) -->
                    <h5 class="mb-2 mt-4">Danh mục quản trị</h5>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $danhmuc ?></h3>

                                    <p>Danh mục sản phẩm</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fas fa-clipboard-list"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $sanpham ?></h3>

                                    <p>Sản phẩm</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fas fa-database"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $khachhang ?></h3>

                                    <p>Khách hàng</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fas fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $lienhe ?></h3>

                                    <p>Liên hệ</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Thông tin chi tiết<i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- /.row -->
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $donhang ?></h3>

                                    <p>Đơn hàng</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fas fa-book"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>

                        </div>
                        <!--  -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Bài đăng - bình luận</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Admin -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $admin ?></h3>
                                    <p>Admin</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fas fa-user-shield"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Admin -->
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>2</h3>

                                    <p>Thông tin sinh viên</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fas fa-info"></i>
                                </div>
                                <a href="./info/info.html" class="small-box-footer">
                                    Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- =========================================================== -->

                <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button"
                    aria-label="Scroll to top">
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
</body>

</html>