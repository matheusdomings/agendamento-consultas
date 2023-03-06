$(function() {

    // Cancela o agendamento
    $('body').on('click', '.js_cancelar_agendamento_admin', function(){
        Swal.fire({
            title: 'Cancelar Consulta',
            input: 'textarea',
            inputPlaceholder: 'Escreva o motivo do cancelamento aqui...',
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Confirmar',
            confirmButtonColor: '#447CB9',
            showCancelButton: true,
            cancelButtonText: 'Fechar',
          }).then((result) => {
                if(result.isConfirmed) {
                    var scheduleId = $(this).attr('data-id');
                    $.ajax({
                        url: '/administrativo/cancelar-agendamento',
                        type: 'PUT',
                        dataType: 'JSON',
                        data: {message: result.value, id: scheduleId},
                        success: function(res){
                            if(res.success){
                                $('#tabela-agendamentos').DataTable().row('#consulta_' + scheduleId).remove().draw()
                            }
                            Swal.fire(res.message);
                        },
                        error: function(){
                            Toast('Ops, ocorreu um erro. Atualize a página e tente novamente!');
                        }
                    });
                }
          });
    });

    // Marcar todas as notificações como lidas
    $('.btn-marcar-notificacoes').on('click', function(evento){
        evento.preventDefault();
        $.ajax({
            url: '/administrativo/marcar-notificacoes',
            type: 'PUT',
            dataType: 'JSON',
            success: function(res){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                var Intervalo = setTimeout(function(){
                    window.location.reload();
                }, 1600);
            },
            error: function(){
                Toast('Ops, ocorreu um erro. Atualize a página e tente novamente!');
            }
        });
    })

});