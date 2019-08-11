<?php 
    $sale_model = new Model\Sale();
    $sale_list  = $sale_model->getAllSales();

?>
<div id="msg">
   <?= Helpers\Classes\Message::returnMessage(); ?>
</div>
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Identificador da Venda</th>
            <th>Valor da Venda</th>
            <th>Comissão</th>
            <th>Data da Venda</th>
            <th>Nome do Vendedor</th>
            <th>Email do Venedor</th>
            <th>Deletar</th>
        </tr>
        <?php foreach($sale_list as $sale): ?>
            <tr>
                <td><?= $sale->id ?></td>
                <td><?= $sale->salevalue ?></td>
                <td><?= $sale->comission ?></td>
                <td><?= $sale->datesale ?></td>
                <td><?= $sale->name ?></td>
                <td><?= $sale->email ?></td>
                <td>
                    <form action="controller/?control_page=sale_delete" method="POST">
                        <input type="hidden" name="id" value=<?= $sale->id?>>
                        <input type="submit" class="btn btn-outline-danger" value="Deletar">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>