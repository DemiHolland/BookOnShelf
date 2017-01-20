<?php
if(!isset($_SESSION['admin_name'])){
    header('Location: ..');
}

?>

<li>
    <a href="index.php?page=overzicht_boeken"><i class="fa fa-dashboard fa-fw"></i> Overzicht boeken</a>
</li>
<li>
    <a href="index.php?page=overzicht_leden"><i class="fa fa-dashboard fa-fw"></i> Overzicht leden</a>
</li>
<li>
    <a href="index.php?page=boek_toevoegen"><i class="fa fa-dashboard fa-fw"></i> Boek toevoegen</a>
</li>
<li>
    <a href="index.php?page=lid_toevoegen"><i class="fa fa-dashboard fa-fw"></i> Lid toevoegen</a>
</li>