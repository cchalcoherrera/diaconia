<?php

function de_sc_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '') {
    $conexion = $link;

    $fontSize = 'font-size: 75%;';
    $fontsizeh2 = 'font-size: 80%';
    $width_ct = 'width: 700px;';
    $width_ct2 = 'width: 695px;';
    $marginUl = 'margin: 0 0 0 20px; padding: 0;';

    $tipo_cambio = (float) $row['tipo_cambio'];
    $abrv = '';

    $response = json_decode($row['data'], true);
    $num_titulares = $rsDt->num_rows;


    ob_start();
    ?>
    <div style="width: 775px; height: auto; border: 0px solid #0081C2; padding: 10px;">
        <div style="width: 770px; font-weight: normal; font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #000000; border: 0px solid #FFFF00;">

            <div style="width: 770px; border: 0px solid #FFFF00; text-align:center; margin-bottom: 10px;">
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                    <tr>
                        <td style="width:34%; text-align: left;">
                            <img src="images/<?= $row['logo_ef']; ?>" height="50">
                        </td>
                        <td style="width:32%;"></td>
                        <td style="width:34%; text-align: right;">
                            <img src="images/<?= $row['logo_cia']; ?>" height="50">
                        </td>
                    </tr>
                    <?php
                    list($year, $mon, $day) = explode('-', $row['fecha_creacion']);
                    $row['fecha_creacion'] = date('d/m/Y', mktime(0, 0, 0, $mon, $day + 2, $year));
                    ?>
                    <tr>
                        <td style="width:34%; text-align: left;">SLIP DE COTIZACIÓN DE-<?= $row['no_cotizacion']; ?></td>
                        <td style="width:32%;"></td>
                        <td style="width:34%; text-align: right;">Cotización válida hasta el: <?= $row['fecha_creacion']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width:100%; text-align: center;">
                            SLIP DE COTIZACIÓN<br/>
                            DECLARACION JURADA DE SALUD<br/>
                            SOLICITUD DE SEGURO DE DESGRAVAMEN HIPOTECARIO
                        </td>
                    </tr>
                </table>
            </div>
            <div style="width: 770px; border: 0px solid #FFFF00; text-align:center; margin-bottom: 8px;">

                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                    <tr>
                        <td colspan="2" style="width:100%;  text-align: left; font-weight: bold; padding-bottom: 8px;">
                            Datos de la solicitud de Crédito
                        </td>
                    </tr>

                    <tr style="background:#E5E5E5;">
                        <td style="width:50%; text-align:right; height: 20px; vertical-align: middle;"><b>Tipo Cobertura:</b></td>
                        <td style="width:50%; text-align: left; vertical-align: middle;">Individual - Mancomuno</td>
                    </tr>
                    <tr style="background:#D5D5D5;">
                        <td style="width:50%; text-align:right; height: 20px; vertical-align: middle;">
                            <b>Monto Actual Solicitado:</b>
                        </td>
                        <td style="width:50%; text-align: left; vertical-align: middle;"><?= $row['monto'] . ' ' . $row['moneda']; ?></td>
                    </tr>
                    <tr style="background:#E5E5E5;">
                        <td style="width:50%; text-align:right; height: 20px; vertical-align: middle;">
                            <b>Plazo del Presente Crédito:</b>
                        </td>
                        <td style="width:50%; text-align: left; vertical-align: middle;">
    <?= $row['plazo'] . ' ' . $row['tipoplazo']; ?>
                        </td>
                    </tr>
                    <tr style="background:#D5D5D5;">
                        <td style="width:50%; text-align:right; height: 20px; vertical-align: middle;"><b>Producto:</b></td>
                        <td style="width:50%; text-align: left; vertical-align: middle;"><?= $row['producto']; ?></td>
                    </tr>
                </table>

            </div>

            <?php
            $titulares = array();
            $ct = 1;
            while ($regiDt = $rsDt->fetch_array(MYSQLI_ASSOC)) {
                $jsonData = $regiDt['respuesta'];
                $phpArray = json_decode($jsonData, true);
                switch ($row['moneda']) {
                    case 'BS':
                        $monto_final = $row['monto'];
                        break;
                    case 'USD':
                        $monto_final = $row['monto'] * $row['tipo_cambio'];
                }
                ?>
                <div style="width: 770px; border: 0px solid #FFFF00; text-align:center;">

                    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                        <tr>
                            <td style="width: 100%; text-align: left; padding-bottom: 8px; font-weight: bold;" colspan="4">Titular <?= $ct; ?></td>
                        </tr>
                        <tr style="font-weight:bold; background:#0075AA; color:#FFF;">
                            <td style="width:25%; text-align:center; font-weight:bold;">Apellido Paterno</td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Apellido Materno</td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Nombres</td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Apellido de Casada</td>
                        </tr>
                        <tr>
                            <td style="width:25%; text-align:center;"><?= $regiDt['paterno']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['materno']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['nombre']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['ap_casada']; ?></td>
                        </tr>
                        <tr style="font-weight:bold; background:#0075AA; color:#FFF;">
                            <td style="width:25%; text-align:center; font-weight:bold;">Lugar de Nacimiento</td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Pais</td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Fecha de Nacimiento</td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Lugar de Residencia</td>
                        </tr>
                        <tr>
                            <td style="width:25%; text-align:center;"><?= $regiDt['lugar_nacimiento']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['pais']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['fecha_nacimiento']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['lugar_residencia']; ?></td>
                        </tr>
                        <tr style="font-weight:bold; background:#0075AA; color:#FFF;">
                            <td style="width:25%; text-align:center; font-weight:bold;">
                                Documento de Identidad o Pasaporte
                            </td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Edad</td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Peso (kg)</td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Estatura (cm)</td>
                        </tr>
                        <tr>
                            <td style="width:25%; text-align:center;"><?= $regiDt['ci']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['edad']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['peso']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['estatura']; ?></td>
                        </tr>
                        <tr style="font-weight:bold; background:#0075AA; color:#FFF;">
                            <td colspan="2" style="width:50%; text-align:center; font-weight:bold;">
                                Dirección del Domicilio
                            </td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Tel. Domicilio</td>
                            <td style="width:25%; text-align:center; font-weight:bold;">Tel. Oficina</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width:50%; text-align:center;"><?= $regiDt['direccion']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['telefono_domicilio']; ?></td>
                            <td style="width:25%; text-align:center;"><?= $regiDt['telefono_oficina']; ?></td>
                        </tr>
                        <?php
                        if ($row['producto'] != 'BANCA COMUNAL') {
                            ?>
                            <tr style="font-weight:bold; background:#0075AA; color:#FFF;">
                                <td colspan="2" style="width:50%; text-align:center; font-weight:bold;">Ocupacións
                                </td>
                                <td colspan="2" style="width:50%; text-align:center; font-weight:bold;">
                                    Descripción
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width:50%; text-align:center;"><?= $regiDt['categoria'] ?>
                                </td>
                                <td colspan="2" style="width:50%; text-align:center;"><?= $regiDt['desc_ocupacion'] ?>
                                </td>
                            </tr>
                            <?php
                        } else {
                            ?>
                            <tr style="font-weight:bold; background:#0075AA; color:#FFF;">
                                <td style="width:25%; text-align:center; font-weight:bold;">
                                    Ocupación
                                </td>
                                <td style="width:25%; text-align:center; font-weight:bold;">
                                    Descripción
                                </td>
                                <td style="width:25%; text-align:center; font-weight:bold;">
                                    Monto Banca Comunal
                                </td>
                                <td style="width:25%; text-align:center; font-weight:bold;">
                                    Participacion %
                                </td>
                            </tr>
                            <tr>
                                <td style="width:25%; text-align:center;"><?= $regiDt['ocupacion']; ?></td>
                                <td style="width:25%; text-align:center;"><?= $regiDt['desc_ocupacion']; ?></td>
                                <td style="width:25%; text-align:center;"><?= $regiDt['monto_banca_comunal']; ?></td>
                                <td style="width:25%; text-align:center;"><?= $regiDt['porcentaje_credito']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>
                    <?php
                    $titulares[$ct] = $regiDt['nombre'] . ' ' . $regiDt['paterno'] . ' ' . $regiDt['materno'];
                    $num_question = count($phpArray);
                    ?>

                    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                        <tr>
                            <td style="text-align: left; width: 100%; font-weight: bold; padding-bottom: 8px;" colspan="<?= $num_question; ?>">Cuestionario</td>
                        </tr>
                        <?php
                        $cp = 0;
                        $error = array();
                        foreach ($phpArray as $key => $value) {
                            $vec = $value;
                            $id_pregunta = $vec['id'];
                            $respuesta = $vec['value'];
                            $select4 = "select
                                      pregunta,
                                      respuesta,
                                      orden
                                    from
                                      s_pregunta
                                    where
                                      id_pregunta=" . $id_pregunta . " and id_ef_cia='" . $row['id_ef_cia'] . "';";

                            $res4 = $conexion->query($select4, MYSQLI_STORE_RESULT);
                            $regi4 = $res4->fetch_array(MYSQLI_ASSOC);
                            ?>
                            <tr>
                                <td style="width: 5%; text-align: left;"><?= $regi4['orden']; ?></td>
                                <td style="width: 80%; text-align: left;"><?= $regi4['pregunta']; ?></td>
                                <?php
                                if ($respuesta == $regi4['respuesta']) {
                                    if ($respuesta == 1) {
                                        echo'<td style="width:15%; text-align:right;">si</td>';
                                    } elseif ($respuesta == 0) {
                                        echo'<td style="width:15%; text-align:right;">no</td>';
                                    }
                                } else {
                                    if ($respuesta == 1) {
                                        echo'<td style="width:15%; text-align:right;">si</td>';
                                    } elseif ($respuesta == 0) {
                                        echo'<td style="width:15%; text-align:right;">no</td>';
                                    }
                                    $error[$cp] = $regi4['orden'];
                                    $cp++;
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>

                    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                        <tr>
                            <td style="text-align: left; width: 100%; padding-bottom: 8px; padding-top: 8px;"><b>Detalle: </b><?= $regiDt['observacion']; ?></td>
                        </tr>
                        <tr>
                            <?php
                            $i = 1;
                            $sw = TRUE;
                            if (!empty($regiDt['observacion'])) {
                                while (($i <= 3) && ($sw === TRUE)) {
                                    $j = 1;
                                    while (($j <= 2) && ($sw === TRUE)) {
                                        $edad_min = $response['ranges'][$i]['range'][$j]['edad_min'];
                                        $edad_max = $response['ranges'][$i]['range'][$j]['edad_max'];
                                        $monto_min = $response['ranges'][$i]['range'][$j]['amount_min'];
                                        $monto_max = $response['ranges'][$i]['range'][$j]['amount_max'];
                                        $abrv = $response['ranges'][$i]['slug'];
                                        if (($regiDt['edad'] >= $edad_min) && ($regiDt['edad'] <= $edad_max) && ($monto_final >= $monto_min) && ($monto_final <= $monto_max)) {
                                            $sw = FALSE;
                                        }
                                        $j++;
                                    }
                                    $i++;
                                }
                                if (($abrv === 'AA') || ($abrv === 'FA')) {
                                    ?>
                                    <td style="width: 100%; text-align: left; border:1px solid #C68A8A; background:#FFEBEA;">
                                        No cumple con la(s) pregunta(s) ';
                                        <?php
                                        foreach ($error as $valor) {
                                            echo $valor . ',&nbsp;';
                                        }
                                        unset($error);
                                        ?>
                                        del cuestionario<br/><br/>
                                        <b>Nota:</b>&nbsp;Al no cumplir con una o mas preguntas del cuestionario del presente slip,
                                        la compañía de seguros solicitar&aacute; ex&aacute;menes m&eacute;dicos para
                                        la autorizaci&oacute;n de aprobaci&oacute;n del seguro o en su defecto podr&aacute;
                                        declinar la misma.
                                    </td>
                                    <?php
                                }
                            } else {
                                ?>
                                <td style="width: 100%; text-align: left; border: 1px solid #3B6E22; background: #6AA74F; color:#ffffff; height: 20px; vertical-align: middle;">
                                    Cumple con las preguntas del cuestionario
                                </td>
                                <?php
                            }
                            ?>
                        </tr>

                        <?php
                        $res = ($regiDt['peso'] + 100) - $regiDt['estatura'];
                        if ((($res >= 0) and ($res <= 15)) or (($res < 0) and ($res >= -15))) {
                            $dato = 1;
                        } elseif ($res < -15) {
                            $dato = 2;
                        } elseif ($res > 15) {
                            $dato = 3;
                        }
                        ?>
                        <tr>
                            <td style="width: 100%;">

                                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                                    <tr>
                                        <td style="text-align: left; width: 100%; font-weight: bold; padding-bottom: 8px;" colspan="3">Indice de Masa Corporal</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%;">
        <?= imc($dato); ?>
                                        </td>
                                        <td style="width: 30%;">
                                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                                                <tr>
                                                    <td style="width: 100%; color:#ffffff; background:#0075AA; height: 20px; text-align: left;" colspan="2">
                                                        Datos
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 70%; height: 20px;">
                                                        Estatura
                                                    </td>
                                                    <td style="width: 30%;">
        <?= $regiDt['estatura']; ?> cm
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 70%; height: 20px;">
                                                        Peso
                                                    </td>
                                                    <td style="width: 30%;">
        <?= $regiDt['peso']; ?> kg
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="width: 40%;"></td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <tr>
                            <?php
                            if ($dato == 1) {
                                ?>
                                <td style="width: 100%; border: 1px solid #3B6E22; background: #6AA74F; color:#ffffff; height: 20px; text-align: left; vertical-align: middle;">
                                    Cumple con la estatura y peso adecuado.
                                </td>
                                <?php
                            } else {
                                if (($abrv === 'AA') || ($abrv === 'FA')) {
                                    ?>
                                    <td style="width: 100%; text-align: left; border:1px solid #C68A8A; background:#FFEBEA;">
                                        <b>Nota:</b>&nbsp;Al no cumplir con el peso y la estatura adecuados,
                                        la compañía de seguros solicitar&aacute; ex&aacute;menes
                                        m&eacute;dicos para la autorizaci&oacute;n de aprobaci&oacute;n del seguro o
                                        en su defecto podr&aacute; declinar la misma.
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>

                    </table>
                </div>
                <?php
                if ($num_titulares >= 2) {
                    if ($ct == 1) {
                        echo'<page><div style="page-break-before: always;">&nbsp;</div></page>';
                    }
                }
                $ct++;
            }
            ?>
            <div style="width: 770px; border: 0px solid #FFFF00; text-align:justify; font-size: 80%; margin-top: 10px;">
                Declaro(amos) que las respuestas que he(mos) consignado en esta solicitud son verdaderas y completas y que es
                de mi (nuestro) conocimiento que cualquier declaraci&oacute;n inexacta, omisi&oacute;n u ocultaci&oacute;n
                har&aacute; perder todos los beneficios del seguro de acuerdo con el art&iacute;culo 1138 del C&oacute;digo
                de Comercio.<br/><br/>

                Asimismo autorizo(amos) a los m&eacute;dicos, cl&iacute;nicas, hospitales y otros centros de salud que me (nos)
                hayan atendido o que me (nos) atiendan en el futuro, para que proporcionen a <?= $row['compania']; ?>, todos los
                resultados de los informes referentes a mi (nuestra) salud, en caso de enfermedad o accidente, para lo cual
                releva a dichos m&eacute;dicos y centros m&eacute;dicos en relaci&oacute;n con su secreto profesional, de toda
                responsabilidad en que pudiera incurrir al proporcionar tales informes. Asimismo, autorizo(amos)
                a <?= $row['compania']; ?> a proporcionar &eacute;stos resultados a <?= $row['ef_nombre'] ?><br/><br/>

                <b>CONTRATANTE:</b> <?= $row['ef_nombre'] ?><br/>
                <b>BENEFICIARIO A TITULO ONEROSO:</b> <br/>

                <b>NACIONAL SEGUROS VIDA Y SALUD</b> , certifica que la persona
                prestataria del TOMADOR nominado en el contrato de Crédito del que forma parte este documento y que cumpla con
                los límites de edad y requisitos de asegurabilidad de la póliza se encuentra asegurada bajo la presente Póliza
                (ASEGURADO)<br/>
                La cobertura se inicia con el desembolso del Crédito, siempre que se haya cumplido con los requisitos de
                asegurabilidad y cuenten con la autorización de LA COMPAÑIA.<br/>

                <b>MANCOMUNOS</b> En caso de Créditos mancomunados, cada uno de los deudores es responsable por el 100% de la
                deuda. En caso de fallecimiento de uno de los mancómunos responsable mancomunadamente por el Crédito, LA
                COMPAÑIA indemnizará el 100% del capital asegurado al Beneficiario a la primera muerte, siempre y cuando ambos
                mancómunos sean aceptados por LA COMPAÑIA, firmen el contrato de Crédito, sean declarados en los listados
                mensuales, y se pague la prima correspondiente.<br/><br/>

            </div>
            <page><div style="page-break-before: always;">&nbsp;</div></page>
            <div style="width: 770px; border: 0px solid #FFFF00; text-align:justify; font-size: 80%;">
                <table cellpadding="0" cellspacing="0" border="0" style="width: 80%; font-size: 100%;">
                    <tr>
                        <td style="width:60%; text-align:center; background:#000; color:#FFF; height: 20px;">COBERTURA PRINCIPAL</td>
                        <td style="width:20%; text-align:center; background:#000; color:#FFF; height: 20px;">Capital Asegurado</td>
                    </tr>
                    <tr>
                        <td style="width:60%;">Muerte (Natural o Accidental)</td>
                        <td style="width:20%; text-align:center;">Saldo Deudor</td>
                    </tr>
                    <tr>
                        <td style="width:60%; text-align:center; background:#000; color:#FFF; height: 20px;">COBERTURAS ADICIONALES</td>
                        <td style="width:20%; text-align:center; background:#000; color:#FFF; height: 20px;">Capital Asegurado</td>
                    </tr>
                    <tr>
                        <td style="width:60%; text-align:justify;">Pago anticipado por Invalidez Total y Permanente: A los efectos de
                            la presente cobertura se considera Invalidez Total y Permanente el hecho de que el ASEGURADO, antes de
                            llegar a los 65 años de edad, quede incapacitado en por lo menos un 60%, a causa de un estado crónico,
                            debido a enfermedad, o a lesión o a la pérdida de miembros o funciones, que impida ejecutar cualquier
                            trabajo y siempre que el carácter de tal incapacidad sea reconocido.
                        </td><td style="width:20%; text-align:center;" valign="top">Saldo Deudor</td>
                    </tr>
                </table><br>
                <b>PROCEDIMIENTO EN CASO DE SINIESTRO:</b><br/>
                El Beneficiario a título oneroso, tan pronto y a más tardar dentro de los noventa (90) días calendario de tener
                conocimiento del fallecimiento de alguno de los ASEGURADOS, deberá comunicar tal hecho a LA COMPAÑIA, salvo
                fuerza mayor o impedimento justificado de acuerdo al artículo 1028 del Código de Comercio adjuntando pruebas
                del siniestro correspondiente. En caso de muerte presunta, ésta deberá acreditarse de acuerdo a ley.<br/>
                Una vez recibidos los documentos probatorios del fallecimiento del ASEGURADO, LA COMPAÑIA en caso de
                conformidad, pagará el Capital Asegurado correspondiente al Beneficiario.<br/>
                El asegurado o beneficiario, según el caso, tienen la obligación de facilitar, a requerimiento de LA COMPAÑIA
                todas las informaciones que tengan sobre los hechos y circunstancias del siniestro, a suministrar las
                evidencias conducentes a la determinación de la causa, identidad de las personas o intereses asegurados y
                cuantía de los daños, así como permitir las indagaciones pertinentes necesarias a tal objeto de acuerdo a lo
                establecido en el artículo 1031 del Código de Comercio.<br/>
                LA COMPAÑIA podrá solicitar o recabar informes o pruebas complementarias. LA COMPAÑIA debe pronunciarse sobre
                el derecho de EL TOMADOR dentro de los treinta (30) días de recibidos todos los informes, evidencias,
                documentos y/o requerimientos adicionales acerca de los hechos y circunstancias del siniestro. Esta solicitud
                no podrá excederse por mas de dos veces a partir de la primera solicitud de informes y evidencias debiendo LA
                COMPAÑIA pronunciarse dentro del plazo establecido y de manera definitiva sobre el derecho del ASEGURADO
                después de la entrega por parte del ASEGURADO del último requerimiento de información en base a lo establecido             en la Ley 365 de fecha 23 de abril de 2013, Disposiciones Adicionales Segunda, Párrafo II. LA COMPAÑIA
                procederá al pago del beneficio en el plazo máximo de 15 días posteriores al aviso del siniestro o tan pronto
                sean llenados los requerimientos señalados.<br/>
                La obligación de pagar el Capital Asegurado deberá ser cumplida por LA COMPAÑIA en un solo acto, por su valor
                total y en dinero.<br/>
                El beneficiario deberá presentar a LA COMPAÑIA la siguiente documentación además del Formulario de Aviso de
                Siniestro debidamente llenado y Certificado de Cobertura:<br/>
                <b>Para Muerte por cualquier causa:</b><br/>
                <ol style="margin: 0 0 0 20px; padding: 0; list-style-type:lower-alpha; width: 90%;">
                    <li>Fotocopia del Certificado de Nacimiento o Fotocopia del Carnet de Identidad del ASEGURADO.</li>
                    <li>Certificado de Defunción Original</li>
                    <li>Certificado Médico de Defunción Original o copia legalizada.</li>
                    <li>Para el caso de fallecimiento accidental, informe de la autoridad competente que atendió el mismo.</li>
                    <li>Liquidación de cartera con el monto indemnizable</li>
                    <li>Fotocopia del contrato de Crédito y respaldos de desembolso.</li>
                    <li>Extracto del préstamo por tipo de Crédito.</li>
                </ol><br/>
                LA COMPAÑIA se reserva el derecho de exigir a las autoridades competentes y a su costa, la autopsia o la
                exhumación del cadáver para establecer las causas de la muerte. El beneficiario y/o sucesores deben prestar su
                colaboración y concurso para la obtención de las correspondientes autorizaciones oficiales. Si el beneficiario
                y/o los sucesores se negaran a permitir dicha autopsia o exhumación, o la retardaran en la forma que ella sea
                útil para el fin perseguido, el beneficiario perderá el derecho a la indemnización del Capital Asegurado por
                esta Póliza.<br/>
                <b>Para Invalidez Total y Permanente</b><br/>
                Los incisos a), d), e), f), g) para Muerte y el Certificado INSO (Instituto Nacional de Salud Ocupacional) o
                en su defecto de otra institución o médico que esté debidamente autorizado por la Autoridad Competente la
                cual determine el grado de invalidez.<br/>
                <b>PRIMA Y FORMA DE PAGO:</b><br/>
                <b>Prima:</b> De acuerdo a las tasas establecidas para cada ASEGURADO, EL TOMADOR recaudará las Primas
                individuales de los ASEGURADOS a partir del día 01/01/2015.<br/>
                EL TOMADOR paga a LA COMPAÑIA la prima colectiva de toda la cartera sujeta a cobertura en la periodicidad
                establecida en las Condiciones Particulares de la póliza.<br/>
                Para todos los créditos desembolsados por EL TOMADOR antes de la fecha de vigencia de este documento, se
                respetarán los términos y condiciones de seguro respecto a la afiliación y pago de siniestros pactados entre EL
                TOMADOR y la aseguradora anterior (Stock).<br/>
                Nota.- El ASEGURADO contará con cobertura, mientras sus cuotas mensuales se encuentren pagadas.
            </div>
            <?php
            $cols = 3; //NUMERO DE COLUMNAS
            $num_reg = $num_titulares; //NUMERO DE REGISTROS
            $num_result = (round(($num_reg / $cols), 0, PHP_ROUND_HALF_UP));
            if ((int) ($num_result * $cols) >= $num_reg) {//SACAMOS NUMERO DE FILAS
                $rows = $num_result; //NUMERO DE FILAS
            } else {
                $rows = $num_result + 1; //NUMERO DE FILAS
            }
            $cell_number = (int) ($rows * $cols); //CANTIDAD DE CELDAS
            ?>

            <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size: 80%;">
                <?php
                $fl = 1;
                $ind = 1;
                while ($fl <= $rows) {
                    ?>
                    <tr>
                        <?php
                        $cl = 1;
                        while ($cl <= $cols) {
                            ?>
                            <td style="width:33.33%; text-align:left; height: 75px; border: 0px solid #0081C2;" valign="bottom">
                                <?php
                                if (!empty($titulares[$ind])) {
                                    ?>
                                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%; margin-bottom:5px; font-size: 100%;">
                                        <tr>
                                            <td style="width:70%; text-align: center;"><?= $titulares[$ind]; ?></td>
                                            <td style="width:30%; text-align: center;"><?= date('d-m-Y') ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:70%; text-align: center;">Firma Titular</td>
                                            <td style="width:30%; text-align: center;">Fecha Actual</td>
                                        </tr>
                                    </table>
                                    <?php
                                } else {
                                    echo'';
                                }
                                ?>
                            </td>
                            <?php
                            $cl++;
                            $ind++;
                        }
                        ?>
                    </tr>
                    <?php
                    $fl++;
                }
                ?>
            </table>

        </div>
    </div>
    <?php
    $html = ob_get_clean();
    return $html;
}

function imc($dato) {

    switch ($dato) :
        case 1: return 'Peso Normal';
        case 2: return 'Desnutricion';
        case 3: return 'Sobrepeso y Obesidad';
    endswitch;
}
?>