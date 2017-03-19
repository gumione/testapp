<div class="row">
    <div class="col-lg-12">
        <h2>Комментарии</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span>Сортировать: </span>
                <span>
                    <a href="/comments/index/date/<?php echo ($this['sort'][0] == 'date' && $this['sort'][1] == 'desc') ? 'asc' : 'desc' ?>/"
                       class="btn <?php echo ($this['sort'][0] == 'date') ? 'btn-primary' : 'btn-default' ?>">
                           <?php if ($this['sort'][0] == 'date'): ?>
                               <?php echo ($this['sort'][1] == 'desc') ? 'Сначала новые' : 'Сначала старые'; ?>
                           <?php else: ?>
                            Сначала новые
                        <?php endif; ?>
                    </a>
                    <a href="/comments/index/username/<?php echo ($this['sort'][0] == 'username' && $this['sort'][1] == 'asc') ? 'desc' : 'asc' ?>/"
                       class="btn <?php echo ($this['sort'][0] == 'username') ? 'btn-primary' : 'btn-default' ?>">
                           <?php if ($this['sort'][0] == 'username'): ?>
                               <?php echo ($this['sort'][1] == 'desc') ? 'По имени Я-А' : 'По имени А-Я'; ?>
                           <?php else: ?>
                            По имени
                        <?php endif; ?>
                    </a>
                    <a href="/comments/index/email/<?php echo ($this['sort'][0] == 'email' && $this['sort'][1] == 'asc') ? 'desc' : 'asc' ?>/"
                       class="btn <?php echo ($this['sort'][0] == 'email') ? 'btn-primary' : 'btn-default' ?>">
                           <?php if ($this['sort'][0] == 'email'): ?>
                               <?php echo ($this['sort'][1] == 'desc') ? 'По email Z-A' : 'По email A-Z'; ?>
                           <?php else: ?>
                            По email
                        <?php endif; ?>
                    </a>
                </span>

            </div>
            <?php foreach ($this['comments'] as $c): ?>
                <div class="well-lg">
                    <div class="comment">
                        <div class="row">
                            <div class="col-lg-2">
                                <?php if ($c->image != ''): ?>
                                    <div class="comment-img">
                                        <img class="img-rounded" src="<?php echo '/uploads/' . $c->image; ?>"/>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h5 class="media-heading"><?php echo $c->username; ?> (<?php echo $c->email; ?>) <small><?php echo date('d.m.Y, в H:i', $c->date); ?></small></h5>
                                    </div>
                                    <?php if ($c->edited_by_admin == '1'): ?>
                                        <div class="col-lg-3">
                                            <span class="label label-primary pull-right">Изменен администратором</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p><?php echo $c->text; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Оставить свой комментарий</div>
            <div class="form-wrapper">
                <form class="form-horizontal well-lg" method="post" enctype="multipart/form-data">
                    <?php if (isset($this['action_result'])): ?>
                        <div class="col-lg-offset-2 alert alert-<?php echo $this['action_result']['result']; ?>">
                            <?php echo $this['action_result']['data']; ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group<?php echo (isset($this['validation_errors']) && $this['validation_errors']['username']) ? ' has-error' : ''; ?>">
                        <label for="name" class="col-lg-2 control-label">Ваше имя</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="username" placeholder="Игнат Подоконников"
                                   value="<?php echo (isset($this['post']) && $this['post']['username']) ? $this['post']['username'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group<?php echo (isset($this['validation_errors']) && $this['validation_errors']['email']) ? ' has-error' : ''; ?>">
                        <label for="email" class="col-lg-2 control-label">Ваш Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="mail@example.com"
                                   value="<?php echo (isset($this['post']) && $this['post']['email']) ? $this['post']['email'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group<?php echo (isset($this['validation_errors']) && $this['validation_errors']['file']) ? ' has-error' : ''; ?>">
                        <label for="text" class="col-lg-2 control-label">Изображение</label>
                            <div class="col-lg-10">
                                <span class="btn btn-default btn-file">
                                    Выберите файл <input id="file-input" type="file" name="file"/>
                                </span>
                            </div>
                        
                    </div>
                    <div class="form-group<?php echo (isset($this['validation_errors']) && $this['validation_errors']['text']) ? ' has-error' : ''; ?>">
                        <label for="text" class="col-lg-2 control-label">Комментарий</label>
                        <div class="col-lg-10">
                            <textarea rows="5" class="form-control" id="text" name="text" placeholder="Текст комментария"><?php echo (isset($this['post']) && $this['post']['text']) ? $this['post']['text'] : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Отправить комментарий</button>
                            <a class="toggle-preview btn btn-default">Предварительный просмотр</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="preview-wrapper hidden">
                <div class="row">
                    <div class="well-lg">
                        <div class="comment">
                            <div class="row">
                                <div class="col-lg-2">
                                    
                                </div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <h5 class="media-heading"><span id="preview-name">Имя</span> (<span id="preview-email">Email</span>) <small><?php echo date('d.m.Y, в H:i', time()); ?></small></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p id="preview-text">Текст комментария</p>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <a class="toggle-preview btn btn-default">Вернуться к редактированию</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>