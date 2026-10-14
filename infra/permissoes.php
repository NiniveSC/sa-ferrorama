<?php

function ehAdministrador()
{
    return isset($_SESSION["id_perfil"]) && (int) $_SESSION["id_perfil"] === 1;
}

function usuarioLogado()
{
    return isset($_SESSION["id_administrador"]);
}


