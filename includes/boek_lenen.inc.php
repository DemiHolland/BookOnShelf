<?php
if(!isset($_SESSION['name'])){
    header('Location: ..');
}

$bookId = $_POST['selectbook'];
$lid = $_SESSION['name'];
$lidnummer = $_SESSION['user'];

$sql = "SELECT bookId, image_path, titel, omschrijving, auteur, uitgever, taal, beschikbaar
                        FROM boeken
                        WHERE bookId = '$bookId'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$boeken = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<meta charset="utf-8">
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php
                    foreach ($boeken as $boektitel) {
                        echo $boektitel['titel'];
                    }
                    ?></h1>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                foreach ($boeken as $boek) {
                    switch (true){
                        case ($boek['beschikbaar'] > 0) :
                            echo '
                        <div class="panel-body2"><img src="../afbeeldingen/' . $boek['image_path'] . '" style="width:180px;height:250px;"></div>
                            <div class="panel-body3">
                                <form action="index.php?page=boek_verificatie" method="post">
                                    <button type="submit" name="leenboek" value="' . $boek['bookId'] . '" class="btn btn-primary"> Boek lenen </button>
                                </form>
                            </div>
                        <div class="panel-body5">' . $boek['omschrijving'] . '</div>
                    ';
                            break;
                        case ($boek['beschikbaar'] < 1) :
                            echo '
                        <div class="panel-body2"><img src="../afbeeldingen/' . $boek['image_path'] . '" style="width:180px;height:250px;"></div>
                            <div class="panel-body3">
                                <form action="index.php?page=boek_verificatie" method="post">
                                    <button type="submit" name="leenboek" value="' . $boek['bookId'] . '" class="btn btn-primary"> Reserveren </button>
                                </form>
                            </div>
                            <div><b style="color:red;">Dit boek is momenteel niet beschikbaar</b></div>
                        <div class="panel-body5">' . $boek['omschrijving'] . '</div>
                        ';
                            break;
                    }
                }
                ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                foreach ($boeken as $boek) {
                    echo '
                            <div class="panel-body6">
                                <b>Auteur: </b>'.$boek['auteur'].'<br>
                                <b>Uitgever: </b>'.$boek['uitgever'].'<br>
                                <b>Taal: </b>'.$boek['taal'].'
                            </div>
                        ';
                }
                ?>
            </div>
        </div>
    </div>
</div>