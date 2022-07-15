<div class="manage-section">
    <h3>
        مدیریت غذا ها
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_modal">
            افزودن
            <i class="fa fa-plus"></i>
        </button>
    </h3>
    <hr>

    <!-- If Statement -->
    <?php if ($foods) : ?>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>شماره</th>
                <th>عکس</th>
                <th>نام</th>
                <th>قیمت</th>
                <th>کتگوری</th>
                <th>تصحیح</th>
                <th>حذف</th>
            </tr>
            <?php $x = 1; foreach ($foods as $item) : ?>
                <tr>
                    <td><?= $x; $x++; ?></td>
                    <td><img src="<?= base_url() . 'assets/images/' . $item->photo; ?>" style="width:40px;"></td>
                    <td><?= $item->title; ?></td>
                    <td><?= $item->price; ?></td>
                    <td><?= $item->cat_title; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>foods/<?= $item->id; ?>/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a onclick="return confirmation()" href="<?= base_url(); ?>foods/<?= $item->id; ?>/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>
            جدول غذا ها خالی میباشد!
        </p>
    <?php endif; ?>
</div>


<!-- Add Modal -->
<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <?= form_open_multipart(); ?>
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">افزودن</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>نام غذا</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="form-group">
                        <label>عکس</label>
                        <input type="file" class="form-control" name="userfile">
                    </div>

                    <div class="form-group">
                        <label>قیمت</label>
                        <input type="number" class="form-control" name="price">
                    </div>

                    <div class="form-group">
                        <label>کتگوری</label>
                        <select class="form-control" name="cat_id">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category->cat_id; ?>"><?= $category->title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">افزودن<i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">کنسل</button>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>