<?php
    echo '<img src="data:image/jpg;base64,' . base64_encode($modele->getImageBlob()) . '"/>';
    echo '<p>' . $modele->getNom() . ' BY ' . $modele->getCreator() . '</p>';
    echo '<p>$' . $modele->getPrix() . ' / '.$modele->getMinSize().' - '.$modele->getMaxSize().'</p>';
?>
<input type="button" value="Ajouter au panier"/>