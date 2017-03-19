<div class="row">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <fieldset>
            <div id="myTabContent" class="tab-content">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Имя</label>
                    <div class="col-lg-6">
                        <p class="form-control-static"><?= $this['item']->username ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-6">
                        <p class="form-control-static"><?= $this['item']->email ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Изображение</label>
                    <div class="col-lg-6">
                        <p class="form-control-static">
                            <img class="img-rounded" src="<?php echo '/uploads/' . $this['item']->image; ?>"/>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="text">Комментарий</label>
                    <div class="col-lg-6">
                        <textarea class="form-control" rows="10" name="text" id="text"><?= $this['item']->text ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <input type="submit" class="btn btn-primary" value="Сохранить">
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>