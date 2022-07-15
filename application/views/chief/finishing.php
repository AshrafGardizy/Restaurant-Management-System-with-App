<div class="manage-section">
    <h3 class="not_in_print">
        سفارشات میز:
        <?= $done_orders[0]->table_no; ?>
        <?php if ($done_orders) : ?>
            <small>
                تعداد:
                <?= count($done_orders); ?>
            </small>
        <?php endif; ?>
    </h3>
    <hr class="not_in_print">

    <!-- If Statement -->
    <?php if ($done_orders) : ?>
        <table class="table table-bordered table-striped finishing_table">
            <tr>
                <th class="not_in_print">شماره</th>
                <th>شماره میز</th>
                <th>نام غذا</th>
                <th>مقدار</th>
                <th>قیمت</th>
                <th>مجموع</th>
                <th class="not_in_print">چاپ</th>
                <th class="not_in_print">حساب شد</th>
            </tr>
            <?php $total_money = ''; $x = 1; foreach ($done_orders as $item) : ?>
                <tr>
                    <td class="not_in_print"><?= $x; $x++; ?></td>
                    <td><?= $item->table_no; ?></td>
                    <td><?= $item->title; ?></td>
                    <td><?= $item->qty; ?></td>
                    <td><?= $item->price; ?></td>
                    <td><?= $item->price * $item->qty; ?></td>
                    <td class="not_in_print">
                        <button class="not_in_print" onclick="window.print()"><i class="fa fa-print"></i></button>
                    </td>
                    <td class="not_in_print">
                        <a onclick="return confirmation()" href="<?= base_url(); ?>cashier/<?= $item->table_id; ?>/settle" class="btn btn-info btn-sm not_in_print">حساب شد</a>
                    </td>
                </tr>
                <!-- Calculating -->
                <?php
                $total_money += $item->price * $item->qty;
                ?>
            <?php endforeach; ?>
            <tr>
                <th colspan="8" class="text-center">
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
