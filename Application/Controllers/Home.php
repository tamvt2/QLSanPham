<?php

use MVC\Controller;

class ControllersHome extends Controller {

	public function upload() {
		if (isset($this->request->files['file'])) {
			$image = $this->request->files['file'];
			$errors = array();
	
			// File info
			$file_name = $image['name'];
			$file_tmp = $image['tmp_name'];
			$uploadDir = "Upload/Images/";
	
			// Check if directory exists, if not, create it
			if (!file_exists($uploadDir) || !is_dir($uploadDir)) {
				mkdir($uploadDir, 0755, true);
			}
	
			// White list extensions
			$extensions = array("jpeg", "jpg", "png");
	
			// Get file extension
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			$file_ext = strtolower($file_ext);
	
			// Check if it's a valid file for upload
			if (!in_array($file_ext, $extensions)) {
				$errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
			}
	
			// Check file size (adjust the limit as needed)
			$maxFileSize = 5 * 1024 * 1024; // 5MB
			if ($image['size'] > $maxFileSize) {
				$errors[] = "File size exceeds the maximum limit (5MB).";
			}
	
			if (empty($errors)) {
				$uniqueFilename = uniqid() . '_' . $file_name;
				$uploadedFile = $uploadDir . $uniqueFilename;
	
				// Check if the file already exists to avoid overwriting
				$counter = 1;
				while (file_exists($uploadedFile)) {
					$uniqueFilename = uniqid() . '_' . $counter . '_' . $file_name;
					$uploadedFile = $uploadDir . $uniqueFilename;
					$counter++;
				}
				$this->response->setContent(error_log('Uploaded File: ' . $uploadedFile));
				if (move_uploaded_file($file_tmp, $uploadedFile)) {
					$this->response->setContent([
						'error' => false,
						'url' => $uploadedFile
					]);
				} else {
					$this->response->setContent("Error uploading file.");
				}
			} else {
				$this->response->setContent($errors);
			}
		}
	}
}
