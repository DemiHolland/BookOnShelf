<?php
if(!isset($_SESSION['admin_name'])){
    header('Location: ..');
}

$verwijder = $_POST['deletebook_confirm'];

$sql = "DELETE FROM boeken
                    WHERE bookId = '$verwijder'";
$stmt = $conn->prepare($sql);
$verwijderd = $stmt->execute();
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Boek verwijderd</h1>
            </div>
        </div>
        <?php
        if($verwijderd){
            echo '
            <div class="alert alert-success" role="alert">
            Het boek is succesvol verwijderd!
            </div>
            ';
        }
        else{
            echo '
            <div class="alert alert-danger" role="alert">
            Oeps! Er lijkt iets mis te zijn gegaan, probeer opnieuw.
            </div>
            ';
        }
        ?>
    </div>
</div>