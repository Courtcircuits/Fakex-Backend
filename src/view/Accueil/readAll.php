<div id="hero">
    <main>
        <div id="slider">
            <ul>
                <li class="activated selectshoe" >
                    <p  >01</p>
                </li>
                <li class="selectshoe">
                    <p >02</p>
                </li>
                <li class="selectshoe">
                    <p >03</p>
                </li>
            </ul>
        </div>
        <div id="description">
            <div>
                <h1>BEST SELLER</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
                <a href="add" class="btn">Add to Bag</a>

            </div>
            <div>
                <h2 id="name-shoe">Nike Punk</h2>
                <h3 id="creator-shoe">By Mihai</h3>
            </div>

        </div>
        <div id="image">
            <img src="static/img/main.png">
        </div>
    </main>
    <aside>
        <h2>BY THE SAME CREATOR</h2>
        <img src="static/img/index%204.png">
        <img src="static/img/shoe2.png">
        <img src="static/img/shoe3.png">
    </aside>
</div>
<br>
<br>
<br>

<div id="feed">

<?php

    foreach ($modeles as $modele){
        echo '<div>
    <a href="frontController.php?action=readSingleProduct&controller=modele&id=' . $modele->getIDModele() . '"/><img src="data:image/jpg;base64,' . base64_encode($modele->getImageBlob()) . '"/></a>
    <div class="legend">
        <p>' . $modele->getNom() . ' BY ' . $modele->getCreator() . '</p>
        <p>$' . $modele->getPrix() . ' / ' . $modele->getMinSize() . ' - ' . $modele->getMaxSize() . '</p>
</div>
</div>


';
    }

?>
</div>
