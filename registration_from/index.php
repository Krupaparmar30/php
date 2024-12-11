<?php 

include("config.php");
session_start();
$c1=new Config();

$res=$c1->fetch();

$is_btn_set=isset($_POST['button']);
if($is_btn_set)
{
    $name= $_POST['name'];
    $age=$_POST['age'];
    $course= $_POST['course'];
    $phone=$_POST['phone'];
  
  $c1->insert($name,$age,$course,$phone);
  header('refresh:1');
}

if(isset($_POST['delete']))
{
  $id=$_POST['deleteId'];
  $c1->delete($id);
  header('refresh:1');
}


if(isset($_REQUEST['update']))
{
    $id=$_POST['deleteId'];
    $name=$_POST['nameId'];
    $age=$_POST['ageId'];
    $course=$_POST['courseId'];
  
    $phone=$_POST['phoneId'];

    //super global varible /array
    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['age']=$age;
    $_SESSION['course']=$course;

    $_SESSION['phone']=$phone;
     

header('Location:update.php');
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
            Student Registration Form
        </h1>

<hr>

        <form method="POST">

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text"  class="form-control" id="name" name="name" required   >

            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age"required min="20" max="100" title="Age must be between 1 and 100">
            </div>
            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <input type="text" class="form-control" id="course" name="course" required>
            </div>
           
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone"  required pattern="\d{10}" title="Phone number must be exactly 10 digits">
            </div>


            <button type="submit" class="btn btn-primary" name="button">Submit</button>
        </form>


    </div>

    <hr>
    <div class="mx-auto p-2" style="width: 800px;">
        <table class="table table-hover table table-light table-borderless">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Course</th>
                    
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($data=mysqli_fetch_assoc($res)){ ?>
                <tr>
                    <th scope="row"><?php echo $data['id'] ?></th>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['age'] ?></td>
                    <td><?php echo $data['course'] ?></td>
                    <td><?php echo $data['phone'] ?></td>
                    <td>
                  <form method="POST">
                    <input type="hidden" value="<?php echo $data['id'] ?>"name="deleteId">
                    <input type="hidden" value="<?php echo $data['name'] ?>"name="nameId">
                    <input type="hidden" value="<?php echo $data['age'] ?>"name="ageId">
                    <input type="hidden" value="<?php echo $data['course'] ?>"name="courseId">
                   
                    <input type="hidden" value="<?php echo $data['phone'] ?>"name="phoneId">
                  <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                  
                  <button type="submit" class="btn btn-warning" name="update">Upadate</button>
                  </form>
                  </td>


                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>