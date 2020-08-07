<?php

require_once("conn.php");
class DataOperation extends Database
{
    // get data =========================================================================================

    function getData($table)
    {
        $record = array();
        $sql = "select * from $table";
        $result = $this->conn->prepare($sql);
        $result->execute();
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $record[] =  $row;
            }
            return $record;
        } else {
            return $record = false;
        }
        $this->conn = null;
    }


    // insert data ===============================================================================================

    function insertData($table, $fields)
    {
        $setval = "";
        foreach ($fields as $key => $value) {
            $setval .= "?,";
        }
        $setval = substr($setval, 0, -1);
        $sql = "insert into $table (" . implode(",", array_keys($fields)) . ") values ($setval)";
        $result = $this->conn->prepare($sql);
        $result->execute(array_values($fields));
        if ($result) {
            return true;
        } else {
            return false;
        }
        $this->conn = null;
    }
    // select data ===============================================================================================
    function selectDataSingle($table, $where)
    {
        $sql = "";
        $record = array();
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . "= ? and ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= "select * from $table where $condition";
        $result = $this->conn->prepare($sql);
        $result->execute(array_values($where));
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
        $this->conn = null;
    }

    function selectDataAll($table, $where)
    {
        $sql = "";
        $record = array();
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . "= ? and ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= "select * from $table where $condition";
        $result = $this->conn->prepare($sql);
        $result->execute(array_values($where));
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $record[] =  $row;
            }
            return $record;
        } else {
            return false;
        }
        $this->conn = null;
    }




    // update data ==================================================================================

    function updateData($table, $where, $fields)
    {
        $sql = "";
        $condition = "";
        $val = "";
        foreach ($where as $key => $value) {
            $condition .= "$key = ?";
        }
        foreach ($fields as $key => $value) {
            $val .= "$key = ? , ";
        }
        $val = substr($val, 0, -2);
        $sql .= "update $table set $val where $condition";
        $result = $this->conn->prepare($sql);
        $temp = array_merge(array_values($fields), array_values($where));
        if ($result->execute($temp)) {
            return true;
        } else {
            return false;
        }
        $this->conn = null;
    }
    // delete data ===============================================================================================
    function deleteData($table, $where)
    {

        $sql = "";
        $condition = "";
        foreach ($where as $key => $val) {
            $condition .= "$key = ?";
        }
        $sql .= "delete from $table where $condition";
        $result = $this->conn->prepare($sql);
        if ($result->execute(array_values($where))) {
            return true;
        } else {
            return false;
        }
        $this->conn = null;
    }
}

// ==========================================================================================
//==============================================================================================

$obj = new DataOperation();


// insert code ==================================================================
if (isset($_POST["insert"])) {

    if (!empty($_POST["name"])) {

        unset($_POST["insert"]);

        if ($obj->insertData("sport", $_POST)) {
            $msg = "Inserted";
            $status = "success";
        } else {
            $msg = "Not Inserted";
            $status = "error";
        }
    } else {
        $msg = "Fill all fields";
        $status = "error";
    }
    $page  = "all.php?msg=$msg&status=$status";
    echo '<script>
    window.location.assign("' . $page . '");
    </script>';
}
// update code ===================================================================
if (isset($_POST["update"])) {

    if (!empty($_POST["name"])) {
        $where = array(
            "sport_id" => $_POST["sport_id"]
        );
        unset($_POST["update"]);
        unset($_POST["sport_id"]);
        if ($obj->updateData("sport", $where, $_POST)) {
            $msg = "Update Successfully";
            $status = "success";
        }
    } else {
        $msg = "Fill All Fields !!!";
        $status = "error";
    }
    $page  = "all.php?msg=$msg&status=$status";
    echo '<script>
    window.location.assign("' . $page . '");
    </script>';
}
// delete  code ===================================================================
if (isset($_GET["delete"])) {

    $where = array(
        "sport_id" => $_GET["delete"]
    );

    if ($obj->deleteData("sport", $where)) {
        $msg = "Deleted";
        $status = "success";
    } else {
        $msg = "Unable to delete";
        $status = "error";
    }
    $page  = "all.php?msg=$msg&status=$status";
    echo '<script>
window.location.assign("' . $page . '");
</script>';
}
