<?php 
include('fungsi.php');
$nik = $_POST['nik'];
$pendiklanjut = $_POST['pendiklanjut'];
$bidstudy = $_POST['bidstudy'];
$univ = $_POST['univ'];
$negara = $_POST['negara'];
$tahunS = $_POST['tahunS'];
$tahunakaS = $_POST['tahunakaS'];

$sql = "INSERT INTO `studylanjut`(`nik`, `pendiklanjut`, `bidangstudy`, `univ`, `negara`, `tahunmulaistudi`, `tahunaka`) VALUES ('$nik','$pendiklanjut','$bidstudy','$univ','$negara','$tahunS', '$tahunakaS')";
$query= mysqli_query($conn,$sql);
$lastId = mysqli_insert_id($conn);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>