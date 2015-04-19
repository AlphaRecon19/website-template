<?php
class _mysql {
    
    public static function MySQL_connect(){
        global $MySQL_HOST, $MySQL_USERNAME, $MySQL_PASSWORD, $MySQL_DATABASE;
        // Create connection
        $con = mysqli_connect($MySQL_HOST, $MySQL_USERNAME, $MySQL_PASSWORD, $MySQL_DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $con;
        }
    }
    
    //Insert row into table
    /*
     *The table toTable
     *Coloums in the db
     *Data to be inseted
     *Show debuging infomation (Default: OFF)
    */
    public static function MySQL_INSERT($Table, $Cols, $Values, $Debug = 0) {    
        $con = self::MySQL_connect();
        $result = mysqli_query($con, "INSERT ".$Table." (".$Cols.") VALUES (".$Values.")");
        mysqli_query($con, "OPTIMIZE TABLE  `".$Table."`");
        if ($result === TRUE && $Debug == 1) {
            echo "New record created successfully";
        } elseif($Debug == 1) {
            echo "INSERT ".$Table." (".$Cols.") VALUES (".$Values.")";
            echo "Error: " . mysqli_error($con);
        }   
        return $result;
    }
    
    //Update row into table
    /*
     *The table toTable
     *Coloums in the db
     *Data to be inseted
     *Show debuging infomation (Default: OFF)
    */
    public static function MySQL_UPDATE($Table, $Set, $Where, $Debug = 0) {
        $con = self::MySQL_connect();
        mysqli_query($con, 'SET @@global.max_allowed_packet = 4294967295');
        $result = mysqli_query($con, "UPDATE ".$Table." SET ".$Set." WHERE ".$Where."");
        mysqli_query($con, "OPTIMIZE TABLE  `".$Table."`");
        if ($result === TRUE && $Debug == 1) {
            echo "New record created successfully";
        } elseif($Debug == 1) {
            echo "UPDATE ".$Table." SET ".$Set." WHERE ".$Where."";
            echo "Error: " . mysqli_error($con);
        }   
        return $result;
    }
    
    //Select row(s) from table
    /*
     *The table toTable
     *Coloums in the db
     *Data to be inseted
     *Show debuging infomation (Default: OFF)
    */
    public static function MySQL_SELECT($Table, $Cols, $Clauses = "", $Debug = 0) {    
        if($Debug == 1) {
            echo "SELECT ".$Cols." FROM ".$Table." ".$Clauses."";
        }else{
        $con = self::MySQL_connect();
        $result = mysqli_query($con, "SELECT ".$Cols." FROM ".$Table." ".$Clauses."") or die(mysqli_error($con));;
        if ($result === TRUE && $Debug == 1) {
            echo "Record(s) selected successfully";
        } elseif($Debug == 1) {
            echo "Error: " . mysqli_error($con);
        }
        return $result;
        }
    }
    
    //Select row(s) from table
    /*
     *The table toTable
     *Coloums in the db
     *Data to be inseted
     *Show debuging infomation (Default: OFF)
    */
    public static function MySQL_DELETE($Table, $Clauses = "", $Debug = 0) {    
        if($Debug == 1) {
            echo "DELETE FROM ".$Table." WHERE ".$Clauses." ";
        }else{
        $con = self::MySQL_connect();
        $result = mysqli_query($con, "DELETE FROM ".$Table." WHERE ".$Clauses." ") or die(mysqli_error($con));;
        mysqli_query($con, "OPTIMIZE TABLE  `".$Table."`");
        if ($result === TRUE && $Debug == 1) {
            echo "Record(s) deleted successfully";
        } elseif($Debug == 1) {
            echo "Error: " . mysqli_error($con);
        }
        return $result;
        }
    }   
    
    //Run mysqli_num_rows
    /*
     *MySQL resault
    */
    public static function MySQL_NUMROWS($resault) {
        $con = self::MySQL_connect();
        $num_rows = mysqli_num_rows($resault);
        return $num_rows;
    }
    
    //For when you need to run some SQL manualy
    public static function MySQL_SQL($sql) {    
        $con = self::MySQL_connect();
        $result = mysqli_query($con, $sql);
        return $result;
    }
    
    //Escape a string
    public static function MakeSafe($string){
        $con = self::MySQL_connect();
        return mysqli_real_escape_string($con,$string);
    }
    
    //Close the connection to the db
    public static function MySQL_CLOSECONNECTION($con){
        $con = MakeSafe($con);
        mysqli_close($con);
        return true;
    }

    
}

?>
