<?php
session_start();


//if ($_POST["login"]) {
//
//    try {
//        $MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=bank web page", "amir", "IL8AxZQXDM80pZKQ");
//        $MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        $email = $_POST['email'];
//        $password = $_POST['password'];
//         // Check that data was sent to the mailer.
//
//    }
//    catch (PDOException $e) {
//        echo $e->getMessage();
//    }
//}


if(isset($_POST["register"])){

    try{
        $MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=bank web page", "root", "");
        $MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*TODO ITS the register form! meanning u need to add Name to each input and catch him here with $email $password ex.


            */
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
//         Check that data was sent to the mailer.
        if ( empty($username) OR empty($password) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($firstName OR empty($lastName))){
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }
                                                    /*AS WRITTEN IN THE SQL!!!*/                          /* VALUES!!!  */
        $sql = "INSERT INTO users (email, first_name, last_name, password, username) value (:email,:firstName,:lastName,:password,:username)";
        $cursor = $MySQLdb->prepare($sql);
        $cursor->execute(array(
            ":email"=> $email,
            ":firstName"=> $firstName,
            ":lastName"=> $lastName,
            ":password"=> $password,
            ":username"=> $username,
        ));
    }


    catch (PDOException $e) {
        echo $e->getMessage();
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../account%20infromation/index.html">Account Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../profilepage/index.html">Profile page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../moneytransfer/index.html">Money Transfer</a>
                    </li>
                </ul>

            </div>

    </nav>


                <form action="index.php" name="login" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                </form>


<!--                /TODO ADDING NEEDED INPUTS FIrst Name Lsat Name Username-->
                <form action="index.php" name="register" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">first name</label>
                    <input name="firstName" type="text" class="form-control" id="exampleInputPassword1" placeholder="first name">
                    <div class="form-group">
                        <label for="exampleInputPassword1">last name</label>
                        <input name="lastName" type="text" class="form-control" id="exampleInputPassword1" placeholder="last name">
                        <button name="register" type="submit" class="btn btn-primary">Submit</button>
                </form>



</body>
</html>