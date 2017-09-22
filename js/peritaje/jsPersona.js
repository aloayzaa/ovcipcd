

$(function(){
    
        get_page('persona/load_ins_view_persona/','div_ins')

    $('#Tabs_Persona').tabs();  




$('#tab_personalistar').click(function(){
selectInCombo('Lista_Personas','Seleccione un Listado');
document.getElementById("div_qry").innerHTML="";  
$("#buscador").hide();
 $("#persona_natural").hide();
       $("#persona_juridica").hide();
              });   
    $("#Lista_Personas").change(function() {
          var cTipOpcion= $(this).val(); 
        if(cTipOpcion=='0'){           
        
       $("#buscador").hide();
       $("#persona_natural").hide();
       $("#persona_juridica").hide();
document.getElementById("div_qry").innerHTML="";            
            
        }else{
            if(cTipOpcion=='1'){ 
                 
            $("#buscador").show();
            $("#persona_natural").show();
            $("#persona_juridica").hide();
                               }  
            else{
            $("#buscador").show();
            $("#persona_juridica").show();
            $("#persona_natural").hide();
             }
            }
            
            })

               
     
    $("#btn_fnd_persona").bind('click', function() {   
        var cTipOpcion = $('#Lista_Personas').val();
        
        if(cTipOpcion=='0'){           
//         
//             
document.getElementById("div_qry").innerHTML="";            
            
        }else{
            if(cTipOpcion=='1'){  
              
              get_page('persona/load_listar_view_persona/',
             'div_qry',
             {'apellidos':$('#txt_fnd_personas').val()}
             
            ); 
                               }  
            else{
               
             get_page('persona/load_listar_view_persona_juridica/',
             'div_qry',
             {'apellidos':$('#txt_fnd_personas').val()}
            );
             }
            }
            
            })

radio('#radio_mat1');
     
       $('#radios_persona').buttonset();
    $('#radio_mat1').click(function(){
        get_page('persona/load_ins_view_persona/','div_ins')
              });
     $('#radio_mat2').click(function(){
        get_page('persona/load_ins_view_personajuridica/','div_ins')
              });         

});

   
function personaDel(nPerId){
    var rdn=Math.random()*11;
    $.post('persona/personaDel/'+nPerId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("Se ha eliminado la persona correctamente.","e");
            get_page('persona/load_listar_view_persona/','div_qry');
        }else{
            mensaje("Error inesperado, no se ha podido eliminar a la persona!","e");
        }                        
    });
    return false;
}
function selectInCombo(combo,val)
{
    for(var indice=0 ;indice<document.getElementById(combo).length;indice++)
    {
        if (document.getElementById(combo).options[indice].text==val )
            document.getElementById(combo).selectedIndex =indice;
    }
}



function personajuridicaDel(id){
    var rdn=Math.random()*11;
    $.post('persona/personajuridicaDel/'+id, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("Se ha eliminado la persona juridica correctamente.","e");
            get_page('persona/load_listar_view_persona_juridica/','div_qry');
        }else{
            mensaje("Error inesperado, no se ha podido eliminar a la persona!","e");
        }                        
    });
    return false;
}

function radio(obj){
$(obj).attr('checked','checked');
}
function personaVer(nPerID){
    alert("verifica"+nPerID);
    // set_popup(url+100,title,alto,ancho);    
    return false;
}
function personabaja(nPerID){
    alert("baja"+nPerID);
    // set_popup(url+100,title,alto,ancho);
    return false;
}

