<div class="manage-section">
    <h3>
        تصحیح
    </h3>
    <hr>
    <div class="default-div">
        <?= form_open(); ?>
            <div class="form-group">
                <label></label>
                <input type="text" class="form-control" name="firstname" value="<?= set_value('table_no', $employee->firstname); ?>">
            </div>

            <div class="form-group">
                <label></label>
                <input type="text" class="form-control" name="lastname" value="<?= set_value('table_no', $employee->lastname); ?>">
            </div>
            
            <div class="form-group">
                <label></label>
                <input type="text" class="form-control" name="phone" value="<?= set_value('table_no', $employee->phone); ?>">
            </div>
            
            <div class="form-group">
                <label></label>
                <select class="form-control" name="role">
                    <option value="admin" <?php if ($employee->role=='admin') { echo 'selected'; } ?>>مدیر سیستم</option>
                    <option value="waiter" <?php if ($employee->role=='waiter') { echo 'selected'; } ?>>گارسون</option>
                    <option value="chief" <?php if ($employee->role=='chief') { echo 'selected'; } ?>>آشپز</option>
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">ذخیره <i class="fa fa-save"></i></button>
                <a href="<?= base_url(); ?>employees" class="btn btn-info pull-left">برگشت <i class="fa fa-angle-double-left"></i></a>
            </div>
        <?= form_close(); ?>
    </div>
</div>
