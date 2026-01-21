<h1 class="mb-4"><?= $this->fetch('title') ?? 'Add/Edit Admin Booking' ?></h1>

<div class="card shadow-sm">
    <div class="card-body">
        <?= $this->Form->create($adminbooking) ?>
        <div class="mb-3">
            <?= $this->Form->control('booking_id', [
                'label' => 'Select Booking',
                'options' => $bookings,
                'class' => 'form-select'
            ]) ?>
        </div>
        <div class="text-end">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>




