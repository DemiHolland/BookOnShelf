<?php
if(!isset($_SESSION['name'])){
    header('Location: ..');
}


?>
<meta charset="utf-8">
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Overzicht boeken</h1>
            </div>
        </div>
        
        <?php
        $sql = 'select bookId, image_path, titel, omschrijving from boeken';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $boeken = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($boeken as $boek) {
            echo '
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-body2"><img src="../afbeeldingen/'.$boek['image_path'].'" style="width:180px;height:250px;"></div>
                        <div class="panel-body3">
                            <form action="index.php?page=boek_lenen" method="post">
                                <button type="submit" name="selectbook" value="'.$boek['bookId'].'" class="btn btn-primary">Meer info /<br>Boek lenen</button>
                            </form>
                        </div>
                    <div class="panel-body4"><b>'.$boek['titel'].'</b></div>
                    <div class="panel-body5">'.$boek['omschrijving'].'</div>
                </div>
            </div>
            ';
        }

        ?>
    </div>
</div>


