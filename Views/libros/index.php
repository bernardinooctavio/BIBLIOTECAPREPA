<div id="modal_registro" class="modal">
    <div class="modal-content">
        <div class="card-panel">
            <form action="" id="save_libro" enctype="multipart/form-data" autocomplete="off">
                <h4 align="center">Agregar nuevo Libro </h4>
                <div class="divider"></div>
                <code class=" language-markup"><!--********************************--></code>
                <div class="row">
                    <div class="row">
                        <div class="input-field input-field col s5">
                            <input id="codigo" type="text"  name="codigo">
                            <label for="codigo"   >codigo del libro</label>
                        </div>
                        <div class="input-field input-field col s5">
                            <input id="titulo" type="text"  name="titulo">
                            <label for="titulo"   >nombre del libro</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <select id="id_autor" type="text" name="id_autor">
                                <option disabled selected>Selecciona Autor</option>
                                <?php
                                $result3=$datos[1];

                                while ($row=mysqli_fetch_array($result3))
                                    echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                ?>
                            </select>
                            <label for="id_autor">Tipo de Autor</label>
                        </div>

                        <div class="input-field col s5">
                            <select id="id_editorial" type="text" name="id_editorial">
                                <option disabled selected>Selecciona una Editorial</option>
                                <?php
                                $result3=$datos[2];
                                while ($row=mysqli_fetch_array($result3))
                                    echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                ?>
                            </select>
                            <label for="id_editorial">Tipo de Editorial</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <select id="id_tipolibro" type="text" name="id_tipolibro">
                                <option disabled selected>Selecciona de Libro</option>
                                <?php
                                $result3=$datos[3];
                                while ($row=mysqli_fetch_array($result3))
                                    echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                ?>
                            </select>
                            <label for="id_tipolibro">Tipo de Libros</label>
                        </div>
                        <div class="input-field input-field col s5">
                            <input id="cantidad" type="text"  name="cantidad">
                            <label for="cantidad"   >cantidad de libro</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <select id="id_tipoadquisicion" type="text" name="id_tipoadquisicion">
                                <option disabled selected>Selecciona de adquisicion del libro</option>
                                <?php
                                $result3=$datos[4];
                                while ($row=mysqli_fetch_array($result3))
                                    echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                ?>
                            </select>
                            <label for="id_tipoadquisicion">Tipo de adquisicion</label>
                        </div>
                    </div>

                    <div class="modal-fixed-footer">
                        <div class="input-field col s12">
                            <a href="#!" id="save_libro_ok" class="btn ">Registrar</a>
                        </div>
                        <div class="input-field col s12">
                            <a href="#!" id="update_libro_ok" class="btn modal-close " data-id="">Actualizar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card-panel">
    <h4 align="center">Libros <span class="right"><a href="#modal_registro" class="btn green white-text modal-trigger" id="add_libro">
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
    <table class="responsive-table" id="tabla_libros">
        <thead>
        <tr>
            <th>id</th>
            <th>codigo</th>
            <th>nombre del libro</th>
            <th>autor</th>
            <th>AP. paterno autor</th>
            <th>AP. materno autor</th>
            <th>editorial</th>
            <th>tipo de libro</th>
            <th>cantidad</th>
            <th>Tipo de adquisicion</th>
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
        $("#add_libro").click(function(){
            $("#update_libro_ok").hide();
            $("#save_libro_ok").show();
        });
        $("#save_libro_ok").click(function(){
            //console.log("ok")
            //console.log($("#save_habitacion").serialize());
            $("#save_libro").submit();
        });
        $("#body_table").on("click","a.btn_eliminar",function(){
            var id=$(this).data("id");
            var url='<?php echo URL?>libros/eliminar/'+id;
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
            $("#save_libro_ok").hide();
            $("#update_libro_ok").show();
            var id=$(this).data("id");
            $.get("<?php echo URL?>libros/modificar/"+id,function(res){
                var datos=JSON.parse(res);
                $("#update_libro_ok").data("id",datos["id_libro"]);
                $("#codigo").val(datos["codigo"]);
                $("#titulo").val(datos["titulo"]);
                $("#id_autor").val(datos["id_autor"]);
                $("#id_editorial").val(datos["id_editorial"]);
                $("#id_tipolibro").val(datos["id_tipolibro"]);
                $("#cantidad").val(datos["cantidad"]);
                $("#id_tipoadquisicion").val(datos["id_tipoadquisicion"]);
                Materialize.updateTextFields();
                $('select').material_select();
                $("#modal_registro").modal("open");
            });
        });
        $("#update_libro_ok").click(function(){
            var id=$(this).data("id");
            $.post("<?php echo URL?>libros/actualizar/"+id,$("#save_libro").serialize(),function(res){
                $('#save_libro_ok').find('input, select, textarea').val('');
                $("#body_table").empty().append(res);

                Materialize.updateTextFields();
                //$("#modal_registro").modal("close");
                Materialize.toast('Se ha modificado correctamente', 2500);
            })
        });

        $("#save_libro").validate({
            rules:{
                codigo:{
                    required:true,
                    maxlength: 10,
                    number:true,
                },
                titulo:{
                    required:true,
                    maxlength:20,
                    lettersonly:true,
                },
                id_autor:{
                    required:true,
                }
            },
            messages:{
                codigo:{
                    required:"Ingresa un número",
                    maxlength:"Máximo 10 digitos",
                    number:"Solo números",

                },
                titulo:{
                    required:"Agrega un titulo",
                    maxlength:"nombre muy largo",
                },
                id_autor:{
                    required:"Selecciona un Autor ",
                }
            },
            errorPlacement: function(error, element) {
                $(element)
                    .closest("form")
                    .find("label[for='" + element.attr("id") + "']")
                    .attr('data-error', error.text());
            },
            submitHandler:function (form) {
                $.post("<?php echo URL?>libros/crear",$("#save_libro").serialize(),function(res){
                    $("#body_table").empty().append(res);
                    $('#save_libro').find('input, select, textarea').val('');
                    Materialize.updateTextFields();
                    $("#modal_registro").modal("close");
                    Materialize.toast('Se ha insertado correctamente', 2500);
                })


            }
        });

        $("#buscar").keyup(function() {
            $.uiTableFilter($("#tabla_libros"), this.value);
        });

    });
</script>