<?php
// Save information in Database or Update based on Userid situations
  	$status=$_POST['status'];
    $uid=$_POST['uid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $tel=$_POST['tel'];
    $street=$_POST['street'];
    $hnumber=$_POST['hnumber'];
    $zcode=$_POST['zcode'];
    $city=$_POST['city'];
    $acountowner=$_POST['acountowner'];
    $acountowner=$_POST['acountowner'];
    $iban=$_POST['iban'];
    $result=$_POST['result'];
    if($result=='')$result=0;
    $paydata=$_POST['paydata'];if($status=='')$status=0;
    
    
    include("conn.php");
    if($uid==0)// if Userid is 0 === New User 
    $sSql="INSERT INTO `users`(`name`, `family`, `tel`, `street`, `housenum`, `zip`, `city`, `account_owner`, `IBAN`, `paydata`, `result`, `satus`) VALUES ('$fname',  '$lname' , '$tel',   '$street',  '$hnumber',   '$zcode','$city',  '$acountowner'  ,  '$iban',  '$paydata' ,$result,  $status)";
    else
    $sSql="UPDATE `users` SET `name`='$fname',`family`='$lname',`tel`='$tel',`street`='$street',`housenum`='$hnumber',`zip`='$zcode',`city`='$city',`account_owner`='$acountowner',`IBAN`='$iban',`paydata`='$paydata',`result`=$result,`satus`=$status WHERE `id`=$uid";
    if($result =  $conn->query($sSql))
    {
        if($uid==0)$uid=$conn->insert_id;
        echo $uid;
    }
    else
    echo "0";
            

 ?>