<?php
if(!isset($_SESSION['admin_name'])){
    header('Location: ..');
}

$verwijder = $_POST['deletebook'];

$sql = "SELECT bookId, image_path, titel, omschrijving 
        FROM boeken
        WHERE bookId = '$verwijder'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$boeken = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php foreach ($boeken as $boek) {echo $boek['titel'];}?></h1>
            </div>
        </div>
        <div class="alert alert-warning" role="alert">
            Weet je zeker dat je dit boek wilt verwijderen?
        </div>

        <?php

        foreach ($boeken as $boek){
            echo '
            <form action="index.php?page=verwijder_boek_confirm" method="post">
            <button type="submit" name="deletebook_confirm" value="'.$boek['bookId'].'" class="btn btn-primary">Ja</input>
            </form>
            

            ';
        }
        ?>
        <form action="index.php?page=overzicht_boeken" method="post">
            <button id="nee_button" type="submit" class="btn btn-primary">Nee</button>
        </form>

    </div>

</div>