<?php

function consultarCepBrasil(string $cep): array
{
    $cepSanitizado = preg_replace('/\D/', '', trim($cep));

    if (strlen($cepSanitizado) !== 8 || !ctype_digit($cepSanitizado)) {
        return [
            'status' => 'erro',
            'mensagem' => 'CEP inválido. Informe um valor com 8 dígitos.',
        ];
    }

    $url = "https://viacep.com.br/ws/{$cepSanitizado}/json/";
    $context = stream_context_create([
        'http' => [
            'timeout' => 12,
            'ignore_errors' => true,
        ],
    ]);

    $resposta = @file_get_contents($url, false, $context);

    if ($resposta === false || empty($resposta)) {
        return [
            'status' => 'erro',
            'mensagem' => 'Não foi possível consultar o CEP neste momento. Tente novamente mais tarde.',
        ];
    }

    $dados = json_decode($resposta, true);

    if (!is_array($dados)) {
        return [
            'status' => 'erro',
            'mensagem' => 'A API de CEP respondeu em um formato inválido.',
        ];
    }

    if (!empty($dados['erro'])) {
        return [
            'status' => 'erro',
            'mensagem' => 'CEP não encontrado. Verifique o número informado.',
        ];
    }

    return [
        'status' => 'sucesso',
        'cep' => $dados['cep'] ?? $cepSanitizado,
        'logradouro' => $dados['logradouro'] ?? '',
        'bairro' => $dados['bairro'] ?? '',
        'cidade' => $dados['localidade'] ?? '',
        'estado' => $dados['uf'] ?? '',
        'complemento' => $dados['complemento'] ?? '',
    ];
}
