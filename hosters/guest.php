<?php
        include "../includes/db.php";
        include "../includes/auth.php";

    $name = ($_SESSION['username']);
    $query = "SELECT user_id,user_role FROM users WHERE user_name = '$name'";
    $result = mysqli_query($con, $query);
        if(!$result){
            die("FAILD!!".mysqli_error());
        }
    while($row = mysqli_fetch_assoc($result)){
             $rslt = $row['user_id'];
             $check = $row['user_role'];
    }
    if($check=='A'){
       if (isset($_POST['submit1'])){
                    $rslt10 = ($_POST['selected1']);
                    }
    }else{
        echo '';
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eee0ff9583.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>SeatStock Book for User</title>
</head>

<body>
    <div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded-lg text-center">
        <div class="container shadow p-2 mb-3 rounded-lg">
            <form action="" method="post" enctype="multipart/form-data">
                <h4 class="text-dark">Select Event : </h4>
                <select name="selected1" class="btn btn-primary dropdown-toggle">
                    <?php
					$query4 = "SELECT * FROM events WHERE e_user_id = $rslt";
					$rslt1 = mysqli_query($con,$query4);
					while($row3 = mysqli_fetch_assoc($rslt1)){
						$e_title = $row3['e_title'];
                        $e_id = $row3['e_id'];
                        echo"<option value='{$e_id}'>$e_title</option>";
					}
				?>
                </select>
                <input type="submit" name="submit1" class="btn btn-primary" value="Select">
            </form>
        </div>
        <div class="container shadow-lg p-2 mb-3 bg-redish-gradient rounded-lg" style="max-width: 38rem;">
            <h3 class="text-white">Select Seat Number And Resave</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <h5 class="text-white">Seat Number</h5>
                    <select name="selected" class="btn btn-primary dropdown-toggle">
                        <?php
					$query = "SELECT * FROM A$rslt10";
					$rslt2 = mysqli_query($con,$query);
					while($row = mysqli_fetch_assoc($rslt2)){
						$t_id = $row['t_id'];
                        $user_id = $row['user_id'];
				
				    if($user_id==0){
                        echo"<option value='{$t_id}'>Seat No: $t_id</option>";
                    }
				
					}
				?>
                    </select>
                    <input type="radio" name="name" value="<?php echo $rslt10; ?>" checked="checked" style="display: none;">
                </div>
                <div class="form-group">
                    <h5 class="text-white">First Name</h5>
                    <input type="text" class="form-control" name="guser_fname" placeholder="Amal, Kamal, Namal, etc.." id="fname" required="">
                </div>
                <div class="form-group">
                    <h5 class="text-white">Last Name</h5>
                    <input type="text" class="form-control" name="guser_lname" placeholder="Wickrama , Abey, Perera, etc.." id="lname" required="">
                </div>
                <div class="form-group form-check form-check-radio">
                    <h5 class="text-white">Gender</h5>
                    <input class="form-check-input" type="radio" name="guser_gender" value="M" checked>
                    <label class="form-check-label text-white">
                        <h6>Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
                    </label>
                    <input class="form-check-input" type="radio" name="guser_gender" value="F">
                    <label class="form-check-label text-white">
                        <h6>Female</h6>
                    </label>
                </div>
                <div class="form-group">
                    <h5 class="text-white">Phone Number</h5>
                    <input type="text" class="form-control" name="guser_tp" placeholder="+94 XX XXX XXXX" required="">
                </div>
                <div class="form-group mb-1">
                    <button class="btn btn-primary btn-link btn-wd btn-lg bg-blue-gradient text-white nounderline" style="width:100%;" name="submit" type="submit" value="Sign Up">Add User
                    </button>
                </div>
            </form>
        </div>
        <div class="container shadow-lg p-2 mb-3 bg-blue-gradient rounded-lg" style="max-width: 38rem;">
            <h3 class="text-white">Your Guest Reservations</h3>
        </div>
        <div class="container shadow-lg p-3 bg-redish-gradient rounded-lg" style="max-width: 38rem;">
            <center>
                <table class="table-bordered table-danger table-hover">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Contact Number</th>
                    </tr>
                    <?php
        $query3 = "SELECT * FROM guest WHERE h_id = '$rslt'";
        $result3 = mysqli_query($con,$query3);
        while($row3 = mysqli_fetch_assoc($result3)){
            $guser_id = $row3['guser_id'];
            $guser_fname = $row3['guser_fname'];
            $guser_lname = $row3['guser_lname'];
            $guser_gender = $row3['guser_gender'];
		    $guser_tp = $row3['guser_tp'];
        echo "<tr  class='table-warning'>";
             echo "<td>{$guser_fname}</td>";
             echo "<td>{$guser_lname}</td>";
             echo "<td>{$guser_gender}</td>";
             echo "<td>{$guser_tp}</td>";
             echo"<td><a href='delete.php?delete=$guser_id'>Delete</a></td>";
        echo "<tr>";
    
        }

    ?>
    <?php
        
        if(isset($_POST['submit'])){
        $t_id = $_POST['selected'];
        $name = $_POST['name'];
             
        $user_fname = ($_POST['guser_fname']);
		$user_lname = ($_POST['guser_lname']);
        $user_gender = ($_POST['guser_gender']);
        $user_tp = ($_POST['guser_tp']);
             
        if($user_tp!=0 && $user_fname!="" && $user_gender!=""){
        $query = "INSERT into guest (guser_fname, guser_lname, guser_gender, guser_tp,h_id) VALUES ('$user_fname','$user_lname' ,'$user_gender','$user_tp','$rslt')";
        $result = mysqli_query($con,$query);
    
        $query5 = "SELECT guser_id FROM guest WHERE guser_fname = '{$user_fname}'";
        $rslt2 = mysqli_query($con,$query5);
        while($row = mysqli_fetch_assoc($rslt2)){
            $guser_id = $row['guser_id'];
        }
        
        $query3 = "UPDATE A$name SET user_id =  $guser_id WHERE t_id = $t_id";        
        $result = mysqli_query($con,$query3);
            
        if(!$result){
            die("Error in updating category".mysqli_error($con));
        }
    }else{
            echo "Fill Requied Fields";
        }
           }
                  
        ?>
                </table>
            </center>
        </div>
    </div>
</body>

</html>
<!--<div class="bg-primary topp bg-blue-gradient"><div class="card shadow-lg p-3 bg-white rounded-lg text-center" style="max-width: 40rem;"><h3>Host your event to add guests</h3></div></div>-->
