<?php

function limparTexto($valor)
{
    return trim(strip_tags((string) $valor));
}

function limparEmail($valor)
{
    return strtolower(limparTexto($valor));
}

function valorIntSegura($valor)
{
    $valor = filter_var($valor, FILTER_VALIDATE_INT);
    return $valor === false ? null : (int) $valor;
}

function valorFloatSegura($valor)
{
    $valor = str_replace(',', '.', (string) $valor);
    return is_numeric($valor) ? (float) $valor : null;
}

function textoValido($valor, $min = 1, $max = 255)
{
    $valor = limparTexto($valor);

    if ($valor === '') {
        return false;
    }

    if (mb_strlen($valor) < $min || mb_strlen($valor) > $max) {
        return false;
    }

    return preg_match('/^[\pL\pN\s\.\-_,\/()]+$/u', $valor) === 1;
}

function descricaoValida($valor, $max = 500)
{
    $valor = limparTexto($valor);

    if ($valor === '') {
        return true;
    }

    if (mb_strlen($valor) > $max) {
        return false;
    }

    return preg_match('/^[\pL\pN\s\.\-_,;:!\/()]+$/u', $valor) === 1;
}
