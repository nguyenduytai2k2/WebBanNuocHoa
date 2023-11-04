<?php 
	include_once("Model/mCompany.php");
	class controllerCompany{
		function getAllCompany(){
			//tạo đối tượng đại diện cho model company
			$p = new modelCompany();
			//gọi hàm truy vấn tất cả Company
			$tbl = $p->selectAllCompany();
			//trả dữ liệu để dùng trong view
			return $tbl;
		}
	}
?>