<?php
if(!isset($_SESSION['name'])){
    header('Location: ../index.php');
}

$lidnummer = $_SESSION['user'];
$boekId = $_POST['leenboek'];

$sql = "UPDATE boeken SET beschikbaar = beschikbaar - 1 WHERE boeken.bookId = '$boekId'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql2 = " INSERT INTO geleende_boeken (boek_id, lidnummer)
                      VALUES (:boek_id, :lidnummer)";
$stmt = $conn->prepare($sql2);
$stmt->bindParam(':boek_id', $boekId);
$stmt->bindParam(':lidnummer', $_SESSION['name']);
$boektoev = $stmt->execute();


?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Boek verificatie</h1>
            </div>
        </div>
    </div>

    <?php
    if($boektoev) {
        echo '
            <div class="alert alert-success" role="alert">
            Het boek is succesvol toegevoegd aan uw boekenlijst.
            </div>
            ';
    }
    else {
        echo '
            <div class="alert alert-danger" role="alert">
            Oeps! Er lijkt iets mis te zijn gegaan, probeer opnieuw.
            </div>
            ';
    }

    ?>
</div>