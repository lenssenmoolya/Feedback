<html>
<head>
</head>
<body>  
<?php
$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = $_POST["comment"];
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }


?>

<h2>Feedback</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender"  value="female">Female
  <input type="radio" name="gender"  value="male">Male
  <input type="radio" name="gender"  value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <p>Assessment method is appropriate for this placement?</p>
  <input type="radio" name="amethod"  value="Yes">Yes
  <input type="radio" name="amethod"  value="no">NO
  <p>communication at placement site is clear and effective</p>
  <input type="radio" name="communication" value="Yes">Yes
  <input type="radio" name="communication" value="no">No
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


<?php  
$name = $email = $gender = $amethod = $communication = $comment = "";
$con = mysqli_connect("localhost","root","root","mydb");   
$name=$_POST['name'];  
$email=$_POST['email']; 
$gender=$_POST['gender'];
$amethod=$_POST['amethod'];
$communication=$_POST['communication'];
$comment=$_POST['comment']; 
if(@$_POST['submit'])  
{ 
$s="insert into feedback(name,email,gender,amethod,communication,comment) values('$name','$email','$gender','$amethod','$communication','$comment')";  
mysqli_query($con,$s);
echo "Your Data Inserted";  
}  
?>

</body>
</html>