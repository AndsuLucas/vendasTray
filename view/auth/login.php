<?php 
    use Helpers\Classes\Message;
    if (checkLogin()) {
        header("location: /");
    }
    
?>
<div class="container" id="msg">
    <?= Message::returnMessage() ?>
</div>
<div class="container">
    <form action="controller/?control_page=login" class=" col-6 m-auto border rounded p-2" method="POST">
        <h1>Login</h1>
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
        <input type="submit" class="btn btn-primary" value="Entrar">
    </form>
</div>