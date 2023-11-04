
<?php
// create class
class myclass
{
    // 1. properties
    var $pro_conn, $pro_sql, $pro_cmd, $pro_count, $pro_result, $pro_arr, $pro_record, $pro_target;
    // 2. Method
    // open connection

    function fun_opencon()
    {
        $this->pro_conn = mysqli_connect("localhost", "root", "", "templedb");
        $this->pro_conn->set_charset("utf8"); 
        return $this->pro_conn;
    }
    // close connection
    function fun_closecon() 
    {
        mysqli_close($this->pro_conn);
    }

    function fun_insertData($par_table, $par_fields, $par_value)
    {
        $this->pro_count = count($par_fields);
        $this->pro_sql = "INSERT INTO $par_table(";
        for ($x = 0; $x < $this->pro_count; $x++) {
            $this->pro_sql .= $par_fields[$x];
            if ($x < ($this->pro_count - 1)) {
                $this->pro_sql .= ",";
            } else {
                $this->pro_sql .= ") VALUES(";
            }
        }
        for ($x = 0; $x < $this->pro_count; $x++) {
            $this->pro_sql .= "'$par_value[$x]'";
            if ($x < ($this->pro_count - 1)) {
                $this->pro_sql .= ",";
            } else {
                $this->pro_sql .= ")";
            }

            //command SQL statement to  db
            $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
            if ($this->pro_cmd == 1) {
                $this->pro_result = true;
            } else {
                $this->pro_result = false;
            }
            // Accessing close connection
            $this->fun_closecon();
        }
    }
    // function Show data
    function fun_showdata($par_table, $par_field)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table Order By $par_field DESC";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        while ($this->pro_record = mysqli_fetch_assoc($this->pro_cmd)) {
            array_push($this->pro_arr, $this->pro_record);
        }
        return $this->pro_arr;
    }
    // function choose paytype
    function fun_showpaytype($par_table, $par_arrfield1, $par_arrvalue1, $par_arrfield2, $par_arrvalue2, $par_field, $limitvalue)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_arrfield1='$par_arrvalue1' && $par_arrfield2='$par_arrvalue2'  Order By $par_field ASC LIMIT $limitvalue";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        while ($this->pro_record = mysqli_fetch_assoc($this->pro_cmd)) {
            array_push($this->pro_arr, $this->pro_record);
        }
        return $this->pro_arr;
    }
    // function Update
    function fun_updateData($par_table, $par_arrfields, $par_arrvalue, $par_fieldid, $par_valueid)
    {
        //count field
        $this->pro_count = count($par_arrfields);
        //create sql statement
        $this->pro_sql = "UPDATE $par_table SET ";
        for ($x = 0; $x < $this->pro_count; $x++) {
            $this->pro_sql .= "$par_arrfields[$x]='$par_arrvalue[$x]'";
            if ($x < ($this->pro_count - 1)) {
                $this->pro_sql .= ",";
            } else {
                $this->pro_sql .= " WHERE $par_fieldid='$par_valueid'";
            }
        }
        //command sql statement to database service
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        if ($this->pro_cmd == 1) {
            $this->pro_result = true;
        } else {
            $this->pro_result = false;
        }
        //Accessing close connection
        $this->fun_closecon();
        return $this->pro_sql;
    }
    //Protect Record From Duplicates
    public function fun_protectrecord($par_table, $par_fieldname, $par_fieldvalue)
    {
        //Create Sql Statment
        $this->pro_sql = "SELECT * FROM $par_table Where $par_fieldname ='$par_fieldvalue'";
        //Command /Send pro_sql to Database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        //Count Result
        $this->pro_count = mysqli_num_rows($this->pro_cmd);
        //Accessing Close Connect
        $this->fun_closecon();
        if ($this->pro_count == 0) {
            $this->pro_result = true;
        } else {
            $this->pro_result = false;
        }
        //Accesing Close Connection
        // $this->fun_closecon();
        //return($this->pro_result);
    }
    // function find record
    function fun_showdatabyId($par_table, $par_arrfield, $par_arrvalue)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_arrfield='$par_arrvalue'";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        $this->pro_record = mysqli_fetch_assoc($this->pro_cmd);
        return $this->pro_record;
    }
    // Find Name and ID
    // function find record
    function fun_showdatabyId_name($par_table, $par_arrfield1, $par_arrvalue1, $par_arrfield2, $par_arrvalue2)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_arrfield1='$par_arrvalue1' || $par_arrfield2='$par_arrvalue2'";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        $this->pro_record = mysqli_fetch_assoc($this->pro_cmd);
        return $this->pro_record;
    }
    //funfind row
    // function find record by id and status
    function fun_showdatabyId_status($par_table, $par_arrfield1, $par_arrvalue1, $par_arrfield2, $par_arrvalue2, $par_field)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_arrfield1='$par_arrvalue1' && $par_arrfield2!='$par_arrvalue2' Order By $par_field ASC";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        $this->pro_record = mysqli_fetch_assoc($this->pro_cmd);
        return $this->pro_record;
    }

    //function delete
    function fun_deleterecord($arg_table, $arg_fid, $arg_vid)
    {
        $this->pro_sql = "DELETE FROM $arg_table WHERE $arg_fid=$arg_vid";
        //Send / Command Sql Statement to Database Server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        if ($this->pro_cmd) {
            return true;
        } else {
            return false;
        }
    }

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
    //Login
    public function login_user($par_username, $par_password)
    {
        // $username = mysqli_real_escape_string($this->fun_opencon(), $par_username);
        // $password = mysqli_real_escape_string($this->fun_opencon(), $par_password);
        $this->pro_sql = "SELECT * FROM tbl_user WHERE username='$par_username' && userpassword='$par_password'";
        $this->pro_result = mysqli_query($this->fun_opencon(), $this->pro_sql);
        if (mysqli_num_rows($this->pro_result) == 1) {
            return $this->pro_result;
        } else {
            return false;
        }
    }
    function fun_countrecord($arg_table, $arg_fid, $arg_vid)
    {
        $this->pro_sql = "SELECT * FROM $arg_table WHERE $arg_fid=$arg_vid";
        //Send / Command Sql Statement to Database Server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        $this->pro_count = mysqli_num_rows($this->pro_cmd);
        return $this->pro_count;
    }

    function fun_upload_img ($file) {
        $filename = $_FILES[$file]["name"];
        $tmpname = $_FILES[$file]["tmp_name"];
        $path_upload = "./upload/" . $filename;
        move_uploaded_file($tmpname, $path_upload);
        return $filename;
    }

    function fun_checkupdate($par_table, $par_fieldname, $par_fieldid, $par_valuename, $par_valueid)
    {
        //Create Sql Statment
        $this->pro_sql = "SELECT * FROM $par_table WHERE $par_fieldname='$par_valuename' AND $par_fieldid<>$par_valueid";
        //command to SQl statment to Database Server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        //Count Record
        $this->pro_count = mysqli_num_rows($this->pro_cmd);
        //Accessing close connection
        //$this->fun_closelink();
        if ($this->pro_count > 0) {
            return true;
        } else {
            return false;
        }
    }
    //function Delete image
    //create pro_target in properties
    //function need know image name
    function fun_deleteimg($par_imagename)
    {
        //check image name in file assert
        $this->pro_target = "image/.$par_imagename";
        //check existing imagename file
        if (file_exists($this->pro_target)) {
            //File need have different name from defaul.png
            //said imgname !=(different from)
            if ($par_imagename != "image.png") { //delete only img different from deafult cus default in page are alots
                //unlink mean delete
                //use for delete
                unlink($this->pro_target);
            }
        }
    }
    //function show databy id condition
    function fun_showdataconditionstring($par_table, $par_field, $par_value)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_field='$par_value'";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        while ($this->pro_record = mysqli_fetch_assoc($this->pro_cmd)) {
            array_push($this->pro_arr, $this->pro_record);
        }
        return $this->pro_arr;
    }
    //douplicate class study
    function fun_douplicateclass_study($par_table, $par_arrfield1, $par_arrvalue1, $par_arrfield2, $par_arrvalue2, $par_arrfield3, $par_arrvalue3)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_arrfield1='$par_arrvalue1' && $par_arrfield2='$par_arrvalue2' && $par_arrfield3='$par_arrvalue3'";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        $this->pro_record = mysqli_fetch_assoc($this->pro_cmd);
        return $this->pro_record;
    }
    //douplicate class study
    function fun_douplicatestudent($par_table, $par_arrfield1, $par_arrvalue1, $par_arrfield2, $par_arrvalue2, $par_arrfield3, $par_arrvalue3, $par_arrfield4, $par_arrvalue4, $par_arrfield5, $par_arrvalue5)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_arrfield1='$par_arrvalue1' && $par_arrfield2='$par_arrvalue2' && $par_arrfield3='$par_arrvalue3' && $par_arrfield4='$par_arrvalue4' && $par_arrfield5='$par_arrvalue5'";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        $this->pro_record = mysqli_fetch_assoc($this->pro_cmd);
        return $this->pro_record;
    }
    //douplicate teacher
    function fun_douplicateteacher($par_table, $par_arrfield1, $par_arrvalue1, $par_arrfield2, $par_arrvalue2, $par_arrfield3, $par_arrvalue3)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_arrfield1='$par_arrvalue1' && $par_arrfield2='$par_arrvalue2' && $par_arrfield3='$par_arrvalue3'";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        $this->pro_record = mysqli_fetch_assoc($this->pro_cmd);
        return $this->pro_record;
    }
    //douplicate class study
    function fun_douplicatestudentclass($par_table, $par_arrfield1, $par_arrvalue1, $par_arrfield2, $par_arrvalue2)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_arrfield1='$par_arrvalue1' && $par_arrfield2='$par_arrvalue2' ";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        $this->pro_record = mysqli_fetch_assoc($this->pro_cmd);
        return $this->pro_record;
    }
    //douplicate schedule
    function fun_douplicateschedule($par_table, $par_arrfield2, $par_arrvalue2, $par_arrfield3, $par_arrvalue3)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE  $par_arrfield2='$par_arrvalue2' && $par_arrfield3='$par_arrvalue3'";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        $this->pro_record = mysqli_fetch_assoc($this->pro_cmd);
        return $this->pro_record;
    }

    function group_by($key, $data)
    {
        $result = array();

        foreach ($data as $val) {
            if (array_key_exists($key, $val)) {
                $result[$val[$key]][] = $val;
            } else {
                $result[""][] = $val;
            }
        }

        return $result;
    }

    function fun_showdatacondition($par_table, $par_field, $par_value)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_field=$par_value";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        while ($this->pro_record = mysqli_fetch_assoc($this->pro_cmd)) {
            array_push($this->pro_arr, $this->pro_record);
        }
        return $this->pro_arr;
    }
    // funtion 2 condition 
    function fun_showdatacondition2param($par_table, $par_field1, $par_value1, $par_field2, $par_value2)
    {
        //create empty array
        $this->pro_arr = array();
        //create sql statement
        $this->pro_sql = "SELECT *FROM $par_table WHERE $par_field1=$par_value1 && $par_field2=$par_value2";
        //command sql Statement to database server
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        while ($this->pro_record = mysqli_fetch_assoc($this->pro_cmd)) {
            array_push($this->pro_arr, $this->pro_record);
        }
        return $this->pro_arr;
    }
    //count student

    function fun_count($arg_table, $arg_fid, $arg_vid)
    {
        $this->pro_sql = "SELECT * FROM $arg_table WHERE $arg_fid=$arg_vid";
        //Send / Command Sql Statement to Database Server 
        $this->pro_cmd = mysqli_query($this->fun_opencon(), $this->pro_sql);
        //Count 
        $this->pro_count = mysqli_num_rows($this->pro_cmd);
        return $this->pro_count;
    }
}
?>

<!-- stop refresh page -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>