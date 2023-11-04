<?php
    include_once("ketnoi.php");
    class modelSanPham{
        function selectAllSanPham(){
        $conn;
        $p = new KetNoiDB();
			if($p->moKetNoi($conn)){
				$str = "select * from sanpham";
				$tbl = mysql_query($str);
				$p->dongKetNoi($conn);
				return $tbl;
			}
			else{
			return false;
			}
        }
		function selectAllSanPhamByCompany($comp){
        $conn;
        $p = new KetNoiDB();
			if($p->moKetNoi($conn)){
				$str = "select * from sanpham WHERE CompID =".$comp." ORDER BY ProdID desc";
				$tbl = mysql_query($str);
				$p->dongKetNoi($conn);
				
				return $tbl;
			}
			else{
			return false;
			}
        }
		function selectAllSanPhamBySearch($key){
        $conn;
        $p = new KetNoiDB();
			if($p->moKetNoi($conn)){
				$str = "select * from sanpham WHERE ProdName like N'%".$key."%' ORDER BY ProdID desc";
				$tbl = mysql_query($str);
				$p->dongKetNoi($conn);
				return $tbl;
			}
			else{
			return false;
			}
        }
		function insertSanPham($ten,$gia,$hinh,$mota,$cty){
			$conn;
			$p = new KetNoiDB();
			if($p->moKetNoi($conn)){
				$str = "insert into product(ProdName, ProdPrice,ProdImage, ProdDescription, CompID) values";
				$str .= "(N'".$ten."',".$gia.",N'".$hinh."',N'".$mota."',".$cty.")";
				$tbl = mysql_query($str);
				$p->dongKetNoi($conn);
				return $tbl;
			}
			else{
				return false;
			}
		}
		function updateSanPham($pname,$price,$mota){
			$conn;
			$p = new KetNoiDB();
			if($p->moKetNoi($conn)){
				$str = "update sanpham set ProdName = '$pname', ProdPrice = '$price',ProdDescription = '$mota' where CompID = '$id'";
				$str .="(N'".$pname."',N'".$price."',N'".$mota."')";
				$tbl = mysql_query($str);
				$p->dongKetNoi($conn);
				return $tbl;
			}
			else{
				return false;
			}
		}

		function addProduct($ten,$gia,$hinh,$mota,$food){
            $conn;
            $p = new KetNoiDB();
            if($p->moKetnoi($conn)){
                $str = "insert into sanpham (ProdName, ProdPrice, ProdImage,ProdDescription,CompID) values(N'$ten',$gia,N'$hinh',N'$mota',$food)";
                $tbl = mysql_query($str);
                $p->dongKetNoi($conn);
                return $tbl;
            }else{
                return false;
            }
        }

		function DellSP($id){
			$conn;
            $p = new KetNoiDB();
            if($p->moKetnoi($conn)){
                $str = "delete from sanpham where ProdID=$id";
                $tbl = mysql_query($str);
                $p->dongKetNoi($conn);
                return $tbl;
            }else{
                return false;
            }
		}
		
		function searchProductPrice($min,$max){
            $conn;
            $p= new KetNoiDB();
            if($p->moKetnoi($conn)){
                $str = "select * from sanpham where ProdPrice BETWEEN $min AND $max order by ProdID asc";
                $tbl = mysql_query($str);
                $p->dongKetNoi($conn);
                return $tbl;
            }else{
                return false;
            }
        }

    }
?>