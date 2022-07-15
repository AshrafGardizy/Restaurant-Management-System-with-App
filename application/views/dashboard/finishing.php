<div class="manage-section">
    <h3>
        سفارشات میز:
        <?= $done_orders[0]->table_no; ?>
        <?php if ($done_orders) : ?>
            <small>
                تعداد:
                <?= count($done_orders); ?>
            </small>
        <?php endif; ?>
    </h3>
    <hr>

    <!-- If Statement -->
    <?php if ($done_orders) : ?>
        <table class="table table-bordered table-striped">
            <tr>
                <th>شماره</th>
                <th>شماره میز</th>
                <th>نام غذا</th>
                <th>مقدار</th>
                <th>قیمت</th>
                <th>مجموع</th>
                <th>حساب شد</th>
            </tr>
            <?php $total_money = ''; $x = 1; foreach ($done_orders as $item) : ?>
                <tr>
                    <td><?= $x; $x++; ?></td>
                    <td><?= $item->table_no; ?></td>
                    <td><?= $item->title; ?></td>
                    <td><?= $item->qty; ?></td>
                    <td><?= $item->price; ?></td>
                    <td><?= $item->price * $item->qty; ?></td>
                    <td>
                        <a onclick="return confirmation()" href="<?= base_url(); ?>dashboard/<?= $item->table_id; ?>/settle" class="btn btn-info btn-sm">حساب شد</a>
                    </td>
                </tr>
                <!-- Calculating -->
                <?php
                $total_money += $item->price * $item->qty;
                ?>
            <?php endforeach; ?>
            <tr>
                <th colspan="7" class="text-center">
                    قیمت مجموعی:
                    <?= $total_money; ?>
                </th>
            </tr>
        </table>
    <?php else : ?>
        <p>
            جدول میز ها خالی میباشد!
        </p>
    <?php endif; ?>
</div>
