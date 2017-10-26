<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Логин" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Пароль" type="password"/>
            </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Пароль еще раз" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Регестрация
            </button>
        </div>
    </fieldset>
</form>
<div>
    <a href="login.php">Уже зарегистрированны?</a>
</div>
