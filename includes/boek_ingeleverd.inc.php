<?php
if(!isset($_SESSION['name'])){
    header('Location: ..');
}

$lidnummer = $_SESSION['name'];
$boekingeleverd = $_POST['boekinleveren'];

$sql = "UPDATE boeken SET beschikbaar = beschikbaar + 1 WHERE boeken.bookId = '$boekingeleverd'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql = "DELETE FROM geleende_boeken
                    WHERE boek_id = $boekingeleverd AND geleende_boeken.lidnummer = $lidnummer";
$stmt = $conn->prepare($sql);
$stmt->bindParam('boekinleveren', $_POST['boek_id']);
$stmt->bindParam($_SESSION['name'], $_POST['lidnummer']);
$ingeleverd = $stmt->execute();
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Boek verificatie</h1>
            </div>
        </div>
        <?php
        if($ingeleverd){
            echo '
            <div class="alert alert-success" role="alert">
            Het boek is succesvol ingeleverd!
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
