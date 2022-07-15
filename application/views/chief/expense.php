<div class="manage-section">
    <h3>
        مدیریت مصارف
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_modal">
            افزودن
            <i class="fa fa-plus"></i>
        </button>
    </h3>
    <hr>

    <!-- If Statement -->
    <?php if ($expenses) : ?>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>شماره</th>
                <th>موضوع</th>
                <th>مقدار</th>
                <th>مبلغ</th>
                <th>مجموع</th>
                <th>تاریخ</th>
                <th>توضیحات</th>
            </tr>
            <?php $x = 1; foreach ($expenses as $item) : ?>
                <tr>
                    <th><?= $x; $x++; ?></th>
                    <th><?= $item->title; ?></th>
                    <th><?= $item->qty; ?></th>
                    <th><?= $item->amount; ?></th>
                    <th><?= $item->total; ?></th>
                    <th><?= $item->expense_date; ?></th>
                    <th><?= $item->description; ?></th>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>
            جدول مصارف خالی میباشد!
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
                        <label>موضوع</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="form-group">
                        <label>مقدار</label>
                        <input type="number" class="form-control" name="qty">
                    </div>

                    <div class="form-group">
                        <label>مبلغ</label>
                        <input type="number" class="form-control" name="amount">
                    </div>

                    <div class="form-group">
                        <label>تاریخ</label>
                        <input type="date" class="form-control" name="expense_date">
                    </div>

                    <div class="form-group">
                        <label>توضیحات</label>
                        <textarea class="form-control" name="description"></textarea>
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
