<?php 
    include_once("Controller/cSanPham.php");
    $p=new controllerSanPham();
    $tbl=$p->DellSP($_REQUEST["Dell"]);
    if($tbl){
        echo "<script>alert('Xoa san pham thanh cong!!!')</script>";
    }else{
        echo "<script>alert('Xoa san pham khong thanh cong!!!')</script>";
    }
?>