<?php
if(!isset($_SESSION['admin_name'])){
    header('Location: ..');
}

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Boek toevoegen</h1>
            </div>
        </div>
        <form action="index.php?page=boek_toegevoegd" method="post" enctype="multipart/form-data" id="form1" runat="server">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table>
                        <tr><td>
                            <div class="panel-body-input"><b>Boek titel: </b></div>
                                <input type="text" name="titel" size="40" required="">
                        </tr></td>
                        <tr><td>
                            <div class="panel-body-input"><b>Omschrijving: </b></div>
                                <textarea rows="5" cols="50" name="omschrijving" required="" placeholder="Voer hier de samenvatting van het boek in."></textarea>
                        </tr></td>
                        <tr><td>
                            <div class="panel-body-input"><b>Auteur: </b></div>
                                <input type="text" name="auteur" size="40">
                        </tr></td>
                        <tr><td>
                            <div class="panel-body-input"><b>Uitgever: </b></div>
                                <input type="text" name="uitgever" size="40">
                        </tr></td>
                        <tr><td>
                            <div class="panel-body-input"><b>Taal: </b></div>
                                <input type="text" name="taal" size="40" placeholder="Bijv: Nederlands of Engels" required="">
                        </tr></td>
                        <tr><td>
                            <div class="panel-body-input"><b>Afbeelding: </b></div>
                                <div class="formimg">
                                    
                                        <input type='file' id="imgInp" name="file_img"/><br>
                                            <img id="blah" style="width:180px;height:250px;" src="" />
                                    
                                </div>
                        </tr></td>
                    </table>
            </div>
                </div>
        <input type="submit" class="btn btn-primary" value="Voeg boek toe">
        </form>
    </div>
</div>