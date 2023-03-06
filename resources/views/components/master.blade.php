<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Agendamentos - 3Wings</title>
        <link rel="shortcut icon" href="{{ asset('/images/clinic.png') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                <div class="d-flex titulo-header">
                    <img src="{{ asset('/images/clinic.png') }}" alt="Logo" width="40px">
                    <p class="navbar-brand mb-0 ml-3 d-none d-sm-flex">3Wings Agendamentos</p>
                </div>
                <div class="opcoes-header">

                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown d-flex justify-content-evenly" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-bell"></i>
                            @if(!empty(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications) && count(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications) > 0)
                            <span class="translate-middle badge rounded-pill bg-danger">
                                {{ count(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications) }}
                            </span>
                            @endif
                        </button>
                        <div class="dropdown-menu p-0">
                            <div class="notificacoes-titulo">
                                <p class="mb-0">Notificações</p>
                            </div>
                            <div class="dropdown-notificacoes">

                                @if(App\Models\User::findOrFail(Auth::user()->id)->type == 1 && !empty(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications))
                                    @foreach(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications as $notification)
                                    <div class="dropdown-item py-3">
                                        <p class="text-dark font-weight-bold mb-0">{{ $notification->data['message'] }}</p>
                                        <p class="text-dark mb-0"><span>Paciente:</span> {{ App\Models\User::findOrFail($notification->data['schedule']['patient_id'])->name }}</p>
                                        <p class="text-dark mb-0"><span>Horário:</span> {{ date('d/m/Y H:i', strtotime($notification->data['schedule']['date_consult'])) }}</p>
                                    </div>
                                    @endforeach
                                @endif

                                @if(App\Models\User::findOrFail(Auth::user()->id)->type == 2 && !empty(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications))
                                    @foreach(App\Models\User::findOrFail(Auth::user()->id)->unreadNotifications as $notification)
                                    <div class="dropdown-item py-3">
                                        <p class="text-dark font-weight-bold mb-0">Sua consulta foi cancelada!</p>
                                        <p class="text-dark mb-0"><span>Médico:</span> {{ App\Models\User::findOrFail($notification->data['schedule'][0]['doctor_id'])->name }}</p>
                                        <p class="text-dark mb-0"><span>Hora:</span> {{ date('d/m/Y H:i', strtotime($notification->data['schedule'][0]['date_consult'])) }}</p>
                                        <p class="text-dark mb-0"><span>Motivo:</span> {{ $notification->data['message'] }}</p>
                                    </div>
                                    @endforeach
                                @endif

                            </div>
                            <button class="btn btn-block btn-marcar-notificacoes text-uppercase rounded-0" href="#">Marcar como lidas</button>
                        </div>
                    </div>

                    <form action="/logout" name="Logout">
                        <button type="submit" class="btn btn-light btn-sair">
                            Sair
                            <i class="fa-solid fa-arrow-right-from-bracket text-dark"></i>
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

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a8638806a4.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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