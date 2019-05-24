<div id="modal_registro" class="modal">
    <div class="modal-content">
        <div class="card-panel">
            <form action="" id="save_editorial" enctype="multipart/form-data" autocomplete="off">
                <h4 align="center">editorial </h4>
                <div class="divider"></div>
                <code class=" language-markup"><!--********************************--></code>
                <div class="row">
                    <div class="row">
                        <div class="input-field input-field col s5">
                            <input id="nom_editorial" type="text"  name="nom_editorial">
                            <label for="nom_editorial"   >nombre editorial</label>
                        </div>

                    </div>

                    <div class="modal-fixed-footer">
                        <div class="input-field col s12">
                            <a href="#!" id="save_editorial_ok" class="btn ">Registrar</a>
                        </div>
                        <div class="input-field col s12">
                            <a href="#!" id="update_editorial_ok" class="btn modal-close " data-id="">Actualizar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card-panel">
    <h4 align="center">nombre de editoriales <span class="right"><a href="#modal_registro" class="btn green white-text modal-trigger" id="add_editorial">
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
    <table class="responsive-table" id="tabla_editoriales">
        <thead>
        <tr>
            <th>id</th>
            <th>nombre de editorial</th>
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
        $("#add_editorial").click(function(){
            $("#update_editorial_ok").hide();
            $("#save_editorial_ok").show();
        });
        $("#save_editorial_ok").click(function(){
            //console.log("ok")
            //console.log($("#save_habitacion").serialize());
            $("#save_editorial").submit();
        });
        $("#body_table").on("click","a.btn_eliminar",function(){
            var id=$(this).data("id");
            var url='<?php echo URL?>editoriales/eliminar/'+id;
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
            $("#save_editorial_ok").hide();
            $("#update_editorial_ok").show();
            var id=$(this).data("id");
            $.get("<?php echo URL?>editoriales/modificar/"+id,function(res){
                var datos=JSON.parse(res);
                $("#update_editorial_ok").data("id",datos["id_editorial"]);
                $("#nom_editorial").val(datos["nom_editorial"]);
                Materialize.updateTextFields();
                $('select').material_select();
                $("#modal_registro").modal("open");
            });
        });
        $("#update_editorial_ok").click(function(){
            var id=$(this).data("id");
            $.post("<?php echo URL?>editoriales/actualizar/"+id,$("#save_editorial").serialize(),function(res){
                $('#save_editorial_ok').find('input, select, textarea').val('');
                $("#body_table").empty().append(res);

                Materialize.updateTextFields();
                //$("#modal_registro").modal("close");
                Materialize.toast('Se ha modificado correctamente', 2500);
            })
        });

        $("#save_editorial").validate({
            rules:{
                nom_editorial:{
                    required:true,
                    maxlength:20,
                    lettersonly:true,
                }
            },
            messages:{
                nom_editorial:{
                    required:"Agrega un nombre de editorial",
                    maxlength:"nombre muy largo",
                }
            },
            errorPlacement: function(error, element) {
                $(element)
                    .closest("form")
                    .find("label[for='" + element.attr("id") + "']")
                    .attr('data-error', error.text());
            },
            submitHandler:function (form) {
                $.post("<?php echo URL?>editoriales/crear",$("#save_editorial").serialize(),function(res){
                    $("#body_table").empty().append(res);
                    $('#save_editorial').find('input, select, textarea').val('');
                    Materialize.updateTextFields();
                    $("#modal_registro").modal("close");
                    Materialize.toast('Se ha insertado correctamente', 2500);
                })


            }
        });

        $("#buscar").keyup(function() {
            $.uiTableFilter($("#tabla_editorial"), this.value);
        });

    });
</script>