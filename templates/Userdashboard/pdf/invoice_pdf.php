<div class="container mt-5">
    <h2 class="mb-4">Invoice #<?= h($invoice->invoice_number) ?></h2>
    <p><strong>Customer Name :</strong> <?= h($invoice->customer_name ?: 'N/A') ?></p>
    <p><strong>Date of Sale :</strong> <?= h(date('d-m-Y H:i', strtotime($invoice->created))) ?></p>

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead class="table-dark">
            <tr>
                <th>Book Title</th>
                <th>Quantity</th>
                <th>Price (each)</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= h($item->title) ?></td>
                <td><?= h($item->quantity) ?></td>
                <td><?= number_format($item->price, 2) ?></td>
                <td><?= number_format($item->price * $item->quantity, 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <p class="fs-5 fw-bold">Total Amount : <?= number_format($invoice->total, 2) ?></p>
    </div>
</div>