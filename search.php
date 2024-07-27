<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    if (isset($_POST)) {
        $data = file_get_contents("php://input");
        $readableData = json_decode($data,true); //For an Array
        $lName = $readableData["body"];
        
        $mysqli = mysqli_connect('localhost', 'thefastb', 'NENBk4v]v097.z', 'thefastb_proj15');
        
        if (mysqli_connect_errno()) {
            echo "Connect failed: ".mysqli_connect_error();
            exit();
        } else {
            if ($lName == "") {
                $sql = "SELECT * FROM Person;";
            } else {
                $sql = "SELECT * FROM Person WHERE last_name = '".$lName."';";
            }
            $res = mysqli_query($mysqli, $sql);
            if ($res) {
                $retStr = "";
                while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    $ret  = $newArray['last_name'];
                    $fName  = $newArray['first_name'];
                    $email = $newArray['email'];
                    $retStr .= "<p>".$ret.", ".$fName." has the email address ".$email."</p>";
                }
            } else {
                echo "Could not retrieve records: ".mysqli_error($mysqli);
            }
            mysqli_free_result($res);
            mysqli_close($mysqli);
            
            echo $retStr;
        }
    } else {
        echo "POST not set...";
    }
?>