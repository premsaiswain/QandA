<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- css sheet -->
   <style> 
   .style1{
       background-color: black;
       color: white;
       font-style: cursive;
   } 
   .style2{
       margin-left:5px;
   }
   </style>

<!-- header -->

 <title>teacher</title>
</head>
<body>
    <div class="container">
        <div class="row">
   <h1 class="style1 col-9">Hello faculty</h1>
   <a href="HOME.PHP " class="btn btn-warning mb-2 col-2 style2  " >home</a>
        </div>
</div>
<div class="container">

<!-- form part -->


<form method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1">quesion 1</label>
    <input type="text" name="question1" class="form-control" id="exampleFormControlInput1" placeholder="type the question">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">question 2</label>
    <input type="text" name="question2" class="form-control" id="exampleFormControlInput1" placeholder="type the question">
  </div>

  <input type="submit" class="btn btn-primary mb-2" name="submit">
 </form>
  <h3> answer submited by students-: </h3>
  <hr>
<?php
/*  database connection */
$t= false;
$username="root";
$password="";
$server='localhost';
$db ='test2';
$con = mysqli_connect($server,$username,$password,$db);


 if(isset ($_POST['submit'])){
     $Que=$_POST['question1'];
     $Qu=$_POST['question2'];
/*  inserting into database */
    $insertquery="insert into questions(question1,question2)
    values('$Que','$Qu')";

   $result= mysqli_query($con,$insertquery);

/*  checking if the insertion was sucessful or not */

  if($result){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>sucessfully submited!</strong> You will get the answer below if any student reply.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  
  }
}

/*  fetching the data from database */

$sql = "SELECT * FROM `answers`";
$result = mysqli_query($con, $sql);
  while($res = mysqli_fetch_array($result) ){  
      echo "name=". $res['NAME'] ."<br>";
      echo "answer1=". $res['answer1'] ."<br>";
      echo  "answer2=".$res['answer2'] ."<br> <hr>";} 
?>
</div>
</body>
</html>