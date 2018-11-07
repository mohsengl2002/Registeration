<?php
  	//Getting information about last saved information using cookie based user ID 
    $id=$_POST['id'];
    include("conn.php");
    $sSql="SELECT `name`,`family`,`tel`,`street`,`housenum`,`zip`,`city`,`account_owner`,`IBAN`,`paydata`,`satus` FROM `users` WHERE `id`=$id";
    if ($result =  $conn->query($sSql)) {
            if($result->num_rows>0)
                 {
                    $r1 = $result->fetch_array(MYSQLI_ASSOC);
                    $name=  $r1['name'];
                    $family=$r1['family'];
                    $tel=$r1['tel'];
                    $street=$r1['street'];
                    $housenum=$r1['housenum'];
                    $zip=$r1['zip'];
                    $city=$r1['city'];
                    $account_owner=$r1['account_owner'];
                    $iban=$r1['IBAN'];
                    $paydata=$r1['paydata'];
                    $satus=$r1['satus'];
                   
                 }
           mysqli_free_result($result);
           $data= array($name,$family,$tel,$street,$housenum,$zip,$city,$account_owner,$iban,$paydata,$satus);  ;
           echo json_encode($data);
           die(); 
    }
    else echo "";
  

 ?>