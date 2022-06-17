<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0) //Check login
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Ho_Chi_Minh');// thay đổi timezone thành HCMC
$currentTime = date( 'd-m-Y h:i:s A', time () );

//Kết nối csdl table bảng dmsp
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$description=$_POST['description'];
$sql=mysqli_query($con,"insert into category(categoryName,categoryDescription) values('$category','$description')");
$_SESSION['msg']="Danh mục được tạo thành công !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Danh mục đã được xóa !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Danh mục</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">


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

                                <h3 class="card-title">Thêm danh mục</h3>
                            </div>
                            <div class="module-body">

                                <?php if(isset($_POST['submit']))
{?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Hoàn thành!</strong>
                                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                                <?php } ?>


                                <?php if(isset($_GET['del']))
{?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>!</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                </div>
                                <?php } ?>

                                <br />

                                <form class="form-horizontal row-fluid" name="Category" method="post">

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Tên danh mục</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Nhập tên danh mục" name="category"
                                                class="span8 tip" required>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Mô tả danh mục</label>
                                        <div class="controls">
                                            <textarea class="span8" name="description" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Tạo mới</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Danh mục sản phẩm</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0"
                                    class="datatable-1 table table-bordered table-striped table-bordered table-hover	 display"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Danh mục</th>
                                            <th>Mô tả</th>
                                            <th>Ngày tạo</th>
                                            <th>Cập nhật mới nhất</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $query=mysqli_query($con,"select * from category");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['categoryName']);?></td>
                                            <td><?php echo htmlentities($row['categoryDescription']);?></td>
                                            <td> <?php echo htmlentities($row['creationDate']);?></td>
                                            <td><?php echo htmlentities($row['updationDate']);?></td>
                                            <td>
                                                <a href="edit-category.php?id=<?php echo $row['id']?>"><i
                                                        class="icon-edit"></i></a>
                                                <a href="danhmuc.php?id=<?php echo $row['id']?>&del=delete"
                                                    onClick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                                                        class="icon-remove-sign"></i></a>
                                            </td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>

                                </table>
                            </div>
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

    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

</body>
<?php } ?>