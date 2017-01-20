<?php
include 'includes/database.inc.php';

$failLogin = null;

if(isset($_POST ['user']) && !empty($_POST ['user']) && isset ($_POST ['pass']) && !empty($_POST ['pass'])){

    $sql = 'SELECT pass FROM users WHERE user = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_POST['user']);
    $stmt->execute();
    $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($_POST ['pass'], $userDetails['pass'])){
        $_SESSION ['user'] = $_POST ['user'];
        $_SESSION ['pass'] = $_POST ['pass'];
        session_start();
        $_SESSION ['admin_name'] = $_POST ['user'];
        header ('Location: admin/');
    }
    else{
        $failLogin = "Gebruikersnaam of wachtwoord incorrect!";
    }
}
?>

<html >
<head>
    <meta charset="UTF-8">
    <title>BookOnShelf ~ Login Form</title>

    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="wrapper">
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">BookOnShelf Login</h2>
        <p><?php echo $failLogin ?></p>
        <input type="text" class="form-control" name="user" placeholder="Gebruikersnaam" required="" autofocus="" />
        <input type="password" class="form-control" name="pass" placeholder="Wachtwoord" />

        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div>
</body>
</html>