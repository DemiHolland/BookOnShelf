<?php
if(!isset($_SESSION['name'])){
    header('Location: ..');
}

$lidnummer = $_SESSION['name'];
?>
<meta charset="utf-8">
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Boeken inleveren</h1>
            </div>
        </div>

        <?php
        $sql = 'select bookId, image_path, titel, omschrijving
                from boeken
                JOIN geleende_boeken
                ON boek_id = bookId
                WHERE lidnummer = ' . $lidnummer;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $boeken = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($boeken as $boek) {
            echo '
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-body2"><img src="../afbeeldingen/'.$boek['image_path'].'" style="width:180px;height:250px;"></div>
                    <div class="panel-body3">
                    <form action="index.php?page=boek_ingeleverd" method="post">
                    <button type="submit" name="boekinleveren" value="'.$boek['bookId'].'" class="btn btn-primary"> Boek inleveren </button>
                    </form>
                    </div>
                    <div class="panel-body4"><b>'.$boek['titel'].'</b></div>
                    <div class="panel-body5">'.$boek['omschrijving'].'</div>
                </div>
            </div>
            ';
        }

        if (!isset($boek)){
            echo 'U heeft op dit moment geen boeken geleend, ga naar het <a href="index.php?page=home">overzicht</a> om een boek te lenen.';
        }
        ?>
    </div>
</div>


