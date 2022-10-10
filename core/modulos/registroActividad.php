<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registro de profesores - ExerApp</title>
  <?php
  if (!defined('ExerApp')) {
    die('Logged Hacking attempt!');
  }
  $data = getDataBySession($_COOKIE['session'], $db);
  if (!empty($_POST)) {
    include_once INC_DIR.'reg_act.php';
  }
  include_once STATIC_DIR.'/header.php';
  if (!empty($_POST['registro'])) {
    include_once INC_DIR.'/reg_act.php';
  }
  ?>
  <!-- page specific plugin styles -->
  <link rel="stylesheet" href="assets/css/bootstrap-multiselect.min.css" />
  <link rel="stylesheet" href="assets/css/datepicker.min.css" />
  <link rel="stylesheet" href="assets/css/wizard-validation.css" />
</head>

<body class="no-skin">
  <?php include_once STATIC_DIR.'/menututorinstitucion.php';
  ?>
  <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
          <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="index.php">Inicio</a>
          </li>
          <li>Actividades</li>
          <li class="active">Registro de actividades</li>
        </ul>
        <!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
          <form class="form-search">
            <span class="input-icon">
              <input type="text" placeholder="Buscar..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
              <i class="ace-icon fa fa-search nav-search-icon"></i>
            </span>
          </form>
        </div>
        <!-- /.nav-search -->

        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <table align="center" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td>
                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" >
                    <input type='hidden' name="registro" value="1">
                    <!-- Tabs -->
                    <div id="wizard" class="swMain">
                      <ul>
                        <li>
                          <a href="#step-1">
                            <!-- <label class="stepNumber">1</label> -->
                            <span class="stepDesc">Agregar Actividad<br />
                              <!-- <small>Detalles personales</small> -->
                            </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <h2 class="StepTitle">Datos generales de la actividad</h2>
                        <table cellspacing="3" cellpadding="3" align="center">
                          <tr>
                            <td align="right">Tipo de actividad :</td>
                            <td align="left">
                              <input type="text" id="tipo" name="tipo" value="" class="txtBox">
                            </td>
                            <td align="left"><span id="msg_tipo"></span>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">Estado:</td>
                            <td align="left">
                              <input type="text" id="estado" name="estado" value="" class="txtBox">
                            </td>
                            <td align="left"><span id="msg_estado"></span>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">Titulo :</td>
                            <td align="left">
                              <input type="text" id="titulo" name="titulo" value="" class="txtBox">
                            </td>
                            <td align="left"><span id="msg_titulo"></span>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">Descripcion :</td>
                            <td align="left">
                              <input type="text" id="descripcion" name="descripcion" value="" class="txtBox">
                            </td>
                            <td align="left"><span id="msg_descripcion"></span>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">Hora de inicio :</td>
                            <td align="left">
                              <input type="time" id="hora_inicio" name="hora_inicio" value="" class="txtBox bfh-phone" data-format="+58 (dddd) ddd-dddd">
                            </td>
                            <td align="left"><span id="msg_hora_inicio"></span>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">Hora de Finalización :</td>
                            <td align="left">
                              <input type="time" id="hora_finalizacion" name="hora_finalizacion" value="" class="txtBox">
                            </td>
                            <td align="left"><span id="msg_hora_finalizacion"></span>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">Lugar de ejecucion :</td>
                            <td align="left">
                              <input type="text" id="lugar_ejecucion" name="lugar_ejecucion" value="" class="txtBox">
                            </td>
                            <td align="left"><span id="msg_lugar_ejecucion"></span>&nbsp;</td>
                          </tr>
                        </table>
                      </div>

                    </div>
                    <!-- End SmartWizard Content -->
                  </form>
                </td>
              </tr>
            </table>
            <!-- PAGE CONTENT ENDS -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.page-content -->
    </div>
  </div>
  <!-- /.main-content -->

  <?php include_once STATIC_DIR.'/footer.php';        ?>

  <!-- page specific plugin scripts -->
  <script src="assets/js/typeahead.jquery.min.js"></script>
  <!--<script src="assets/js/additional-methods.min.js"></script>-->
  <script src="assets/js/bootbox.min.js"></script>
  <script src="assets/js/jquery.maskedinput.min.js"></script>
  <script src="assets/js/bootstrap-multiselect.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/jquery.smartWizard-2.0.min.js"></script>
  <script src="assets/js/bootstrap-formhelpers.min.js"></script>
  <!-- ace scripts -->

  <!-- inline scripts related to this page -->
  <script type="text/javascript">
  $(document).ready(function() {
    // wizard
    $('#wizard').smartWizard({
      transitionEffect: 'slideleft',
      onLeaveStep: leaveAStepCallback,
      onFinish: onFinishCallback,
      //enableFinishButton: true
    });

    function leaveAStepCallback(obj) {
      var step_num = obj.attr('rel');
      return validateSteps(step_num);
    }

    function onFinishCallback() {
      if (validateAllSteps()) {
        $('form').submit();
      }
    }
  });

  function validateAllSteps() {
    var isStepValid = true;
    if (validateStep1() == false) {
      isStepValid = false;
      $('#wizard').smartWizard('setError', {
        stepnum: 1,
        iserror: true
      });
    } else {
      $('#wizard').smartWizard('setError', {
        stepnum: 1,
        iserror: false
      });
    }
    if (!isStepValid) {
      $('#wizard').smartWizard('showMessage', 'Corrija los datos!');
    }
    return isStepValid;
  }
  function validateSteps(step) {
    var isStepValid = true;
    // validar paso 1
    if (step == 1) {
      if (validateStep1() == false) {
        isStepValid = false;
        $('#wizard').smartWizard('showMessage', 'Corrija los datos en el paso' + step + ' Y continue.');
        $('#wizard').smartWizard('setError', {
          stepnum: step,
          iserror: true
        });
      } else {
        $('#wizard').smartWizard('setError', {
          stepnum: step,
          iserror: false
        });
      }
    }
    return isStepValid;
  }

  function validateStep1() {
    var isValid = true;
    /*
    Validacion de los datos del paso 1
    Se validan 1 x 1 y se muestra el mensaje en el espacio del msg_dato
    */
    var un = $('#tipo').val();
    if (!un && un.length <= 0) {
      isValid = false;
      $('#msg_tipo').html('Llene el tipo').show();
    } else {
      $('#msg_tipo').html('').hide();
    }
    var un = $('#estado').val();
    if (!un && un.length <= 0) {
      isValid = false;
      $('#msg_estado').html('Llene el Estado').show();
    } else {
      $('#msg_estado').html('').hide();
    }
    var un = $('#titulo').val();
    if (!un && un.length <= 0) {
      isValid = false;
      $('#msg_titulo').html('Llene el titulo').show();
    } else {
      $('#msg_titulo').html('').hide();
    }
    var un = $('#descripcion').val();
    if (!un && un.length <= 0) {
      isValid = false;
      $('#msg_descripcion').html('Llene la descripcion').show();
    } else {
      $('#msg_descripcion').html('').hide();
    }
    var un = $('#hora_inicio').val();
    if (!un && un.length <= 0) {
      isValid = false;
      $('#msg_hora_inicio').html('Llene la hora de inicio').show();
    } else {
      $('#msg_hora_inicio').html('').hide();
    }
    var un = $('#hora_finalizacion').val();
    if (!un && un.length <= 0) {
      isValid = false;
      $('#msg_hora_finalizacion').html('Llene la hora de finalizacion').show();
    } else {
      $('#msg_hora_finalizacion').html('').hide();
    }
    var un = $('#lugar_ejecucion').val();
    if (!un && un.length <= 0) {
      isValid = false;
      $('#msg_lugar_ejecucion').html('Llene el lugar de ejecución').show();
    } else {
      $('#msg_lugar_ejecucion').html('').hide();
    }
    return isValid;
  }





  //datepicker plugin
  //link
  $('.date-picker').datepicker({
    autoclose: true,
    todayHighlight: true
  })
  //Mostrar el datepicker al hacer click en el icono
  .next().on(ace.click_event, function() {
    $(this).prev().focus();
  });
  //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
  $('input[name=date-range-picker]').daterangepicker({
    'applyClass': 'btn-sm btn-success',
    'cancelClass': 'btn-sm btn-default',
    locale: {
      applyLabel: 'Apply',
      cancelLabel: 'Cancel',
    }
  })
  .prev().on(ace.click_event, function() {
    $(this).next().focus();
  });
  </script>
</body>

</html>
