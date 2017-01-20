<?php
if(!isset($_SESSION['name'])){
    header('Location: ..');
}

$menuItems = array(
    array('home', 'Home'),
    array('mijn_boeken', 'Mijn boeken'),
    array('boeken_inleveren', 'Boeken inleveren')
);
?>

<?php
foreach($menuItems as $menuItem) {
    echo '<li><a href="index.php?page=' . $menuItem[0] . '"><i class="glyphicon glyphicon-circle-arrow-right"></i> ' .$menuItem[1] . '</a></li>';
    }
?>


