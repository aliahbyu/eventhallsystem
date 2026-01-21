<h1>Edit Hall</h1>

<?= $this->Form->create($hall) ?>
    <?= $this->Form->control('name') ?>
    <?= $this->Form->control('capacity') ?>
    <?= $this->Form->control('min_booking_day') ?>
    <?= $this->Form->control('weekday_rate') ?>
    <?= $this->Form->control('weekend_rate') ?>
    <?= $this->Form->button('Update', ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>
