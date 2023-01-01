
<div id="product">
    <div>
        <?php echo '<img src="' . $modele->getImageUrl() . '"/>'; ?>
    </div>
    <div id="details">
        <div id="header-details">
            <div id="title">
                <h2><?php echo '<p>' . $modele->getNom();?></h2>
                <p>BY <?php echo $modele->getCreator()?></p>
            </div>
            <p>$<?php echo $modele->getPrix()?></p>
        </div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cursus interdum eleifend odio nulla. A donec
            lobortis donec nibh turpis nulla eget quis. Tortor lorem duis neque vitae nunc. Suspendisse magna commodo in
            semper nunc.
        </p>
        <p><b>Sizes : </b></p>
        <div id="grid-size">
            <?php
            for($i = $modele->getMinSize(); $i <= $modele->getMaxSize(); $i++){
                echo '<div class="size-btn"><p>'.$i.'</p></div>';
            }
            ?>
        </div>
        <div id="quantities">
            <p><b>Quantities : </b></p>
            <input type="number" min="1" max="<?php echo $modele->getQuantity(); ?>">
        </div>
        <a href="frontController.php?action=addProduitPanier&controller=modele&idmodele=<?php echo $modele->getIdModele();?>" >ADD TO CART</a>
        <a href="like" id="save">SAVE
            <svg
                width="16px"
                height="16px"
                viewBox="0 0 100.7298 98.522308"
                version="1.1"
                id="svg5"
                xml:space="preserve"
                xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:svg="http://www.w3.org/2000/svg"><sodipodi:namedview
                    id="namedview7"
                    pagecolor="#505050"
                    bordercolor="#eeeeee"
                    borderopacity="1"
                    inkscape:showpageshadow="0"
                    inkscape:pageopacity="0"
                    inkscape:pagecheckerboard="0"
                    inkscape:deskcolor="#505050"
                    inkscape:document-units="mm"
                    showgrid="false" /><defs
                    id="defs2" /><path
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="30"
                    d="m 30.136031,12.005427 c -11.16112,0 -20.2119996,9.689972 -20.2119996,21.645034 0,9.650636 3.5370896,32.555017 38.3542396,55.708656 a 3.9817527,4.3071444 0 0 0 4.13935,0 c 34.81715,-23.153639 38.35423,-46.05802 38.35423,-55.708656 0,-11.955062 -9.05102,-21.645034 -20.21199,-21.645034 -11.16112,0 -20.21199,13.118208 -20.21199,13.118208 0,0 -9.05088,-13.118208 -20.21184,-13.118208 z"
                    id="path8186"
                    style="stroke-width:7.5;stroke-dasharray:none" /></svg>
        </a>
    </div>
</div>
