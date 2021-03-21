<?php
include("./dbcon.php");

    $fun = $_POST["fun"];

    switch($fun){
        case "getCount":
            $sql = "SELECT `TotalCount` FROM `count`";
            try{
                $result = $conn->query($sql);
                if ($result->num_rows >= 1) {
                    // output data of each row
                        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $myArray[] = $row;
                        }
                    } 
                    else {
                        // throw new Exception("Error message");
                        $myArray[] = array('TotalCount' =>'error', 'msg' => $sql);
                    }
                    echo json_encode($myArray);
            }
            catch (Exception $e) {
                $myArray[] = array(
                    'error' => array(
                    'msg' => $e->getMessage(),
                    'code' => $e->getCode()));
            }
            try{
                $result->close();
                $conn->close();
            }
            catch(Exception $e){}
            break;
        case "setCount":
            $cn = $_POST["count"];
            $sql = "UPDATE `count` SET `TotalCount` = ".$cn;
            $res = $conn->query($sql);
            try{
                // $result = $conn->query($sql);
                if ($res === TRUE) {
                    echo json_encode( array('msg' => 'Like Saved','code' => '00'));
                }
                else {
                    echo json_encode( array('msg' => 'Error: '.$conn->error,'code' => '02'));
                }
            }
            catch (Exception $e) {
                $myArray[] =array(
                    'error' => array(
                    'msg' => $e->getMessage(),
                    'code' => $e->getCode()));
            }
            try{
                // $result->close();
                $conn->close();
            }
            catch(Exception $e){}
            break;
        default :
            echo "Error";
            break;
    }
?>