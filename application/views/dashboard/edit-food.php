<div class="manage-section">
    <h3>
        تصحیح
    </h3>
    <hr>
    <div class="default-div">
        <?= form_open_multipart(); ?>
            <div class="form-group">
                <label>نام غذا</label>
                <input type="text" class="form-control" name="title" value="<?= set_value('title', $food->title); ?>">
            </div>

            <div class="form-group">
                <label>عکس</label>
                <input type="file" class="form-control" name="userfile">
            </div>

            <div class="form-group">
                <label>قیمت</label>
                <input type="number" class="form-control" name="price" value="<?= set_value('price', $food->price); ?>">
            </div>

            <div class="form-group">
                <label>کتگوری</label>
                <select class="form-control" name="cat_id">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category->cat_id; ?>" <?php if ($category->cat_id==$food->cat_id) { echo 'selected'; } ?>><?= $category->title; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">ذخیره <i class="fa fa-save"></i></button>
                <a href="<?= base_url(); ?>foods" class="btn btn-info pull-left">برگشت <i class="fa fa-angle-double-left"></i></a>
            </div>
        <?= form_close(); ?>
    </div>
</div>
