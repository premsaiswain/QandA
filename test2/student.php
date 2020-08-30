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
 
 <title>Document</title>
</head>
<body>
  <!-- header -->
<div class="container">
        <div class="row">
   <h1 class="style1 col-9">Hello student</h1>
   <a href="HOME.PHP " class="btn btn-warning mb-2 col-2 style2  " >home</a>
        </div>
</div>
<div class="container">
<form method="POST">
 <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name="names" class="form-control" id="exampleFormControlInput1" placeholder="enter your name">
  </div>
  <?php 
  
/*  database connection */

$username="root";
$password="";
$server='localhost';
$db ='test2';
 
$con = mysqli_connect($server,$username,$password,$db);
$sql = "SELECT * FROM `questions`";
$result = mysqli_query($con, $sql);
  while($res = mysqli_fetch_array($result) ){
          
    echo  $res['question1'] ."<br>";
          echo  $res['question2'] ."<br>";}
/*  inserting into database */
          if(isset ($_POST['submit2'])){
            $names=$_POST['names'];
            $answ=$_POST['answer1'];
            $ans=$_POST['answer2'];

           $insertquerys="insert into answers(NAME,answer1,answer2)
           values('$names','$answ','$ans')";
       
          $results= mysqli_query($con,$insertquerys);

          
/*  checking if the insertion was sucessful or not */

         if($results){
           echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
               <strong>sucessfully submited!</strong> BEST OF LUCK.
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                 <span aria-hidden='true'>&times;</span>
               </button>
             </div>";
         
         }
       }

?>
<div class="form-group" >
    <label for="exampleFormControlTextarea1">answer 1</label>
    <input type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" name="answer1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">answer 2</label>
    <input type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" name="answer2">
  </div>
  <input type="submit" name="submit2" class="btn btn-primary mb-2">
</form>
</div>
</body>
</html>