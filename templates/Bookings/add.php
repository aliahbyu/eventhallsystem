<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var \Cake\Collection\CollectionInterface|string[] $halls
 * @var \Cake\Collection\CollectionInterface|string[] $packages
 */
?>

<!--Header-->
<div class="row text-body-secondary">
    <div class="col-10">
        <h1 class="my-0 page_title"><?= h($title ?? 'Add Booking') ?></h1>
        <h6 class="sub_title text-body-secondary"><?= h($system_name ?? 'Event Hall Management System') ?></h6>
    </div>
    <div class="col-2 text-end">
        <div class="dropdown mx-3 mt-2">
            <button class="btn p-0 border-0" type="button" id="orderStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars text-primary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orderStatistics">
                <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
            </div>
        </div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
        <?= $this->Form->create($booking, ['type' => 'file']) ?>
        <fieldset>
            <legend><?= __('Add Booking') ?></legend>

            <div class="mb-3">
                <?= $this->Form->control('name', ['label' => 'Full Name', 'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('email', ['label' => 'Email Address', 'type' => 'email', 'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('phone', ['label' => 'Phone Number', 'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('event_name', ['label' => 'Event Name', 'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('hall_id', [
                    'options' => $halls,
                    'label' => 'Choose Hall',
                    'empty' => 'Select a Hall',
                    'class' => 'form-select'
                ]) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('package_id', [
                    'options' => $packages,
                    'label' => 'Choose Package',
                    'empty' => 'Select a Package',
                    'class' => 'form-select'
                ]) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('start_date', ['label' => 'Start Date', 'type' => 'date', 'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('end_date', ['label' => 'End Date', 'type' => 'date', 'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('total_price', ['label' => 'Total Price (Auto Calculated)', 'readonly' => true, 'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('receipt_path', ['label' => 'Upload Payment Receipt (PDF only)', 'type' => 'file', 'accept' => '.pdf']) ?>
            </div>


        </fieldset>
        <div class="text-end">
            <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']) ?>
            <?= $this->Form->button(__('Submit'), ['type' => 'submit', 'class' => 'btn btn-outline-primary']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- Optional: JavaScript for auto calculation (Client-side helper only) -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const hallSelect = document.getElementById("hall-id");
    const packageSelect = document.getElementById("package-id");
    const startDateInput = document.getElementById("start-date");
    const endDateInput = document.getElementById("end-date");
    const priceInput = document.getElementById("total-price");

    // Hardcoded rates for client-side estimate (also calculated in controller for security)
    const hallRates = {
        1: { weekday: 20000, weekend: 25000 }, // Grand
        2: { weekday: 9000, weekend: 15000 },  // Deluxe
        3: { weekday: 8000, weekend: 9000 }    // Standard
    };

    const packagePrices = {
        1: 40000, // Package A
        2: 25000  // Package B
    };

    function calculatePrice() {
        const hallId = parseInt(hallSelect.value);
        const packageId = parseInt(packageSelect.value);
        const start = new Date(startDateInput.value);
        const end = new Date(endDateInput.value);

        if (!hallId || !packageId || isNaN(start.getTime()) || isNaN(end.getTime())) {
            return;
        }

        const days = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) + 1;
        const isWeekend = (start.getDay() === 0 || start.getDay() === 6);
        const hallRate = isWeekend ? hallRates[hallId].weekend : hallRates[hallId].weekday;
        const packageRate = packagePrices[packageId];

        const total = (hallRate * days) + packageRate;
        priceInput.value = total.toFixed(2);
    }

    hallSelect.addEventListener("change", calculatePrice);
    packageSelect.addEventListener("change", calculatePrice);
    startDateInput.addEventListener("change", calculatePrice);
    endDateInput.addEventListener("change", calculatePrice);
});
</script>
