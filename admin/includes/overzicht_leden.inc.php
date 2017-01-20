<?php
if(!isset($_SESSION['admin_name'])){
    header('Location: ..');
}


$sql = 'select lid_id, naam, achternaam, geboortedatum from leden';
$stmt = $conn->prepare($sql);
$stmt->execute();
$leden = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Overzicht leden</h1>
            </div>
        </div>
        <?php
        foreach ($leden as $lid){
            echo '        
                            <div class="panel panel-default">
                                <div class="panel-body">
                                <b>Naam: </b>'.$lid['naam'].'<br>
                                <b>Achternaam: </b>'.$lid['achternaam'].'<br>
                                <b>Geboortedatum: </b>'.$lid['geboortedatum'].'<br>
                                <b>Lid nummer: </b>'.$lid['lid_id'].'<br>
                                </div>
                            </div>
                        ';
        }

        ?>

    </div>
</div>