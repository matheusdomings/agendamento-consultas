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
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data/Hora</th>
                <th scope="col">Médico</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < 5; $i++)
            <tr>
                <th scope="row">{{ $i + 1 }}</th>
                <td>12/12/23 08:00</td>
                <td>Matheus Henrique Domingos da Silva</td>
                <td>
                    <div class="btn-group">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
    
</div>

<!-- MODAL DE NOVA CONSULTA -->
<x-modal-nova-consulta />
@endsection