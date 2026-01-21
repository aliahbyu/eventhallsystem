<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #<?= h($booking->id) ?></title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .invoice-box {
            width: 100%;
            padding: 30px;
            border: 1px solid #eee;
        }

        h1, h3 {
            text-align: center;
        }

        .info-table, .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .info-table td {
            padding: 5px;
        }

        .summary-table th, .summary-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .summary-table th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h1>INVOICE</h1>
        <h3>La Parisenne Ballroom Sdn Bhd</h3>
        <p class="center">123, Jalan Events, 43000 Kajang, Selangor, Malaysia</p>

        <table class="info-table">
            <tr>
                <td><strong>Invoice No:</strong> INV<?= str_pad($booking->id, 5, '0', STR_PAD_LEFT) ?></td>
                <td class="right"><strong>Date:</strong> <?= date('d/m/Y') ?></td>
            </tr>
            <tr>
                <td><strong>Customer:</strong> <?= h($booking->name) ?></td>
                <td class="right"><strong>Email:</strong> <?= h($booking->email) ?></td>
            </tr>
            <tr>
                <td><strong>Phone:</strong> <?= h($booking->phone) ?></td>
                <td class="right"><strong>Event:</strong> <?= h($booking->event_name) ?></td>
            </tr>
        </table>

        <h3 class="center">Booking Details</h3>

        <table class="summary-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="center">Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Hall Booked</td>
                    <td class="center"><?= h($booking->hall->name) ?> (<?= $booking->hall->capacity ?> pax)</td>
                </tr>
                <tr>
                    <td>Package Chosen</td>
                    <td class="center"><?= h($booking->package->name) ?> - <?= h($booking->package->includes) ?></td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td class="center"><?= h($booking->start_date->format('d/m/Y')) ?></td>
                </tr>
                <tr>
                    <td>End Date</td>
                    <td class="center"><?= h($booking->end_date->format('d/m/Y')) ?></td>
                </tr>
                <tr>
                    <td><strong>Total Price</strong></td>
                    <td class="center"><strong>RM <?= number_format($booking->total_price, 2) ?></strong></td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p><strong>Bank Transfer To:</strong></p>
            <p>La Parisenne Ballroom Sdn Bhd<br>
            Bank: Maybank<br>
            Account Number: 1234567890</p>

            <p>This is a computer-generated invoice and does not require a signature.</p>
        </div>
    </div>
</body>
</html>
