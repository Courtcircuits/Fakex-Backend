<div id="feed">

<?php

    foreach ($modeles as $modele){
        echo '<div>
    <a href="frontController.php?action=readSingleProduct&controller=modele&id='.$modele->getIDModele() .'"/><img src="data:image/jpg;base64,' . base64_encode($modele->getImageBlob()) . '"/></a>
    <div class="legend">
        <p>' . $modele->getNom() . ' BY ' . $modele->getCreator() . '</p>
        <p>$' . $modele->getPrix() . ' / '.$modele->getMinSize().' - '.$modele->getMaxSize().'</p>
</div>
</div>


';
    }

?>
</div>

