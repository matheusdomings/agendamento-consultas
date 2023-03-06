<div class="modal fade" id="novaConsulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="" name="marcarConsulta">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Consulta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="MEDICO" class="col-form-label">Médico</label>
                    <select class="form-control" id="MEDICO" name="doctor_id">
                        {{ $doctors }}
                    </select>
                </div>
                <!-- <div class="border-top"></div> -->
                <div class="row">
                    <div class="form-group col-6">
                        <label for="DTCONSULTA" class="col-form-label">Data da Consulta</label>
                        <input type="date" class="form-control" id="DTCONSULTA" name="date_consult"></input>
                    </div>
                    <div class="form-group col-6">
                        <label for="HORACONSULTA" class="col-form-label">Hora da Consulta</label>
                        <!-- <input type="time" class="form-control" id="HORACONSULTA" name="hour_consult"/> -->
                        <select class="form-control" id="HORACONSULTA" name="hour_consult">
                            @for($i = 7; $i < 19; $i++)
                            <option>{{ (($i < 10)? '0'.$i: $i) }}:00</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="modal-footer pt-3 p-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Marcar Consulta</button>
                </div>
            </div>
        </form>
    </div>
</div>