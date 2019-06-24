<?php  
 require('db_connect.php');

 if (isset($_POST['submitin']))
 {
    $username = $_POST['user_id'];
    $password = $_POST['user_pass'];
 
 $query = "SELECT id,pass  FROM `regform` WHERE id='$username' and pass='$password'";
 $data=mysqli_query($conn,$query);
 $total=mysqli_num_rows($data);
 
         if($result=mysqli_fetch_assoc($data))
         {
           header ('location: stu.php');
             
         }
         else {
            
         echo '<script type="text/javascript">alert("Username or password is wrong!");</script>';
 }
         
 }
?>
//before html tag
<?php  
ob_start();
?>
