<?php 
    $id_salesman = preg_replace("/[^0-9]/", trim(" "), $_GET["id_salesman"]);
    $sale_model  = new Model\Sale();

    $sales_salesman_list  = $sale_model->getSalesmanSale($id_salesman);
?>
<?php if (count($sales_salesman_list) === 0): ?>
    
    <h1 class="alert alert-danger">Nenhuma venda relacionada a este vendedor</h1>

<?php else: ?>

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
            <?php foreach($sales_salesman_list as $sale): ?>
                <tr>
                    <td><?= $sale->id ?></td>
                    <td><?= $sale->salevalue ?></td>
                    <td><?= $sale->comission ?></td>
                    <td><?= $sale->datesale ?></td>
                    <td><?= $sale->name ?></td>
                    <td><?= $sale->email ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

<?php endif ?>