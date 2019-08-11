<?php 

    if (!checkLogin()) {
        header("location: /?page=login");
    }

?>
<div class="container" id="msg">
    <?= Helpers\Classes\Message::returnMessage(); ?>
</div>
<div class="container">
    <form action="controller/?control_page=create_user" class=" col-8 m-auto border rounded p-2" method="POST">
        <h1>Cadastro</h1>
        <div class="row">
            <div class="form-group col-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar">
    </form>
</div>