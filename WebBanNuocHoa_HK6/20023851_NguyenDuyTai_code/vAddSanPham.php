<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
	<table class="main">
        <div class="nav-menu">
        	<tr>
            	<td><a href="index.php" style="font-size:36px">Trang Chủ</a></td>
                <td class="left">
                    	<a href="admin.php?aComp"><h3>Quản Lý Công Ty</h3></a><br><br>
                        <a href="admin.php?aProd"><h3>Quản Lý Sản Phẩm</h3></a>
               	</td>
            </tr>
        </div>
        <div class="content">
            	<tr>
                	<td class="left">
                    	<h1>Sản Phẩm</h1>
                    </td>
                    <td class="right">
                    	<h3 style="text-align:center">THÔNG TIN SẢN PHẨM</h3>
                        <form action="#" method="post" enctype="multipart/form-data">
                        	<table style="margin:auto; text-align:left" >
                            	<tr>
                                	<td>
                                    	Tên Sản Phẩm:
                                    </td>
                                    <td><input type="text" name="txtSP"required/></td>
                                </tr>
                                <tr>
                                	<td>
                                    	Giá Sản Phẩm:
                                    </td>
                                    <td><input type="number" name="txtGia" required/></td>
                                </tr>
                                <tr>
                                	<td>
                                    	Hình ảnh:
                                    </td>
                                    <td><input type="file" name="ffile" required/></td>
                                </tr>
                                <tr>
                                	<td>
                                    	Mô Tả Sản Phẩm:
                                    </td>
                                    <td><textarea rows="5" cols="22" name="txtMoTa"></textarea></td>
                                </tr>
                                <tr>
                                	<td>
                                    	Công Ty Cung Cấp: 
                                    </td>
                                    <td>
                                    	<select name="cty">
                                        	<?php
												include_once("Controller/cCompany.php");
												$p = new controllerCompany();
												$tbl = $p->getAllCompany();
												if(mysql_num_rows($tbl) > 0){
													while($row = mysql_fetch_assoc($tbl)){
														echo('<option value="'.$row['CompID'].'">'.$row['CompName'].'</option>');
													}
												}
											?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                	<td></td>
                                    <td>
                                    	<input type="submit" name="btn-sub" value="ADD Product"/>
                                        <input type="reset" name="btn-re" value="ReSet"/>
                                    </td>
                                </tr>
                            </table> 
                        </form>
                    </td>
                <tr>

        </div>
    </table>
    <?php
                    include_once("Controller/cSanPham.php");
                    if(isset($_REQUEST["btn-sub"])){
                        $ten = $_REQUEST["txtSP"];
                        $gia = $_REQUEST["txtGia"];
                        $cty = $_REQUEST["cty"];
                        $mota = $_REQUEST["txtMoTa"];
                        $file = $_FILES["ffile"]["tmp_name"];
                        $tenanh = $_FILES["ffile"]["name"];
                        $sizeanh = $_FILES["ffile"]["size"];
                        $loaianh = $_FILES["ffile"]["type"];
                        $p = new controllerSanPham();
                        $tbl = $p->addProduct($ten,$gia,$mota,$cty,$file,$tenanh,$loaianh,$sizeanh);
                        if($tbl == 1){
                            echo "<script>alert('Bạn Đã Thêm Thành Công Sản Phẩm mới')</script>";
                            echo header("refresh:0; url='admin.php?aProd'");
                        }
                        elseif($tbl==0){
                            echo('<script>alert("Không Thể ADD Sản Phẩm")</script>');
                        }elseif($tbl==-1){
                            echo('<script>alert("Không thể upload ảnh")</script>');
                        }elseif($tbl==-2){
                            echo('<script>alert("Không thể UPLOAD ẢNH có size lớn hơn 2MB")</script>');
                        }elseif($tbl==-3){
                            echo('<script>alert("Không đúng định dạng")</script>');
                        }else{
                            echo('Have some ERROR');
                        }
                    }
                ?>
</body>
</html>