<?php

use MVC\Controller;


class ControllersProduct extends Controller {

	public function index() {
		$model = $this->model('product');

		$products = $model->getAllProduct();
		include_once ('./Application/Views/listSP.php');
	}

	public function create() {
		include_once('./Application/Views/addSP.php');
	}

	public function store() {
		if ($this->request->getMethod() == "POST") {
			$name = $this->request->request['name'];
			$thumb = $this->request->request['thumb'];
			$gia_ban = $this->request->request['gia_ban'];
			$mo_ta = $this->request->request['mo_ta'];
			if (!empty($name) && !empty($thumb) && !empty($gia_ban && !empty($mo_ta))) {
				$ngay_tao = date("Y-m-d");
				$model = $this->model('product');
				$product = $model->insert($name, $thumb, $gia_ban, $mo_ta, $ngay_tao);
				if ($product) {
					header("Location: /list");
					exit();
				} else {
					header("Location: /add");
					exit();
				}
			} else {
				$_SESSION['error_message'] = "Vui lòng nhập tên, giá và mô tả của sản phẩm";
			}
		}
		include './Application/Views/addSP.php';
		unset($_SESSION['error_message']);
	}

	public function show($param) {
		$id = $param['id'];
		$model = $this->model('product');
		$product = $model->getIDProduct($id);
		include_once './Application/Views/updateSP.php';
	}

	public function edit($param) {
		if ($this->request->getMethod() == "POST") {
			$id = $param['id'];
			$date = date("Y-m-d");
			$name = $this->request->request['name'];
			$thumb = $this->request->request['thumb'];
			$gia_ban = $this->request->request['gia_ban'];
			$mo_ta = $this->request->request['mo_ta'];
			$model = $this->model('product');
			$product = $model->update($id, $name, $thumb, $gia_ban, $mo_ta, $date);
			if ($product) {
				header("Location: /list");
				exit();
			} else {
				header("Location: /update");
				exit();
			}
		}
	}

	public function delete($param) {
		$id = $param['id'];
		$model = $this->model('product');
		$product = $model->delete($id);
		if ($product == 1) {
			$data = [
				'message' => 'Xóa thành công',
				'error' => false
			];
		} else {
			$data = [
				'message' => 'Xóa thất bại',
				'error' => true
			];
		}
		$this->response->setContent($data);
	}

	public function list() {
		$model = $this->model('product');
		$products = $model->getAllProduct();
		$data = ['data' => $products];
		$this->response->sendStatus(200);
		$this->response->setContent($data);
	}

	public function update($param) {
		if ($this->request->getMethod() == "POST") {
			$id = $param['id'];
			$date = date("Y-m-d");
			$name = $this->request->request['name'];
			$thumb = $this->request->request['thumb'];
			$gia_ban = $this->request->request['gia_ban'];
			$mo_ta = $this->request->request['mo_ta'];
			$model = $this->model('product');
			$product = $model->update($id, $name, $thumb, $gia_ban, $mo_ta, $date);
			if ($product->num_rows == 1) {
				$data = [
					'message' => 'Cập nhật thành công',
					'error' => false
				];
			} else {
				$data = [
					'message' => 'Cập nhật thất bại',
					'error' => true
				];
			}
			$this->response->setContent($data);
		}
	}
}