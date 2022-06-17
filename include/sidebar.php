<!-- Sidebar -->
<div class="sidebar">
    <nav class="mt-2">
        <!-- SidebarSearch Form -->
        <ul class="nav pull-right">
            <li><a href="#">
                    Quản trị viên
                </a></li>
            <li class="nav-user dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                </a>
                <ul class="dropdown-menu">
                    <li><a href="change-password.php">Thay đổi mật khẩu</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
        <br>
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </nav>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="./index.php" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Trang chủ
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="./danhmuc.php" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Danh mục
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./danhmuc.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh muc chính</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./subcategory.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh mục con</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Sản phẩm
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./sanpham.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Hiện thị tất cả</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./themsanpham.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="manage-users.php" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Khách hàng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="manage-users.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Hiện thị tất cả</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="user-logs.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lịch sử đăng nhập</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="./lienhe.php" class="nav-link">
                    <i class="nav-icon fas fa-phone"></i>
                    <p>
                        Liên hệ
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>

                    <p>
                        Đơn hàng
                    </p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="todays-orders.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đơn hàng hôm nay</p>
                            <?php
  $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
 $result = mysqli_query($con,"SELECT * FROM Orders where orderDate Between '$from' and '$to'");
$num_rows1 = mysqli_num_rows($result);
{
?>
                            <b class="label orange pull-right"><?php echo htmlentities($num_rows1); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pending-orders.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đơn đang vận chuyển</p>
                            <?php	
	$status='Delivered';									 
$ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
$num = mysqli_num_rows($ret);
{?><b class="label orange pull-right"><?php echo htmlentities($num); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="delivered-orders.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đơn hàng đã giao</p>
                            <?php	
	$status='Delivered';									 
$rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        Đánh giá & bình luận
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./cmt/cmt.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Bình luận</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./cmt/danhgia.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đánh giá</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>
                        Admin
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./admin/admin.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Hiện thị tất cả</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./admin/themadmin.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="./info/info.html" class="nav-link">
                    <i class="nav-icon fas fa-info"></i>
                    <p>
                        Thông tin sinh viên
                    </p>
                </a>
            </li>
    </nav>
    <!-- /.sidebar-menu -->
</div>