

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

  

  $(document).on('click', '.imgRel', function() {
    var ImgRel = $(this).attr('rel')

    $.ajax({
      url: DIRPAGE + 'cadastro/puxaDB/' + ImgRel,
      method: 'post',
      dataType: 'html',
      data: {'id': ImgRel},
      success: function(data) {
         $('.resultadoFormulario').html(data)
      }
    })
  })


})

