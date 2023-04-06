<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function operation ( int $valor1, int $valor2, string $operacao = 'todas'){
        switch ($operacao){
            case $operacao == 'todas';
                echo 'Soma = ' . $valor1 + $valor2 . '<br>Subtração = ' . $valor1 - $valor2 . '<br>Multiplicação = ' . $valor1 * $valor2. '<br>Divisão = ' . $valor1 / $valor2;
                break;
            case $operacao == 'soma';
                echo 'Soma = ' . $valor1 + $valor2;
                break;
            case $operacao == 'subtracao';
                echo 'Subtração = ' . $valor1 - $valor2;
                break;
            case $operacao == 'multiplicacao';
                echo 'Multiplicação = ' . $valor1 * $valor2;
                break;
            case $operacao == 'divisao';
                echo 'Divisão = ' . $valor1 / $valor2;
                break;
            default:
                echo 'Operção não encontrada!!!';
        }
    }
}
