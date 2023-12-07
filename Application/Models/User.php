<?php
use MVC\Model;

class ModelsUser extends Model {
	public function insert($name, $email, $password) {
		$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
		return $this->db->query($sql);
	}

	public function login($email) {
		$query = $this->db->query("SELECT * FROM users WHERE email = '$email'");
		return $query;
	}

	public function checkQuery($email) {
		$query = $this->db->query("SELECT email FROM users WHERE email = '$email'");
        return $query->row;
	}
}