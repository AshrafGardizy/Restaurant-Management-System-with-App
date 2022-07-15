<div class="manage-section">
    <h3>
        تصحیح
    </h3>
    <hr>
    <div class="default-div">
        <?= form_open(); ?>
            <div class="form-group">
                <label>شماره میز</label>
                <input type="number" class="form-control" name="table_no" value="<?= set_value('table_no', $table->table_no); ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">ذخیره <i class="fa fa-save"></i></button>
                <a href="<?= base_url(); ?>tables" class="btn btn-info pull-left">برگشت <i class="fa fa-angle-double-left"></i></a>
            </div>
        <?= form_close(); ?>
    </div>
</div>
