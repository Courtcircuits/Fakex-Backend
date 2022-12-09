<div id="feed">

<?php

    foreach ($modeles as $modele){
        echo '<div>
    <img src="data:image/jpg;base64,' . base64_encode($modele->getImageBlob()) . '"/>
    <div class="legend">
        <p>' . $modele->getNom() . ' BY ' . $modele->getCreator() . '</p>
        <p>$' . $modele->getPrix() . ' / '.$modele->getMinSize().' - '.$modele->getMaxSize().'</p>
</div>
</div>


';
    }

?>
</div>

