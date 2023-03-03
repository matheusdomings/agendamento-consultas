<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index(){
        return view('login');
    }

    // Realiza o login
    public function login(Request $Request){

        $dataReturn = ['message' => false, 'redirect' => false];

        // Valida os dados enviados
        if(!$Request->CPF || !$Request->SENHA){
            $dataReturn['message'] = 'Preencha CPF e/ou SENHA e tente novamente!';
            return $dataReturn;
        }

        // Remove os pontos (.) e o hífen (-) do CPF enviado
        $CPF = str_replace(['.','-'], '', $Request->CPF);
        
        if (Auth::attempt(['cpf' => $CPF, 'password' => $Request->SENHA])) {
            // Type: 1 - Admin; 2 - Paciente
            if(Auth::user()->type == 1){
                $dataReturn['message'] = 'Olá, seja bem vindo(a) '. Str::before(Auth::user()->name, ' ') .'.';
                $dataReturn['redirect'] = '/administrativo';
            }
            if(Auth::user()->type == 2){
                $dataReturn['message'] = 'Olá, seja bem vindo(a) '. Str::before(Auth::user()->name, ' ') .'.';
                $dataReturn['redirect'] = '/paciente';
            }
        }else{
            $dataReturn['message'] = 'CPF ou SENHA inválida!';
        }
        return $dataReturn;
    }

    // Realiza o logout
    public function logout(Request $Request){

        $dataReturn = ['message' => false, 'redirect' => false];
        $nameUser = Str::before(Auth::user()->name, ' ');

        Auth::logout();

        $dataReturn['message'] = "Até logo, {$nameUser}!";
        $dataReturn['redirect'] = '/';

        return $dataReturn;

    }

}
