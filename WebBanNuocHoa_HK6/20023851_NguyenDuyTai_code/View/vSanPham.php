<?php
 include_once("Controller/cSanPham.php");
 include_once("Controller/cCompany.php");
 class ViewSanPham{
	function viewAllSanPham(){
 	$p = new controllerSanPham();
	$tblSP = $p->getAllSanPham();
	$this-> displaySanPham($tblSP);
    }
	function viewAllSanPhamByCompany($comp){
 	$p = new controllerSanPham();
	$tblSP = $p->getAllSanPhamByCompany($comp);
	$this-> displaySanPham($tblSP);
	}
	function viewAllSanPhamBySearch($key){
 	$p = new controllerSanPham();
	$tblSP = $p->getAllSanPhamBySearch($key);
	$this-> displaySanPham($tblSP);
	}
	function adminViewAllSanPham(){
		$p = new controllerSanPham();
		$tblSP = $p->getAllSanPham();
		$this->adminDisplaySanPham($tblSP);
	}

	function viewSearchProductPrice($min,$max){
		$p = new controllerSanPham();
		$tbl = $p-> getAllSearchProductPrice($min,$max);
		$this->displaySanPham($tbl);
	}
	function displaySanPham($tblSP){
		$p = new controllerSanPham();
		if($tblSP){
		if(mysql_num_rows($tblSP) > 0){
		$dem = 0;
		echo('<table>');
		while($row = mysql_fetch_assoc($tblSP)){
			if($dem == 0){
				echo('<tr>');
			}
			echo('<td>');
			echo('<img src="image/'.$row['ProdImage'].'" alt="'.$row['ProdName'].'m" width="200px" height = "200px" /><br>');
			echo('<br><b>'.$row['ProdName'].'</b><br>');
			echo('<br><b>'.$p->DisplayPrice($row['ProdPrice'])." "."VNĐ".'</b><br><br>');
			echo('</td>');
			$dem++;
			if($dem == 5){
			echo('</tr>');
			$dem=0;
			}
		}if($dem >0){
			echo('</tr>');
		}
		echo('</table>');
	}
	else{
		echo"Không tìm thấy";
	}
	}
	}
	function adminDisplaySanPham($tblSP){
		$p = new controllerSanPham();
		if($tblSP){
			if(mysql_num_rows($tblSP) >0){
			 echo ('<h2>Quản Lý Sản Phẩm</h2>');
			 echo ('<br><br>');
			 echo ('<a href="vAddSanPham.php?AddProd">Thêm Sản Phẩm</a>');
			 echo ('<br><br>');
			 echo ('<table border="1px solid" style="margin:auto"; width="100%">');
			 echo ('<tr>
			 		<th>ProdID</th>
			 		<th>ProdName</th>
					<th>ProdPrice</th>
					<th>ProdImage</th>
					<th>CompID</th>
					<th>Action</th>
					</tr>');
			 while($row = mysql_fetch_assoc($tblSP)){
			 echo ('<tr>
			 		<td>'.$row['ProdID'].'</td>
			 		<td>'.$row['ProdName'].'</td>
					<td>'.$p->DisplayPrice($row['ProdPrice'])." "."VNĐ".'</td>
					<td>.<img src ="image/'.$row['ProdImage'].'"alt= "'.$row['ProdName'].'m" width="80px" height="80px"/></td>
			 		<td>'.$row['CompID'].'</td>
					<td><a href="vUpdateSanPham.php?Update">Sửa</a> | <a href="admin.php?Dell='.$row['ProdID'].'">Xóa</a></td>
					</tr>'); 
			}
			echo('</table><br>');
			}else{
				echo ('0 result');
			}
		}
		else{
			echo ('Không có giá trị');
		}
	}
 }
?>