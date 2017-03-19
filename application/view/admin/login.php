<div id="login-wrapper" class="container bg">
    <div id="auth-form" class="panel panel-default">
        <div class="panel-heading">Авторизация</div>
        <div class="panel-body">
            <form class="form-horizontal well-lg" method="post" enctype="multipart/form-data">
                <?php if (isset($this['action_result'])): ?>
                    <div class="col-lg-offset-2 alert alert-<?php echo $this['action_result']['result']; ?>">
                        <?php echo $this['action_result']['data']; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Логин</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="name" name="username" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Пароль</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="password" name="password" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>