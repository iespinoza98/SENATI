<?php include "head.php";
  require_once "archivosPHP/connection.php";
?>

<!-- Inicio - Contenido de la Página -->
<div class="right_col" role="main">
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Nueva Acción</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-4">Objetivo<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="idComboObjetivo" name="nameComboObjetivo" class="form-control" required="required">
                    <option value="0">--Seleccione Objetivo--</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-4">Responsable<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="idComboResponsable" name="nameComboResponsble" class="form-control" required>
                    <option value="0">--Seleccione Responsable--</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-4">Prioridad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="idComboPrioridad" name="nameComboPrioridad" class="form-control" required>
                    <option value="0">--Seleccione Prioridad--</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-4">Estado<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="idTextoEstado" name="nameTextoEstado" value="No Iniciado" class="date-picker form-control col-md-7 col-xs-12" disabled="false" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-4">Accion<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="idTextoAccion" name="nameTextoAccion" class="form-control" rows="3" cols="50" placeholder="Escribir accion..." style="resize: none"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-4">Fec. Inicio<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control has-feedback-left" id="myDatepicker1" name="nameFechaInicio">
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-4">Fec. Final<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control has-feedback-left" id="myDatepicker2" name="nameFechaFinal">
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-4">Notas<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="idTextoNotas" name="nameTextoNotas" class="form-control" rows="3" cols="50" placeholder="Escribir nota..." style="resize: none"></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-5">
                  <button type="button" class="btn btn-success" onClick="insertData()" ><i class="fa fa-check"></i> Guardar</button>
                  <button class="btn btn-primary" type="reset"><i class="fa fa-close"></i> Limpiar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>

  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Acciones ETI</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="table-responsive">
            <table id="example" class="display" style="width:100%">
              <thead>
                  <tr>
                      <th>Objetivo</th>
                      <th>Accion</th>
                      <th>Responsable</th>
                      <th>Prioridad</th>
                      <th>Estado</th>
                      <th>Fec. Inicio</th>
                      <th>Fec. Final</th>
                      <th>Notas</th>
                  </tr>
              </thead>
              <tbody id="load-data">
              </tbody>
            </table>
            <script type="text/javascript">
              loadData();
              loadObjetivo();
              loadResponsable();
              loadPrioridad();
              function loadObjetivo(){
                var data = $("#idComboObjetivo");
                // data.html("");
                $.ajax({
                  type: "GET",
                  data: "",
                  url: "controller/objetivo/getDataObjet.php",
                  success: function(result){
                    var result = JSON.parse(result);
                    $.each(result, function(key,val){
                      var option = $("<option value= '" + val.id_objetivo+"'>" + val.nom_objetivo + "</option>");
                      data.append(option);
                    });
                  }
                })
              };
              function loadResponsable(){
                var data = $("#idComboResponsable");
                // data.html("");
                $.ajax({
                  type: "GET",
                  data: "",
                  url: "controller/responsable/getData.php",
                  success: function(result){
                    var result = JSON.parse(result);
                    $.each(result, function(key,val){
                      var option = $("<option value= '" + val.id_responsable+"'>" + val.nom_responsable + "</option>");
                      data.append(option);
                    });
                  }
                })
              };
              function loadPrioridad (){
                var data = $("#idComboPrioridad");
                // data.html("");
                $.ajax({
                  type: "GET",
                  data: "",
                  url: "controller/prioridad/prioridadData.php",
                  success: function(result){
                    var result = JSON.parse(result);
                    $.each(result, function(key,val){
                      var option = $("<option value= '" + val.id_prioridad+"'>" + val.nom_prioridad + "</option>");
                      data.append(option);
                    });
                  }
                })
              };
              //Función para listar gestion
              function loadData(){
                var data = $("#load-data");
                data.html("");
                $.ajax({
                  type: "GET",
                  data: "",
                  url: "controller/inicio/getData.php",
                  success: function(result){
                    var result = JSON.parse(result);
                    $.each(result, function(key,val){
                      var newRow = $("<tr class='odd pointer'>");
                      newRow.html(
                        "<td>" + val.nom_objetivo + "</td>" +
                        "<td>" + val.desc_accion + "</td>" +
                        "<td>" + val.nom_responsable + "</td>" +
                        "<td>" + val.nom_prioridad + "</td>" +
                        "<td>" + "No Iniciado" + "</td>" +
                        "<td>" + val.fecha_inicio + "</td>" +
                        "<td>" + val.fecha_final + "</td>" +
                        "<td>" + val.notas + "</td>");
                      data.append(newRow);
                    });
                    Load();
                  }
                })
              };
              function Load () {
                var table = $('#example').DataTable();
             
                $('#example tbody').on('click','tr',function(){
                    if ($(this).hasClass('selected')) {
                      $(this).removeClass('selected');
                    }else{
                      table.$('tr.selected').removeClass('selected');
                      $(this).addClass('selected');
                    }
                });
              };
              //Función para registrar datos
              function insertData(){
                var objetivo = $("[name='nameComboObjetivo']").val();
                var responsable = $("[name='nameComboResponsble']").val();
                var prioridad = $("[name='nameComboPrioridad']").val();
                var accion = $("[name='nameTextoAccion']").val();
                var fInicio = $("[name='nameFechaInicio']").val();
                var fFinal = $("[name='nameFechaFinal']").val();
                var notas = $("[name='nameTextoNotas']").val();
                var datos = [objetivo, responsable, prioridad, accion, fInicio, fFinal, notas];
                $.ajax({
                  type: "POST",
                  data: {'datos':datos},
                  url: "controller/inicio/saveData.php",
                  success: function(result){
                    console.log(result);
                    var result = JSON.parse(result);
                    if(result.type == "S"){
                      swal({
                        type: 'success',
                        title: result.message,
                        showConfirmButton: false,
                        timer: 1000
                      });
                      $("#prioridad").val("");
                      $("#idTextoAccion").val("");
                      $("#myDatepicker1").val("0000-00-00");
                      $("#myDatepicker2").val("0000-00-00");
                      $("#idTextoNotas").val("");
                      loadData();
                    }else{
                      swal({
                        type: 'error',
                        title: result.message,
                        showConfirmButton: false,
                        timer: 1000
                      })
                    }
                  }
                })
              }
            </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin - Contenido de la Página -->

<?php include "footer.php";?>