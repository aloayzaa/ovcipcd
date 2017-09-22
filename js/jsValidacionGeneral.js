
/******************************************************************************/
/*                        FUNCIONES PARA VALIDAR CAJAS                        */
/******************************************************************************/

// PERMITE SOLO NUMEROS, ADEMAS DESHABILITA PEGAR EN LA CAJA.
function soloNumeros(obj,evt){
    $(obj).bind(evt, function(e) { 
        return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true;
    })
    
    $(obj).on("paste",function(e){
        e.preventDefault();
    });
}

// PERMITE SOLO LETRAS Y ESPACIOS, ADEMAS DESHABILITA PEGAR EN LA CAJA.
function soloLetras(obj,evt) {
    $(obj).on(evt, function(event) {
        var regExp = /[A-Za-zÁÉÍÓÚÑáéíóúñ ]/g;  
        var key = String.fromCharCode(event.which);        
        if (event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || regExp.test(key)) {
            return true;
        }
        return false;
    });

    $(obj).on("paste",function(e){
        e.preventDefault();
    });
}


// QUITA UN EVENTO PREVIAMENTE 'BINDEADO'
function unbindAttr(obj,evt){
    $(obj).unbind(evt);
}

function letrasYnumeros(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[A-Za-zÑñ0-9]/; 
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function letrasnumerosguion(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[A-Za-zÑñ0-9-_]/; 
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function letras(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[A-Za-zÁÉÍÓÚÑáéíóúñ()\s_]/; 
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function formato_doc(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[0123456789\s-]/;
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function solodouble(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[123456789.1234567890]/;
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function solodireccion(e) { 
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " �����-abcdefghijklmn�opqrstuvwxyz _�#;,.:ABCDEFGHIJKLMN�OPQRSTUVWXYZ0123456789";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

function soloemail(e) { // 1
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "-abcdefghijklmn�opqrstuvwxyz_@�.ABCDEFGHIJKLMN�OPQRSTUVWXYZ0123456789";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


function solousuario(e) { // 1
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "-abcdefghijklmn�opqrstuvwxyz_@�.ABCDEFGHIJKLMN�OPQRSTUVWXYZ0123456789";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
 
}

function ClaveUsuario(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if (e.keyCode==8) return true;
    if (e.keyCode==9) return true;
    if (e.keyCode==35) return true;
    if (e.keyCode==36) return true;
    if (e.keyCode==37) return true;
    if (e.keyCode==38) return true;
    if (e.keyCode==39) return true;
    if (e.keyCode==40) return true;
    if (e.keyCode==46) return true;
    if (e.keyCode==1) return true;
    patron =/[A-Za-zÁÉÍÓÚÑáéíóúñ()-123456789.@_]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te);
}
 
function locaciones(e) { // 1
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "-1234567890.";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
 
function titulos(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " �����abcdefghijklmn�opqrstuvwxyzABCDEFGHIJKLMN�OPQRSTUVWXYZ1234567890.#";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
	 
	 
function dinero(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890.";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
	 
function documentos(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " abcdefghijklmn�opqrstuvwxyzABCDEFGHIJKLMN�OPQRSTUVWXYZ1234567890.-/";
    especiales = [1,8,9,36,37,39,46];
    
    disables= [16];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
    
    tecla_disabled = true
    for(var i in disables){
        if(key == disables[i]){
            disables = false;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}




function solodecimales(e) { // 1
    
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    if (tecla==9) return true; 
    if (e.keyCode==9) return true;
    patron = /[0123456789.1234567890]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}