<?php 

header("Access-Control-Allow-Method:GET");
header("Content-Type: application/json");
include("config.php");


$c1=new Config();
$stude=[];

if($_SERVER['REQUEST_METHOD']=='GET')
{
  $res= $c1->fetch();
  $data=mysqli_fetch_assoc($res);
  if($res)
  {

    while($data=mysqli_fetch_assoc($res))
    {
          array_push($stude,$data);
          $arr['data']=$stude;
    }
  
  }
   else{
    $arr['err']="Data not fond!!!";
}
}
else{
    $arr['err']="Only GET type is Allowed!!!";
}
echo json_encode($arr);

?>