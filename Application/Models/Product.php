<?php

use MVC\Model;

class ModelsProduct extends Model {

	public function insert($name, $thumb, $gia_ban, $mo_ta, $ngay_tao) {
		$sql = "INSERT INTO product (ten, hinh_anh, gia_ban, mo_ta, ngay_tao) VALUES ('$name', '$thumb', '$gia_ban', '$mo_ta', '$ngay_tao')";
		return $this->db->query($sql);
	}

    public function getAllProduct() {
        $query = $this->db->query("SELECT * FROM product");
		return $query->rows;
    }

	public function getIDProduct($id) {
		$query = $this->db->query("SELECT * FROM product WHERE id = '$id'");
		return $query->row;
	}

	public function update($id, $name, $thumb, $gia_ban, $mo_ta, $ngay_cap_nhat) {
		$sql = "UPDATE product SET ten = '$name', hinh_anh = '$thumb', gia_ban = '$gia_ban', mo_ta = '$mo_ta', ngay_cap_nhat = '$ngay_cap_nhat' WHERE id = '$id'";
		return $this->db->query($sql);
	}

	public function delete($id) {
		$query = $this->db->query("DELETE FROM product WHERE id = '$id'");
		return $query->num_rows;
	}
}
