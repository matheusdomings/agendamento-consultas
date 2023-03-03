<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Agendamentos - 3Wings</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->

        <link rel="stylesheet" href="https://kit.fontawesome.com/a8638806a4.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" crossorigin="anonymous">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('/widgets/jquery/jquery-ui.theme.css') }}" rel="stylesheet">
        <link href="{{ asset('/widgets/jquery/jquery-ui.structure.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style-dash.css') }}" rel="stylesheet">
        <!-- Toastify -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    </head>
    <body>
        <!-- HEADER -->
        <nav class="navbar navbar-expand-lg d-flex justify-content-between">
            <div class="container">
                <div class="d-flex">
                    <img src="https://cdn-icons-png.flaticon.com/512/2994/2994480.png" alt="Logo" width="40px">
                    <p class="navbar-brand mb-0 ml-3">3Wings Agendamentos</p>
                </div>
                <div class="opcoes-header">

                    @if(Auth::user()->type == 1)
                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown d-flex justify-content-evenly" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-bell"></i>
                            @if(count(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications) > 0)
                            <span class="translate-middle badge rounded-pill bg-danger">
                                {{ count(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications) }}
                            </span>
                            @endif
                        </button>
                        <div class="dropdown-menu">
                            @foreach(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications as $notification)
                            <a class="dropdown-item" href="#">{{ $notification->data['message'] }}</a>
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Marcar como lidas</a>
                        </div>
                    </div>
                    @endif

                    <form action="/logout" name="Logout">
                        <button type="submit" class="btn btn-light my-2 my-sm-0">
                            Sair
                            <i class="fa-solid fa-arrow-right-from-bracket text-danger"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container">

            @yield('conteudo')

        </div>
        <footer class="border-top">
            <p class="py-2">© <?= date('Y');?> Matheus Domingos</p>
        </footer>

        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a8638806a4.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> -->


        <script src="{{ asset('/widgets/jquery/jquery-ui.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/plugins/jquery.mask.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/helpers.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/autenticacao.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/admin.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/paciente.js') }}" crossorigin="anonymous"></script>
        <!-- Toastify -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <!-- Form -->
        <script src="https://malsup.github.io/jquery.form.js"></script> 
    </body>
</html>