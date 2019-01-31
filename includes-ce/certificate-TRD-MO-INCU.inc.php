<?php
function trd_em_certificate_mo_incu($link, $row, $rowDt, $url, $implant, $fac, $reason) {
	$prefix = json_decode($rowDt['prefix'], true);
?>
<div class="container-c-des" style="width:790px;">
<?php

/*--------------------STYLE--------------------*/
$main_c_des='width: 770px; height: auto; margin-top:55px; margin-left:15px; padding: 0;';

$message='margin: 0; padding: 0 0 0 10px; text-align: left; font-weight: bold; font-size: 11px; font-family: Arial;';
$message2='font-weight: bold; font-size: 13px; font-family: Arial; padding: 0; text-align: center;'; 
$header='widows: auto; height: 100px;';
$header_img='margin: 0;	float: left;';
$header_h1='text-align: center;	margin-left:18px; font-weight: bold; font-size: 10px; font-family: Arial;';
$pag_2='margin-bottom /*\**/: 150px\9 ';
$pag_4='margin-bottom /*\**/: 170px\9 ';
$h1_s='text-align: center; font-weight: bold; font-size: 14px; font-family: Arial; margin: 0;';
$h4_s='text-align: center; font-weight: bold; font-size: 9px; font-family: Arial; margin: 0;';
$header_h4='text-align:center; margin: -5px 0 0 20px; float: center; font-weight: bold; font-size: 10px; font-family: Arial;';
$footer_h1='text-align: left;	font-weight: bold; font-size: 12px; font-family: Arial;';

$container_1='width: 770px; height: auto; margin: 0 0 5px 0;';
$h2='width: auto; height: auto; text-align: left; margin: 0; font-weight: normal; font-size: 9px; font-family: Arial; text-align:justify;';
$h2_s='width: auto; height: auto; text-align: left; margin: 0; font-weight: normal; font-size: 9px; font-family: Arial; text-align:center;';
$h2_s1='margin: 0 0 10px 40px; font-weight: normal; font-size: 12px; font-family: Arial;';

$content='width: 770px; height: auto; margin: 0 0 5px 0; padding: 0px 0px; font-weight: bold; font-size: 8px; font-family: Arial; text-align: left;'; 
$content2='text-align: center; font-weight: normal; font-size: 9px; font-family: Arial;';
$content3='text-align: center; font-weight: normal; font-size: 9px; font-family: Arial; border-top:1px solid #000;';

$h3='width: auto; height: auto;	font-weight: bold; font-size: 10px; font-family: Arial; margin: 0;';
$h3_s='font-weight: bold; font-size: 8px; font-family: Arial;';

$h4='width: 100%; height: auto;	font-weight: bold; font-size: 10px; font-family: Arial; margin: 0; text-align:center;';
$h4_s='width: 100%; height: auto; margin:8px; font-weight:normal; font-size: 10px; font-family: Arial; text-align:center;';

/*-----------Contenido 1-----------*/
$table='width: 100%; font-weight: normal; font-size: 10px; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;';
$table_p='font-weight: normal; font-size: 9px; font-family: Arial; text-align: justify; margin: 2px 0;'; 
$tab='text-indent: 20px;';
$title_regla=' margin-left: 17px; font-weight: normal; text-decoration: underline;';
$title_regla1=' margin-left: 5px; font-weight: normal; text-decoration: none;';
$table_borde_tr_td='border-bottom: 1px dashed #080808; width:100%;';
$table_borde12_tr_td='border: 1px solid #080808; padding: 3px 8px;';
$table_borde2_tr_td= $table.' border-bottom: 1px solid #080808; width:100%;';
$table_borde3_tr_td= $table.' width:100%; text-align:center;';
$table_preg_tr_td='height: 20px;';
$table_sepelio_tr_td='border: 1px solid #080808; height: 15px;';
$table_borde_sup='width: 100%; border-top: 2px solid #000000;';

$input_inf='display: inline-block; font-weight: bold; font-size: 8px; font-family: Arial; border-bottom: 1px solid #777777;';
$input_check='display: inline-block; width: 15px; height: 15px; margin: 2px 0 0 0; text-align: center; vertical-align: baseline; border: 1px solid #0F0F0F;';
$input_question='border: 1px solid #0F0F0F; display: inline-block; #display: inline; _display: inline; width: 10px; height: 8px; margin: 2px 0 0 0; padding: 1px; text-align: center; zoom: 1;';
$cita='display: inline-block; margin: 0 0 0 100px;';
$firma='position: relative; margin-bottom: -20px; z-index: -1000;';
$font_bold='font-weight: bold;';

?>
	<div style="<?=$main_c_des;?>">
		<div style="<?=$header;?>">
        	<h1 style="<?=$header_h1;?>">
                CERTIFICADO INDIVIDUAL DE COBERTURA<br>

				AL CONTRATO DE INCENDIO Y LINEAS ALIADAS PARA GARANTIAS HIPOTECARIAS CON PRIMA UNICA<br>
            </h1>           
            <h4 style="<?=$header_h4;?>">
				C&Oacute;DIGO ASIGNADO: 115-910184-2010 01 072-4001<br>
                Resolucion ASFI N&deg; 127/2010 de fecha 11 de febrero de 2010
            </h4><br>			
			<table cellpadding="0" cellspacing="0" border="0" style="width:100%; ">
                <tr>
                	<td style="width:50%;">
                        <h4 style="<?=$header_h1;?> font-size:11px;">
                        	P&oacute;liza N&deg; 
                        	<?=$prefix['policy'];?>
                        </h4>
                    </td>                	
                    <td style="width:50%;">
                    <h4 style="<?=$header_h1;?> font-size:11px;">
                    	Certificado de Cobertura N&deg; 
                    	<?=$rowDt['prefijo'] . '-' . $rowDt['no_detalle'];?>
                    </h4>
                    </td>
                </tr>
           </table>	
        </div>
        
        <div style="<?=$container_1;?>">
        	<div style="<?=$content;?>">
            <h2 style="<?=$h2;?>">
            	Se deja expresa constancia mediante el presente certificado, que 
            	el inmueble con valor comercial de acuerdo a aval&uacute;o de 
            	$us <?=number_format($rowDt['pr_valor_asegurado'], 2, '.', ',');?> 
            	constituido en garant&iacute;a hipotecaria del banco 
            	Econ&oacute;mico S.A. por el cr&eacute;dito otorgado N&deg; 
            	<?=$rowDt['no_detalle'];?> a favor de: <?=$row['cl_nombre'];?> 
            	se encuentra amparado bajo la p&oacute;liza contra Incendio y 
            	Aliados con Prima &Uacute;nica N&deg; <?=$prefix['policy'];?> 
            	de acuerdo a los t&eacute;rminos y condiciones estipulados en 
            	el mencionado Contrato de Seguros suscrito entre el "Tomador" y el "Asegurador".
            </h2>
            	<table border="0" cellpadding="0" cellspacing="0" style="text-align: justify; font-size: 8px; width: 100%;">
                    <tr>
                        <td style="width: 50%; padding: 5px;" valign="top">
                            <span style="<?=$font_bold;?> text-decoration:underline;">COBERTURAS:</span><br />
                            <span style="<?=$font_bold;?>">A VALOR TOTAL:</span><br />
                            <ol style="list-style:square;">
                            	<li>Incendio y/o Rayo.</li>
                                <li>Explosi&oacute;n (excepto radioactiva y nuclear).</li>
                                <li>Huelgas, motines, conmociones civiles, tumultos populares, da&ntilde;o malicioso, sabotaje, terrorismo y vandalismo.</li><br />
                                <li>Hurac&aacute;n, ventarr&oacute;n, tempestad y granizo.</li>
                                <li>Da&ntilde;os por humo.</li>
                                <li>Terremoto, temblor, erupci&oacute;n volc&aacute;nica, movimientos s&iacute;smicos incluyendo incendio consecutivo de los mencionados fen&oacute;menos de naturaleza y/o fuego subterr&aacute;neo.</li>
                                <li>Ca&iacute;da de Aeronaves u objetos que caigan de ellos.</li>                              
                            </ol>

                            <span style="<?=$font_bold;?>">HASTA EL 20% DEL VALOR COMERCIAL CONSTITUIDO EN GARANT&Iacute;A</span><br />
                            P&eacute;rdidas o deterioros a las propiedades aseguradas (instalaciones fijas y permanentes) por la consumaci&oacute;n del Robo o por su tentativa.<br />          
                        </td>
                        
                        <td style="width: 50%; padding: 5px;" valign="top">  
	                        <span style="<?=$font_bold;?>">A PRIMER RIESGO: (HASTA EL 25 % DE LA SUMA ASEGURADA POR INMUEBLE)</span><br />
                            <ol style="list-style:square;">
                            	<li>Da&ntilde;os por agua</li>
                                <li>Da&ntilde;os por lluvia e inundaci&oacute;n</li>
                                <li>Riadas y Lodos</li>
                                <li>Impacto de Veh&iacute;culos Propios y/o ajenos</li>
                                <li>Ca&iacute;da de rocas y arboles</li>
                                <li>Hundimiento de terrenos</li>
                                <li>Derrumbe, deslizamiento y asentamiento</li>
                                <li>Colapso de Paredes, Techos y/o edificios</li>
                                <li>Incendio de bosques, selvas, monte bajo, praderas, pampas, malezas, as&iacute; como el fuego empreado para el despeje de terrenos.</li>
                            </ol>
                             
                             <span style="<?=$font_bold;?>">A PRIMER RIESGO HASTA EL 10% DEL VALOR COMERCIAL CONSTITUIDO EN GARANTIA</span><br />			
                             <ol style="list-style:square;">
                             	<li>Honorarrios de arquitectos, top&oacute;grafos e ingenieros, documentos y modelos, remoci&oacute;n de escombros</li>
                                <li>Clausula para cubrir p&eacute;rdidas o da&ntilde;os ocasionados por rayo directo y/o indirecto en instalaciones y aparatos el&eacute;ctricos.</li>                                
                             </ol>                             
                        </td>
                    </tr>
                </table>
                
                <h2 style="<?=$h2;?>"><span style="<?=$font_bold;?> text-decoration:underline;">TASA TOTAL POR EL PERIODO DEL CREDITO:</span> (Aplicable sobre los valores asegurados establecidos en los Aval&uacute;os)</h2><br>
                
                <table cellpadding="0" cellspacing="0" border="0" style="width:100%; text-align:center; font-size:10px;"> 
                	<tr>
                    	<td>PLAZO DEL CREDITO<br>(EN MESES)</td>
                        <td>TASA TOTAL</td>
                        <td>PLAZO DEL CREDITO<br>(EN MESES)</td>
                        <td>TASA TOTAL</td>
                        <td>PLAZO DEL CREDITO<br>(EN MESES)</td>
                        <td>TASA TOTAL</td>
                    </tr>
                    <tr>
                    	<td>De 0 a 12</td>
                        <td>0,140% (POR CIENTO)</td>
                        <td>De 67 a 72</td>
                        <td>0,698% (POR CIENTO)</td>
                        <td>De 127 a 132</td>
                        <td>1,368% (POR CIENTO)</td>
                    </tr>
                    <tr>
                    	<td>De 13 a 18</td>
                        <td>0,208% (POR CIENTO)</td>
                        <td>De 73 a 78</td>
                        <td>0,748% (POR CIENTO)</td>
                        <td>De 133 a 138</td>
                        <td>1,416% (POR CIENTO)</td>
                    </tr>
                    <tr>
                    	<td>De 19 a 24</td>
                        <td>0,228% (POR CIENTO)</td>
                        <td>De 79 a 84</td>
                        <td>0,795% (POR CIENTO)</td>
                        <td>De 139 a 144</td>
                        <td>1,461% (POR CIENTO)</td>
                    </tr>
                    <tr>
                    	<td>De 25 a 30</td>
                        <td>0,282% (POR CIENTO)</td>
                        <td>De 85 a 90</td>
                        <td>0,843% (POR CIENTO)</td>
                        <td>De 145 a 150</td>
                        <td>1,503% (POR CIENTO)</td>
                    </tr>
                    <tr>
                    	<td>De 31 a 36</td>
                        <td>0,334% (POR CIENTO)</td>
                        <td>De 91 a 96</td>
                        <td>0.888%(POR CIENTO)</td>
                        <td>De 151 a 156</td>
                        <td>1,545% (POR CIENTO)</td>
                    </tr>
                    <tr>
                    	<td>De 37 a 42</td>
                        <td>0,346% (POR CIENTO)</td>
                        <td>De 97 a 102</td>
                        <td>0,933% (POR CIENTO)</td>
                        <td>De 157 a 162</td>
                        <td>1,587% (POR CIENTO)</td>
                    </tr>
                    <tr>
                    	<td>De 43 a 48</td>
                        <td>0.390% (POR CIENTO)</td>
                        <td>De 103 a 108</td>
                        <td>0,978% (POR CIENTO)</td>
                        <td>De 163 a 168</td>
                        <td>1,629% (POR CIENTO)</td>
                    </tr>
                    <tr>
                    	<td>De 49 a 54</td>
                        <td>0,434% (POR CIENTO)</td>
                        <td>De 109 a 114</td>
                        <td>1,020% (POR CIENTO)</td>
                        <td>De 169 a 174</td>
                        <td>1,668% (POR CIENTO)</td>
                    </tr>
                    <tr>
                    	<td>De 55 a 60</td>
                        <td>0,476% (POR CIENTO)</td>
                        <td>De 115 a 120</td>
                        <td>1.060% (POR CIENTO)</td>
                        <td>De 175 a 180</td>
                        <td>1,707% (POR CIENTO)</td>
                    </tr>
                    <tr>
                    	<td>De 61 a 66</td>
                        <td>0,648% (POR CIENTO)</td>
                        <td>De 121 a 126</td>
                        <td>1,320% (POR CIENTO)</td>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </table><br>
                                
                
                <h3 style="<?=$h3;?>">MARTERIA ASEGURADA:</h3>
                <h2 style="<?=$h2;?>">Edificaciones e instalaciones fijas y/o permanentes y/o mejoras (excluyendo valores de terrenos), seg&uacute;n se defina y/o describa en los aval&uacute;os en poder del Tomador; correspondientes a inmuebles constituidos en Garantias Hipotecarias por pretamos Hipotecarios otorgados por el Tomador, que se encuentren en los reportes Mensuales y/o en los contratos de pr&eacute;stamo en calidad de garantias hipotecarias del Tomador, excluyendo algodoneras, algod&oacute;n, equipos, empresas petroleras y aeronaves.</h2><br />
                	
                    
                <h3 style="<?=$h3;?>">ACTIVIDADES DECLARADAS Y/O GIROS DEL NEGOCIO</h3>
                <h2 style="<?=$h2;?>">Sin prohibici&oacute;n ni exclusi&oacute;n, ni restricci&oacute;n de giros de negocio y/o actividades que se desarrollan para la utilizaci&oacute;n de los bienes asegurados; salvo las establecidas en la descripci&oacute;n de la materia asegurada.</h2><br />
                
                <h3 style="<?=$h3;?>">CONTRATO PRINCIPAL (P&Oacute;LIZA MATRIZ)</h3>
                <h2 style="<?=$h2;?>">LATINA SEGUROS PATRIMONIALES S.A., Compa&ntilde;&iacute;a de Seguros y Reaseguros asegura al Prestatario, seg&uacute;n las condiciones descritas en el Contrato del Seguro de Incendio y Aliados para Garantias Hipotecarias con Prima &Uacute;nica; celebrando entre LATINA Seguros Patrimoniales S.A. y el Banco Economico S.A. condiciones que forman parte integrante del seguro aqu&iacute; concedido.<br />
                El presente Certificado de Seguro tendr&aacute; valor siempre y cuando la p&oacute;liza este vigente y sus primas se encuentren pagadas de acuerdo a las Condiciones de la p&oacute;liza.</h2><br />
                
                <h3 style="<?=$h3;?>">ADHESION VOLUNTARIA DEL ASEGURADO</h3>
                <h2 style="<?=$h2;?>">El asegurado al momento de concretar el cr&eacute;dito con el Contratante declara su consentimiento VOLUNTARIO para ser asegurado en la p&oacute;liza arriba indicada y declara conocer y estar de acuerdo con las condiciones del contrato de seguros.</h2>
                <h4 style="<?=$h4;?>">"LATINA" SEGUROS PATRIMONIALES S.A.</h4>
               <table cellpadding="0" cellspacing="0" border="0" style="<?=$table;?> text-align:center; width:100%;" align="center">                    <tr><td colspan="7">&nbsp;</td></tr>
                    <tr><td colspan="7">&nbsp;</td></tr>
                    <tr><td colspan="7">&nbsp;</td></tr>
                    
               		<tr>
                        <td style="width:10%;">&nbsp;</td>                        
                        <td style="width:20%;">
                            FIRMA DEL ASEGURADO
                        </td>
                        <td style="width:10%;">&nbsp;</td>
                        <td style="width:20%;">
                            <table border="0" cellpadding="0" cellspacing="0" style="<?=$table_borde_tr_td;?>"><tr>
                                <td style="width: 100%;"></td>
                            </tr></table>
                        </td>
                        <td style="width:10%;">&nbsp;</td>
                        <td style="width:20%;">
                            <table border="0" cellpadding="0" cellspacing="0" style="<?=$table_borde_tr_td;?>"><tr>
                                <td style="width: 100%;"></td>
                            </tr></table>
                        </td>
                        <td style="width:10%;">&nbsp;</td>
                    </tr>                            
                </table>            
            </div><br>
           
           <div style="<?=$content2;?>">
           EN CASO DE SINIESTRO S&Iacute;RVASE CONTACTARSE DIRECTAMENTE CON LA CIA O CON "EL BROKER":<br><br><br><br>
				<h2 style="<?=$h2_s;?>">
                	<b>Call Center 800 - 10 - 3070</b><br>
                	<b>La Paz, </b> Prolongacion Cordero N&deg; 163 - San Jorge, Telf.: (591)-2-2433500, Fax(591)-2-2128329<br>
                	<b>Santa Cruz,</b> Equipetrol Calle N&deg; 6 Este N&deg; 21 Entre Canal Isuto y Avenida San Martin, Telf.: (591)-3-3416055, Fax: (591)-3-3416056<br>
                    <b>Cochabamba,</b> Calle 16 de Julio No. 823 entre La Paz y Ram&oacute;n Rivero, Telf.: (591)-4-4521280, Fax:(591)-4-4521281<br>
                    <b>Sucre,</b> Calle Bolivar N&deg; 266 Ed. Bolivar Pb, Telf.:(591)-4-6429081, (591)-4-6913797, Fax(591)-4-6435348<br>
                    <b>Potos&iacute;,</b> Calle Bolivar esq. Junin shopping C&C piso 3 of. 26, Telfs.: 6227293, 6225768, Fax: 6223145<br>
                    <b>Tarija,</b> Calle Santa Cruz No. 830 entre Domingo Paz y Bolivar, Telf./Fax: 6672014
                </h2>

           </div><br>
           
           <div style="<?=$content;?>">
           	<h2 style="<?=$h2;?>">He recibido mi Certificado Individual de Cobertura y afiliaci&oacute;n al Contrato de Seguro de Protecci&oacute;n de Tarjetas de Cr&eacute;dito Anual Renovable, con cuyos t&eacute;rminos y condiciones estoy de acuerdo y declaro conocer.</h2><br><br>
           
               <table cellpadding="0" cellspacing="0" border="0" style="width:100%; text-align:left;">
                    <tr>
                        <td style="width:50%;" colspan="2">
                            <h4 style="<?=$footer_h1;?> font-size:11px; text-align:left;">
                            	P&oacute;liza N&deg; 
                            	<?=$prefix['policy'];?>
                            </h4>
                        </td>                	
                        <td style="width:50%;">
                        <h4 style="<?=$footer_h1;?> font-size:11px;">
                        	Certificado de Cobertura N&deg; 
                        	<?=$rowDt['prefijo'] . '-' . $rowDt['no_detalle'];?>
                        </h4>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:5%;"><h4 style="<?=$footer_h1;?> font-size:11px;">
                        Nombre:
                        </h4></td>
                        <td style="width:45%;">
                            <table border="0" cellpadding="0" cellspacing="0" style="<?=$table_borde2_tr_td;?>"><tr>
                               	<td style="width: 100%;">
                               		&nbsp;<?=$row['cl_nombre'];?>
                               	</td>
                            </tr></table>
                        </td>                	
                        <td style="width:50%;">
                        <h4 style="<?=$footer_h1;?> font-size:11px;">
                        	Fecha de Afiliaci&oacute;n: 
                        	<?=date('d/m/Y', strtotime($row['fecha_emision']));?>
                        </h4>
                        </td>
                    </tr>
                    <tr>
                    	<td style="width:50%;" colspan="2">&nbsp;</td>
                        <td style="width:50%;">
                        	<table style="font-size:9px;" width="100%">
                            	<tr>
                                	<td width="49%">
                                    	<table border="0" cellpadding="0" cellspacing="0" style="<?=$table_borde2_tr_td;?>"><tr>
                                            <td style="width: 100%;">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td width="2%">&nbsp;</td>
                                    <td width="49%">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table_borde2_tr_td;?>"><tr>
                                            <td style="width: 32%;">&nbsp;</td>
                                            <td style="width: 2%;">/</td>
                                            <td style="width: 32%;">&nbsp;</td>
                                            <td style="width: 2%;">/</td>
                                            <td style="width: 32%;">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>FIRMA DEL ASEGURADO<br>
                                    	C.I. <?=$row['cl_ci'];?>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table_borde3_tr_td;?>"><tr>
                                            <td style="width: 32%;">D&iacute;a</td>
                                            <td style="width: 2%;">&nbsp;</td>
                                            <td style="width: 32%;">Mes</td>
                                            <td style="width: 2%;">&nbsp;</td>
                                            <td style="width: 32%;">A&ntilde;o</td>
                                        </tr></table>                                
                                    </td>
                             	</tr>  
                            </table>
                        </td>
                    </tr>
               </table>
           </div>
           <div style="<?=$content3;?>">
           		SANTA CRUZ: Av Monse&ntilde;or Rievero, 223-2 &bull; Tel&eacute;fono: 371-6565 &bull; Fax: 371-6905 &bull; LA PAZ: Calle Capit&aacute;n Ravelo, 2334 &bull; Tel&eacute;fono: 244-2942 &bull; Fax: 244-2905 &bull; COCHABAMBA: Av. Libertador, 1150 Tel&eacute;fono: 444-8750 &bull; Fax: 444-8754
           </div>
        </div>
        <div style="page-break-before: always;"> &nbsp;</div>
        <div style="<?=$container_1;?>">
            <div style="<?=$content;?>"><br /><br />
                <h2 style="<?=$h2_s1;?> text-align: center;">
                    La adhesion a esta p&oacute;es de car&aacute;cter voluntario y puede ser reemplazado por otro de similares caracteristicas<br>
                    <strong>REGLAS DEL CONTRATO DE SEGURO DE INCENDIO Y ALIADOS PARA GARANTIAS HIPOTECARIAS CON PRIMA UNICA</strong>
                </h2><br />
                <table border="0" cellpadding="0" cellspacing="0" style="text-align: justify; font-size: 8px; width: 100%;">
                    <tr>
                        <td style="width: 50%; padding: 5px;" valign="top">
                            <span>I.</span>
                            <span style="<?=$title_regla;?>">DEFINICIONES</span><br />
                            <span>1.01</span>
                            <span style="<?=$title_regla;?>">EL ASEGURADOR:</span> LATINA SEGUROS PATRIMONIALES S.A.<br />
                            
                            <span>1.02</span>
                            <span style="<?=$title_regla;?>">TOMADOR Y BENEFICIARIO DEL SEGURO:</span><strong>BANCO ECONOMICO S.A.</strong><br />
                            
                            <span>1.03</span>
                            <span style="<?=$title_regla;?>">ASEGURADOS:</span> 
                            Prestatarios del Tomador.<br />
                            
                            <span>1.04</span>
                            <span style="<?=$title_regla;?>">UBICACIONES DEL RIESGO:</span>
                            Todas las ubicaciones que figuren en los reportes mensuales del Tomador y/o en los contratos de pr&eacute;stamo dentro del territorio del Estado Plurinacional de Bolivia.<br /> 
                            
                            <span>1.05</span>
                            <span style="<?=$title_regla;?>">SEGURO CON PRIMA &Uacute;NICA:</span>
                            Es la modalidad de seguro cuya vigencia esta vinculada a la fecha de desembolso y fecha de finalizaci&oacute;n del plazo del cr&eacute;dito concedido en el Contrato Original de Cr&eacute;dito. Los t&eacute;rminos y condiciones de la cobertura de seguros contratada, se mantendran vigentes en forma distinta para cada Asegurado desde la fecha del desembolso hasta la fecha de finalizaci&oacute;n del plazo del cr&eacute;dito acordando en el Contrato de Cr&eacute;dito original suscrito con el Tomador o la fecha establecida en la condici&oacute;n inserta en la P&oacute;liza de Seguros como Finalizaci&oacute;n de la Cobertura para cada Asegurado (lo que suceda primero). El par&aacute;metro del plazo durante el cual la garantia asegurada se constituye Garantia Hipotecaria del Tomador, representa la variable para que el c&aacute;lculo de la prima a cargo del Asegurado para efectos de este seguro. Cualquier circunstancia que implique extensi&oacute;n del plazo Original del Cr&eacute;dito implica a su vez la obligaci&oacute;n de pago de una extraprima de parte del Asegurado. El incumplimineto de pago de la extra prima en los plazos fijados, libera al Asegurador del pago de eventuales siniestros en el marco de lo se&ntilde;alado en la P&oacute;liza de Seguros y el C&oacute;digo de Comercio.<br /> 
                            
                            <span>II.</span>
                            <span style="<?=$title_regla;?>">INICIO DE VIGENCIA DE LA COBERTURA PARA CADA ASEGURADO</span><br />
                            <span>2.01</span>
                            &nbsp; La cobertura inicia desde la fecha de desembolso del Cr&eacute;ito sobre la cual se constituye la garantia.<br />
                            <span>III.</span>
                            <span style="<?=$title_regla;?>">FINALIZACI&Oacute;N DE LA COBERTURA PARA CADA ASEGURADO</span><br />
                            <span>3.01</span>
                            &nbsp; Por cancelaci&oacute;n y/o cesaci&oacute;n de la obligaci&oacute;n del prestatario con el tomador.<br />
                            
                            <span>3.02</span>
                            &nbsp; En la fecha de vencimiento final del contrato original del cr&eacute;dito o en la fecha de vencimiento de la renovaci&oacute;n o reprogramaci&oacute;n de plazos originales contratados por el prestatario y que se haya pagado la extraprima que corresponda de acuerdo a los plazos adicionales otorgados.<br />
                            
                            <span>3.03</span>
                            &nbsp; En el momento en que el inmueble materia del seguro pierde su condici&oacute;n de garantia hipotecaria del tomador por cualquier motivo distinto a los anteriormente mencionados.<br />                           
                            
                            <span>3.04</span>
                            &nbsp; Al haberse contratado el Seguro contra incendio y Aliados bajo la modalidad de Seguro con prima &Uacute;nica, la finalizaci&oacute;n de la cobertura y/o vigencia para cada asegurado incorporado bajo la p&oacute;liza no ser&aacute; adelantada, suspendida, ni caducara por efecto de la cancelaci&oacute;n o cesaci&oacute;n de la obligaci&oacute;n crediticia anticipada por el Asegurador con el Tomador; sin embargo, al extinguirse el interes asegurable del Tomador sobre la Materia Asegurada, el vinculo contractual que persistir&aacute; desde la fecha de la libraci&oacute;n efectiva de la garantia por parte de la Entidad Financiera por efectos de cancelaci&oacute;n anticipada de la obligaci&oacute;n crediticia; hasta fecha de vencimiento del contrato original de cr&eacute;dito y/o renovaci&oacute;n o reprogramaci&oacute;n del plazo original con contrataci&oacute;n de extensi&oacute;n de la vigencia del Seguro, ser&aacute; exclusivamente antre el Asegurador y el Asegurado quedando extinto desde la fecha se&ntilde;alada, el vinculo contractual del Tomador en el contrato de Seguro Contra Incendio y Aliados. En esta circusntancia de liberaci&oacute;n de la garantia hipotecaria por pago anticipado del cr&eacute;dito a la Entidad Financiera, el Asegurado libre y voluntariamente podr&aacute; ejercer sus derechos de Recisi&oacute;n del Contrato de Seguros ante el Asegurador, en el marco de lo se&ntilde;alado en la P&oacute;liza de Seguros C&oacute;digo de Comercio.<br />
                            
                            <span>IV.</span>
                            <span style="<?=$title_regla;?>">LA P&Oacute;LIZA</span><br />
                            <span>4.01</span>
                            &nbsp; No se pagar&aacute; ninguna indemnizaci&oacute;n conforme a estas reglas si la suma asegurada correspondiente no resultara pagadera con arreglo a las condiciones de la P&oacute;liza.<br />
                            
                            <span>4.02</span>
                            &nbsp; La informaci&oacute;n completa referente y las estipulaciones del seguro se detallan en la P&oacute;liza Madre emitida por Latina Seguros Patrimoniales S.A. a favor del Banco Econ&oacute;mico S.A.<br />
                            
                            <span>V.</span>
                            <span style="<?=$title_regla;?>">MODIFICACI&Oacute;N O TERMINACI&Oacute;N</span><br />
                            <span>5.01</span>
                            &nbsp; Las condiciones estipuladas en el presente contrato, permanecer&aacute;n inalterables durante el periodo de vigencia de la p&oacute;liza, salvo que el "Tomador" y "Asegurador", puedan convenir modificaciones mediante anexo.<br />
                            
                            <span>5.02</span>
                            &nbsp; El "Tomador" y el "Asegurador" se reserven el derecho de finalizar el Contrato en el marco de lo se&ntilde;alado en dicho Contrato y C&oacute;digo de Comercio.<br />
                            
                            <span>VI.</span>
                            <span style="<?=$title_regla;?>">RESPONSABILIDAD M&Aacute;XIMA DEL "ASEGURADOR" EN CASO DE SINIESTRO</span><br />
                            <span>6.01</span>
                            &nbsp; La responsabilidad m&aacute;xima del Asegurador en caso de siniestro son los valores comericales establecidos en los aval&uacute;os en poder del Tomador, los cuales ser&aacute;n tomados como base de toda indemnizacione procedente de la presente p&oacute;liza, constituyendose para todos los efectos como  valores &uacute;nicos e inalterables. En ning&uacute;n caso, la suma indemnizable por el Asegurador bajo este seguro superar&aacute; el valor comercial mencionado para cada materia asegurada. Independientemente a lo se&ntilde;alado, el limite m&aacute;ximo de responsabilidad del Asegurador por ubicacion y/o domicilios de cada una de las materias aseguradas incorporadas por el Tomador no superar&aacute; en ning&uacute;n caso la suma de US$ 1'500.000,00 (UN MILLON QUINIENTOS MIL 00/100 DOLARES AMERICANOS).<br />
                            Las coberturas a primer riesgo son aquellas contratadas con un limite de responsabilidad a cargo del Asegurador.<br />
                            
                            <span>6.02</span>
                            &nbsp; En caso de que el "Tomador", como administrador colectivo, cargase primas por capitales asegurados superiores a la responsabilidad m&aacute;xima del "Asegurador", la responsabilidad del "Tomador" y el "Asegurador" frente al asegurado y/o sus representantes se limitaran a la devoluci&oacute;n de las primas cobradas y pagadas en exceso.<br />
                            
                            <span>VII.</span>
                            <span style="<?=$title_regla;?>">RESTRICCIONES Y EXCLUSIONES</span><br />
                            No obstante las restricciones  exclusiones estipuladas en las condiciones generales de la p&oacute;liza se enumeran a continuaci&oacute;n con car&aacute;cter enunciativo y limitativo las siguientes:<br />                            
                            <ol style="list-style:square">
                            	<li>Se excluyen algodoneras y algod&oacute;n; equipos y empresas petroleras; aeronaves; naves fluviales o mar&iacute;timas de cualquier naturaleza, siembras, animales vivos, terrenos.</li>
                                <li>Materias primas, productos en proceso y productos terminados, como consecuencia &uacute;nicamente de la suspenci&oacute;n o interrupci&oacute;n de procesos industriales, as&iacute; estas se daban a su evento cubierto.</li>
                                <li>P&eacute;rdidas o da&ntilde;os a titulos, obligaciones o documentos de cualquier clase, timbres postales, monedas, billetes de banco, cheques, letras, pagar&eacute;s, letras de contabilidad u otros libros de comercio, tributacion y dem&aacute;s similares.</li>
                                <li>Contenidos de los inmuebles asegurados.</li>
                                <li>Los explosivos o substancias inflamables, sean qu&iacute;micas o no.</li>
                                <li>Postes, torres y lineas de transmisi&oacute;n de energia, represas, puentes, diques, suelos, caminos, muelles, instalaciones de puertos y t&uacute;neles.</li>
                                <li>V&iacute;as de acceso y sus complementos, v&iacute;as ferreas y equipos de ferrocarril.</li>
                                <li>Porpiedad tomada o confiscada por querellamiento de cualquier ley o por orcden de cualquier autoridad p&uacute;blica.</li>
                                <li>Propiedad en tr&aacute;nsito maritimo o a&eacute;reo.</li>
                                <li>P&eacute;rdidas o da&ntilde;os indirectos o consecuenciales o por lucro cesante de cualquier tipo.</li>                                                                
                            </ol>                           
                        </td>
                        <td style="width:1%; border-left:1px solid #000;">&nbsp;</td>
                        <td style="width: 49%; padding: 5px;" valign="top">  
	                        <ol style="list-style:square;">
                            	<li>P&eacute;rdidas o da&ntilde;os que directa o indirectamente provengan de siniestro cuasados por incendiarismo y/o piromania, dolo, mala fe o culpa grave del asegurado o sus apoderadors, beneficiarios o personas por quienes el Asegurado sea civilmente responsable.</li>
                                <li>La emisi&oacute;n de radiaciones ionizantes, o contaminaci&oacute;n de la radioactividad de cualquier conbustible nuclear o de cualquier desperdicio proveniente de la combusti&oacute;n de dicho conbustible.</li>
                                <li>Deterioror de la propiedad debido a cambios de temperatura o humedad o a falla u operaci&oacute;n inadecuada de alg&uacute;n sistema de acondicionamiento de aire.</li>
                                <li>La aver&iacute;a o destrucci&oacute;n de objetos por fermentaci&oacute;n, vicio propio de combusti&oacute;n espont&aacute;nea o por cualquier procedimiento de calefacci&oacute;n o de desecaci&oacute;n a la cual hubieran sido sometidos los objetos asegurados, as&iacute; como su deterioro gradual.</li>
                                <li>Uso, desgaste, herrumbe, incrustaciones, corrosi&oacute;n, oxidaci&oacute;n, cavitaci&oacute;n y otros defectos latentes.</li>
                                <li>Material defectuoso, dise&ntilde;o defectuoso y errores de mano de obra.</li>
                                <li>Responsabilidad Civil de cualquier naturaleza.</li>
                            </ol>
                            <span>VIII.</span>
                            <span style="<?=$title_regla;?>">PROCEDIMIENTO EN CASO DE SINIESTROS</span><br />
                            En caso de siniestros contemplados bajo el presente contrato, el asegurado debe obrar de la siguiente manera:
                           
                            <ol style="list-style:square">
                            	<li>Poner en conocimiento inmediato dentro de los 3 primeros d&iacute;as del hecho a la Compa&ntilde;&iacute;a o a Sudamericana S.R.L., para la correspondiente inspecci&oacute;n. Posterior al aviso, deber&aacute; presentar la siguiente documentacion:</li>
                            
                                <li>Informe t&eacute;cnico emitido por los bomberos(en caso de incendio).</li>
                                <li>Informe de tr&aacute;nsito en caso de impacto de vehiculos propios o ajenos.</li>
                                <li>Informe en conclusiones de la Policia en caso de P&eacute;rdidas o Da&ntilde;os a causa de los Riesgos Politicos cubiertos.</li>
                                <li>Informe metereol&oacute;gico ofical en caso de p&eacute;rdidas o da&ntilde;os como consecuencia de Riesgos de la Naturaleza cubiertos.</li>
                                <li>Informe t&eacute;cnico de acuerdo al tipo de da&ntilde;o ocasionado (en caso de da&ntilde;os por agua)</li>
                                <li>Aval&uacute;o del inmueble asegurado en poder del Tomador que garantiza la operaci&oacute;n crediticia.</li>
                                <li>Copia del Contrato de pr&eacute;stamo</li>
                                <li>Dos Presupuestos detallados de refacci&oacute;n de los da&ntilde;os amparables emitidos por reparadores</li>
                                <li>Cualquier otro informe o evidencia que el Asegurador pueda requerir con el objeto de determinar la procedencia del siniestro y la cuantificaci&oacute;n de la p&eacute;rdida amparable.</li>
                                <li>Pagar la franquicia o Deducible a la compa&ntilde;&iacute;a seg&uacute;n el da&ntilde;o que tenga el bien</li>
                                <li>Terremoto: 1% sobre el valor del Predio Afectado</li>
                                <li>Vidrios: US$ 50.- por evento y/o reclamo</li>
                                <li>Otros amparos, incluyendo riesgos politicos y robo: $us 100.- por evento y/o reclamo</li>
                            </ol>
                            En caso de se necesario la compa&ntilde;&iacute;a se reserva el derecho de exigir cualquier otra informaci&oacute;n adicional que pudiese ayudar a determinar el pago del siniestro.
                        </td>
                    </tr>
                </table>
            </div><br /><br />
            <div style="<?=$content3;?>">
           		SANTA CRUZ: Av Monse&ntilde;or Rievero, 223-2 &bull; Tel&eacute;fono: 371-6565 &bull; Fax: 371-6905 &bull; LA PAZ: Calle Capit&aacute;n Ravelo, 2334 &bull; Tel&eacute;fono: 244-2942 &bull; Fax: 244-2905 &bull; COCHABAMBA: Av. Libertador, 1150 Tel&eacute;fono: 444-8750 &bull; Fax: 444-8754
           </div>
        </div>
    </div>
</div>
<?php
}
?>