<div class="manage-section">
    <h3>
        مدیریت کتگوری ها
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_modal">
            افزودن
            <i class="fa fa-plus"></i>
        </button>
    </h3>
    <hr>

    <!-- If Statement -->
    <?php if ($categories) : ?>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>شماره 1</th>
                <th>نام کتگوری</th>
                <th>تصحیح</th>
                <th>حذف</th>
            </tr>
            <!-- When Theres no Food -->
            <?php if (!$foods) : ?>
                <?php $x = 1; foreach ($categories as $item) : ?>
                        <tr>
                            <td><?= $x; $x++; ?></td>
                            <td><?= $item->title; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>categories/<?= $item->cat_id; ?>/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a onclick="return confirmation()" href="<?= base_url(); ?>categories/<?= $item->cat_id; ?>/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                <?php endforeach; ?>
                    <?php else : ?>
                        <?php $x = 1; foreach ($categories as $item) : ?>
                            <?php $result = $this->admin_model->get_foods_by_cat_id($item->cat_id); ?>
                            <?php if ($result) : ?>
                                <tr>
                                    <td><?= $x; $x++; ?></td>
                                    <td><?= $item->title; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>categories/<?= $item->cat_id; ?>/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a onclick="return confirmation()" href="<?= base_url(); ?>categories/<?= $item->cat_id; ?>/delete" class="btn btn-danger btn-sm <?php if ($result[0]->cat_id==$item->cat_id) { echo 'disabled'; } ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <td><?= $x; $x++; ?></td>
                                    <td><?= $item->title; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>categories/<?= $item->cat_id; ?>/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a onclick="return confirmation()" href="<?= base_url(); ?>categories/<?= $item->cat_id; ?>/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
            <?php endif; ?>
            <!-- When Theres Food -->
            <?php if ($foods) : ?>
                
            <?php endif; ?>
        </table>
    <?php else : ?>
        <p>
            جدول کتگوری ها خالی میباشد!
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
                        <label>نام کتگوری</label>
                        <input type="text" class="form-control" name="cat_name">
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
