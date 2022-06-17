<!-- PHP code -->
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Ho_Chi_Minh');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$hoten=$_POST['hoten'];
	$email=$_POST['email'];
    $noidung=$_POST['noidung'];
	$id=intval($_GET['id']);
    $trangthai=$_POST['trangthai'];
$sql=mysqli_query($con,"update lienhe set hoten='$hoten',email='$email',noidung='$noidung', trangthai='$trangthai' where id='$id'");
$_SESSION['msg']="Liên hệ của khách hàng đã được sửa thành công !!";

}

?>
<!-- End PHP code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Sản phẩm</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <title>Admin| Cập nhật liên hệ</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">

    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>

<body>


    <div class="wrapper">
        <!-- Navbar -->

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

        <div class="content-wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="content">
                        <br>
                        <div class="card card-primary">
                            <div class="card-header">

                                <h3 class="card-title">Sửa danh mục</h3>
                            </div>
                            <div class="module-body">

                                <?php if(isset($_POST['submit']))
{?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong>
                                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                                <?php } ?>


                                <br />

                                <form class="form-horizontal row-fluid" name="lienhe" method="post">
                                    <?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from lienhe where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Tên khách hàng</label>
                                        <div class="controls">
                                            <input type="text" name="hoten"
                                                value="<?php echo  htmlentities($row['hoten']);?>" class="span8 tip"
                                                required>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Email của khách hàng</label>
                                        <div class="controls">
                                            <input type="text" name="email"
                                                value="<?php echo  htmlentities($row['email']);?>" class="span8 tip"
                                                required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Nội dung tin nhắn</label>
                                        <div class="controls">
                                            <input type="text" name="noidung"
                                                value="<?php echo  htmlentities($row['noidung']);?>" class="span8 tip"
                                                required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Trạng thái?</label>
                                        <div class="controls">
                                            <select name="trangthai" id="trangthai" class="span8 tip" required>
                                                <option value="">Chọn</option>
                                                <option value="1">Đã xử lý</option>
                                                <option value="0">Chưa xử lý</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn" onClick="document.location.href='./lienhe.php'">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <!--/.content-->
                    </div>
                    <!--/.span9-->
            </section>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
    <?php include('include/footer.php');?>

    <!-- Js -->
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    });
    </script>
    <!-- jQuery -->

    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/adminlte.min.js"></script>



</body>
<?php } ?>