<?php 
    $id_salesman          = preg_replace("/[^0-9]/", trim(" "), $_GET["id_salesman"]);
    $sale_model           = new Model\Sale();
    $sales_salesman_list  = $sale_model->getSalesmanSale($id_salesman);
    $sale_total_comission = 0;
    $sale_total_value     = 0;
?>
<?php if (count($sales_salesman_list) === 0): ?>
    
    <h1 class="alert alert-danger">Nenhuma venda relacionada a este vendedor</h1>

<?php else: ?>

    <div id="msg">
        <?= Helpers\Classes\Message::returnMessage(); ?>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Identificador da Venda</th>
                    <th>Valor da Venda</th>
                    <th>Comissão</th>
                    <th>Data da Venda</th>
                    <th>Nome do Vendedor</th>
                    <th>Email do Venedor</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($sales_salesman_list as $sale): 
                    $sale_total_value     += $sale->salevalue;
                    $sale_total_comission += $sale->comission; 
                ?>
                        
                    <tr>
                        <td><?= $sale->id ?></td>
                        <td><?= $sale->salevalue ?></td>
                        <td><?= $sale->comission ?></td>
                        <td><?= $sale->datesale ?></td>
                        <td><?= $sale->name ?></td>
                        <td><?= $sale->email ?></td>
                        <td>
                            <form action="controller/?control_page=sale_delete" method="POST">
                                <input type="hidden" value=<?= $sale->id ?>>
                                <input type="submit"  class="btn btn-outline-danger" value="Deletar">
                            </form>
                        </td>
                    </tr>
                
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><?= "Valor de vendas tota: ".$sale_total_value ?></td>
                    <td colspan="4"><?= "Total de comissão: ".$sale_total_comission ?></td>
                </tr>
            </tfoot>
        </table>
    </div>

<?php endif ?>