<div class="manage-section">
    <h3>
        گزارشات:
        ماه:
        <?= $month_report; ?>
        سال:
        <?= $year_report; ?>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#report_modal">گزارشات بیشتر</button>
    </h3>
    <hr>

    <!-- If Statement -->
    <?php if ($report_result) : ?>
        <table class="table table-bordered table-striped">
            <tr>
                <th>شماره</th>
                <th>شماره میز</th>
                <th>نام غذا</th>
                <th>مقدار</th>
                <th>قیمت</th>
                <th>مجموع</th>
            </tr>
            <?php $total_money = ''; $x = 1; foreach ($report_result as $item) : ?>
                <tr>
                    <td><?= $x; $x++; ?></td>
                    <td><?= $item->table_no; ?></td>
                    <td><?= $item->title; ?></td>
                    <td><?= $item->qty; ?></td>
                    <td><?= $item->price; ?></td>
                    <td><?= $item->price * $item->qty; ?></td>
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
            جدول گزارشات امروز خالی میباشد!
        </p>
    <?php endif; ?>
</div>


<!-- Report Modal -->
<div id="report_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <?= form_open(); ?>
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">گزارش ماهانه</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ماه</label>
                        <select class="form-control" name="month_report">
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>سال</label>
                        <select class="form-control" name="year_report">
                            <?php for ($x=2020; $x<=2030; $x++) : ?>
                                <option><?= $x; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">گزارش</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">کنسل</button>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>
