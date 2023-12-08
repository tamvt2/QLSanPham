<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản Lý Sản Phẩm</title>

    <!-- Custom fonts for this template-->
    <link href="<?=ROOT_URL?>public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?=ROOT_URL?>public/assets/css/sb-admin-2.min.css">
</head>

<body id="page-top">
    <div class="container mt-5">
		<form class="user" method="post" action="/update/<?php echo $product['id'] ?>">
			<div class="card-body">
				<div class="form-group">
					<label>Tên sản phẩm</label>
					<input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo $product['ten'] ?>">
				</div>
				<div class="form-group">
					<label>Hình ảnh sản phẩm</label>
					<input type="file" name="file" class="form-control mb-2" id="upload">
					<div id="image_show"></div>
					<input type="hidden" name="thumb" id="thumb" value="<?php echo $product['hinh_anh'] ?>">
				</div>
				<div class="form-group">
					<label>Giá bán</label>
					<input type="text" name="gia_ban" class="form-control" placeholder="Nhập giá bán của sản phẩm" value="<?php echo $product['gia_ban'] ?>">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<input type="text" name="mo_ta" class="form-control" placeholder="Nhập mô tả sản phẩm" value="<?php echo $product['mo_ta'] ?>">
				</div>
				<button class="btn btn-primary btn-user btn-block">
					Update
				</button>
			</div>
		</form>
    </div>
	<script src="<?=ROOT_URL?>public/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=ROOT_URL?>public/assets/js/admin/js/main.js"></script>
</body>
</html>