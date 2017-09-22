<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
* Excel library for Code Igniter applications
* Based on: Derek Allard, Dark Horse Consulting, www.darkhorse.to, April 2006
* Tweaked by: Moving.Paper June 2013
*/
class Export{
    
    function to_excel($array,$titulo) {
//        header('Content-type: application/vnd.ms-excel');
//        header('Content-Disposition: attachment; filename='.$filename.'.xls');

        //Declaremos el encabezado de la tabla
        $tbHtml = "<table border='2' cellpadding='0' cellspacing='0' bordercolor='#000000' style='background:#fcefa1;'>
<caption><h1>".$titulo."</h1></caption>                     
<header>
                       <tr>";
        $h = array();
        foreach($array as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                 $h[] = $key;   
                }
                }
                }

                foreach($h as $key) {
                    $key = ucwords($key);
                    $tbHtml .= '<th style="color:red;">'.$key.'</th>';
                }
                $tbHtml .= '</tr>';
                $tbHtml .= "</header>";
                
                foreach($array as $row){
                    $tbHtml .= '<tr>';
                    foreach($row as $val)
                         $tbHtml .= $this->writeRow($val);   
                }
                $tbHtml .= '</tr>';
                
        return $tbHtml.'</table>';
        }
        
    function writeRow($val) {
                return '<td>'.utf8_decode($val).'</td>';              
    }
}
                 
?>
