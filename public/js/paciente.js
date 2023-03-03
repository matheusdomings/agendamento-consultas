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
                console.log(res)
            },
            error: function(){
                Toast('Ops, ocorreu um erro. Atualize a página e tente novamente!');
            }
        });

    })
	
});