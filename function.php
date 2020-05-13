<?php

function Random($nbr,$Tab) {
    shuffle($Tab);
    $chaine = [];

    for ($i=0; $i<$nbr; $i++) {
        $chaine[]= $Tab[$i];
    }
    return $chaine;

}
