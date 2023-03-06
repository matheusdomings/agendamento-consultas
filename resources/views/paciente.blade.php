@extends('components.master')

@section('conteudo')
<div class="content-paciente">

    <div class="header d-flex justify-content-between">
        <div class="titulo-agendadas mt-4">
            <h4>Consultas agendadas</h4>
            <p>Listagem com as últimas consultas agendadas</p>
        </div>
        <button class="btn btn-dark my-auto" data-toggle="modal" data-target="#novaConsulta">
            <i class="fa-solid fa-plus mr-2"></i>
            Nova Consulta
        </button>
    </div>
    
    <div class="card card-tabela-agendamentos p-3 bg-light">
        <table class="table table-hover" id="tabela-agendamentos">
            <thead>
                <tr>
                <th scope="col">Data</th>
                <th scope="col">Médico</th>
                <th scope="col" style="max-width: 60px;">Opções</th>
                </tr>
            </thead>
            <tbody>
                @if(count($schedules) > 0)
                    @foreach($schedules as $key => $schedule)
                    <tr id="consulta_{{ $schedule->id }}">
                        <td>{{ date('d/m/Y H:i', strtotime($schedule->date_consult)) }}</td>
                        <td>{{ Helper::getNameById($schedule->doctor_id) }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger js_cancelar_agendamento" data-id="{{$schedule->id}}"><i class="fa-solid fa-ban"></i></button>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    
</div>

<!-- MODAL DE NOVA CONSULTA -->
<x-modal-nova-consulta>
    <x-slot name="doctors">
        @if($doctors)
            @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ Helper::getNameById($doctor->id) }}</option> 
            @endforeach
        @endif   
    </x-slot>
</x-modal-nova-consulta>
@endsection