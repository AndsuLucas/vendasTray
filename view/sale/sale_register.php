<?php
    $salesman_model  = new Model\Salesman();
    $salesmans       = $salesman_model->select(["*"]);

  
?>
<div id="msg">
    <?= Helpers\Classes\Message::returnMessage(); ?>
</div>
<form action="controller/?control_page=sale_register" method="POST">
    <div class="row">
        <div class="form-group col-8">
            <label for="salesman">Vendedor</label>
            <select name="id_salesman" id="salesman" class="form-control">
                <option default value="">Escolha o vendedor</option>
                <?php foreach($salesmans as $salesman): ?>
                    
                    <option value=<?= $salesman->id ?>>
                        <?= "Nome: ".$salesman->name." | Email: ".$salesman->email ?>
                    </option>
                
                <?php endforeach ?>
            
            </select>
        </div>
        <div class="form-group col-4">
            <label for="valuesale">Valor da venda</label>
            <input name="salevalue" type="number" step="any" class="form-control">
        </div>
    </div>
   
    <input type="submit" class="btn btn-primary" value="Registrar Venda">
</form>