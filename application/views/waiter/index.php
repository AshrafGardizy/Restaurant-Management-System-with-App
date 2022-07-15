<div class="default-div text-center">
    <?php foreach ($tables as $item) : ?>
            <div class="d-inline-block">
                <a href="<?= base_url(); ?>waiter/<?= $item->id; ?>/order" class="btn btn-success table-btn btn-lg">میز <?= $item->table_no; ?></a>
            </div>
    <?php endforeach; ?>
</div>
