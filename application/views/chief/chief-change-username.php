<div class="manage-section">
    <h3>
        تغییر نام کاربری
    </h3>
    <hr>
    <div class="default-div">
        <?= form_open(); ?>
            <div class="form-group">
                <label>نام کاربری فعلی</label>
                <input type="text" class="form-control" name="cur_username" value="<?= set_value('cur_username'); ?>">
            </div>

            <div class="form-group">
                <label>نام کاربری جدید</label>
                <input type="text" class="form-control" name="new_username" value="<?= set_value('new_username'); ?>">
            </div>

            <div class="form-group">
                <label>تایید نام کاربری</label>
                <input type="text" class="form-control" name="conf_username" value="<?= set_value('conf_username'); ?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">ذخیره <i class="fa fa-save"></i></button>
                <a href="<?= base_url(); ?>dashboard" class="btn btn-info pull-left">برگشت <i class="fa fa-angle-double-left"></i></a>
            </div>
        <?= form_close(); ?>
    </div>
</div>
