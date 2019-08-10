<?php
$salesman_id    = preg_replace("[^0-9]", trim(" "), $_GET["id_salesman"]);
$salesman_model = new Model\Salesman();
$salesman_row   = $salesman_model->selectWhere("id", $salesman_id);
    
if (!$salesman_row) {
    echo "Registro não encontrado.";
    return;
}
?>
<div class="container">
    <form action="/controller/?control_page=salesman_update" method="POST">
        <input type="hidden" value=<?= $salesman_row->id ?> name="id">
        <div class="row">
            <div class="form-group col-6 groupInput">
                <label for="name">Nome</label>
                <input type="text" name="name" readonly class="form-control
                " value=<?= $salesman_row->name ?>>
            </div>
            <div class="form-group col-6 groupInput">
                <label for="name">Email</label>
                <input type="email" name="email" readonly class="form-control" value=<?= $salesman_row->email ?>>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="checkUpdate">Desejo alterar este registro</label>
                <input type="checkbox" id="checkUpdate">    
            </div>
        </div>
        <input type="submit" id="btnSubmit" class="btn btn-primary" value="Atualizar Dados" disabled>
    </form>
</div>
<script>
    $(document).ready(function(){
        const $checkboxUpdate = $("#checkUpdate");
        const $btnSubmit      = $("#btnSubmit");
        const $updateInputs         = $(".groupInput > input");
        
        function setReadOnly(){
            $($updateInputs).each(function(index, input){
                
                if($(input).prop("readonly")){
                    
                    $(input).prop("readonly", false)
                
                }else{
                    
                    $(input).prop("readonly", true)
                
                }
            });

        }
        $($checkboxUpdate).click(function(){
            if ($(this).prop("checked")){
                setReadOnly();
                $btnSubmit.prop("disabled", false);
                
            } else {
                setReadOnly();
                $btnSubmit.prop("disabled", true);
            }
        })

    });
</script>
