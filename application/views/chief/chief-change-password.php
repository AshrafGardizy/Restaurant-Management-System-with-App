<div class="manage-section">
    <h3>
        تغییر کلمه عبور
    </h3>
    <hr>
    <div class="default-div">
        <?= form_open(); ?>
            <div class="form-group">
                <label>کلمه عبور فعلی</label>
                <input type="password" class="form-control" name="cur_password">
            </div>

            <div class="form-group">
                <label>کلمه عبور جدید</label>
                <input type="password" class="form-control" name="new_password">
            </div>

            <div class="form-group">
                <label>تایید کلمه عبور</label>
                <input type="password" class="form-control" name="conf_password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">ذخیره <i class="fa fa-save"></i></button>
                <a href="<?= base_url(); ?>chief" class="btn btn-info pull-left">برگشت <i class="fa fa-angle-double-left"></i></a>
            </div>
        <?= form_close(); ?>
    </div>
</div>
