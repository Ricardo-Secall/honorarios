function valida_input_monto(campo){
    var valid = /^\d{0,10}(\.\d{0,2})?$/.test(campo.value),
        val = campo.value;
    
    if(!valid){
        console.log("Invalid input!");
        campo.value = val.substring(0, val.length - 1);
    }
}


function coleMessage(elemento, mensaje,tipo,desaparece=1){
    $(elemento).find(".alert").remove();
     $(elemento).append('<div class="alert ' + tipo + ' fade in" style="display:none"> <button type="button" class="close" data-dismiss="alert">×</button>' + mensaje +'</div>');

    //$(elemento).find("#alertcontent").html(mensaje);
    if (desaparece==1) {
        $(elemento).find(".alert").delay(200).show().fadeOut(3500);
    }else{
        $(elemento).find(".alert").show();
    };
    
}
   
function colePrompt(xtitle,xfield,xsize,xcallback,xbuttons){
    if(xsize==null){
        xsize="small"
    }
    if(xcallback==null){
        xcallback= function(){ /* your callback code */ }
    }
    if(xbuttons==null){
        xbuttons= {
        confirm: {
        label: 'Aceptar',
        className: 'btn-primary'
        }/*,
        cancel: {
        label: 'No',
        className: 'btn-default'
        }*/
       }
    }
    bootbox.prompt({ 
      size: xsize,
      title: xtitle,
      buttons: xbuttons,
      callback: xcallback
    })  
    $(".bootbox-form").prepend('<div class=" cole-help-block">' + xfield + '</div>');   
}

function coleAlert(xtitle,xmessage,xsize,xcallback,xbuttons){
    if(xsize==null){
        xsize="small"
    }
    if(xcallback==null){
        xcallback= function(){ /* your callback code */ }
    }
    if(xbuttons==null){
        xbuttons= {
        ok: {
        label: 'Ok',
        className: 'btn-primary'
        }
       }
    }
    bootbox.alert({ 
      size: xsize,
      title: xtitle,
      message: xmessage, 
      buttons: xbuttons,
      callback: xcallback
    })
}

function coleConfirm(xtitle,xmessage,xsize,xcallback,xbuttons){
    if(xsize==null){
        xsize="small"
    }
    if(xcallback==null){
        xcallback= function(){ /* your callback code */ }
    }
    if(xbuttons==null){
        xbuttons= {
        confirm: {
        label: 'Sí',
        className: 'btn-primary'
        },
        cancel: {
        label: 'No',
        className: 'btn-primary'
        }
       }
    }
    bootbox.confirm({ 
      size: xsize,
      title: xtitle,
      message: xmessage, 
      buttons: xbuttons,
      callback: xcallback
    })
}


function validaCelular(campo,valor) {
    switch(campo) {
        case "Venezuela":
            var re = new RegExp(/^(0426|0416|0414|0424|0412)\d{7}/);
            //if ((valor.match(re) && valor.length ==11) || valor==0  ) {
            if ((valor.match(re) && valor.length ==11) || valor==0  ) {
                return 1;
            } else {
                return 0;
            }
            break;
        case "Mexico":
        if (valor.length ==10 || valor==0) {
                return 1;
            } else {
                return 0;
            }
        case "Chile":
            break;
    }

}
