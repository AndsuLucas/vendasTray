<div id="msg">
    <?= Helpers\Classes\Message::returnMessage(); ?>
</div>
<form action="./controller/?control_page=salesman_register" method="POST">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" maxlenght="100" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" maxlenght="255" class="form-control" name="email">
    </div>
    <input type="submit" class="btn btn-primary" value="Cadastrar">
</form>