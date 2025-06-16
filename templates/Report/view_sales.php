<div class="container bg-white p-5 shadow-sm rounded-3">

    <h2 class="mb-4">Sales Report Details</h2>
    <p><strong>Generated On :</strong> <?= h(date('d-m-Y', strtotime($report->generate_date))) ?></p>
    <p><strong>From Date :</strong> <?= h(date('d-m-Y', strtotime($report->from_date))) ?></p>
    <p><strong>To Date :</strong> <?= h(date('d-m-Y', strtotime($report->to_date))) ?></p>
    <p><strong>Total Amount :</strong> ₹ <?= number_format($report->total_amount, 2) ?></p>
    <p><strong>Total Orders :</strong> <?= h($report->total_order) ?></p>
    
    <div class="mt-4">
        <?php if (!empty($invoices)): ?>
            <h4>Order Details</h4>
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Total Amount</th>
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoices as $invoice): ?>
                        <tr>
                            <td><?= h($invoice->invoice_number) ?></td>
                            <td><?= h(date('d-m-Y', strtotime($invoice->created))) ?></td>
                            <td><?= h($invoice->customer_name ?? '') ?></td>
                            <td>₹ <?= number_format($invoice->total ?? 0, 2) ?></td>

                            <td>
                                <?php if (!empty($invoice->invoice_items)): ?>
                                    <table class="table table-bordered text-center table-danger">
                                        <tr>
                                            <th>Title</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                        <?php foreach ($invoice->invoice_items as $item): ?>
                                            <tr>
                                                <td><?= h($item->title) ?></td> 
                                                <td><?= h($item->quantity) ?></td> 
                                                <td>₹ <?= number_format($item->price, 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                <?php else: ?>
                                    No items
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <div class="mt-3 text-center">
        <?= $this->Html->link('Back to Sales Reports', ['action' => 'salesReport'], ['class' => 'btn btn-danger']) ?>
    </div>
</div>