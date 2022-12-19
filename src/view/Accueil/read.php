<?php

echo '<div class="legend">
        <p>' . $modele->getNom() . ' BY ' . $modele->getCreator() . '</p>
        <p>$' . $modele->getPrix() . ' / '.$modele->getMinSize().' - '.$modele->getMaxSize().'</p>
</div>'
;

?>

