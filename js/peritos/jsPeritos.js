
$(document).ready(function() {
//    cboZonaGet();
          $(".chzn-select").chosen();
                
                // REVALIDA CON COMBO CON BUSQUEDA
                $("#Perito").bind({
                    change: function(){                        
                        $('#Perito').valid();
                    }
                });
    
    soloNumeros("#txt_ins_exp_nrodocumento","keypress");
        
    $("#btn_busca_persona").bind({
        click: function(){ 
       
            
            if ($('#txt_ins_exp_nrodocumento').val()){                            
                $("#txt_ins_exp_nrodocumento").attr("disabled", "disabled");
                $("#c_list_data_remitente").html("");
                
                                
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
                
                timer=setTimeout("get_datos_remitente('"+$('#cbo_parametro_categoria').val()+"','"+$('#txt_ins_exp_nrodocumento').val()+"')",800);
                $("#frm_ins_solicitud").hide();
            }
        }
    });
    
    
    $('#txt_ins_exp_nrodocumento').keydown(function(event){
        if (event.keyCode == '13'){ 
            if ($('#txt_ins_exp_nrodocumento').val()){                            
                $("#txt_ins_exp_nrodocumento").attr("disabled", "disabled");
                $("#c_list_data_remitente").html("");
                
                
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
                timer=setTimeout("get_datos_remitente('"+$('#cbo_parametro_categoria').val()+"','"+$('#txt_ins_exp_nrodocumento').val()+"')",800);
                
            }
        }
    });
});
  
function get_datos_remitente(parametro,Documento){
    $.ajax({
        type: "POST",
        url: "peritos/RemitenteData/"+parametro+"/"+Documento,
        cache: false,
        success: function(data) {
            if(data!=""){
                $("#preload").html("");
                $("#txt_ins_exp_nrodocumento").removeAttr("disabled");
                $("#c_list_data_remitente").html(data);
                $("#c_list_data_remitente").hide().fadeIn(250); 
                                
  
            }
            else{
                $("#preload").html("");
                $("#txt_ins_exp_nrodocumento").removeAttr("disabled");
                msgAviso("#c_list_data_remitente");
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}

function load_frm_datos_complementarios(nPerId){
    $.ajax({
        type: "POST",
         url: "peritos/load_frm_datos_complementarios/"+nPerId,
        
        cache: false,
        
        success: function(data) {
            $("#c_frm_perito_ins").html(data);
            $("#c_frm_perito_ins").hide().fadeIn(250);
            $("#c_label_tipoemp").html("Datos");
        },
        error: function() { 
            alert("error");
        }              
    });

} 

function MostrarfechaActual(cNotFecha, Todos){
    if(Todos=='ALL'){
        $("#"+cNotFecha).datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 0,
            isRTL: false,
            yearRange: '1950:2012',
            showMonthAfterYear: false,
            yearSuffix: ''
        });
    }else if(Todos=='NA'){
        $("#"+cNotFecha).datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 0,
            isRTL: false,
     
            showMonthAfterYear: false,
            yearSuffix: '',
            minDate: new Date()
        });
    }
    var myDate = new Date();
//    $("#"+cNotFecha).datepicker('setDate',myDate);
}
function tipodocumento(){
    
    var tipodocumento = $('#cbo_parametro_categoria').val();
    if(tipodocumento=='1'){
       
        $("#txt_ins_exp_nrodocumento").attr("maxlength","8");
        $("#txt_ins_exp_nrodocumento").attr("minlength","8");
        $('#txt_ins_exp_nrodocumento').val("");
       
        document.getElementById("txt_ins_exp_nrodocumento").minLength="8";
        document.getElementById("txt_ins_exp_nrodocumento").maxLength="8";
        
    }else
    {
         
        $("#txt_ins_exp_nrodocumento").attr("maxlength","11");
        $("#txt_ins_exp_nrodocumento").attr("minlength","11");
        $('#txt_ins_exp_nrodocumento').val("");
            
        document.getElementById("txt_ins_exp_nrodocumento").maxLength="11";
        document.getElementById("txt_ins_exp_nrodocumento").minLength="11";
    }
        


}

function SolicitudDel(id){
    var rdn=Math.random()*11;
    $.post('peritos/SolicitudDel/'+id, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("Se ha eliminado la solicitud correctamente.","e");
            get_page('peritos/load_qry_peritos/','qry_peritos');
        }else{
            mensaje("Error inesperado, no se ha podido eliminar a la persona!","e");
        }                        
    });
    return false;
}
    
    
    



        

        








