<?php

class Config
{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="demo";
    private $connection;

    public function connect()
    {
       $this->connection=mysqli_connect($this->host,$this->username,$this->password,$this->database);
      

    }

    public function __construct()
    {
        $this->connect();
    }

    public function insert($name,$age,$course,$phone)
    {
        $query="INSERT INTO student(name,age,course,phone) VALUES('$name',$age,'$course',$phone)";
       $res= mysqli_query($this->connection,$query);

         if($res)
        {
            echo "successfully insert!!";
        }
        else{
            echo "unsuccessfully not insert!!";  
        }
    }

    public function fetch()
    {

        $query= "SELECT * FROM student";
        $res=mysqli_query($this->connection,$query);
         return $res;
    }

    public function delete($id)
    {
        $query="DELETE FROM student WHERE id=$id";
       $res= mysqli_query($this->connection,$query);
       return $res;
    }

}
?>

