<div id="modal_registro" class="modal">
    <div class="modal-content">
        <div class="card-panel">
            <form action="" id="save_persona" enctype="multipart/form-data" autocomplete="off">
                <h4 align="center">Lectores </h4>
                <div class="divider"></div>
                <code class=" language-markup"><!--********************************--></code>
                <div class="row">
                    <div class="row">
                        <div class="input-field col s5">
                            <select id="id_tipopersona" type="text" name="id_tipopersona">
                                <option disabled selected>Selecciona Tipo de Persona</option>
                                <?php
                                $result3=$datos[1];
                                while ($row=mysqli_fetch_array($result3))
                                    echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                ?>
                            </select>
                            <label for="id_tipopersona">Tipo de Persona</label>
                        </div>

                        <div class="input-field col s1">

                        </div>
                        <div class="input-field col s5">
                            <input id="nombre" type="text"  name="nombre">
                            <label for="nombre" >Nombre de lector</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <input id="ap_paterno" type="text"  name="ap_paterno">
                            <label for="ap_paterno" >Apellido paterno</label>
                        </div>

                        <div class="input-field col s1">

                        </div>
                        <div class="input-field col s5">
                            <input id="ap_materno" type="text"  name="ap_materno">
                            <label for="ap_materno" >Apellido materno</label>
                        </div>
                    </div>

                    <div class="modal-fixed-footer">
                        <div class="input-field col s12">
                            <a href="#!" id="save_persona_ok" class="btn ">Registrar</a>
                        </div>
                        <div class="input-field col s12">
                            <a href="#!" id="update_persona_ok" class="btn modal-close " data-id="">Actualizar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card-panel">
    <h4 align="center">Tipo De Lectores <span class="right"><a href="#modal_registro" class="btn green white-text modal-trigger" id="add_persona">
                <i class="material-icons">add</i>
            </a></span></h4>
    <div class="divider"></div>

    <div class="row">
        <div class="input-field col s4 offset-s8">
            <i class="mdi-action-verified-user prefix icon-search"></i>
            <input id="buscar" placeholder="Buscar" type="text">
        </div>
    </div>


    <!-- Modal eliminar -->

    <!--*********************final modal eliminar***********-->
    <table class="responsive-table" id="tabla_personas">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tipo de Lector</th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th></th>
            <th></th>

        </tr>
        </thead>

        <tbody id="body_table">
        <?php
        require_once ("tabla.php");
        ?>
        </tbody>
    </table>
</div>


<div id="modal_eliminar" class="modal">
    <div class="modal-content">
        <h5>¿Desea Eliminar el Registro?</h5>
        <hr />
    </div>
    <div class="modal-footer">
        <a href="#!" id="eliminar_ok" class="modal-close green white-text waves-effect waves-green btn-flat">Aceptar</a>
        <a href="#!"  class="modal-close red white-text waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('select').material_select();
        $(".modal").modal();
        $("#add_persona").click(function(){
            $("#update_persona_ok").hide();
            $("#save_persona_ok").show();
        });
        $("#save_persona_ok").click(function(){
            //console.log("ok")
            //console.log($("#save_habitacion").serialize());
            $("#save_persona").submit();
        });
        $("#body_table").on("click","a.btn_eliminar",function(){
            var id=$(this).data("id");
            var url='<?php echo URL?>personas/eliminar/'+id;
            $("#eliminar_ok").attr("url",url);
            $("#modal_eliminar").modal("open");
        });
        $("#eliminar_ok").click(function(){
            $.get($(this).attr("url"),function(res){
                $("#body_table").empty().append(res);
                Materialize.toast('Se ha eliminado correctamente', 2500);
            });
        });
        $("#body_table").on("click","a.btn_modificar",function(){
            $("#save_persona_ok").hide();
            $("#update_persona_ok").show();
            var id=$(this).data("id");
            $.get("<?php echo URL?>personas/modificar/"+id,function(res){
                var datos=JSON.parse(res);
                $("#update_personas_ok").data("id",datos["id_persona"]);
                $("#id_tipopersona").val(datos["id_tipopersona"]);
                $("#nombre").val(datos["nombre"]);
                $("#ap_paterno").val(datos["ap_paterno"]);
                $("#ap_materno").val(datos["ap_materno"]);
                Materialize.updateTextFields();
                $('select').material_select();
                $("#modal_registro").modal("open");
            });
        });
        $("#update_persona_ok").click(function(){
            var id=$(this).data("id");
            $.post("<?php echo URL?>personas/actualizar/"+id,$("#save_persona").serialize(),function(res){
                $('#save_persona_ok').find('input, select, textarea').val('');
                $("#body_table").empty().append(res);

                Materialize.updateTextFields();
                //$("#modal_registro").modal("close");
                Materialize.toast('Se ha modificado correctamente', 2500);
            })
        });

        $("#save_persona").validate({
            rules:{
                id_tipopersona:{
                    required:true,
                },
                nombre:{
                    required:true,
                    maxlength:20,
                    lettersonly:true,
                },
                ap_paterno:{
                    required:true,
                    maxlength:20,
                    letttersonly:true,
                },
                ap_materno:{
                    required:true,
                    maxlength:20,
                    lettersonly:true,
                }
            },
            messages:{
                id_tipopersona:{
                    required:"Selecciona un tipo ",
                },
                nombre:{
                    required:"Agrega un nombre",
                    maxlength:"nombre muy largo",
                },
                ap_paterno:{
                    required:"Agrega un apellido paterno",
                    maxlength:"muy largo",
                },
                ap_materno:{
                    required:"Agrega un apellido materno",
                    maxlength:"muy largo",
                }
            },
            errorPlacement: function(error, element) {
                $(element)
                    .closest("form")
                    .find("label[for='" + element.attr("id") + "']")
                    .attr('data-error', error.text());
            },
            submitHandler:function (form) {
                $.post("<?php echo URL?>personas/crear",$("#save_persona").serialize(),function(res){
                    $("#body_table").empty().append(res);
                    $('#save_persona').find('input, select, textarea').val('');
                    Materialize.updateTextFields();
                    $("#modal_registro").modal("close");
                    Materialize.toast('Se ha insertado correctamente', 2500);
                })


            }
        });

        $("#buscar").keyup(function() {
            $.uiTableFilter($("#tabla_personas"), this.value);
        });

    });
</script>