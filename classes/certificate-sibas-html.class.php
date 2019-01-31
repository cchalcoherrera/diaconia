<?php

require('includes-ce/certificate-DE-EM.inc_v1.php');
require('includes-ce/certificate-DE-EM.inc_v2.php');
require('includes-ce/certificate-DE-EM.inc_v3.php');
require('includes-ce/certificate-DE-SC.inc.php');
require('includes-ce/certificate-DE-EM-HIP.inc.php');
require('includes-ce/certificate-DE-EM-HIP-ANT.inc.php');

require_once __DIR__ . '/../app/controllers/DiaconiaController.php';
require_once __DIR__ . '/../app/controllers/QuestionController.php';

class CertificateHtml {

    protected $cx, $ide, $idc, $idef, $idcia,
            $type, $category, $product, $page, $nCopy, $error, $implant, $fac, $reason,
            $sqlPo, $sqlDt, $rsPo, $rsDt, $rowPo, $rowDt, $url,
            $html, $self, $host;
    public $extra, $modality = false;
    private $host_ws = '';

    protected function __construct() {
        $QuestionController = new QuestionController();
        $Diaconia = new DiaconiaController();

        $this->rowPo['tipo_cambio'] = $Diaconia->getRateExchange(true);
        $this->rowPo['questions'] = array();

        if ($this->rowPo['id_prcia'] == 7 and $this->rowPo['fecha_suma'] >= "2017-02-01") {
            if ($this->category == "SC") {
                if ($this->rowPo['fecha_creacion'] < '2017-02-01') {
                    $functionName = "getQuestion";
                } else {
                    $functionName = "getQuestionHipotecario";
                }
            } else {
                if ($this->rowPo['fecha_creacion'] < '2017-02-01') {
                    $functionName = "getQuestion";
                } else {
                    $functionName = "getQuestionHipotecario";
                }
            }
        } else {
            $functionName = "getQuestion";
        }

        if (($qs = $QuestionController->$functionName(base64_encode($this->rowPo['idef']))) !== false) {
            $this->rowPo['questions'] = $qs;
        }

        $self = $_SERVER['HTTP_HOST'];
        //$this->url = 'https://' . $self . '/';
        $this->url = 'http://diaconia-frif.abrenet.com/';

        if (($this->host_ws = $this->cx->getNameHostEF(base64_encode($this->rowPo['idef']))) !== false) {
            $this->host_ws .= '.';
        }

        if (strpos($self, 'localhost') !== false || filter_var($self, FILTER_VALIDATE_IP) !== false) {
            $this->url .= trim($this->host_ws, '.') . '/';
        } elseif (strpos($self, $this->host_ws . 'abrenet.com') === false) {
            $this->url .= trim($this->host_ws, '.') . '/';
        } else {
            $this->url .= '';
        }

        if ($this->type === 'PDF' || $this->type === 'ATCH') {
            $this->url = '';
        }
        switch ($this->category) {
            case 'SC':  //	Slip de Cotización
                $this->html = $this->get_html_sc();
                break;
            case 'CE':  //	Certificado
                $this->html = $this->get_html_ce($this->category);
                break;
            case 'CE-HIP':  //	Certificado hipotecario
                $this->html = $this->get_html_ce($this->category);
                break;
            case 'CE-HIP-ANT':  //	Certificado hipotecario
                $this->html = $this->get_html_ce($this->category);
                break;
            case 'CP':  //	Certificado Provisional
                $this->html = $this->get_html_cp();
                break;
            case 'PES':  //	Slip Producto Extra
                $this->html = $this->get_html_pes();
                break;
            case 'PEC':  //	Slip de Cotización
                $this->html = $this->get_html_pec();
                break;
        }
    }

    //SLIP DE COTIZACION
    private function get_html_sc() {
        switch ($this->product) {
            case 'DE':
                return $this->set_html_de_sc();
                break;
            case 'AU':
                return $this->set_html_au_sc();
                break;
            case 'TRD':
                return $this->set_html_trd_sc();
                break;
            case 'TRM':
                return $this->set_html_trm_sc();
                break;
        }
    }

    //SLIP PRODUCTO EXTRA
    private function get_html_pes() {
        switch ($this->product) {
            case 'DE':
                return $this->set_html_de_pes();
                break;
        }
    }

