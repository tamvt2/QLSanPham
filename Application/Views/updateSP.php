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
    <link href="public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="public/assets/css/sb-admin-2.min.css">
	<style>
		* {
			box-sizing: border-box;
		}

		label {
			display: inline-block;
			margin-bottom: 0.5rem;
		}

		body {
			font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
			font-size: 1rem;
			font-weight: 400;
			line-height: 1.5;
			color: #858796;
			text-align: left;
			height: 100%;
		}
		
		#page-top .mt-5 {
			margin-top: 3rem;
		}

		.container {
			padding-left: 1.5rem;
    		padding-right: 1.5rem;
			max-width: 1140px;
			margin-right: auto;
    		margin-left: auto;
		}

		.card-body {
			min-height: 1px;
    		padding: 1.25rem;
		}

		.form-group {
			display:flex;
			flex:0 0 auto;
			flex-flow:row wrap;
			align-items:center;
			margin-bottom: 1rem;
		}

		.form-control {
			display: block;
			width: 100%;
			height: calc(1.5em + 0.75rem + 2px);
			padding: 0.375rem 0.75rem;
			font-size: 1rem;
			font-weight: 400;
			line-height: 1.5;
			color: #6e707e;
			background-color: #fff;
			background-clip: padding-box;
			border: 1px solid #d1d3e2;
			border-radius: 0.35rem;
			transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		}

		.btn-user {
			font-size: .8rem;
			border-radius: 10rem;
			padding: 0.75rem 1rem;
		}

		.btn-block {
			display: block;
    		width: 100%;
		}

		.btn-primary {
			color: #fff;
			background-color: #4e73df;
			border-color: #4e73df;
		}

		.btn-primary:hover {
			color: #fff;
			background-color: #2e59d9;
			border-color: #2653d4;
		}
	</style>
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
	<script src="public/assets/vendor/jquery/jquery.min.js"></script>
	<script src="public/assets/js/admin/js/main.js"></script>
</body>
</html>