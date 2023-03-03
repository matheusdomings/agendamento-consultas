<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Agendamentos - 3Wings</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://kit.fontawesome.com/a8638806a4.css" crossorigin="anonymous">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Toastify -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <link href="{{ asset('/css/style-login.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="box-login">
                <img src="https://cdn-icons-png.flaticon.com/512/2994/2994480.png" alt="Icone de Login">
                <form class="mt-4" action="/login" name="Login">
                    @csrf
                    <div class="form-group">
                        <label for="CPF" class="input-label">CPF</label>
                        <input type="text" class="form-control" id="CPF" name="CPF" placeholder="Insira o seu CPF">
                    </div>
                    <div class="form-group">
                        <label for="SENHA" class="input-label">SENHA</label>
                        <input type="password" class="form-control" id="SENHA" name="SENHA" placeholder="Insira a sua senha">
                    </div>
                    <button class="btn btn-block mt-4">
                        ACESSAR 
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a8638806a4.js" crossorigin="anonymous"></script>
        <!-- Toastify -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script src="{{ asset('/js/plugins/jquery.mask.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/autenticacao.js') }}" crossorigin="anonymous"></script>
    </body>
</html>