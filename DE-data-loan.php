


<style>
    #popup {
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 1001;
    }

    .content-popup {
        margin:0px auto;
        margin-top:120px;
        position:relative;
        padding:10px;
        width:500px;
        min-height:250px;
        border-radius:4px;
        background-color:#FFFFFF;
        box-shadow: 0 2px 5px #666666;
        z-index: 1002;
    }

    .content-popup h2 {
        color:#48484B;
        border-bottom: 1px solid #48484B;
        margin-top: 0;
        padding-bottom: 4px;
    }

    .popup-overlay {
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 999;
        display:none;
        background-color: #777777;
        cursor: pointer;
        opacity: 0.7;
    }

    .aceptar {
        display: block;
        width: 200px;
        height: auto;
        margin: 10px auto;
        padding: 8px 15px;
        background: #00A854;
        border: 0 none;
        border-radius: 7px;
        cursor: pointer;
        color: #FFF;
        font-weight: bold;
        text-decoration: none;
    }
</style>
<?php
require __DIR__ . '/app/controllers/DiaconiaController.php';

$DIACONIA = new DiaconiaController();
?>
<h3>Datos del Prestamo</h3>
<form id="fde-loan" name="fde-loan" action="" method="post" class="form-quote">
    <label>Tipo de Cobertura: <span>*</span></label>
    <div class="content-input">
        <select id="dl-coverage" name="dl-coverage" class="required fbin">
            <option value="">Seleccione...</option>
            <?php foreach ($DIACONIA->getCoverage() as $key => $value): ?>
                <option value="<?= $key; ?>"><?= $value; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <br>

    <div id="ctn-amount">
        <label>Monto Solicitado: <span>*</span></label>
        <div class="content-input">
            <input type="text" id="dl-amount" name="dl-amount" autocomplete="off"
                   value="" style="width:90px;" class="required real fbin">
        </div>
    </div>

    <label>Moneda: <span>*</span></label>
    <div class="content-input">
        <label class="check"><input type="radio" id="dl-currency-bs" name="dl-currency"
                                    value="BS" checked>&nbsp;&nbsp;BS</label>
        <label class="check"><input type="radio" id="dl-currency-usd" name="dl-currency"
                                    value="USD">&nbsp;&nbsp;USD</label><br>
    </div>
    <br>

    <label>Plazo del Crédito: <span>*</span></label>
    <div class="content-input" style="width:auto;">
        <input type="text" id="dl-term" name="dl-term" autocomplete="off" value=""
               style="width:30px;" maxlength="4" class="required number fbin">
    </div>

    <div class="content-input">
        <select id="dl-type-term" name="dl-type-term" class="required fbin">
            <option value="">Seleccione...</option>
            <?php foreach ($DIACONIA->getTypeTerm() as $key => $value): ?>
                <option value="<?= $key; ?>"><?= $value; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <br>

    <?php if (count(( $products = $DIACONIA->getProductData($_SESSION['idEF']))) > 0): ?>
        <label>Producto: <span>*</span></label>
        <div class="content-input">
            <select id="dl-product" name="dl-product" class="required fbin">
                <option value="">Seleccione...</option>
                <?php foreach ($products as $key => $value): ?>
                    <option value="<?= $value['id']; ?>"><?= $value['producto']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    <?php endif ?>

    <input type="hidden" id="ms" name="ms" value="<?= $_GET['ms']; ?>">
    <input type="hidden" id="page" name="page" value="<?= $_GET['page']; ?>">
    <input type="hidden" id="pr" name="pr" value="<?= $_GET['pr']; ?>">

    <?php if (isset($_GET['idc'])): ?>
        <input type="hidden" id="idc" name="idc" value="<?= $_GET['idc']; ?>">
    <?php endif ?>

    <input type="submit" id="dl-loan" name="dl-loan" value="Continuar" class="btn-next">
    <div class="loading">
        <img src="img/loading-01.gif" width="35" height="35"/>
    </div>
</form>
<div id="popup" style="display: none;">
    <div class="content-popup">
        <div class="close"></div>
        <div>
            <h2>Contenido HIPOTECARIO</h2>
            Si el destino del crédito corresponde a un crédito de Vivienda, Vivienda Social o Vehicular, en el cual dicho bien se constituye como garantia hipotecaria se debe seleccionarla opcion [Con Garantia Hipotecaria].
            <input type="button" id="aceptar" name="aceptar" value="Aceptar" class="aceptar">
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#fde-loan").validateForm({
            action: 'DE-loan-record.php'
        });

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-red',
            radioClass: 'iradio_square-red',
            increaseArea: '20%' // optional
        });

        $('#dl-product').change(function(e) {
            if ($('#dl-product').val() == 7) {
                $('#popup').fadeIn('slow');
                $('.popup-overlay').fadeIn('slow');
                $('.popup-overlay').height($(window).height());
            }
        });
        $('#aceptar').click(function() {
            $('#popup').fadeOut('slow');
            $('.popup-overlay').fadeOut('slow');
            return false;
        });

        $('#dl-coverage').change(function(e) {
            var coverage = parseInt($(this).prop('value'));

            switch (coverage) {
                case 2:
                    $('#ctn-amount').slideUp(function() {
                        $('#dl-amount').prop('value', 0);
                    });

                    $('#dl-product option').attr("disabled", true);
                    $('#dl-product option').each(function(index) {
                        var option = $(this).text().toLowerCase();

                        if (option === 'banca comunal') {
                            $(this).prop('selected', true).prop('disabled', false);
                        }
                    });
                    break;
                default:
                    $('#dl-amount').prop('value', '');
                    $('#ctn-amount').slideDown();

                    $('#dl-product option').each(function(index) {
                        var option = $(this).text().toLowerCase();

                        if (option === 'banca comunal') {
                            $(this).prop('disabled', true);
                        } else {
                            $(this).prop('disabled', false);
                        }

                        if ($(this).prop('value') === '') {
                            $(this).prop('selected', true)
                        }
                    });
                    break;
            }
        });

    });
</script>