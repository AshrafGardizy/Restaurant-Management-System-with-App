<div class="manage-section">
    <h3>
        سفارشات تازه
        <?php if ($jose_orders) : ?>
            <small>
                تعداد:
                <?= count($jose_orders); ?>
            </small>
        <?php endif; ?>
    </h3>
    <hr>

    <!-- If Statement -->
    <?php if ($jose_orders) : ?>
        <table class="table table-bordered table-striped">
            <tr>
                <!-- <th>شماره</th> -->
                <th>شماره میز</th>
                <th>نام غذا</th>
                <th>مقدار</th>
                <th>قیمت</th>
                <th>انجام شد</th>
            </tr>
            <?php $x = 1; foreach ($jose_orders as $item) : ?>
                <tr>
                    <!-- <td><?= $x; $x++; ?></td> -->
                    <td><?= $item->table_no; ?></td>
                    <td><?= $item->title; ?></td>
                    <td><?= $item->qty; ?></td>
                    <td><?= $item->price; ?></td>
                    <td>
                        <a onclick="return confirmation()" href="<?= base_url(); ?>jose/<?= $item->order_id; ?>/done" class="btn btn-info btn-sm">انجام شد</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>
            جدول سفارشات خالی میباشد!
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