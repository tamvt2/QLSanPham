<?php

use MVC\Controller;

$thoiGianSong = 3600; // 1 giờ = 3600 giây

// Đặt thời gian sống cho session cookie
session_set_cookie_params($thoiGianSong);
session_start();
class ControllersUser extends Controller {
	public function index() {
		session_unset();
		include_once './Application/Views/Login.php';
	}

	public function show() {
		include_once './Application/Views/Register.php';
	}

	public function register() {
		if ($this->request->getMethod() == "POST") {
			$name = $this->request->request['name'];
			$email = $this->request->request['email'];
			$password = $this->request->request['password'];
			$repeatPassword = $this->request->request['repeatPassword'];
			if (!empty($name) && !empty($email) && !empty($password) && !empty($repeatPassword)) {
				if (strlen($password) > 5) {
					if ($password === $repeatPassword) {
						$model = $this->model('user');
						$checkResult = $model->checkQuery($email);
						if ($checkResult->num_rows == 0) {
							$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
							// echo $hashedPassword;
							// Read All Task
							$user = $model->insert($name, $email, $hashedPassword);
							if ($user) {
								header("Location: /login");
        						exit();
							} else {
								header("Location: /register");
        						exit();
							}
						} else {
							// Tên đăng nhập đã tồn tại
							$_SESSION['error_message'] = "Email đã tồn tại, vui lòng chọn email khác";
						}
					} else {
						$_SESSION['error_message'] = "Mật khẩu và mật khẩu nhập lại không khớp nhau";
					}
				} else {
					$_SESSION['error_message'] = "Mật khẩu phải có ít nhất 6 ký tự";
				}
			} else {
				$_SESSION['error_message'] = "Vui lòng nhập tên đăng nhập, email, mật khẩu, và mật khẩu nhập lại";
			}
		} else {
			// Dữ liệu không được gửi từ form
			$_SESSION['error_message'] = "Dữ liệu không hợp lệ";
		}
		include './Application/Views/Register.php';
		unset($_SESSION['error_message']);
	}

	public function login() {
		if ($this->request->getMethod() == "POST") {
			$email = $this->request->request['email'];
			$password = $this->request->request['password'];
			if (!empty($email) && !empty($password)) {
				$model = $this->model('user');
				$result = $model->login($email);
				if ($result->num_rows == 1) {
					$hashedPasswordInDB = $result->row['password'];
					if (password_verify($password, $hashedPasswordInDB)) {
						// Mật khẩu đúng, đăng nhập thành công
						$_SESSION['user_id'] = $result->row['id'];
						$_SESSION['username'] = $result->row['name'];
						header("Location: /list");
        				exit();
					} else {
						// Mật khẩu không đúng
						$_SESSION['error_message'] = "Mật khẩu không đúng";
					}
				} else {
					// Tài khoản không tồn tại
					$_SESSION['error_message'] = "Email không đúng";
				}
			} else {
				$_SESSION['error_message'] = "Vui lòng nhập email và mật khẩu";
			}
		}
		include './Application/Views/Login.php';
		unset($_SESSION['error_message']);
	}

	public function logout() {
		session_unset();
		header("Location: /login");
		exit();
	}
}