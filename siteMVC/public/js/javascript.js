

$(document).ready(function(){

	 var DIRPAGE = "http://" + document.location.hostname + "/siteMVC/";
	 

	$('#formSelect').on('submit', function(event) {
           event.preventDefault();
           var  dados = $(this).serialize();

           $.ajax({

           	url: DIRPAGE + 'cadastro/seleciona',
           	method: 'post',
           	dataType:  'html',
           	data: dados,
           	success: function(dados) {
                $('.resultado').html(dados);
           	}

           })
	})
})