<div class="container bg-white p-5 shadow-sm rounded-3">
    <h2 class="mb-4">🧾Invoice #<?= h($invoice->invoice_number) ?></h2>
    <p><strong>Customer Name :</strong> <?= h($invoice->customer_name ?: 'N/A') ?></p>
    <p><strong>Date of Sale :</strong> <?= h(date('d-m-Y H:i', strtotime($invoice->created))) ?></p>

    <table class="table table-bordered table-striped text-center mt-4">
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
                <td>₹ <?= number_format($item->price, 2) ?></td>
                <td>₹ <?= number_format($item->price * $item->quantity, 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <p class="fs-5 fw-bold">Total Amount : ₹ <?= number_format($invoice->total, 2) ?></p>
    </div>
    <div class="mt-3 d-flex justify-content-center">

        <?= $this->Html->link('Back to Books', 
        ['action' => 'index'], 
        ['class' => 'me-2 btn btn-danger']) ?>

        <?= $this->Html->link('All Invoices', 
        ['action' => 'allInvoices'], 
        ['class' => 'me-2 btn btn-success']) ?>

        <?= $this->Html->link('Download Invoice', 
        ['action' => 'invoice', $invoice->invoice_number, '?' => ['pdf' => 1]], 
        ['class' => 'btn btn-warning', 
        'target' => '_blank',
        'escape' => false]) ?>

    </div>
</div>