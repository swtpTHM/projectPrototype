<?php
session_start();
include 'db/database.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log-In</title>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
        <div class="container">
<?php
if(isset($_POST['logout'])){
    session_destroy();
}
if(isset($_POST['username']) && isset($_POST['inputPassword'])){
    if(verifyLogin($_POST['username'],md5($_POST['inputPassword']))){
        $_SESSION['user'] = $_POST['username'];
    } else {
        // Meldung: Falsches Passwort
    }
}
if(!isset($_SESSION['user'])||isset($_POST['logout'])) {
    echo '
        <form class="form-signin" method="post">
            <h2 class="form-signin-heading">Log-In</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="username" class="form-control" placeholder="Nutzername" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Passwort" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    ';
} else {
    echo'
        <div class="col-md-offset-4 col-md-4">
            <h2>Geschützter Inhalt</h2>

            <p>Diesen Bereich soll man nur sehen, wenn man eingeloogt ist. Das Log-in Feld hingegen soll ausgeblendet sein.</p>

            <form class="log-out" method="post">
                <!-- Contextual button for informational alert messages -->
                <button type="submit" name="logout" class="btn btn-info btn-block"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span> Log Out</button>
            </form>
        </div>
        </div>
        <!-- /container -->
    ';
}
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>

