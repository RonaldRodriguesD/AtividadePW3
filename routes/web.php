<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{nome}/{sobreNome?}', function ( string $nome, string $sobreNome = null){

    echo '<h1>Olá ' . $nome .' '. $sobreNome . ', bem vindo ao meu site!<h1>';

})
->where(['nome' => '[A-Za-z]{3,50}','sobreNome' => '[A-Za-z]{3,50}'])
->name('Nomes');

Route::get('/conta/{numero1}/{numero2}/{operação?}', function ( int $numero1, int $numero2, string $operacao = 'todas'){

    switch($operacao){
        case $operacao == 'todas';
            echo '<p>Soma = '. $numero1 + $numero2 . '<br>Subtração = ' . $numero1 - $numero2 . '<br>Multiplicação = ' . $numero1 * $numero2 . '<br>Divisão = ' . $numero1 / $numero2 . '</p>';
            break;
        case $operacao == 'soma';
            echo '<p>Soma = ' . $numero1 + $numero2 . '</p>';
            break;
        case $operacao == 'subtracao';
            echo '<p>Subtração = ' . $numero1 - $numero2 . '</p>';
            break;
        case $operacao == 'multiplicacao';
            echo '<p>Multiplicação = ' . $numero1 * $numero2 . '</p>';
            break;
        case $operacao == 'divisao';
            echo '<p>Divisão = '  . $numero1 / $numero2  . '</p>';
            break;
        default:
            echo '<h1>Operação não encontrada!</h1>';
    }

})
->where(['numero1' => '[1-9]+','numero2' => '[1-9]+'])
->name('Contas');

Route::get('/idade/{ano}/{mes?}/{dia?}', function ( int $ano, int $mes = null, int $dia = null){
    if ($mes == null && $dia == null && $ano > 2023){
        echo '<h1>Data inválida</h1>';
    } else if ($mes == null && $dia == null && $ano < 2023){
        echo '<h1>Você tem '. 2023 - $ano .' anos!</h1>';
    } else if ($dia == null && $mes > 12 && $ano > 2023){
        echo '<h1>Data inválida</h1>';
    } else if ($dia == null && $mes > 3 && $ano < 2023){
        echo '<h1>Você tem '. 2022 - $ano .' anos!</h1>';
    } else if ($dia == null && $mes < 3 && $ano < 2023){
        echo '<h1>Você tem '. 2023 - $ano .' anos e '. 3-$mes.' meses!</h1>';
    } else if ($dia > 31 && $mes > 12 && $ano > 2023){
        echo '<h1>Data inválida</h1>';
    } else if ($dia > 30 && $mes > 3 && $ano < 2023){
        echo '<h1>Você tem '. 2023 - $ano .' anos!</h1>';
    } else if ($dia > 30 && $mes < 3 && $ano < 2023){
        echo '<h1>Você tem '. 2023 - $ano .' anos e '. 3-$mes.' meses!</h1>';
    } else if ($dia < 30 && $mes < 3 && $ano < 2023){
        echo '<h1>Você tem '. 2023 - $ano .' anos, '. 3-$mes.' meses e '. 30-$dia .' dias!</h1>';
    } else {
        echo '<h1>Data inválida</h1>';
    }
})
->where(['ano' => '[1-9]+{4}','mes' => '[1-9]+{2}','dia' => '[1-9]+{2}'])
->name('Idade');
