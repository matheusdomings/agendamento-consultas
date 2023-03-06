@extends('components.master')

@section('conteudo')
<div class="content-admin">

    <div class="row mt-4 cards-pacientes">
        <div class="col-12 col-md-4 card-pacientes">
            <div class="card text-white bg-light mb-3">
                <div class="card-header">Pacientes Agendados</div>
                <div class="card-body bg-light text-dark">
                    <h5 class="card-title">Total</h5>
                    <p class="card-text">{{ count($schedules['all']) }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 card-pacientes">
            <div class="card text-white bg-light mb-3">
                <div class="card-header">Pacientes Agendados</div>
                <div class="card-body bg-light text-dark">
                    <h5 class="card-title">Hoje</h5>
                    <p class="card-text">{{ count($schedules['today']) }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 card-pacientes">
            <div class="card text-white mb-3">
                <div class="card-header">Pacientes Agendados</div>
                <div class="card-body bg-light text-dark">
                    <h5 class="card-title">Próximos 7 dias</h5>
                    <p class="card-text">{{ count($schedules['next_days']) }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card card-tabela-agendamentos p-3 bg-light">
        <table class="table table-hover" id="tabela-agendamentos">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Paciente</th>
                    <th scope="col" style="max-width: 60px;">Opções</th>
                </tr>
            </thead>
            <tbody>
                @if(count($schedules['all']) > 0)
                @foreach($schedules['all'] as $key => $schedule)
                <tr id="consulta_{{ $schedule->id }}">
                    <td>{{ date('d/m/Y H:i', strtotime($schedule->date_consult)) }}</td>
                    <td>{{ Helper::getNameById($schedule->patient_id) }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger js_cancelar_agendamento_admin" data-id="{{$schedule->id}}"><i class="fa-solid fa-ban"></i></button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
        
    </div>

@endsection