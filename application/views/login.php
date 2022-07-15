<!-- Start Container -->
<div class="container">

    <!-- Danger -->
    <?php if ($this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger alert-dismissable animated shake">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>خطا!</strong>
            عملیات موفقانه انجام نشد.
        </div>
    <?php endif; ?>

    <!-- Success -->
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissable animated zoom">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>موفق!</strong>
            عملیات موفقانه انجام شد.
        </div>
    <?php endif; ?>

<div class="default-div">
    
    <!-- Logo -->
    <div class="logo my-4 text-center">
        <img src="<?= base_url(); ?>assets/images/logo.png" class="img-responsive">
        <h2 class="text-center">ورود به سیستم مدیریت رستورانت</h2>
    </div>

    <div class="panel panel-primary card-16">
        <div class="panel-heading btitrb">
            ورود به مدیریت سیستم
        </div>
        <div class="panel-body">
            <?= form_open('', ['autocomplete'=>'off']); ?>
                <div class="form-group">
                    <label>نام کاربری</label>
                    <input type="text" class="form-control" name="username">
                </div>

                <div class="form-group">
                    <label>کلمه عبور</label>
                    <input type="password" class="form-control" name="password">
                </div>
                
                <div class="form-group">
                    <button class="btn btn-default">ورود <i class="fa fa-lock"></i></button>
                </div>

            <?= form_close(); ?>
        </div>
    </div>

</div>
