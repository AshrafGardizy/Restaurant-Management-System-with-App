<div class="manage-section">
    <h3>
        مدیریت میز ها
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_modal">
            افزودن
            <i class="fa fa-plus"></i>
        </button>
    </h3>
    <hr>

    <!-- If Statement -->
    <?php if ($tables) : ?>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>شماره</th>
                <th>شماره میز ها</th>
                <th>تصحیح</th>
                <th>حذف</th>
            </tr>
            <?php $x = 1; foreach ($tables as $item) : ?>
                <tr>
                    <td><?= $x; $x++; ?></td>
                    <td><?= $item->table_no; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>tables/<?= $item->id; ?>/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a onclick="return confirmation()" href="<?= base_url(); ?>tables/<?= $item->id; ?>/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>
            جدول میز ها خالی میباشد!
        </p>
    <?php endif; ?>
</div>


<!-- Add Modal -->
<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <?= form_open(); ?>
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">افزودن</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>شماره میز</label>
                        <input type="number" class="form-control" name="table_no">
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