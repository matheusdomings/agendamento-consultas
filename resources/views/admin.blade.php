@extends('components.master')

@section('conteudo')
<div class="content-admin">

    <div class="row mt-4 cards-pacientes">
        <div class="col-4 card-pacientes">
            <div class="card text-white bg-light mb-3">
                <div class="card-header text-dark">Pacientes Agendados</div>
                <div class="card-body text-dark">
                    <h5 class="card-title">Total</h5>
                    <p class="card-text">22</p>
                </div>
            </div>
        </div>
        <div class="col-4 card-pacientes">
            <div class="card text-white bg-light mb-3">
                <div class="card-header text-dark">Pacientes Agendados</div>
                <div class="card-body text-dark">
                    <h5 class="card-title">Hoje</h5>
                    <p class="card-text">22</p>
                </div>
            </div>
        </div>
        <div class="col-4 card-pacientes">
            <div class="card text-white bg-light mb-3">
                <div class="card-header text-dark">Pacientes Agendados</div>
                <div class="card-body text-dark">
                    <h5 class="card-title">Esta semana</h5>
                    <p class="card-text">12</p>
                </div>
            </div>
        </div>
    </div>

    
    <table class="table table-hover" id="teste">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Horário</th>
            <th scope="col">Paciente</th>
            <th scope="col" style="max-width: 60px;">Opções</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < 5; $i++)
            <tr>
                <th scope="row">1</th>
                <td>08:00</td>
                <td>Matheus Henrique Domingos da Silva</td>
                <td>
                    <div class="btn-group">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></button>
                        </div>
                    </div>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
    
    @if(1 == 2)
    <div class="content-agendamentos">
        <div class="box-listagem">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < 5; $i++)
                    <tr>
                        <th scope="row">1</th>
                        <td>08:00</td>
                        <td>Otto</td>
                        <td>Otto</td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="box-calendario" id="calendario"></div>
    </div>
    @endif
    

</div>

@endsection