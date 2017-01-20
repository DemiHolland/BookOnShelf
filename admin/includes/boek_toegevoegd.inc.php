<?php
if(!isset($_SESSION['admin_name'])){
    header('Location: ..');
}

$titel = ($_POST['titel']);
$omschrijving = ($_POST['omschrijving']);
$auteur = ($_POST['auteur']);
$uitgever = ($_POST['uitgever']);
$taal = ($_POST['taal']);

$filetmp = $_FILES["file_img"]["tmp_name"];
$filename = $_FILES["file_img"]["name"];
$filetype = $_FILES["file_img"]["type"];
$filepath = $filename;

move_uploaded_file($_FILES['file_img']['tmp_name'], 'C:/xampp/htdocs/BookOnShelf/afbeeldingen/' . $filepath);

if(isset($_POST['titel']) && !empty($_POST['titel']) && isset($_POST['omschrijving']) && !empty($_POST['omschrijving']) && isset($_POST['auteur']) && isset($_POST['uitgever']) && isset($_POST['taal']) && !empty($_POST['taal'])) {

    $sql = "INSERT INTO boeken (titel, omschrijving, auteur, uitgever, taal, image_path, image_name, image_type)
                VALUES (:titel, :omschrijving, :auteur, :uitgever, :taal, :image_path, :image_name, :image_type)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':titel', $titel);
    $stmt->bindParam(':omschrijving', $omschrijving);
    $stmt->bindParam(':auteur', $auteur);
    $stmt->bindParam(':uitgever', $uitgever);
    $stmt->bindParam(':taal', $taal);
    $stmt->bindParam(':image_path', $filepath);
    $stmt->bindParam(':image_name', $filename);
    $stmt->bindParam(':image_type', $filetype);
    $stmt->execute();

    echo '
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Boek toegevoegd</h1>
                        </div>
                    </div>
                </div>
                    <div class="alert alert-success" role="alert">
                        Het boek is succesvol toegevoegd!
                    </div>
            </div>
    
    ';

}
else{
    echo '
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Boek niet toegevoegd</h1>
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