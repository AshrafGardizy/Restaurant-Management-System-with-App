<div class="manage-section">
    <h3>
        پروفایل
    </h3>
    <hr>
    <div class="default-div">
        <?= form_open(); ?>
            <div class="form-group">
                <label>نام</label>
                <input type="text" class="form-control" name="firstname" value="<?= set_value('firstname', $logger_info->firstname); ?>">
            </div>

            <div class="form-group">
                <label>تخلص</label>
                <input type="text" class="form-control" name="lastname" value="<?= set_value('lastname', $logger_info->lastname); ?>">
            </div>

            <div class="form-group">
                <label>شماره تماس</label>
                <input type="text" class="form-control" name="phone" value="<?= set_value('phone', $logger_info->phone); ?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">ذخیره <i class="fa fa-save"></i></button>
                <a href="<?= base_url(); ?>dashboard" class="btn btn-info pull-left">برگشت <i class="fa fa-angle-double-left"></i></a>
            </div>
        <?= form_close(); ?>
    </div>
</div>
