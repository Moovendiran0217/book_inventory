<div class="container bg-white p-5 shadow-sm rounded-3">
    <h2 class="mb-4 text-center">🧾All Invoices</h2>
    
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>Invoice Number</th>
                <th>Customer Name</th>
                <th>Date</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?= h($invoice->invoice_number) ?></td>
                <td><?= h($invoice->customer_name ?: 'N/A') ?></td>
                <td><?= h(date('d-m-Y H:i', strtotime($invoice->created))) ?></td>
                <td>₹ <?= number_format($invoice->total, 2) ?></td>
                <td>

                    <?= $this->Html->link('View', 
                    ['action' => 'invoice', $invoice->invoice_number],
                    ['class' => 'btn btn-primary btn-sm']) ?>

                    <?= $this->Html->link('Download Invoice', 
                    ['action' => 'invoice', $invoice->invoice_number, '?' => ['pdf' => 1]], 
                    ['class' => 'btn btn-warning btn-sm', 
                     'target' => '_blank',
                     'escape' => false]) ?>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <?= $this->Paginator->prev('<<') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('>>') ?>
                </ul>
            </nav>

    <div class="d-flex justify-content-center align-items-center mb-3">
        <?= $this->Html->link('Back to Books', ['action' => 'index'], ['class' => 'btn btn-danger']) ?>
    </div>
</div>