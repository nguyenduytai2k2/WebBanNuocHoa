<?php 
	include_once("Model/mSanPham.php");
	class controllerSanPham{
		function getAllSanPham(){
			//tạo đối tượng đại diện cho model company
			$p = new modelSanPham();
			//gọi hàm truy vấn tất cả Company
			$tbl = $p->selectAllSanPham();
			//trả dữ liệu để dùng trong view
			return $tbl;
		}
		function getAllSanPhamByCompany($comp){
			//tạo đối tượng đại diện cho model company
			$p = new modelSanPham();
			//gọi hàm truy vấn tất cả Company
			$tbl = $p->selectAllSanPhamByCompany($comp);
			//trả dữ liệu để dùng trong view
			return $tbl;
		}
		function getAllSanPhamBySearch($key){
			//tạo đối tượng đại diện cho model company
			$p = new modelSanPham();
			//gọi hàm truy vấn tất cả Company
			$tbl = $p->selectAllSanPhamBySearch($key);
			//trả dữ liệu để dùng trong view
			return $tbl;
		}
		function DisplayPrice($price){
			$c = strlen($price);
			$dem = 0;
			$ketqua;
			for($i=$c-1; $i>=0; $i--){
				$ketqua =$price[$i].$ketqua;
				$dem++;
				if($dem == 3 && $i >0){
					$ketqua = ".".$ketqua;
					$dem = 0;
				}
			}
			return $ketqua;
		}

		function addProduct($ten,$gia,$mota,$cty,$file,$tenanh,$loaianh,$sizeanh){
            if($loaianh == "image/jpeg" || $loaianh == "image/jpg" || $loaianh == "image/png"){
                if($sizeanh <= 1024*1024*2){
                    if(move_uploaded_file($file,"image/".$tenanh)){
                        $p = new modelSanPham();
                        $tbl = $p->addProduct($ten,$gia,$tenanh,$mota,$cty);
                        if($tbl){
                            return 1;
                        }else{
                            return 0;
                        }
                    }else{
                        return -1;
                    }
                }else{
                    return -2;
                }
            }else{
                return -3;
            }
        }

		function DellSP($id){
			$p=new modelSanPham();
			$tbl=$p->DellSP($id);
			return $tbl;
		}

		function getAllSearchProductPrice($min,$max){
            $p = new modelSanPham();
            $tbl = $p->searchProductPrice($min,$max);
            return $tbl;
        }
	}
?>