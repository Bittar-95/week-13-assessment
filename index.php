<html>
<head>
    <style>
        * {box-sizing: border-box}

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity:1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>
<h1> Instructions </h1>
<ul>
        <!-- create database myapplication; -->
       <li>Create a database called myapplication.</li>
       <!-- create table users(id int , username varchar(20),password varchar(10),email varchar(25),phone_number varchar(20)); -->
       <li>Create a table called users. (Id,username,password,email,phone_number). Those fields should have the right datatype and right size.</li>
      

       <li>Connect the form to the database, When the user insert the information in the registration form, those information should stored in the database.</li>
       <li>After submission, the page should be redirect to new page.</li>
       <li>The new page should display, "Hello (username)" </li>
</ul>
<form method ="post">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="email"><b>UserName</b></label>
        <input type="text" placeholder="Enter Email" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw_repeat" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required>

        <label for="phone-number"><b>Phone Number</b></label>
        <input type="text" placeholder="phone-number" name="phone_number" required>
        <hr>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <button name="submit" type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
</form>

<?php

$server = "localhost";
$dbname = "myapplication";
$user = "root";
$password = "123456789";

if(isset($_POST['submit']))
{
    if( $_POST['psw_repeat'] ===  $_POST['psw'])
    {
    
    try{
      
    $connection = new PDO("mysql:dbname=$dbname;host=$server",$user,$password);

    $query = "insert into users (username,password,email,phone_number) values ('$_POST[username]','$_POST[psw]','$_POST[email]','$_POST[phone_number]')";

    $connection->query($query);
    echo "Done Add";
    unset($connection);

   // $_SESSION["username"] = $_POST['username'];
   // echo $_SESSION["username"];
    header("location:homepage.php?name=$_POST[username]");
    
    }
    catch(ExceptionPDO $e){
        echo $e;

   
    }
}

else
{
    echo "The Password Does Not Match";
}
}

 unset($_POST['submit']);


?>
</body>
<?php


