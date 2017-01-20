<?php
include 'includes/database.inc.php';

$failLogin = null;

if(isset($_POST['user']) && !empty($_POST['user'])){

    $sql = 'SELECT lid_id, naam FROM leden WHERE lid_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_POST['user']);
    $stmt->execute();
    $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($_POST['user'] == $userDetails['lid_id']){
        session_start();
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['name'] = $_POST['user'];
        $_SESSION['naam'] = $userDetails['naam'];
        header('Location: php/');
    }
    else{
        $failLogin = "Lidnummer incorrect!";
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
        <input type="text" class="form-control" name="user" placeholder="Ledennummer" required autofocus />
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <br>
        <a href="index_admin.php">Login als personeel</a>
    </form>

</div>
</body>
</html>