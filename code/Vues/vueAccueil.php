<section class="a_propos">
        <p>
            Salut, c'est Vanessa Maurel plus connue sous le nom de Vanéstarre !<br/>
            Tu te trouves sur mon réseau social. <br/>
            <em>Enjoy !</em>
        </p>
    </section>


        <div class="container_msg">

<?php

if (isset($A_vue['corps']))
{
    echo $A_vue['corps'];
}

?>
        </div>
        <section class="rechercheTag">
            <form  action="index.php?" method="get">
                <input type="hidden" name="c" value="Recherche">
                <input type="hidden" name="a" value="Afficher">
                <input type="hidden" name="page" value="1">
                <h1>Rechercher</h1>
                <input type="search" name="tag" placeholder="&#946;Tag">
                <select name="tri">
                    <option value="defaut">defaut</option>
                    <option value="recent">recent</option>
                </select>
                <input type="submit" value="loupe">
            </form>
        </section>





