<div class="manage-section">
    <h3>
        مدیریت کارمندان
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_modal">
            افزودن
            <i class="fa fa-plus"></i>
        </button>
    </h3>
    <hr>

    <!-- If Statement -->
    <?php if ($employees) : ?>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>شماره</th>
                <th>نام</th>
                <th>تخلص</th>
                <th>شماره تماس</th>
                <th>مقام</th>
                <th>نام کاربری</th>
                <th>تصحیح</th>
                <th>حذف</th>
            </tr>
            <?php $x = 1; foreach ($employees as $item) : ?>
                <tr>
                    <td><?= $x; $x++; ?></td>
                    <td><?= $item->firstname; ?></td>
                    <td><?= $item->lastname; ?></td>
                    <td><?= $item->phone; ?></td>
                    <td><?= ($item->role=='admin')?('مدیر سیستم'):( ($item->role=='waiter')?('گارسون'):( ($item->role=='chief')?('آشپز'):( ($item->role=='pizza')?('پیتزا'):( ($item->role=='qalyon')?('قلیون'):( ($item->role=='jose')?('جوس'):( ($item->role=='cashier')?('کشیر'):('error') ) ) ) ) ) ); ?></td>
                    <td><?= $item->username; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>employees/<?= $item->id; ?>/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a onclick="return confirmation()" href="<?= base_url(); ?>employees/<?= $item->id; ?>/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>
            جدول کارمندان خالی میباشد!
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
                        <label>نام</label>
                        <input type="text" class="form-control" name="firstname">
                    </div>

                    <div class="form-group">
                        <label>تخلص</label>
                        <input type="text" class="form-control" name="lastname">
                    </div>

                    <div class="form-group">
                        <label>شماره تماس</label>
                        <input type="text" class="form-control" name="phone">
                    </div>

                    <div class="form-group">
                        <label>مقام</label>
                        <select class="form-control" name="role">
                            <option value="admin">مدیر سیستم</option>
                            <option value="waiter">گارسون</option>
                            <option value="chief">آشپز</option>
                            <option value="pizza">پیتزا</option>
                            <option value="qalyon">قلیون</option>
                            <option value="jose">جوس</option>
                            <option value="cashier">کشیر</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>نام کاربری</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label>کلمه عبور</label>
                        <input type="password" class="form-control" name="password">
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
