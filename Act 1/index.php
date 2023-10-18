<!DOCTYPE html>

<!-- SQL

CREATE TABLE account ( id int PRIMARY KEY AUTO_INCREMENT, Name varchar(255), Username varchar(255), Password varchar(255), Age varchar(255), Cellphone_Number int(12), Email varchar(255), Address varchar(255) ); 

-->


<?php

try { //connect to database
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "activity_1";
    $conn = new mysqli($hostname, $username, $password, $databaseName);
    if ($conn->connect_error) {
        die("<script>alert('Connection failed: " . $conn->connect_error . ", Try to start Apache and My SQL in XAMPP.');</script>");
    } else {
    }
} catch (Exception) {
    echo "<script>alert('Check server');</script>";
}


try { // add data to table
    $full_name = filter_input(INPUT_POST, 'Fullname');
    $user_name = filter_input(INPUT_POST, 'username');
    $pass_word = filter_input(INPUT_POST, 'Pass');
    $age = (int)filter_input(INPUT_POST, 'age');
    $cellphone_number = (int)filter_input(INPUT_POST, 'cellphone_number');
    $email = filter_input(INPUT_POST, 'email');
    $address = filter_input(INPUT_POST, 'address');
    if (!empty($full_name) || !empty($user_name) || !empty($pass_word) || !empty($email) || !empty($cellphone_number) || !empty($address)) {
        $conn = new mysqli("localhost", "root", "", "activity_1");
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_error() . ')' . mysqli_connect_error());
        } else {
            $insertData = "INSERT INTO accounts (`Fullname`, `Password`, `Age`, `Number`, `Email`, `Address`, `Username`) VALUES ('" . $full_name . "','" . $pass_word . "'," . $age . ",'" . $cellphone_number . "','" . $email . "','" . $address . "','" . $user_name . "')";
            if ($conn->query($insertData)) {
                echo "<script>
                alert('Registed Completed');
            </script>
            ";
            } else {
                echo "<script>console.log('Registration not added')</script>";
            }
            $conn->close();
        }
    } else {
        echo "<script>console.log('Please fillup all boxes');</script>";
    }
} catch (Exception) {
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        body{
            background-color:black;
            text-align: center;
            justify-content: center;

        }
        .container{
            background-color:#15172b ;
            margin-top: 20px;
            border-radius: 15px;
            height:700px;
            padding-top: 20px;
            text-align: left;
            width: 400px;
            
          
        }
        .row{
            padding-top: 40px;
            justify-content: center;
         
        }
        .form-control{
            background-color:#303245;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;

           
        }
        .Btn{
            background-color: #08d;
            border-radius: 20px;
            width: 100%;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 30px;
            margin-top: 10px;
            outline: 0;
            text-align: center;
            justify-content: center;
            
        }
        .Btn.hover{
            background-color: #08d;
            
        }
        .Btn:active {
            background-color: #06b;
        }
        h1{
            text-align: center;
            font-family: sans-serif;
            font-size: 36px;
            font-weight: 600;
            margin-top: 30px;
            color: white;
        }      
        
    </style>
</head>

<body>
    <div class="container">
        <h1>Register</h1>
    <form method="POST" action="./index.php">
        <div class="row g-3">
            <div class="col-sm-8">
                <label for="Fullname" class="form-label text-white">Fullname</label>
                <input name="Fullname" type="text" class="form-control" id="Fullname" placeholder="Your Name" required>
            </div>

            <div class="col-sm-8">
                <label for="username" class="form-label text-white">Username</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Username" required>
            </div>
            <div class="col-8">
                <label for="Pass" class="form-label text-white">Password</label>
                <input name="Pass" type="Pass" class="form-control" id="Pass" placeholder="Enter password" required>
            </div>
            <div class="col-8">
                <label for="cellphone_number" class="form-label text-white">Cellphone Number</label>
                <input name="cellphone_number" type="text" onkeypress="validate(event)" class="form-control" id="cellphone_number" placeholder="e.g 09202602111" min="11" maxlength="11" required>
            </div>
            <div class="col-sm-8">
                <label for="email" class="form-label text-white">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="example@gmail.com" required>
            </div>
            <div class="col-8">
                <label for="age" class="form-label text-white">Age</label>
                <input name="age" type="text" onkeypress="validate(event)" class="form-control" id="age" placeholder="Your Age" min="1" maxlength="100" required>
            </div>
            
            <div class="col-8">
                <label for="address" class="form-label text-white">Address</label>
                <input name="address" type="text" class="form-control" id="address" placeholder="Address" required>
            </div>
            <br>
            <div class="col-8 text-center">
                <button class="Btn" value="Submit" type="submit">
                    Submit
                </button>
            </div>
        </div>
        
        
    </form>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
