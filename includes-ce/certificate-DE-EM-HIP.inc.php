<?php

function de_em_certificate_hip($link, $row, $rsDt, $url, $implant, $type, $fac, $reason = '') {

    if ($row['fecha_emision'] < "2018-07-14") {
        $imagen_firma_1 = "firma-nv-1.jpg";
        $imagen_firma_2 = "firma-nv-2.jpg";
    } else {
        $imagen_firma_1 = "firma-1-julio-2018.jpg";
        $imagen_firma_2 = "firma-2-julio-2018.jpg";
    }

    $emitir = (boolean) $row['emitir'];
    if ($emitir === true) {
        $row['fecha_emision'] = $row['fecha_emision'];
    } else {
        $row['fecha_emision'] = $row['fecha_creacion'];
    }

    $row['fecha_emision'] = $row['u_departamento'] . ', ' . date('d/m/Y', strtotime($row['fecha_emision']));

    $nCl = $rsDt->num_rows;
    $_coverage = (int) $row['cobertura'];

    $coverage = array('', '', '');
    switch ($_coverage) {
        case 1:
            if ($nCl === 1) {
                $coverage[0] = 'X';
            } elseif ($nCl === 2) {
                $coverage[1] = 'X';
            }
            break;
        case 2:
            $coverage[2] = '';
            break;
    }

    $k = 0;
    $ct = 1;
    ob_start();
    ?>
    <div id="container-c" style="width: 785px; height: auto; 
         border: 0px solid #0081C2; padding: 5px;">
        <div id="main-c" style="width: 775px; font-weight: normal; font-size: 12px; 
             font-family: Arial, Helvetica, sans-serif; color: #000000;">
    <?php
    if ($_coverage === 2 or $row['id_prcia'] == 7) {//BANCA COMUNAL
        while ($ct <= 3) {
            //echo $ct;
            if ($rsDt->data_seek(0)) {
                $k = 0;
                while ($rowcl = $rsDt->fetch_array(MYSQLI_ASSOC)) {
                    $k += 1;
                    $rsCl_1 = json_decode($rowcl['respuesta'], TRUE);
                    ?>   
                            <div style="font-size: 75%; text-align:justify;">  
                             <?php
                             if ($type == 'PRINT') {
                                 $font_size_titulo = 'font-size:11px;';
                                 $font_size_text2 = 'font-size:17px;';
                             } elseif ($type == 'PDF') {
                                 $font_size_titulo = '';
                                 $font_size_text2 = 'font-size:17px;';
                             }
                             ?>
                                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: auto; font-family: Arial; margin-bottom: 5px;">
                                    <tr>
                                        <td style="width:100%; font-weight:bold; text-align:center; padding-bottom: 10px; font-size:20px;">
                                            <br><br><br><br><br><br><?= $row['ef_nombre']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:100%; font-weight:bold; text-align:center; padding-bottom: 10px; font-size:20px;">
                                            <br>SOLICITUD DEL SEGURO DE DESGRAVAMEN HIPOTECARIO<br><br>
                                        </td>
                                    </tr>

                    <?php
                    if ($row['tipo_plazo'] == "semanas") {
                        $plazo = ($row['plazo'] / 4.3480);
                    } elseif ($row['tipo_plazo'] == "meses") {
                        $plazo = $row['plazo'];
                    } elseif ($row['tipo_plazo'] == "dias") {
                        $plazo = ($row['plazo']) / 30;
                    } elseif ($row['tipo_plazo'] == "años") {
                        $plazo = ($row['plazo'] * 12);
                    }
                    ?>
                                    <tr>
                                        <td style="width: 100%; text-align: justify; <?= $font_size_text2 ?>">
                                            Mediante el presente Formulario, en conformidad con la Declaración de Salud
                                            que precede, solicito a <?= $row['compania'] ?>, como Entidad Asegurada, se
                                            me otorgue el seguro de Desgravamen Hipotecario, con referencia al préstamo
                                            que al presente gestiono ante <?= $row['ef_nombre']; ?>(Entidad de Intermediación
                                            Financiera) de la ciudad de <?= $row['u_departamento'] ?> por el plazo de <?= (int) $plazo ?> meses, con
                                            destino a 
                    <?php
                    if ($row['id_prcia'] == 7) {
                        echo "Garantia Hipotecaria.";
                    }
                    ?>
                                            <br><br>
                                            Para los efectos que correponda declaro y dor mi absoluta conformidad
                                            a todas y cada una de las condiciones y estipulaciones establecidas por la
                                            entidad Aseguradora, sobre concesión, vigencia y caducidad del citado
                                            seguro, según el Reglamento Aprobado, obligándome a pagar las primas
                                            mensuales del seguro solicitado.
                                        </td>
                                    </tr>
                                </table>
                            </div><br>
                            <table 
                                cellpadding="0" cellspacing="0" border="0" 
                                style="width: 100%; height: auto; <?= $font_size_text2 ?> font-family: Arial; 
                                padding-top:20px;">
                                <tr>
                                    <td style="width:15%;">Yo:</td>
                                    <td style="width:35%; border-bottom: 1px solid #333;">&nbsp;
                    <?= $rowcl['nombre'] . ' ' . $rowcl['paterno'] . ' ' . $rowcl['materno']; ?> 
                                    </td>
                                    <td style="width:25%;"></td>
                                </tr>
                                <tr>
                                    <td style="width:15%;">&nbsp;</td>
                                    <td style="width:35%;">
                                        &nbsp;
                                    </td>
                                    <td style="width:25%;"></td>
                                </tr>
                                <tr>
                                    <td style="width:15%;">Lugar y Fecha: </td>
                                    <td style="width:35%; border-bottom: 1px solid #333;">&nbsp;
                    <?= $row['fecha_emision']; ?>
                                    </td>
                                    <td style="width:25%;"></td>
                                </tr>
                            </table><br><br>
                            <page><div style="page-break-before: always;">&nbsp;</div></page>
                            <div style="width: 775px; border: 0px solid #FFFF00; text-align:center;">
                                <table 
                                    cellpadding="0" cellspacing="0" border="0" 
                                    style="width: 100%; height: auto; font-family: Arial;">
                                    <tr>
                                        <td style="width:100%; text-align:left;">
                                            <img src="images/<?= $row['logo_cia']; ?>" height="60"/>
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td style="width:100%; font-weight:bold; text-align:center; font-size: 80%;">
                                            DECLARACIÓN JURADA DE SALUD Nº <?= $row['no_emision']; ?>
                                            <br />PARA SEGURO DE DESGRAVAMEN HIPOTECARIO
                                        </td> 
                                    </tr>
                                </table>     
                            </div>
                            <br/>

                            <div style="width: 775px; border: 0px solid #FFFF00;">
                                <span style="font-weight:bold; font-size:75%;">
                                    <br>
                                    DATOS PERSONALES: (TITULAR <?= $k ?>):</span> 
                                <table 
                                    cellpadding="0" cellspacing="0" border="0" 
                                    style="width: 100%; height: auto; font-size: 75%; font-family: Arial; 
                                    padding-top:4px; padding-bottom:3px;">
                                    <tr> 
                                        <td style="width:100%; padding-bottom:4px;">
                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                                                <tr>
                                                    <td style="width:13%;">Nombres Completo: </td>
                                                    <td style="border-bottom: 1px solid #333; width:87%;">
                    <?= $rowcl['nombre_completo']; ?>  
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>      
                                    </tr>

                                    <tr>
                                        <td style="width:100%; padding-bottom:4px;">
                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                                                <tr>
                                                    <td style="width:13%;">Carnet de Identidad: </td>
                                                    <td style="border-bottom: 1px solid #333; width:39%;">
                    <?= $rowcl['dni'] . $rowcl['complemento'] . $rowcl['extension']; ?>  
                                                    </td>
                                                    <td style="width:4%;">Edad: </td>
                                                    <td style="width:11%; border-bottom: 1px solid #333; text-align:center;">
                    <?= $rowcl['edad']; ?>
                                                    </td>
                                                    <td style="width:4%;">Peso: </td>
                                                    <td style="width:11%; border-bottom: 1px solid #333; text-align:center;">
                    <?= $rowcl['peso']; ?>
                                                    </td>
                                                    <td style="width:6%;">Estatura: </td>
                                                    <td style="width:12%; border-bottom: 1px solid #333; text-align:center;">&nbsp;
                    <?= $rowcl['estatura']; ?>
                                                    </td>   
                                                </tr>
                                            </table> 
                                        </td>              
                                    </tr>
                                    <tr> 
                                        <td style="width:100%; padding-bottom:4px;">
                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                                                <tr>
                                                    <td style="width:15%;"> Entidad de Intermediación Financiera: </td>
                                                    <td style="border-bottom: 1px solid #333; width:50%;">
                    <?= $row['ef_nombre']; ?>  
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>      
                                    </tr>
                                    <tr> 
                                        <td style="width:100%; padding-bottom:4px;">
                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                                                <tr>
                                                    <td style="width:15%;">Monto del Préstamo: (<?= $row['moneda']; ?> ) </td>
                                                    <td style="border-bottom: 1px solid #333; width:50%;">
                    <?= number_format($row['monto_acumulado_cliente'], 2, '.', ','); ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>      
                                    </tr>
                                    <tr> 
                                        <td style="width:100%; padding-bottom:4px;">
                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                                                <tr>
                                                    <td style="width:15%;">Fecha Nacimiento:</td>
                                                    <td style="border-bottom: 1px solid #333; width:50%;">
                    <?= $rowcl['fecha_nacimiento']; ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>      
                                    </tr>
                                    <tr>
                                        <td style="width:100%; padding-bottom:4px;">
                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                                                <tr>
                                                    <td style="width:7%;">Ocupación: </td>
                                                    <td style="width:93%; border-bottom: 1px solid #333;">
                    <?= $rowcl['ocupacion']; ?>
                                                    </td> 
                                                </tr> 
                                            </table>
                                        </td>     
                                    </tr> 
                                </table>   <br>

                                <span style="font-weight:bold; font-size:75%;">CUESTIONARIO</span>
                                <table 
                                    cellpadding="0" cellspacing="0" border="0" align="center" 
                                    style="width: 50%; height: auto; font-size: 75%; font-family: Arial;">
                    <?php
                    //var_dump($row['questions']);
                    $resp1_yes = $resp1_no = '';
                    $resp2_yes = $resp2_no = '';
                    $i = 1;
                    foreach ($row['questions'] as $key => $question) {
                        if (count($rsCl_1) > 0) {
                            $respCl = $rsCl_1[$question['orden']];
                            if ($question['id_pregunta'] == $respCl['id']) {
                                if ($respCl['value'] === 1) {
                                    $resp1_yes = 'X';
                                    $resp1_no = '';
                                } elseif ($respCl['value'] === 0) {
                                    $resp1_yes = '';
                                    $resp1_no = 'X';
                                }
                            }
                        }
                        ?>
                                        <tr>
                                            <td style="width:63%; text-align:left;" colspan="4">
                                            <?= $question['orden'] . ' ' . $question['pregunta']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" text-align:left;">
                                                SI
                                            </td>
                                            <td style="">
                                                <div style="width: 20px; height: 12px; border: 1px solid #000; text-align:center;">
                        <?= $resp1_yes; ?>
                                                </div> 
                                            </td>
                                            <td style=" text-align:left;">
                                                NO
                                            </td>
                                            <td style="">
                                                <div style="width: 20px; height: 12px; border: 1px solid #000; text-align:center;">
                        <?= $resp1_no; ?>
                                                </div> 
                                            </td>
                                        </tr>
                        <?php
                        if ($i == 4) {
                            ?>              

                            <?php
                        }
                        $i++;
                    }
                    ?>        

                                </table> <br><br>

                                <span style="font-weight:bold; font-size:75%;">SI ALGUNA DE SUS RESPUESTAS ES AFIRMATIVA, FAVOR BRINDAR DETALLES:</span><br><br>
                                <table 
                                    cellpadding="0" cellspacing="0" border="0" 
                                    style="width: 100%; height: auto; font-size: 75%; font-family: Arial; 
                                    padding-top:4px;">
                                    <tr>
                                        <td style="width:100%; border-bottom: 1px solid #333;">
                    <?= $rowcl['observacion']; ?>
                                        </td> 
                                    </tr>
                                    <tr><td colspan="" style="width:100%; padding:3px;"></td></tr> 
                                </table>
                                <br>
                                <div style="font-size: 75%; text-align:justify;">  
                                    Declaro que las respuestas que he consignado en este Formulario de Solicitud de
                                    Seguro de Desgravamen Hipotecario y Declaración de Salud son verdaderas y
                                    completas.<br>
                                    Autorizo, a los médicos, clínicas, hospitales y otros centros de salud que me hayan
                                    atendido para que proporcionen a la Entidad Aseguradora, todos los resultados de
                                    los informes referentes a mi salud, en caso de enfermedad o accidentes, para lo cual
                                    libero a dichos médicos y centros médicos, en relación con su secreto profesional, de
                                    toda responsabilidad en que pudiera incurrir al proporcionar tales informes.   
                                </div>
                                <br><br><br>
                                <table 
                                    cellpadding="0" cellspacing="0" border="0" align="center"
                                    style="width: 100%; height: auto; font-size: 75%; font-family: Arial; 
                                    padding-top:4px;">
                                    <tr>
                                        <td style="width:7%;">Solicitante: </td>
                                        <td style="width:30%; border-bottom: 1px solid #333;">
                    <?= $rowcl['nombre_completo']; ?> 
                                        </td>
                                        <td style="width:5%;">Firma:</td>
                                        <td style="width:23%; border-bottom: 1px solid #333;">&nbsp;

                                        </td>
                                    </tr>
                                </table><br><br><br>
                                <table 
                                    cellpadding="0" cellspacing="0" border="0" align="center"
                                    style="width: 50%; height: auto; font-size: 75%; font-family: Arial; 
                                    padding-top:4px;">
                                    <tr>
                                        <td style="width:50%; border-bottom: 1px solid #333;">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%; text-align: center;">
                                            Oficial de Credito<br>(Firma y Sello)
                                        </td>
                                    </tr>
                                </table>
                                <br>

                                <div style="'width: 100%; height: auto; margin: 0 0 5px 0;">
                    <?php
                    if ((boolean) $row['facultativo'] === true) {
                        if ((boolean) $row['aprobado'] === true) {
                            ?>
                                            <table border="0" cellpadding="1" cellspacing="0" style="width: 100%; font-size: 8px; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
                                                <tr>
                                                    <td colspan="7" style="width:100%; text-align: center; font-weight: bold; background: #e57474; color: #FFFFFF;">Caso Facultativo</td>
                                                </tr>
                                                <tr>

                                                    <td style="width:5%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Aprobado</td>
                                                    <td style="width:5%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Tasa de Recargo</td>
                                                    <td style="width:7%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Porcentaje de Recargo</td>
                                                    <td style="width:7%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Tasa Actual</td>
                                                    <td style="width:7%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Tasa Final</td>
                                                    <td style="width:69%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Observaciones</td>
                                                </tr>
                                                <tr>
                            <?php
                            if ($row['tasa_actual'] == "0.03") {
                                $tasa_cr = '0,029';
                            } else {
                                $tasa_cr = $row['tasa_actual'];
                            }
                            if ($row['tasa_final'] == "0.030") {
                                $tasa_cr_fin = '0,029';
                            } else {
                                $tasa_cr_fin = $row['tasa_final'];
                            }
                            ?>
                                                    <td style="width:5%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?= strtoupper($row['aprobado']); ?></td>
                                                    <td style="width:5%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?= strtoupper($row['tasa_recargo']); ?></td>
                                                    <td style="width:7%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?= $row['porcentaje_recargo']; ?> %</td>
                                                    <td style="width:7%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?= $tasa_cr ?> %</td>
                                                    <td style="width:7%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?= $tasa_cr_fin; ?> %</td>
                                                    <td style="width:69%; text-align: justify; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?= $row['motivo_facultativo']; ?> |<br /><?= $row['observacion']; ?></td>
                                                </tr>
                                            </table>

                            <?php
                        } else {
                            ?>
                                            <table border="0" cellpadding="1" cellspacing="0" style="width: 80%; font-size: 9px; border-collapse: collapse; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">         
                                                <tr>
                                                    <td  style="text-align: center; font-weight: bold; background: #e57474; color: #FFFFFF;">
                                                        Caso Facultativo
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">
                                                        Observaciones
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: justify; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?= $row['motivo_facultativo']; ?></td>
                                                </tr>
                                            </table>
                            <?php
                        }
                    }
                    ?>
                                </div>

                                <div style="'width: 100%; height: auto; margin: 0 0 5px 0;">
                                    <?php
                                    $queryVar = 'set @anulado = "Polizas Anuladas: ";';
                                    if ($link->query($queryVar, MYSQLI_STORE_RESULT)) {
                                        $canceled = "select 
										max(@anulado:=concat(@anulado, prefijo, '-', no_emision, ', ')) as cert_canceled
									from
										s_de_em_cabecera
									where
										anulado = 1
											and id_cotizacion = '" . $row['id_cotizacion'] . "';";
                                        if ($resp = $link->query($canceled, MYSQLI_STORE_RESULT)) {
                                            $regis = $resp->fetch_array(MYSQLI_ASSOC);
                                            echo '<span style="font-size:8px;">' . trim($regis['cert_canceled'], ', ') . '</span>';
                                        } else {
                                            echo "Error en la consulta " . "\n " . $link->errno . ": " . $link->error;
                                        }
                                    } else {
                                        echo "Error en la consulta " . "\n " . $link->errno . ": " . $link->error;
                                    }
                                    ?>
                                </div>     
                            </div>            
                                    <?php
                                    if ($type !== 'MAIL' && (boolean) $row['emitir'] === true && (boolean) $row['anulado'] === false) {
                                        $arr = explode(',', $row['fecha_emision']);
                                        $departamento = $arr[0];
                                        $fecha_emi = $arr[1];
                                        $fecha_emi = str_replace('/', '-', $fecha_emi);
                                        $newDateEmi = date("Y-m-d", strtotime($fecha_emi));

                                        $fecha = new DateTime($newDateEmi);
                                        $year = $fecha->format('Y');
                                        $month = num_to_string_date($fecha->format('n'));
                                        $day = $fecha->format('d');
                                        ?>        
                                <page><div style="page-break-before: always;">&nbsp;</div></page>

                                <?php
                                $font_size_parent = ' font-size:7px;';
                                $font_size_child = ' font-size:8px;';
                                if ($type == 'PDF') {
                                    $font_size_parent = ' font-size:9px;';
                                    $font_size_child = ' font-size:8px;';
                                }
                                ?>
                                <div style="width: 775px; border: 0px solid #FFFF00;">
                                    <table 
                                        cellpadding="0" cellspacing="0" border="0" 
                                        style="width: 100%; height: auto; font-family: Arial;">
                                        <tr>
                                            <td>
                                                <div style="text-align: center;  font-size: <?= $font_size_parent ?>">
                                                    <strong>CERTIFICADO DE COBERTURA INDIVIDUAL<br>
                                                        SEGURO DE DESGRAVAMEN HIPOTECARIO<br>
                                                        Resolución Administrativa No.081 del 10/03/00<br>
                                                        Codigo 206-934901-2000 03 006 4008<br>
                                                        POLIZA Nº <?= $row['no_poliza']; ?><br>
                                                        CERTIFICADO Nº <?= $row['no_emision']; ?>
                                                    </strong><br/>
                                                    <br>
                                                </div><br/><br/>

                                                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: auto; font-family: Arial; margin-bottom: 2px; <?= $font_size_parent ?>">
                                                    <tr>
                                                        <td style="width: 100%;">
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%; <?= $font_size_child ?>">
                                                                <tr>
                                                                    <td style="width: 100%;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%; <?= $font_size_child ?>">
                                                                            <tr>
                                                                                <td style="width: 16%; font-weight: bold; text-align: left;">
                                                                                    TOMADOR
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 22%; text-align: left;">
                        <?= $row['ef_nombre']; ?>
                                                                                </td>
                                                                                <td style="width: 14%;"></td>
                                                                                <td style="text-align: left; width: 45%;">INFORMACION DE LA ENTIDAD ASEGURADORA :</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 100%;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%; <?= $font_size_child ?>">
                                                                            <tr>
                                                                                <td style="width: 16%; font-weight: bold; text-align: left;">
                                                                                    ASEGURADO
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 29%; text-align: left;">
                        <?= $rowcl['nombre_completo']; ?> 
                                                                                </td>
                                                                                <td style="width: 6%;"></td>
                                                                                <td style="width: 10%; font-weight: bold; text-align: left;">
                                                                                    RAZON SOCIAL
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 35%; text-align: left;">
                        <?= $row['compania'] ?>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 100%;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%; <?= $font_size_child ?>">
                                                                            <tr>
                                                                                <td style="width: 16%; font-weight: bold; text-align: left;">
                                                                                    BENEFICIARIO
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 29%; text-align: left;">
                        <?= $row['ef_nombre']; ?>
                                                                                </td>
                                                                                <td style="width: 6%;"></td>
                                                                                <td style="width: 10%; font-weight: bold; text-align: left;">
                                                                                    DIRECCIÓN
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 35%; text-align: left;">
                                                                                    SCZ. Av. Santa Cruz 2do. Anillo (Entre Paraguá y Canal Cotoca) Esq. Jaurú
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 100%;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%; <?= $font_size_child ?>">
                                                                            <tr>
                                                                                <td style="width: 16%; font-weight: bold; text-align: left;">
                                                                                    BENEFICIARIOS DE COBERTURAS ADICIONALES
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 29%; text-align: left;">
                                                                                    Ninguno
                                                                                </td>
                                                                                <td style="width: 6%;"></td>
                                                                                <td style="width: 10%; font-weight: bold; text-align: left;">
                                                                                    TELEFONO
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 35%; text-align: left;">
                                                                                    800 - 10 7000
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 100%;">


                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%; <?= $font_size_child ?>">
                                                                            <tr>
                                                                                <td style="width: 16%; font-weight: bold; text-align: left;">
                                                                                    VIGENCIA DE LA COBERTURA
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 29%; text-align: left;">
                        <?php
                        $fecha_db = $row['fecha_real'];
                        $fecha_db = explode("-", $fecha_db);

                        $fecha_cambiada = mktime(0, 0, 0, $fecha_db[1] + $plazo, $fecha_db[2], $fecha_db[0]);
                        $fecha = date("d/m/Y", $fecha_cambiada);
                        ?>
                                                                                    <?= $row['fecha_emision'] ?> Desde las 00:01 hasta las 24:00 del <?= $fecha ?> 
                                                                                </td>
                                                                                <td style="width: 6%;"></td>
                                                                                <td style="width: 10%; font-weight: bold; text-align: left;">
                                                                                    FAX
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 35%; text-align: left;">

                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 100%;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%; <?= $font_size_child ?>">
                                                                            <tr>
                                                                                <td style="width: 16%; font-weight: bold; text-align: left;">
                                                                                    CIUDAD
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 29%; text-align: left;">
                        <?= $row['u_departamento'] ?>
                                                                                </td>
                                                                                <td style="width: 6%;"></td>
                                                                                <td style="width: 10%; font-weight: bold; text-align: left;">
                                                                                    E-MAIL
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 35%; text-align: left;">

                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 100%;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%; <?= $font_size_child ?>">
                                                                            <tr>
                                                                                <td style="width: 16%; font-weight: bold; text-align: left;">

                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 29%; text-align: left;">

                                                                                </td>
                                                                                <td style="width: 6%;"></td>
                                                                                <td style="width: 10%; font-weight: bold; text-align: left;">
                                                                                    PAGINA WEB
                                                                                </td>
                                                                                <td style="width: 2%;">:</td>
                                                                                <td style="width: 35%; text-align: left;">
                                                                                    www.nacionalseguros.com.bo    
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: auto; <?= $font_size_parent ?> font-family: Arial;">
                                                    <tr>
                                                        <td style="width: 49%;" valign="top">
                                                            <div style="text-align: justify;">
                                                                El presente certificado de cobertura individual tiene validez legal para toda entidad aseguradora que opera en
                                                                la modalidad de seguros de personas y que otorga el seguro de desgravamen hipotecario, para lo cual el
                                                                asegurado expresa de manera voluntaria su adhesión al presente seguro.
                                                                <b></b><br>
                                                                <b>VIGENCIA DE LA COBERTURA INDIVIDUAL DEL ASEGURADO:</b> La vigencia individual de la cobertura
                                                                para cada Asegurado será mensual renovable automáticamente, iniciándose en el momento del desembolso
                                                                del Préstamo por parte de la Entidad de Intermediación Financiera a favor del Asegurado (Prestatario) y
                                                                finalizando en el momento de la extinción de la operación de préstamo. Esta vigencia se interrumpirá en caso
                                                                de incumplimiento de pago de la prima correspondiente, treinta dias después de la fecha de vencimiento de
                                                                pago.<br>
                                                                Los reemplazos de la Entidad Aseguradora que se dieran durante el periodo de vigencia del préstamo, no
                                                                interrumpirán la vigencia de la cobertura individual.<br>
                                                                <b>CAPITAL ASEGURADO:</b> El Capital Asegurado durante la vigencia de la Póliza corresponderá, para la
                                                                cobertura de Fallecimiento o Invalidez Total y Permanente de la Póliza de Seguro de Desgravamen Hipotecario,
                                                                al Valor del Saldo Insoluto de la Deuda; y para las Coberturas Adicionales corresponderá al valor establecido
                                                                en el presente Certificado.<br>
                                                                <b>PRIMA:</b> El monto de la Prima de Tarifa del Seguro Desgravamen Hipotecario se determinara aplicando la tasa
                                                                neta al Capital Asegurado.<br>
                                                                <b>COBERTURAS:</b><br>
                                                            </div>

                                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; <?= $font_size_child ?>">
                                                                <tr>
                                                                    <td style="width:50%;" align="left" valign="top"><b>COBERTURAS BASICAS</b> (considerando las exclusiones de la póliza)</td>
                                                                    <td style="width:50%;">
                                                                        &nbsp;&nbsp;&nbsp;&bull;Fallecimiento por cualquier causa.<br>
                                                                        &nbsp;&nbsp;&nbsp;&bull;Invalidez Total y Permanente.<br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:50%;" align="left" valign="top"><b>COBERTURAS ADICIONALES</b></td>
                                                                    <td style="width:50%;">
                                                                        &nbsp;&nbsp;&nbsp;&bull;Gastos de Sepelio.<br>
                                                                        &nbsp;&nbsp;&nbsp;&bull;Capital Adicional Indemnizatorio (Sin Cobertura).<br>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            <b>PERMANENCIA EN EL SEGURO:</b><br>
                                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; <?= $font_size_child ?>">
                                                                <tr>
                                                                    <td style="width: 50%; text-align: center;">
                                                                        <b>Fallecimiento</b><br>
                                                                        Hasta cumplir los 75 años y 364 dias.
                                                                    </td>
                                                                    <td style="width: 50%; text-align: center;">
                                                                        <b>Invalidez Total y Permanente</b><br>
                                                                        Hasta cumplir los 70 años y 364 dias.
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            <div style="text-align: justify;">
                                                                <b>CONDICIONES DE LA POLIZA DE SEGURO DE DESGRAVAMEN HIPOTECARIO</b><br>
                                                                <b>COBERTURA DEL SEGURO:</b> El Capital Asegurado será pagado por la Entidad Aseguradora, cuando ocurra
                                                                uno de los siguientes eventos:<br>
                                                                <b>Fallecimiento:</b> La muerte por cualquier causa del Asegurado, si esta ocurriera durante la vigencia de la
                                                                Póliza y la causa no se encuentre expresamente excluida.<br>
                                                                <b>Invalidez Total y Permanente:</b> Cuando la situación fisica del Asegurado como consecuencia de una
                                                                enfermedad o accidente presenta una pérdida o disminución de su capacidad fisica y/o intelectual, igual o
                                                                superior al 60% de su capacidad de trabajo, siempre que el grado de tal incapacidad sea reconocido y
                                                                formalizado por el Instituto Nacional de Salud Ocupacional (INSO) o la Entidad Encargada de Calificar (EEC) o
                                                                por un médico calificador debidamente registrado en la APS.<br>
                                                                <b>EXCLUSIONES DE COBERTURA:</b> La Entidad Aseguradora no cubrirá y estará eximida de toda
                                                                responsabilidad, en caso que el Fallecimiento o Invalidez Total y Permanente del Asegurado sobrevenga,
                                                                directa o indirectamente, como consecuencia de:
                                                            </div>

                                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; <?= $font_size_child ?>">
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">a.</td>
                                                                    <td style="width:98%;">Enfermedad preexistente que no fue comunicada por el Asegurado a través del Formulario de Solicitud de
                                                                        Seguro y Declaración de Salud.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">b.</td>
                                                                    <td style="width:98%;">Intervención directa o indirecta del Asegurado en actos criminales, que le ocasionen el Fallecimiento o
                                                                        Invalidez Total y Permanente.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">c.</td>
                                                                    <td style="width:98%;">Guerra internacional o civil (declarada o no), revolución, invasión, actos de sublevación, rebelión, sedición,
                                                                        motin o hechos que las leyes califican como delitos contra la seguridad del Estado.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">d.</td>
                                                                    <td style="width:98%;">Fisión, fusión nuclear o contaminación radioactiva.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">e.</td>
                                                                    <td style="width:98%;">Realización o participación en una actividad o deporte riesgoso no declarada por el Asegurado a través del
                                                                        Formulario de Solicitud de Seguro y Declaración de Salud, considerándose como tales aquellos que
                                                                        objetivamente constituyan una agravación del riesgo o se requiera de medidas de protección o seguridad
                                                                        para realizarlos.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">f.</td>
                                                                    <td style="width:98%;">Suicidio causado dentro de los dos primeros años a partir del desembolso del préstamo.
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            <div style="text-align: justify;">
                                                                <b>OBLIGACIÓN DE DECLARAR DEL ASEGURADO:</b> El Asegurado está obligado a declarar objetiva y
                                                                verazmente las afectaciones de salud que tiene y todo hecho y circunstancias que tengan importancia para la
                                                                determinación del estado de riesgo, tal como lo conozca; a través del Formulario de Declaración de Salud
                                                                proporcionado por la Entidad Aseguradora.<br>
                                                                Si se extendió la póliza de Seguro de Desgravamen Hipotecario sin exigir al Asegurado las declaraciones
                                                                escritas, se presume que la Entidad Aseguradora conocia el estado de riesgo, salvo que ésta pruebe dolo o
                                                                mala fe del Asegurado.<br>
                                                                <b>RETICENCIA O INEXACTITUD:</b> La reticencia o inexactitud en las declaraciones del Asegurado en el
                                                                Formulario de Declaración de Salud hacen anulable el Certificado de Cobertura, siempre y cuando dicha
                                                                reticencia o inexactitud suponga ocultación de antecedentes, de tal importancia que, de ser conocidos por la
                                                                Entidad Aseguradora, ésta no habrá otorgado la o las coberturas del contrato o de hacerlo, lo hubiera hecho
                                                                en condiciones distintas. La Entidad Aseguradora deberá demostrar este aspecto al momento de alegar
                                                                reticencia o inexactitud.<br>
                                                                Las declaraciones falsas o reticentes hechas con dolo o mala fe por parte del Asegurado hacen nula la
                                                                Cobertura Individual, en tal caso del Asegurado no tendrá derecho a la devolución de primas pagadas.
                                                                Se presume la buena fe del Asegurado, correspondiendo probar lo contrario a la Entidad Aseguradora.
                                                                La Entidad Aseguradora no puede alegar reticencia o inexactitud, en los siguientes casos:
                                                            </div>

                                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; <?= $font_size_child ?>">
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">a.</td>
                                                                    <td style="width:98%;">Si la reticencia o inexactitud no implica un mayor riesgo, tal que conocidos por la Entidad Aseguradora los
                                                                        hechos o estados de situación verdaderos, la misma admitiría el riesgo sin recargo alguno.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">b.</td>
                                                                    <td style="width:98%;">Si la Entidad Aseguradora otorga cobertura al Asegurado con el Certificado de Cobertura Individual sin
                                                                        exigir la Declaración de Salud.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">c.</td>
                                                                    <td style="width:98%;">Si el Asegurado al momento de su Declaración de Salud no conocia el estado del riesgo.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">d.</td>
                                                                    <td style="width:98%;">Si la Entidad Aseguradora no pidió antes de la emisión del Certificado de Cobertura Individual, las
                                                                        aclaraciones en puntos manifiestamente vagos y/o imprecisos de las declaraciones.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">e.</td>
                                                                    <td style="width:98%;">Si la Entidad Aseguradora por otros medios de manera previa a la aceptación del estado de riesgo tuvo
                                                                        conocimiento del verdadero estado del riesgo.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" align="left" valign="top">f.</td>
                                                                    <td style="width:98%;">Si la reticencia o inexactitud no tiene relación con la producción del siniestro o sus efectos.
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            <div style="text-align: justify;">
                                                                <b>INDISPUTABILIDAD:</b> La validez de esta Póliza y su Cobertura no será discutida después de transcurridos
                                                                los dos años desde el momento de la fecha de desembolso del préstamo y de la aceptación expresa o táctica
                                                                de la Entidad Aseguradora.<br>
                                                            </div>

                                                        </td>
                                                        <td style="width: 2%;"></td>
                                                        <td style="width: 49%;" valign="top">

                                                            <div style="text-align: justify">
                                                                Si dentro de los dos años desde la fecha de desembolso del préstamo, la Entidad Aseguradora no ha
                                                                pretendido impugnar o anular dicha cobertura por reticencia o inexactitud en las Declaraciones de Salud del
                                                                Asegurado. La Entidad Aseguradora pasado dicho plazo, está impedida de pretender la impugnación o
                                                                anulación.<br>
                                                                Para efectos de cómputo del plazo mencionado precedentemente, se considerará la permanencia continua e
                                                                ininterrumpida de la Cobertura Individual, no obstante la misma hubiera sido otorgada por más de una
                                                                Entidad Aseguradora.<br>
                                                                La falta de pago de primas por parte del Asegurado libera a la Entidad Aseguradora a Indemnizar en caso de
                                                                producido evento.<br>
                                                                <b>SUICIDIO:</b> La Entidad Aseguradora no se libera de pagar el siniestro correspondiente, en
                                                                caso de producirse el suicidio del Asegurado, después de dos años desde el desembolso del préstamo.<br>
                                                                <b>PRIMA Y REHABILITACION:</b> La Prima de Tarifa a ser pagada por el Asegurado, resultará del producto de
                                                                una tasa neta mensual aplicable al Capital Asegurado.<br>
                                                                La prima es debida desde el momento de la celebración del contrato, pero no es exigible sino con la emisión
                                                                del presente Certificado de Cobertura Individual.<br>
                                                                El pago de la prima deberá ser efectuado mensualmente por el Asegurado a la Entidad Aseguradora, a
                                                                través de la Entidad de Intermediación Financiera, designada por la Entidad Aseguradora, en las mismas
                                                                fechas del cronograma de amortización del préstamo, salvo que en el Condicionado Particular de la Póliza se
                                                                establezca una modalidad diferente. No incurre en mora el Asegurado, si el domicilio de la Entidad Aseguradora o el lugar en la Póliza ha
                                                                sido cambiado sin su conocimiento.<br>
                                                                El incumplimiento de pago de la prima (30) dias después de la fecha en que debió efectuarse, interrumpirá la
                                                                vigencia de la Cobertura Individual del Asegurado.<br>
                                                                El Asegurado o el Tomador del seguro puede, en cualquier momento, rehabilitar la Cobertura, con el pago de
                                                                la(s) prima(s) atrasada(s) y los intereses devengados sin la necesidad de examen médico.<br>
                                                                El abono de las primas de la Entidad de Intermediación Financiera a la Entidad Aseguradora, en forma
                                                                posterior a la fecha en que el Asegurado pagó la prima, no significará mora o incumplimiento atribuible al
                                                                Asegurado, y cualquier contingencia o perjuicio que causen dichas situaciones al Asegurado, serán de
                                                                responsabilidad plena de la Entidad de Intermediación Financiera.<br>
                                                                <b>PROCEDIMIENTO EN CASO DE SINIESTRO:</b> El Asegurado o Beneficiario, en un plazo máximo de quince
                                                                (15) dias calendario de tener conocimiento del siniestro, deberá comunicar tal hecho a la Entidad
                                                                Aseguradora, salvo fuerza mayor o impedimento justificado.<br>
                                                                La Entidad Aseguradora debe pronunciarse sobre el derecho del Asegurado o Beneficiario dentro de los (30)
                                                                dias de recibida la información y evidencias del Siniestro. Se dejará constancia escrita de la fecha de
                                                                recepción de la información y evidencias a afecto del cómputo de plazos.<br>
                                                                El plazo de (30) dias mencionado, fenece con la aceptación o rechazo del Siniestro o con la solicitud de la
                                                                Entidad Aseguradora al Asegurado para que se complemente la información, y este plazo no vuelve a correr
                                                                hasta que el Asegurado haya cumplido con tales requerimientos.<br>
                                                                La solicitud de complementación por parte de la Entidad Aseguradora no podrá extenderse por más de dos
                                                                veces a partir de la primera solicitud de informes y evidencias, debiendo pronunciarse dentro del plazo
                                                                establecido y de manera definitiva sobre el derecho del Asegurado y/o Beneficiario, después de la entrega
                                                                por parte del Asegurado y/o Beneficiario del último requerimiento de información.<br>
                                                                El silencio de la Entidad Aseguradora, vencido el término para pronunciarse o vencida(s) la(s) solicitud(es) de
                                                                complementación, importa la aceptación del reclamo.
                                                            </div>
                                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; <?= $font_size_child ?>">
                                                                <tr>
                                                                    <td style="text-align:left; font-weight: bold;" colspan="2">
                                                                        a) Documentación para el pago de indemnización en caso de Fallecimiento del Asegurado.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="width:5%; padding-left: 6px;" valign="top">-</td>
                                                                    <td style="width:94%; text-align: justify;">
                                                                        Certificado de Defunción extendido por el Oficial de Registro Civil. Si el asegurado hubiera fallecido fuera
                                                                        del pais, el indicado Certificado deberá llevar las legalizaciones correspondientes del consulado boliviano del
                                                                        pais donde hubiera ocurrido el hecho o el consulado boliviano más accesible, y el de la Autoridad
                                                                        Competente en territorio del Estado Plurinacional de Bolivia.<br>
                                                                        En caso de que la obtención del Certificado de Defunción fuera dificultosa por ausencia de Oficinas de
                                                                        Registro Civil en la jurisdicción municipal del domicilio del Asegurado siniestrado o en la jurisdicción
                                                                        municipal colindante del municipio donde vive el Asegurado siniestrado, podrá ser aceptada una certificación
                                                                        extendida por la autoridad comunitaria competente del lugar de ocurrencia del siniestro, con la participación
                                                                        de dos personas en calidad de testigos.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="width:5%; padding-left: 6px;" valign="top">-</td>
                                                                    <td style="width:94%; text-align: justify;">
                                                                        Documento de Identificación del Asegurado.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="width:5%; padding-left: 6px;" valign="top">-</td>
                                                                    <td style="width:94%; text-align: justify;">
                                                                        Formulario de declaración de siniestro o nota de denuncia del siniestro.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="width:5%; padding-left: 6px;" valign="top">-</td>
                                                                    <td style="width:94%; text-align: justify;">
                                                                        Documento de Pre-liquidación del préstamo emitido por el Tomador.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:left; font-weight: bold;" colspan="2">
                                                                        b) Documentación para el Pago de la indemnización en caso de Invalidez Total y Permanente.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="width:5%; padding-left: 6px;" valign="top">-</td>
                                                                    <td style="width:94%; text-align: justify;">
                                                                        Declaración Médica de Invalidez, emitida por el Instituto Nacional de Salud Ocupacional (INSO) o por la
                                                                        Entidad Encargada de Calificación (EEC) o por el médico calificador registrado en la APS.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="width:5%; padding-left: 6px;" valign="top">-</td>
                                                                    <td style="width:94%; text-align: justify;">
                                                                        Documento de Identificación del Asegurado.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="width:5%; padding-left: 6px;" valign="top">-</td>
                                                                    <td style="width:94%; text-align: justify;">
                                                                        Formulario de declaración de siniestro o nota de denuncia del siniestro.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="width:5%; padding-left: 6px;" valign="top">-</td>
                                                                    <td style="width:94%; text-align: justify;">
                                                                        Documento de Pre-liquidación del préstamo emitido por el Tomador.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <b>PERDIDA DEL DERECHO A LA INDEMINIZACIÓN:</b> El Asegurado o el Beneficiario pierde el derecho a la
                                                            indemnización o pago de prestaciones convencidas, cuando:

                                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; <?= $font_size_child ?>">
                                                                <tr>
                                                                    <td style="width:2%;" valign="top">a</td>
                                                                    <td style="width:98%;">Provoque dolosamente el siniestro. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" valign="top">b</td>
                                                                    <td style="width:98%;">
                                                                        Oculte o altere, maliciosamente en la verificación del siniestro, los hechos y circunstancias relacionados al
                                                                        aviso del siniestro y la documentación requerida por la Entidad Aseguradora.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:2%;" valign="top">c</td>
                                                                    <td style="width:98%;">Recurra a pruebas falsas con el ánimo de obtener un beneficio ilicito.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <div style="text-align: justify;">
                                                                <b>CONTROVERSIAS:</b> Las controversias de hecho sobre las caracteristicas técnicas del seguro, serán
                                                                resueltas a través del peritaje, de acuerdo a lo establecido en la Póliza de Seguro y el presente Certificado.
                                                                Si por esta via no se llegara a un acuerdo sobre dichas controversias, éstas deberán definirse por la via del
                                                                arbitraje.<br>
                                                                Las partes, de común acuerdo, podrán nombrar un perito único; si no hubiera acuerdo cada parte nombrará
                                                                el suyo y un tercero dirimidor. Este último será designado por el Juez, si las partes no acuerdan su
                                                                nombramiento.<br>
                                                                Las controversias de derecho suscitadas entre las partes sobre la naturaleza y alcance del contrato de
                                                                seguro, serán resueltas únicamente por la via del arbitraje de acuerdo a lo previsto en la Ley Nº 708 de 25 de
                                                                junio de 2015.<br>
                                                                La Autoridad de Fiscalización y Control de Pensiones y Seguros podrá fungir como instancia de conciliación,
                                                                para todo siniestro cuya cuantia no supere el monto de UFV100.000, 00.- (Cien Mil 00/100 Unidades de
                                                                Fomento a la Vivienda). Si por esta via y considerando dicha cuantia, no existiera un acuerdo, la Autoridad de
                                                                Fiscalización y Control de Pensiones y Seguros podrá conocer y resolver la controversia por Resolución
                                                                Administrativa debidamente motivada.
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr><td>

                                                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                                    <tr>
                                                        <td style="width:30%; text-align:right;"><img src="img/<?= $imagen_firma_1 ?>" width="115"/></td>
                                                        <td style="width:40%;"></td>
                                                        <td style="width:30%; text-align:left;"><img src="img/<?= $imagen_firma_2 ?>" width="115"/></td>
                                                    </tr>
                                                </table>
                                            </td></tr>
                                    </table>     
                                </div>
                        <?php
                    }
                    if ($k < $nCl) {
                        echo'<page><div style="page-break-before: always;">&nbsp;</div></page>';
                    }
                }
            }
            if ($ct < 1) {
                echo'<page><div style="page-break-before: always;">&nbsp;</div></page>';
            }
            $ct++;
        }
        if ($fac === TRUE) {
            $url .= 'index.php?ms=' . md5('MS_DE') . '&page=' . md5('P_fac') . '&ide=' . base64_encode($row['id_emision']) . '';
            ?>  
                    <br/>
                    <div style="width:500px; height:auto; padding:10px 15px; font-size:11px; font-weight:bold; text-align:left;">
                        No. de Slip de Cotizaci&oacute;n: <?= $row['no_cotizacion']; ?>
                    </div><br>
                    <div style="width:500px; height:auto; padding:10px 15px; border:1px solid #FF2D2D; background:#FF5E5E; color:#FFF; font-size:10px; font-weight:bold; text-align:justify;">
                        Observaciones en la solicitud del seguro:<br><br><?= $reason; ?>
                    </div>
                    <div style="width:500px; height:auto; padding:10px 15px; font-size:11px; font-weight:bold; text-align:left;">
                        Para procesar la solicitud ingrese al siguiente link con sus credenciales de usuario:<br>
                        <a href="<?= $url; ?>" target="_blank">Procesar caso facultativo</a>
                    </div>
            <?php
        }
    }
    ?>
        </div>
    </div>
            <?php
            $html = ob_get_clean();
            return $html;
        }
        ?>