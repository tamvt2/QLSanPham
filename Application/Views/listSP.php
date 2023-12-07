
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản Lý Sản Phẩm</title>
	<link href="public/assets/img/favicon.png" rel="icon">
  	<link href="public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Custom fonts for this template-->
	<link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="public/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="public/assets/css/main.css" rel="stylesheet">

</head>

<body id="page-top">
	<div class="d-flex justify-content-between">
		<a href="/add" class="btn btn-primary ms-5 mt-3">Thêm Sản Phẩm</a>
		<?php
			session_start();
			if (isset($_SESSION['user_id'])) {
				echo '<a href="/logout" class="btn btn-primary mx-5 mt-3">Đăng Xuất</a>';
			}
		?>
	</div>
	<section id="menu" class="menu">
		<div class="tab-content">
			<div class="tab-pane fade active show" id="menu-starters">
				<div class="row gy-5">
					<?php
						
						foreach($products as $value) {
							if (isset($_SESSION['user_id'])) {
								$gia = $value['gia_ban'];
							} else {
								$gia = 'Liên hệ';
							}
							echo '
								<div class="col-lg-4 menu-item">
									<img src="'.$value['hinh_anh'].'" class="menu-img" alt="" style="width: 55%; height: 150px">
									<h4>'.$value['ten'].'</h4>
									<p class="ingredients">
									'.$value['mo_ta'].'
									</p>
									<p class="price">
									'.$gia.'
									</p>
									<p>Ngày tạo: '.$value['ngay_tao'].'</p>
									<p>Ngày cập nhật: '.$value['ngay_cap_nhat'].'</p>
									<a type="button" class="btn btn-warning btn-sm" href="/update/'.$value['id'].'">Sửa</a>
                    				<a type="button" class="btn btn-danger btn-sm" onclick="removeRow('.$value['id'].')">Xóa</a>
								</div><!-- Menu Item -->
							';
						}
					?>
				</div>
			</div><!-- End Starter Menu Content -->
		</div>
	</section><!-- End Menu Section -->
	<script src="public/assets/vendor/jquery/jquery.min.js"></script>
	<script src="public/assets/js/admin/js/main.js"></script>
</body>

</html>