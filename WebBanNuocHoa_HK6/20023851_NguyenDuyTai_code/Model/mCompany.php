<?php
    include_once("ketnoi.php");
    class modelCompany{
        function selectAllCompany(){
        $conn;
        $p = new KetNoiDB();
			if($p->moKetNoi($conn)){
				$str = "select * from thuonghieu";
				$tbl = mysql_query($str);
				$p->dongKetNoi($conn);
				return $tbl;
			}
			else{
			return false;
			}
        }
    }
?>