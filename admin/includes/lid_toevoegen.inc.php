<?php
if(!isset($_SESSION['admin_name'])){
    header('Location: ../..');
}

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lid toevoegen</h1>
            </div>
        </div>
        <form action="index.php?page=lid_toegevoegd" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table>
                        <tr><td>
                                <div class="panel-body-input"><b>Naam: </b></div>
                                <input type="text" name="naam" size="40" required>
                        </tr></td>
                        <tr><td>
                                <div class="panel-body-input"><b>Achternaam: </b></div>
                                <input type="text" name="achternaam" size="40" required>
                        </tr></td>
                        <tr><td>
                                <div class="panel-body-input"><b>Geboortedatum: </b></div>
                                <input type="date" name="geboortedatum">
                        </tr></td>
                    </table>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Voeg lid toe">
        </form>
    </div>
</div>