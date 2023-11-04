<?php
    class KetNoiDB {
        function moKetNoi(& $conn){
        $conn = mysql_connect("localhost","duytai2002","123456");
		mysql_set_charset("utf8");
        if($conn){
            $db = mysql_select_db("nuochoa");
            return $db;
        }else{
            return false;
        }
    }
    function dongKetNoi($conn){
        mysql_close($conn);
    }
}    
?>