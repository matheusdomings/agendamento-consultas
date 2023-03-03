$(function () {
	
    $('#CPF').mask('000.000.000-00', {reverse: false});
	$.ajaxSetup(
        {
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    );

	// REALIZA LOGIN
	$('form[name="Login"]').on('submit', function(event){
			
        event.preventDefault();

        $.ajax({
            url: '/login',
            dataType: 'json',
            type: 'post',
            data: {CPF: $(this).find('input[name="CPF"]').val(), SENHA: $(this).find('input[name="SENHA"]').val()},
            success: function(res){

                if(res.message){
                    Toastify({
                        text: res.message,
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
                    
                if(res.redirect){
                    setTimeout(function(){
                        window.location.href = res.redirect
                    }, 2000);
                }
            },
            error: function(){
                Toastify({
                    text: 'Ops, ocorreu um erro. Atualize a página e tente novamente!',
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
        });
			
	});

	// REALIZA LOGOU
	$('form[name="Logout"]').on('submit', function(event){
			
        event.preventDefault();

        $.ajax({
            url: '/logout',
            dataType: 'json',
            type: 'post',
            success: function(res){
                if(res.message){
                    Toastify({
                        text: res.message,
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
                if(res.redirect){
                    setTimeout(function(){
                        window.location.href = res.redirect
                    }, 2000);
                }
            },
            error: function(){
                Toastify({
                    text: 'Ops, ocorreu um erro. Atualize a página e tente novamente!',
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
        });
			
	});
	
});