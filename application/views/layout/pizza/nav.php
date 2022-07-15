<nav class="navbar navbar-default navbar-fixed-top card-2">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand iransans" href="<?= base_url(); ?>pizza">
                پیتزا
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?= base_url(); ?>pizza">سفارشات</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $logger_info->firstname; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= base_url(); ?>pizza/profile">پروفایل</a></li>
                        <li><a href="<?= base_url(); ?>pizza/change-username">تغییر نام کاربری</a></li>
                        <li><a href="<?= base_url(); ?>pizza/change-password">تغییر کلمه عبور</a></li>
                        <li><a href="<?= base_url(); ?>logout">خروج</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- Start Container -->
<div class="container">

    <!-- Danger -->
    <?php if ($this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger alert-dismissable animated shake">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>خطا!</strong>
            عملیات انجام نشد.
        </div>
    <?php endif; ?>

    <!-- Success -->
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissable animated zoomIn">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>موفق!</strong>
            عملیات موفقانه انجام شد.
        </div>
    <?php endif; ?>
