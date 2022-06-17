<!-- PHP code -->

<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update subcategory set categoryid='$category',subcategory='$subcat',updationDate='$currentTime' where id='$id'");
$_SESSION['msg']="Sub-Category Updated !!";

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
    <title>Admin| Insert Product</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>

    <script>
    function getSubcat(val) {
        $.ajax({
            type: "POST",
            url: "get_subcat.php",
            data: 'cat_id=' + val,
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
    }

    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
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

                                <h3 class="card-title">Sửa danh mục con</h3>
                            </div>
                            <div class="module-body">

                                <?php if(isset($_POST['submit']))
{?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Thành công!</strong>
                                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                                <?php } ?>


                                <br />

                                <form class="form-horizontal row-fluid" name="Category" method="post">
                                    <?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select category.id,category.categoryName,subcategory.subcategory from subcategory join category on category.id=subcategory.categoryid where subcategory.id='$id'");
while($row=mysqli_fetch_array($query))
{
?>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Danh mục chính</label>
                                        <div class="controls">
                                            <select name="category" class="span8 tip" required>
                                                <option value="<?php echo htmlentities($row['id']);?>">
                                                    <?php echo htmlentities($catname=$row['categoryName']);?></option>
                                                <?php $ret=mysqli_query($con,"select * from category");
while($result=mysqli_fetch_array($ret))
{
echo $cat=$result['categoryName'];
if($catname==$cat)
{
	continue;
}
else{
?>
                                                <option value="<?php echo $result['id'];?>">
                                                    <?php echo $result['categoryName'];?></option>
                                                <?php } }?>
                                            </select>
                                        </div>
                                    </div>




                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Tên danh mục con</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Nhập tên danh mục con" name="subcategory"
                                                value="<?php echo  htmlentities($row['subcategory']);?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>


                                    <?php } ?>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Cập nhật</button>
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