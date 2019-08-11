<?php 
    $salesman_model = new Model\Salesman();
    $salesman_list  = $salesman_model->select(["*"]);
?>
<div id="msg">
   <?= Helpers\Classes\Message::returnMessage(); ?>
</div>
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ver Vendas</th>
            <th>Editar Dados</th>
            <th>Deletar Registro</th>
        </tr>
        <?php foreach($salesman_list as $salesman): ?>
            <tr>
                <td><?= $salesman->name ?></td>
                <td><?= $salesman->email ?></td>
                <td><a target="_blank" href="/?page=show_sale&id_salesman=<?= $salesman->id ?>">Vendas</a></td>
                <td><a target="_blank" href="/?page=edit_salesman&id_salesman=<?= $salesman->id ?>">Editar</a></td>
                <td>
                    <form action="/controller/?control_page=salesman_delete" class="d-flex justify-content-center" method="POST">
                        <input type="hidden" name="id_salesman" value=<?= $salesman->id ?>>
                        <input type="submit" class="btn btn-outline-danger" value="Deletar">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>

    </table>
</div>