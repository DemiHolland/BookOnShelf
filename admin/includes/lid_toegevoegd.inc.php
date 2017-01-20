<?php
if(!isset($_SESSION['admin_name'])){
    header('Location: ../..');
}

$naam = $_POST['naam'];
$achternaam = $_POST['achternaam'];
$geboortedatum = $_POST['geboortedatum'];

if(isset($_POST['naam']) && !empty($_POST['naam']) && isset($_POST['achternaam']) && !empty($_POST['achternaam']) && isset($_POST['geboortedatum']) && !empty($_POST['geboortedatum'])){
$sql = "INSERT INTO leden (naam, achternaam, geboortedatum)
                VALUES (:naam, :achternaam, :geboortedatum)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':achternaam', $achternaam);
$stmt->bindParam(':geboortedatum', $geboortedatum);
$stmt->execute();

echo '
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Lid toegevoegd</h1>
                        </div>
                    </div>
                </div>';
echo '<div class="alert alert-success" role="alert">';

    $st = $conn->query("SELECT lid_id FROM leden");
    $st->execute();
    $nummer = 0;
    foreach ($st as $user){
        if ($user['lid_id'] > $nummer){
            $nummer = $user['lid_id'];
        }
    }
echo 'Nieuw lid is succesvol toegevoegd! <br> Het lid nummer is: ';
echo $nummer;
echo '</div>';
echo '</div>';


}
else{
    echo '
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Lid niet toegevoegd</h1>
                        </div>
                    </div>
                </div>
                    <div class="alert alert-danger" role="alert">
                        Oeps! Er lijkt iets mis te zijn gegaan, probeer opnieuw.
                    </div>
            </div>
    
    ';
}

?>
