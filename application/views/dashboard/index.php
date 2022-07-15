<div class="default-div text-center">
    <?php if ($tables) : ?>
        <?php foreach ($tables as $item) : ?>
                <div class="d-inline-block">
                    <a href="<?= base_url(); ?>dashboard/<?= $item->id; ?>/finished" class="btn btn-success table-btn btn-lg">میز <?= $item->table_no; ?></a>
                </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>
            جدول میز ها خالی میباشد!
        </p>
    <?php endif; ?>
</div>
