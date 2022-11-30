<?php
    foreach ($modeles as $modele){
        echo '<p>Nom de la chaussure : '.$modele->getNom().'</p><p>Prix : '.$modele->getPrix().'</p><p>Createur de la paire : '.$modele->getCreator().'<br><img src="data:image/jpg;base64,'.base64_encode($modele->getImageBlob()).'"/>';
    }

?>