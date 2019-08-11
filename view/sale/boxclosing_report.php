<?php
    $sale_model  = new Model\Sale;
    $all_reports = $sale_model->getAllBoxClosings();
  
?>
<div id="msg">
   <?= Helpers\Classes\Message::returnMessage(); ?>
</div>
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Data do Fechamento</th>
            <th>Valor do caixa</th>
        </tr>
        <?php foreach($all_reports as $report): ?>
            <tr>
                <td><?= $report->dateclosing ?></td>
                <td><?= $report->valueofbox ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>