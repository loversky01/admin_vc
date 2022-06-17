<!-- PHP code -->
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
	$productimage1=$_FILES["productimage1"]["name"];
	$productimage2=$_FILES["productimage2"]["name"];
	$productimage3=$_FILES["productimage3"]["name"];
//for getting product id
$query=mysqli_query($con,"select max(id) as pid from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="productimages/$productid";
if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}

	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]);
$sql=mysqli_query($con,"insert into products(category,subCategory,productName,productCompany,productPrice,productDescription,shippingCharge,productAvailability,productImage1,productImage2,productImage3,productPriceBeforeDiscount) values('$category','$subcat','$productname','$productcompany','$productprice','$productdescription','$productscharge','$productavailability','$productimage1','$productimage2','$productimage3','$productpricebd')");
$_SESSION['msg']="Thêm sản phẩm thành công!!";

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

                                <h3 class="card-title">Thêm sản phẩm mới</h3>
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


                                <?php if(isset($_GET['del']))
{?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                </div>
                                <?php } ?>

                                <br />

                                <form class="form-horizontal row-fluid" name="insertproduct" method="post"
                                    enctype="multipart/form-data">

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Danh mục chính</label>
                                        <div class="controls">
                                            <select name="category" class="span8 tip" onChange="getSubcat(this.value);"
                                                required>
                                                <option value="">Chọn danh mục chính</option>
                                                <?php $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{?>

                                                <option value="<?php echo $row['id'];?>">
                                                    <?php echo $row['categoryName'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Danh mục con</label>
                                        <div class="controls">
                                            <select name="subcategory" id="subcategory" class="span8 tip" required>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Tên sản phẩm</label>
                                        <div class="controls">
                                            <input type="text" name="productName" placeholder="Nhập tên sản phẩm"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Công ty sản xuất</label>
                                        <div class="controls">
                                            <input type="text" name="productCompany"
                                                placeholder="Nhập tên công ty sản xuất" class="span8 tip" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Giá sản phẩm nhập kho</label>
                                        <div class="controls">
                                            <input type="text" name="productpricebd" placeholder="Nhập giá sản phẩm"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Giá sản phẩm sau khi chiết khấu (Giá bán)</label>
                                        <div class="controls">
                                            <input type="text" name="productprice" placeholder="Nhập giá bán"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Mô tả sản phẩm</label>
                                        <div class="controls">
                                            <textarea name="productDescription" placeholder="Nhập nội dung mô tả cho sản phẩm"
                                                rows="6" class="span8 tip">
</textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Phí vận chuyển sản phẩm</label>
                                        <div class="controls">
                                            <input type="text" name="productShippingcharge"
                                                placeholder="Nhập phí vận chuyển" class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Sản phẩm có sẵn?</label>
                                        <div class="controls">
                                            <select name="productAvailability" id="productAvailability"
                                                class="span8 tip" required>
                                                <option value="">Chọn</option>
                                                <option value="In Stock">Còn hàng</option>
                                                <option value="Out of Stock">Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Ảnh sản phẩm 1</label>
                                        <div class="controls">
                                            <input type="file" name="productimage1" id="productimage1" value=""
                                                class="btn " required>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Ảnh sản phẩm 2</label>
                                        <div class="controls">
                                            <input type="file" name="productimage2" class="btn " required>
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Ảnh sản phẩm  3</label>
                                        <div class="controls">
                                            <input type="file" name="productimage3" class="btn ">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Thêm mới sản phẩm</button>
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