function eventoBotonGuardar(){
	var objetivo = document.getElementById("idComboObjetivo").value; //integer
	var responsable = document.getElementById("idComboResponsable").value;
	var prioridad = document.getElementById("idComboPrioridad").value;
	var estado = document.getElementById("idTextoEstado").value;
	var fechaInicio = document.getElementById("single_cal4").value;
	var fechaFinal = document.getElementById("single_cal3").value;
	var notas = document.getElementById("idTextoNotas").value;

	if(objetivo == 0){
		alert("Seleccione un objetivo");
	}else{
		alert("Error!!");
	}
}
        loadData();

        //Función para eliminar responsable
        $(document).on("click", ".selectData", function(){
          var id = $(this).attr("id");
          swal({
            title: 'Deseas eliminar este Responsable?',
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
                data: "responsable=" + id,
                url: "controller/responsable/deleteResponsable.php",
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

        //Función para editar responsable
        $(document).on("click", ".editData", function(){
          var id = $(this).attr("id");
          var resp = $(this).attr("name");
          swal({
            title: 'Nombre Responsable',
            input: 'text',
            inputValue:resp,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            showLoaderOnConfirm: true
          }).then((result) => {
            if (result.value) {
              var responsable = result.value;
              $.ajax({
                type: "POST",
                data: "responsable=" + responsable + "&id=" + id,
                url: "controller/responsable/editResponsable.php",
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
                      type: 'success',
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

        //Función para registrar responsable
        function insertData(){
          var responsable = $("[name='responsable']").val();
          $.ajax({
            type: "POST",
            data: "responsable=" + responsable,
            url: "controller/responsable/saveResponsable.php",
            success: function(result){
              var result = JSON.parse(result);
              if(result.type == "S"){
                swal({
                  type: 'success',
                  title: result.message,
                  showConfirmButton: false,
                  timer: 1000
                })
                $("#responsable").val("");
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
          })
        }

        //Función para listar responsable
        function loadData(){
          var data = $("#load-data");
          data.html("");
          $.ajax({
            type: "GET",
            data: "",
            url: "controller/responsable/getData.php",
            success: function(result){
              var result = JSON.parse(result);
              $.each(result, function(key,val){
                var newRow = $("<tr class='odd pointer'>");
                newRow.html(
                  "<td class='a-right a-right'>" + val.id_responsable + "</td>" +
                  "<td class='a-right a-right'>" + val.nom_responsable + "</td>" +
                  "<td class='a-right a-right'>"+ 
                    "<button name='" + val.nom_responsable +"' id='" + val.id_responsable +"' type='button' class='btn btn-primary btn-sm editData'><i class='fa fa-edit'></i> Modificar</button>"+
                    "<button id='" + val.id_responsable +"' type='button' class='btn btn-danger btn-sm selectData'><i class='fa fa-trash-o'></i> Eliminar</button>"+
                  "</td>");
                data.append(newRow);
              });
            }
          })
        }