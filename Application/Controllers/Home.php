<?php

use MVC\Controller;

class ControllersHome extends Controller {

	public function upload() {
		// $this->response->setContent([
		// 	'error' => false,
		// 	'url' => 'public/assets/img/about-2.jpg'
		// ]);
		$target_dir = "uploads/";
		$image = $this->request->files['file'];
		$target_file = $target_dir . basename($image['name']);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$errors = array();

		// Check if image file is a actual image or fake image
		if (isset($image['name'])) {
			$check = getimagesize($image["tmp_name"]);
			if($check !== false) {
				// $errors[] = "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$errors[] = "File is not an image.";
				$uploadOk = 0;
			}
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			$errors[] = "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check file size
		if ($image["size"] > 5000000) {
			$errors[] = "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$this->response->setContent($errors);
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($image["tmp_name"], $target_file)) {
				$this->response->setContent([
					'error' => false,
					'url' => ROOT_URL . $target_file
				]);
			} else {
				$errors[] = "Sorry, there was an error uploading your file.";
			}
		}
	}
}
