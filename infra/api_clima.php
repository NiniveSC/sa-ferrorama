<?php

function buscarClimaAtual(): array
{
    $latitude = -26.3045;
    $longitude = -48.8456;
    $url = "https://api.open-meteo.com/v1/forecast?latitude={$latitude}&longitude={$longitude}&current=temperature_2m,weather_code&timezone=auto&forecast_days=1";

    $context = stream_context_create([
        'http' => [
            'timeout' => 12,
            'ignore_errors' => true,
        ],
    ]);

    $resposta = @file_get_contents($url, false, $context);

    if ($resposta === false || empty($resposta)) {
        return [
            'erro' => 'Não foi possível consultar o clima no momento. Tente novamente mais tarde.',
        ];
    }

    $dados = json_decode($resposta, true);

    if (!is_array($dados) || empty($dados['current'])) {
        return [
            'erro' => 'A resposta da API de clima não foi recebida corretamente.',
        ];
    }

    $codigoClima = (int) ($dados['current']['weather_code'] ?? 0);
    $codigoParaDescricao = [
        0 => 'Céu limpo',
        1 => 'Predominantemente ensolarado',
        2 => 'Parcialmente nublado',
        3 => 'Nublado',
        45 => 'Nevoeiro',
        48 => 'Nevoeiro com gelo',
        51 => 'Garoa leve',
        53 => 'Chuvisco',
        55 => 'Chuvisco forte',
        56 => 'Garoa gelada',
        57 => 'Garoa gelada forte',
        61 => 'Chuva leve',
        63 => 'Chuva moderada',
        65 => 'Chuva forte',
        66 => 'Chuva gelada',
        67 => 'Chuva gelada forte',
        71 => 'Neve leve',
        73 => 'Neve moderada',
        75 => 'Neve forte',
        77 => 'Granizo',
        80 => 'Chuva fraca',
        81 => 'Chuva intensa',
        82 => 'Chuva muito intensa',
        85 => 'Neve leve',
        86 => 'Neve forte',
        95 => 'Trovoada',
        96 => 'Trovoada com granizo',
        99 => 'Trovoada severa',
    ];

    $dataHora = $dados['current']['time'] ?? date('Y-m-d H:i:s');

    return [
        'temperatura' => round((float) ($dados['current']['temperature_2m'] ?? 0), 1),
        'condicao' => $codigoParaDescricao[$codigoClima] ?? 'Condição variável',
        'localizacao' => 'Joinville, SC',
        'atualizacao' => date('d/m/Y H:i', strtotime($dataHora)),
        'codigo_clima' => $codigoClima,
    ];
}
