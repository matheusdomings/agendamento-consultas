$(function () {

    function Toast(text){
        Toastify({
            text: text,
            duration: 3000,
            newWindow: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            }
        }).showToast();
    }

    // Marcar consulta
    $('form[name="marcarConsulta"]').on('submit', function(event){

        event.preventDefault();
    
        var Form = $(this);

        Form.ajaxSubmit({
            url: '/paciente/agendamento',
            dataType: 'json',
            type: 'post',
            success: function(res){
                if(res.message){
                    Toast(res.message);
                }
                if(res.success){
                    var Intervalo = setTimeout(function(){
                        window.location.reload();
                    }, 1500);
                }
            },
            error: function(){
                Toast('Ops, ocorreu um erro. Atualize a página e tente novamente!');
            }
        });

    })

    // Marcar todas as notificações como lidas
    $('.btn-marcar-notificacoes').on('click', function(evento){
        evento.preventDefault();
        $.ajax({
            url: '/paciente/marcar-notificacoes',
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
            error: function(){}
        });
    })

    // Cancela o agendamento
    $('body').on('click', '.js_cancelar_agendamento', function(){
        Swal.fire({
            title: 'Confirma o cancelamento da consulta?',
            // input: 'textarea',
            // inputPlaceholder: 'Escreva o motivo do cancelamento aqui...',
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Sim, confirmo',
            confirmButtonColor: '#447CB9',
            showCancelButton: true,
            cancelButtonText: 'Não',
          }).then((result) => {
                if(result.isConfirmed) {
                    var scheduleId = $(this).attr('data-id');
                    $.ajax({
                        url: '/paciente/cancelar-agendamento',
                        type: 'PUT',
                        dataType: 'JSON',
                        data: {id: scheduleId},
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
	
});