<?php $this->load->view('dashboard/header');?>
<title><?php echo $titulo?></title>

<script type="text/javascript" src='<?php echo URL_JS; ?>certificado/jsCertificados.js'></script>   
<div class="content">      
    <div class="row-fluid">    
      <div class="box">
            <div class="box-head">
                <h3>Módulo de Certificados de INFOCIP CIP-CDLL</h3>
            </div>
           <div class="box-content">

                <div id="Tabs_Certificado" >
                    <ul>
                          <li><a href="#pl" id="tab_certificadolistar">Curso</a></li>
                          <li><a href="#diplomado" id="tab_diplomadolistar">Diplomado</a></li>
                    </ul>
                    <div id="pl" style="height:auto">
                        <table>
                            <tr> 
                                <td><label id="lbl" class="control-label" for="c_cbo_evento_listar"><b>Cursos :</b></label></td>
                                <td>
                                        <select id="cbo_curso_listar"  class="chzn-select" name="cbo_curso_listar" onchange="listarHorario()" style="width:300px;">
                                            <option value="0">Seleccione Curso </option>
                                            <?php
                                            foreach ($curso as $curso) {
                                                ?>
                                                <option value="<?php echo $curso["nCurId"] ?>"><?php echo mb_convert_encoding($curso["cCurNombre"], 'UTF-8') ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select> 
                                    </td>
            
                            </tr> 
                           
                             <tr>
                                 <td><label id="lbl" class="control-label" for="c_cbo_horario_listar"><b>Horarios :</b></label></td>
                                 <td>
                                     <div id="c_cbo_horario_listar">
                                    	
                                 </div></td>
                              </tr>
                              
                               <tr>
                                 <td><br><label id="lbl" class="control-label" for="c_cbo_horario_listar"><b>Certificado para: </b></label></td>
                                 <td><br>
                                     <select id="tipoCertificado" name="tipoCertificado">
                                         <option value="alumno">Alumno </option>
                                         <option value="docente">Docente </option>
                                             
                                     </select>
                                 </td>
                              </tr>
                              
                              <tr>
                                     <td>&nbsp&nbsp<button class="btn btn-primary" id="busqueda_certificado" onclick="listarCertificados()">Buscar</button></td>
                       
                              </tr>
                             
                        </table>  
                        <div>
                            <div id="div_qry"></div>
                        </div>
                    </div>  
                    <div id="diplomado">
                        <table>
                             <tr> 
                                <td><label class="control-label" for="c_cbo_evento_listar"><b>Diplomados :</b></label></td>
                                <td>
                                        <select id="cbo_diplomado_listar"  class="chzn-select" name="cbo_diplomado_listar" onchange="listarHorarioDip()" style="width:300px;">
                                            <option value="0">Seleccione Diplomado </option>
                                            <?php
                                            foreach ($diplomado as $diplomado) {
                                                ?>
                                                <option value="<?php echo $diplomado["nCurId"] ?>"><?php echo mb_convert_encoding($diplomado["cCurNombre"], 'UTF-8') ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select> 
                                    </td>
            
                            </tr> 
                            <tr>
                                 <td><label id="lbldiplomado" class="control-label" for="c_cbo_horario_listar"><b>Horarios :</b></label></td>
                                 <td>
                                     <div id="c_cbo_listar_dip">
                                    	
                                 </div>
                                 </td>
                            </tr>
                            <tr>
                                 <td><br><label id="lbl" class="control-label" for="c_cbo_horario_listar"><b>Diploma para: </b></label></td>
                                 <td><br>
                                     <select id="tipolistadoDip">
                                         <option value="alumno">Alumno </option>
                                         <option value="docente">Docente </option>
                                             
                                     </select>
                                 </td>
                              </tr>
                            
                            <tr>
                                     <td>&nbsp&nbsp<button class="btn btn-primary" id="busqueda_certificadop" onclick="listarDiplomas()">Buscar</button></td>
                       
                            </tr>  
                        </table>     
                        
                        
                        <div id="div_qry_dip"></div>
                    </div>
                     
                </div>
               
           </div>
      </div>
        
    </div>
</div>
     
<?php $this->load->view('dashboard/footer');?>


