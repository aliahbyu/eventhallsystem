<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adminbooking $adminBooking
 * @var array $bookings
 */
?>

<div class="adminbookings form content">
    <?= $this->Form->create($adminBooking) ?>
    <fieldset>
        <legend><?= __('Add Admin Booking') ?></legend>
        <?php
            echo $this->Form->control('booking_id', [
                'label' => 'Select Booking (Event Name)',
                'options' => $bookings,
                'empty' => '-- Choose a Booking --'
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>




