<div class="row">
    <table class="table table-bordered" id="content-table" border="0">
        <colgroup width="150"/>
        <colgroup width="50"/>
        <colgroup width="100"/>
        <colgroup width="100"/>
        <colgroup width="500"/>
        <colgroup width="50"/>
        <colgroup width="10"/>
        <thead>
            <tr class="t_header">
                <th>Дата</th>
                <th>Изображение</th>
                <th>Автор</th>
                <th>E-mail</th>
                <th>Текст комментария</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this['comments'] as $c): ?>
                <tr class="element" id="<?= $c->id ?>">
                    <td><?php echo date('d.m.Y, в H:i', $c->date); ?></td>
                    <td>
                        <?php if ($c->image != ''): ?>
                            <img class="img-rounded" src="<?php echo '/uploads/' . $c->image; ?>"/>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $c->username; ?></td>
                    <td><?php echo $c->email; ?></td>
                    <td><?php echo $c->text; ?></td>
                    <td>
                        <?php if($c->moderated == 0 && $c->declined == 0) echo 'Ожидает модерации';
                              if($c->declined == 1) echo 'Отклонен';
                              if($c->moderated == 1 && $c->declined == 0) echo 'Принят';
                        ?>
                    </td>
                    <td class="content_actions">
                        <?php if ($c->moderated == 0): ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="/admin/approve/<?php echo $c->id; ?>" class="btn btn-primary">Принять</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="/admin/decline/<?php echo $c->id; ?>" class="btn btn-primary">Отклонить</a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="/admin/edit/<?php echo $c->id; ?>" class="btn btn-primary">Редактировать</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>