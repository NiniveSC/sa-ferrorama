<?php

function ehAdministrador()
{
    return $_SESSION["id_perfil"] == 1;
}


