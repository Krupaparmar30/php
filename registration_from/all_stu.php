<?php 
header("Access-Control-Allow-Method:POST,GET,PUT,DELETE");
header("Content-Type: application/json");
include("config.php");
$c1=new Config();
$stude=[];


switch($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
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
            break;

            case 'GET':
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
           break;
           case 'PUT':
            $data=file_get_contents('php://input');
            parse_str($data, $result);
            $id=$result['id'];
             $name=$result['name'];
             $age=$result['age'];
             $course=$result['course'];
             $phone=$result['phone'];
            
            $res=$c1->update($id,$name,$age,$course,$phone);   
            
             if($res){
            
                $arr['msg']="DATA SUSSECCFULLY UPDATE !!!!";
             }
            
            
             else{
                $arr['msg']="DATA NOT  SUSSECCFULLY UPDATE !!!!";
            
            
             }

             break;
             case 'DELETE':
                $data=file_get_contents('php://input');
                parse_str($data, $result);
                $id=$result['id'];
            
            
            $res=$c1->delete($id);
             if($res){
            
                $arr['msg']="DATA SUSSECCFULLY DELETE !!!!";
             }
            
            
             else{
                $arr['msg']="DATA NOT  SUSSECCFULLY DELETE !!!!";
            
            
             }

             break;

             default:
             $arr['error'] = "Invalid request type!";
             break;


}
echo json_encode($arr);



?>