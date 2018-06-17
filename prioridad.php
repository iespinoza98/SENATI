<?php
  include "head.php";
  require_once "archivosPHP/connection.php";
?>
<!-- Inicio - Contenido de la Página -->
<div class="right_col" role="main">
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Módulo prioridad</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <!-- <form data-parsley-validate class=""> -->
              <div class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-12 col-xs-4">Nombre Prioridad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="prioridad" name="prioridad" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-5">
                  <button class="btn btn-success" onclick="insertData()" ><i class="fa fa-check"></i> Guardar</button>
                  <button class="btn btn-primary" type="reset"><i class="fa fa-close"></i> Limpiar</button>
                </div>
              </div>
            </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>

  <div class="x_content">
    <div class="table-responsive">
      <table class="table table-striped jambo_table bulk_action">
            <thead>
              <tr class="headings">
                <th class="column-title">ID</th>
                <th class="column-title">Prioridad </th>
                <th class="column-title no-link last" colspan="2" ><span class="nobr">Acciones</span>
                </th>
                <th class="bulk-actions" colspan="2">
                  <a class="antoo" style="color:#fff; font-weight:200;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
              </tr>
            </thead>

            <tbody id="load-data">
            </tbody>
      </table>

      <script type="text/javascript">
        loadData();

        //Función para eliminar prioridad
        $(document).on("click", ".selectData", function(){
          var id = $(this).attr("id");
          swal({
            title: 'Deseas eliminar este Prioridad?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar!',
            reverseButtons: true
          })
          .then((result) => {
            if (result.value) {
              $.ajax({
                type: "POST",
                data: "prioridad=" + id,
                url: "controller/prioridad/eliminarPrioridad.php",
                success: function(result){
                  var result = JSON.parse(result);
                  if(result.type == "S"){
                    swal({
                      type: 'success',
                      title: result.message,
                      showConfirmButton: false,
                      timer: 1000
                    })
                  }else{
                    swal({
                      type: 'error',
                      title: result.message,
                      showConfirmButton: false,
                      timer: 1000
                    })
                  }
                  loadData();
                }
              });
            }
          })
        });

        //Función para editar prioridad
        $(document).on("click", ".editData", function(){
          var id = $(this).attr("id");
          var resp = $(this).attr("name");
          swal({
            title: 'Nombre Prioridad',
            input: 'text',
            inputValue:resp,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            showLoaderOnConfirm: true
          }).then((result) => {
            if (result.value) {
              var prioridad = result.value;
              $.ajax({
                type: "POST",
                data: "prioridad=" + prioridad + "&id=" + id,
                url: "controller/prioridad/editarPrioridad.php",
                success: function(result){
                  var result = JSON.parse(result);
                  if(result.type == "S"){
                    swal({
                      type: 'success',
                      title: result.message,
                      showConfirmButton: false,
                      timer: 1000
                    });
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
              });
            }
          })
        });

        //Función para registrar prioridad
        function insertData(){
          var prioridad = $("[name='prioridad']").val();
          $.ajax({
            type: "POST",
            data: "prioridad=" + prioridad,
            url: "controller/prioridad/SavePrioridad.php",
            success: function(result){
              var result = JSON.parse(result);
              if(result.type == "S"){
                swal({
                  type: 'success',
                  title: result.message,
                  showConfirmButton: false,
                  timer: 1000
                })
                $("#prioridad").val("");
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

        //Función para listar prioridad
        function loadData(){
          var data = $("#load-data");
          data.html("");
          $.ajax({
            type: "GET",
            data: "",
            url: "controller/prioridad/prioridadData.php",
            success: function(result){
              var result = JSON.parse(result);
              $.each(result, function(key,val){
                var newRow = $("<tr class='odd pointer'>");
                newRow.html(
                  "<td class='a-right a-right'>" + val.id_prioridad + "</td>" +
                  "<td class='a-right a-right'>" + val.nom_prioridad + "</td>" +
                  "<td class='a-right a-right'>"+ 
                    "<button name='" + val.nom_prioridad +"' id='" + val.id_prioridad +"' type='button' class='btn btn-primary btn-sm editData'><i class='fa fa-edit'></i> Modificar</button>"+
                    "<button id='" + val.id_prioridad +"' type='button' class='btn btn-danger btn-sm selectData'><i class='fa fa-trash-o'></i> Eliminar</button>"+
                  "</td>");
                data.append(newRow);
              });
            }
          })
        }
      </script>
      </div>
  </div>
</div>
<!-- Fin - Contenido de la Página -->
<?php include "footer.php";?>