<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{
    public function name (string $name, string $lastName = null){
        echo '<h1>Olá '.$name .' '.$lastName.' seja bem vindo ao meu site!</h1>';
    }
}
