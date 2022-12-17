<div id="feed">

<?php

    foreach ($modeles as $modele){
        echo '<div>
        <a href="frontController.php?action=readProduct&controller=modele&id=',$modele->getNom(),'" style="color: inherit; text-decoration: none;"><img src="data:image/jpg;base64,' . base64_encode($modele->getImageBlob()) . '"/></a>
    <div class="legend">
    <a href="frontController.php?action=readProduct&controller=modele&id=',$modele->getNom(),'" style="color: inherit; text-decoration: none;" ><p>' . $modele->getNom() . ' BY ' . $modele->getCreator() . '</p></a>
    <a href="frontController.php?action=readProduct&controller=modele&id=',$modele->getNom(),'" style="color: inherit; text-decoration: none;"><p>$' . $modele->getPrix() . ' / '.$modele->getMinSize().' - '.$modele->getMaxSize().'</p></a>
</div>
</div>


';
    }

?>
</div>

