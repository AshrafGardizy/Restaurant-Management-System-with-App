<div class="manage-section">
    <h3>
        سفارش برای میز شماره:
        <?= $table->table_no; ?>
    </h3>
    <hr>
    <div class="default-div">
        <?php foreach ($categories as $category) : ?>
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading order-table-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $category->cat_id; ?>">
                        <?= $category->title; ?>
                    </a>
                  </h4>
                </div>
                <div id="collapse<?= $category->cat_id; ?>" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <?php $foods = $this->admin_model->get_foods_by_cat_id($category->cat_id); ?>
                        <!-- Chk if a category doesn't have any food -->
                        <?php if ($foods) : ?>
                            <?php foreach ($foods as $food) : ?>
                                <div class="well">
                                    <?= validation_errors(); ?>
                                    <?= form_open('', ['class'=>'order_form']); ?>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label>
                                                    <input type="checkbox" name="food_id" id="food_id" value="<?= $food->id; ?>">
                                                    <?= $food->title; ?>
                                                </label>
                                            </div>
                                            <div class="col-sm-3">
                                                قیمت:
                                                <b>
                                                    <?= $food->price; ?>
                                                </b>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control input-sm" name="amount" id="amount">
                                            </div>
                                            <!-- Table No -->
                                            <input type="hidden" name="table_no" value="<?= $table->table_no; ?>">
                                            <div class="col-md-12 mt-4 text-center">
                                                <div class="mt-4">
                                                    <button type="submit" class="btn btn-success btn-sm" value="chief" name="submit_btn" style="margin:4px;">فرمایش به آشپز خانه</button>
                                                    <button type="submit" class="btn btn-success btn-sm" value="pizza" name="submit_btn" style="margin:4px;">فرمایش به پیتزا</button>
                                                    <button type="submit" class="btn btn-success btn-sm" value="qalyon" name="submit_btn" style="margin:4px;">فرمایش به قلیون</button>
                                                    <button type="submit" class="btn btn-success btn-sm" value="jose" name="submit_btn" style="margin:4px;">فرمایش به جوس</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?= form_close(); ?>
                                </div>
                            <?php endforeach; ?>
                            <?php else : ?>
                                <p>
                                    کتگوری 
                                    <?= $category->title; ?>
                                    غذا ندارد!
                                </p>
                        <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<script>
    // $('.order_form').submit(function () {
    //     var food_id = $('#food_id');
    //     var amount = $('#amount');
    //     $.ajax({
    //         url: "<?= base_url(); ?>dashboard/add_order",
    //         method: 'post',
    //         data: {
    //             food_id: food_id,
    //             amount: amount
    //         },
    //         success: function (response) {
    //             if (response.success) {
    //                 console.log('success');
    //             } else console.log('error');
    //         },
    //         error: function (data) {
    //             console.log(data);
    //         }
    //     });
    //     return false;
    // });
</script>