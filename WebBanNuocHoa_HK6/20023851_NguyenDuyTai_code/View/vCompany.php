<?php
	include_once("Controller/cCompany.php");
	// tạo đối tượng đại diện cho controller company
	class ViewCompany{
		function viewAllCompany(){
		$p = new controllerCompany();
		//gọi hàm lấy toàn bộ company
		$tbl = $p->getAllCompany();
		$this -> displayAllCompany($tbl);
	}
		function adminViewAllCompany(){
		$p = new controllerCompany();
		//gọi hàm lấy toàn bộ company
		$tbl = $p->getAllCompany();
		$this->adminDisplayCompany($tbl);
	}
	function displayAllCompany($tbl){
		if($tbl){
		//kiểm tra kết quả nhận được có dữ liệu 
		if(mysql_num_rows($tbl) > 0){
			$dem = 0;
			echo"<table>";
			echo"<tr>";
			//duyệt từng dòng dữ liệu tỏng kết quả nhận được
			while($row = mysql_fetch_assoc($tbl)){
				echo"<td>";
				//hiển thị kết quả nhận được
				echo"<a href='index.php?Comp=".$row["CompID"]."'>".$row["CompName"]."<br>"."</a>";
				echo"</td>";
				$dem++;
				if($dem%1==0){
				echo"</tr>";	
				echo"</tr>";
				}
			}
			echo"</table>";
		}
		else{
			return "0 result";
		}
	}
	else{
		echo"Error";
	}
	}
	function adminDisplayCompany($tbl){
		if($tbl){
			if(mysql_num_rows($tbl)>0){
				echo ('<h2>Quản Lý Công Ty</h2>');
				echo ('<br><br>');
				echo ('<table border="1px solid" style="margin:auto";width="100%">');
				echo ('<tr><th>CompID</th><th>CompName</th><th>CompAddress</th><th>CompPhone</th><th>Email</th></tr>');
				while($row = mysql_fetch_assoc($tbl)){
				echo ('<tr><td>'.$row['CompID'].'</td><td>'.$row['CompName'].'</td><td>'.$row['CompAddress'].'</td><td>'.$row['CompPhone'].'</td><td>'.$row['Email'].'</td></tr>');
			}
			echo('</table><br>');
			}
			else{
				echo "0 result";
			}
	}
	else{
		echo"Không có giá trị";
	}
	}
	}
 ?>