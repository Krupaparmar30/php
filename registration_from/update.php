<?php 

session_start();

include("config.php");
$c1=new Config();
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$age=$_SESSION['age'];
$course=$_SESSION['course'];
$phone=$_SESSION['phone'];

if(isset($_POST['button'])){

    $name=$_POST['name'];
    $age=$_POST['age'];
    $course=$_POST['course'];
    $phone=$_POST['phone'];

    $c1->update($id,$name,$age,$course,$phone);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
          body
        {
            background-image: url('https://t4.ftcdn.net/jpg/08/48/72/53/360_F_848725385_1ngSbq05EYXCLE0TvZGWKGgXChs7JrAI.jpg'); /* Replace with your image path */
            background-size: cover;
          
          
            background-position: center center;
            box-shadow: inset;
            backface-visibility:hidden;
       
          
        }
    .box1 {
        padding: 20px;

        /* width: 100;
            height: 220; */

        height: 320px;
        width: 300px;
        background-color: white;
        text-align: center;
        border-radius: 20px;
        box-shadow: 50pt;



    }
    hr{
        font-size: 20px;
    }
    </style>
</head>

<body>


    <div class="mx-auto p-2" style="width: 400px;">

        <h1>
           Update Registration Form
        </h1>
<hr>


        <form method="POST">

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>">

            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" value ="<?php echo $age?>">
            </div>
            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <input type="text" class="form-control" id="course" name="course" value ="<?php echo $course?>">
            </div>
           
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value ="<?php echo $phone?>">
            </div>


            <button type="submit" class="btn btn-primary" name="button">Update</button>
        </form>


    </div>

  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>