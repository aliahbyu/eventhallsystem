<h1 class="mb-4">Welcome to Event Hall Management System</h1>

<?php if ($bankDetails): ?>
    <h2>Bank Details</h2>
    <table class="table table-bordered table-striped mb-4">
        <tr>
            <th>Bank Name</th>
            <td><?= h($bankDetails->bank_name) ?></td>
        </tr>
        <tr>
            <th>Account Name</th>
            <td><?= h($bankDetails->bank_account_name) ?></td>
        </tr>
        <tr>
            <th>Account Number</th>
            <td><?= h($bankDetails->bank_account_number) ?></td>
        </tr>
    </table>
<?php endif; ?>

<h2>Available Halls</h2>
<table class="table table-hover table-bordered mb-4">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Capacity</th>
            <th>Minimum Booking Day</th>
            <th>Weekday Rate (RM)</th>
            <th>Weekend Rate (RM)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($halls as $hall): ?>
            <tr>
                <td><?= h($hall->name) ?></td>
                <td><?= h($hall->capacity) ?></td>
                <td><?= h($hall->min_booking_day) ?></td>
                <td><?= number_format($hall->weekday_rate, 2) ?></td>
                <td><?= number_format($hall->weekend_rate, 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Available Packages</h2>
<table class="table table-hover table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Package Name</th>
            <th>Price (RM)</th>
            <th>Includes</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($packages as $package): ?>
            <tr>
                <td><?= h($package->name) ?></td>
                <td><?= number_format($package->price, 2) ?></td>
                <td><?= h($package->includes) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



