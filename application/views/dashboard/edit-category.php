<div class="manage-section">
    <h3>
        تصحیح
    </h3>
    <hr>
    <div class="default-div">
        <?= form_open(); ?>
            <div class="form-group">
                <label>نام کتگوری</label>
                <input type="text" class="form-control" name="cat_name" value="<?= set_value('cat_name', $category->title); ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">ذخیره <i class="fa fa-save"></i></button>
                <a href="<?= base_url(); ?>categories" class="btn btn-info pull-left">برگشت <i class="fa fa-angle-double-left"></i></a>
            </div>
        <?= form_close(); ?>
    </div>
</div>
