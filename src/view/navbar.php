<nav>
    <div>
        <a href="frontController.php?action=readAll&controller=modele" style="color: inherit; text-decoration: none;"><img src="./img/logo.png" alt="dennis ritchie" ></a>
        <div id="logo" >
            <a href="frontController.php?action=readAll&controller=modele" style="color: inherit; text-decoration: none;"><p>FA<sup>TM</sup></p>
                <p>KEX</p></a>

        </div>
    </div>
    <div>
        <ul>
            <li><a href="frontController.php?action=connexionCreateur&controller=utilisateur">Creators</a></li>
            <li><a href="frontController.php?action=readMen&controller=modele">Men</a></li>
            <li><a href="frontController.php?action=readWomen&controller=modele">Women</a></li>
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                // L'utilisateur est connecté
                echo '<a>Logged in as ' . $_SESSION['login'] . '</a>';
                echo '<li><a href="frontController.php?action=deconnexion&controller=utilisateur">Log out</a></li>';
            } else {
                // L'utilisateur n'est pas connecté
                echo '<li><a href="frontController.php?action=connexionUtilisateur&controller=utilisateur">Log in</a></li>';
            }
            ?>

        </ul>

    </div>
    <div id="icons">
        <li><p id="showCart">
                <svg
                    width="100.37152mm"
                    height="97.089256mm"
                    viewBox="0 0 100.37152 97.089256"
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
                        showgrid="false" />
                    <defs
                        id="defs2"/>
                    <g
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        id="g6145"
                        transform="matrix(4.5990954,0,0,5.189785,-24.479085,-88.124259)"><path
                            stroke-linejoin="round"
                            d="m 6.6266809,25.530868 a 1,1 0 0 1 0.97,-1.242 H 25.036681 a 1,1 0 0 1 0.97,1.242 l -1.811,7.243 a 2,2 0 0 1 -1.94,1.515 h -11.878 a 2,2 0 0 1 -1.9400001,-1.515 l -1.811,-7.242 z"
                            id="path6141"
                            style="stroke-width:0.727289;stroke-dasharray:none" />
                        <path
                            stroke-linecap="round"
                            d="m 13.316681,28.288868 v 2 m 6,-2 v 2 m -9,-6 4,-6 m 8,6 -4,-6"
                            id="path6143"
                            style="fill:#c9c9c9;fill-opacity:1;stroke-width:0.664522;stroke-dasharray:none"/></g></svg>
            </p></li>
        <li id="searchbar" class="desactivated">
            <form>
                <input type="text" placeholder="Rechercher...">
            </form>
            <div id="suggestions">
                <ol>
                    <li>
                        <a href="">Proposition 1 un peu long mais tkt frere</a>
                    </li>
                    <li>
                        <a href="">Proposition 1 un peu long mais tkt frere</a>
                    </li>
                    <li>
                        <a href="">Proposition 3</a>
                    </li>
                </ol>
            </div>

            <a id="trigger">
                <svg
                    width="106.46204mm"
                    height="98.880577mm"
                    viewBox="0 0 106.46204 98.880577"
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
                        showgrid="false" />
                    <defs
                        id="defs2"/>
                    <path
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="7.09105"
                        d="M 95.424611,90.613204 70.296091,66.592948 m 0,0 a 36.265358,34.665919 0 1 0 -51.28701,-49.024967 36.265358,34.665919 0 0 0 51.28701,49.024967 z"
                        id="path8127"
                        style="stroke-width:2.891;stroke-dasharray:none"/></svg>
            </a></li>
        <li><a href="fav">
                <svg
                    width="100.7298mm"
                    height="98.522308mm"
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
                        showgrid="false" />
                    <defs
                        id="defs2"/>
                    <path
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="8.40864"
                        d="m 30.136031,12.005427 c -11.16112,0 -20.2119996,9.689972 -20.2119996,21.645034 0,9.650636 3.5370896,32.555017 38.3542396,55.708656 a 3.9817527,4.3071444 0 0 0 4.13935,0 c 34.81715,-23.153639 38.35423,-46.05802 38.35423,-55.708656 0,-11.955062 -9.05102,-21.645034 -20.21199,-21.645034 -11.16112,0 -20.21199,13.118208 -20.21199,13.118208 0,0 -9.05088,-13.118208 -20.21184,-13.118208 z"
                        id="path8186"
                        style="stroke-width:2.509;stroke-dasharray:none"/></svg>
            </a></li>
    </div>
</nav>