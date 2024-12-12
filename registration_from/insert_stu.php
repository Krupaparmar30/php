<?php 
header("Access-Control-Allow-Method:POST");
header("Content-Type: application/json");
include("config.php");
$c1=new Config();

if($_SERVER['REQUEST_METHOD']=='POST')
{
 $name=$_POST['name'];
 $age=$_POST['age'];
 $course=$_POST['course'];
 $phone=$_POST['phone'];

 $res= $c1->insert($name,$age,$course,$phone);


 if($res){

    $arr['msg']="DATA SUSSECCFULLY INSERT !!!!";
 }


 else{
    $arr['msg']="DATA NOT  SUSSECCFULLY INSERT !!!!";


 }

}
else{
    $arr['error']='only POST type is allowed!!!';
}
echo json_encode($arr);

?>  