    //	CERTIFICADOS EMISION
    private function get_html_ce($categorie) {
        switch ($this->product) {
            case 'DE':
                if ($categorie == "CE") {
                    return $this->set_html_de_em($categorie);
                } elseif ($categorie == "CE-HIP") {
                    return $this->set_html_de_em($categorie);
                } elseif ($categorie == "CE-HIP-ANT") {
                    return $this->set_html_de_em($categorie);
                }
                break;
            case 'AU':
                return $this->set_html_au_em();
                break;
            case 'TRD':
                return $this->set_html_trd_em();
                break;
            case 'TRM':
                return $this->set_html_trm_em();
                break;
            case 'TH':
                return $this->set_html_th_em();
                break;
        }
    }

    //	CERTIFICADOS EMISION PRODUCTO EXTRA
    private function get_html_pec() {
        switch ($this->product) {
            case 'DE':
                return $this->set_html_de_em_pec();
                break;
        }
    }

    //CERTIFICADOS PROVISIONALES
    private function get_html_cp() {
        switch ($this->product) {
            case 'DE':
                return $this->set_html_de_cp();
                break;
            case 'AU':
                return $this->set_html_au_cp();
                break;
            case 'TRD':
                return $this->set_html_trd_cp();
                break;
            case 'TRM':
                return $this->set_html_trm_cp();
                break;
        }
    }

    //SLIP DE COTIZACIONES
    private function set_html_de_sc() { //DESGRAVAMEN SLIP
        if ($this->modality === false) {
            return de_sc_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
        } else {
            return de_sc_mo_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
        }
    }

    private function set_html_au_sc() {//AUTOMOTORES SLIP
        return au_sc_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
    }

    private function set_html_trd_sc() {//TODO RIESGO DOMICILIARIO SLIP
        return trd_sc_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
    }

    private function set_html_trm_sc() {//TODO RIESGO EQUIPO MOVIL SLIP
        return trm_sc_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
    }

    //SLIP PRODUCTO EXTRA
    private function set_html_de_pes() { //DESGRAVAMEN SLIP
        return de_pes_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
    }

    //CERTIFICADOS EMISIONES
    private function set_html_de_em($categorie) { //	Desgravamen
        if ($this->modality === false) {
            switch ((int) $this->rowPo['id_certificado']) {
                case 1:
                    if ($categorie == "CE") {
                        //versionamiento certificados
                        if ($this->rowPo['fecha_emision'] < "2018-06-01") {
                            return de_em_certificate_v1($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->type, $this->fac, $this->reason);
                        } elseif ($this->rowPo['fecha_emision'] < "2018-11-28")  {
                            return de_em_certificate_v2($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->type, $this->fac, $this->reason);
                        }else{
                            return de_em_certificate_v3($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->type, $this->fac, $this->reason);
                        }
                    } elseif ($categorie == "CE-HIP") {
                        return de_em_certificate_hip($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->type, $this->fac, $this->reason);
                    } elseif ($categorie == "CE-HIP-ANT") {
                        return de_em_certificate_hip_ant($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->type, $this->fac, $this->reason);
                    }
                    break;
                case 2:
                    return '';
                    break;
                default:
                    break;
            }
        } else {
            return '';
        }
    }

    private function set_html_au_em() { //	Automotores
        if ($this->modality === false) {
            return au_em_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
        } else {
            return au_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
        }
    }

    private function set_html_trd_em() { //	Todo Riesgo Domiciliario
        if ($this->modality === false) {
            return trd_em_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
        } else {
            return trd_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
        }
    }

    private function set_html_trm_em() { //	Todo Riesgo Equipo Movil
        if ($this->modality === false) {
            return trm_em_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
        } else {
            return trm_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
        }
    }

    private function set_html_th_em() { //	Tarjetahabiente
        if ($this->modality === false) {
            
        } else {
            $prefix = json_decode($this->rowPo['prefix'], true);
            if ($prefix['prefix'] === 'PTC') {
                return thc_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
            } elseif ($prefix['prefix'] === 'PTD') {
                return thd_em_certificate_mo($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
            }
        }
    }

    //CERTIFICADOS PROVISIONALES
    private function set_html_de_cp() {  //Desgravamen
        return de_cp_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
    }

    private function set_html_au_cp() {   //Automotores
        return au_cp_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
    }

    private function set_html_trd_cp() { //	Todo Riesgo Domiciliario
        return trd_cp_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
    }

    private function set_html_trm_cp() { //Todo Riesgo Equipo Movil
        return trm_cp_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
    }

    //CERTIFICADOS EMISIONES PRODUCTO EXTRA
    private function set_html_de_em_pec() { //	Desgravamen
        return de_em_pec_certificate($this->cx, $this->rowPo, $this->rsDt, $this->url, $this->implant, $this->fac, $this->reason);
    }

}

?>