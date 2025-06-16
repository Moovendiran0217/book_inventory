<div class="container bg-white p-5">
    <h2 class="text-center fw-bold mb-5">Purchase Report</h2>

    <?= $this->Flash->render() ?>

    <div class="mb-5 mt-2">
        <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3 align-items-end']) ?>
        <div class="col-auto">
            <?= $this->Form->control('from', [
                'type' => 'date',
                'label' => 'From',
                'value' => $from,
                'class' => 'form-control mt-2'
            ]) ?>
        </div>
        <div class="col-auto">
            <?= $this->Form->control('to', [
                'type' => 'date',
                'label' => 'To',
                'value' => $to,
                'class' => 'form-control mt-2'
            ]) ?>
        </div>
        <div class="col-auto">
            <?= $this->Form->button('Generate Report', [
                'name' => 'generate',
                'value' => 1,
                'type' => 'submit',
                'class' => 'btn btn-success'
            ]) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>

    <?php if (!empty($purchaseReports) && count($purchaseReports)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Report ID</th>
                        <th>Generate Date</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Total Purchase</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($purchaseReports as $report): ?>
                        <tr>
                            <td><?= h($report->report_id) ?></td>
                            <td><?= h(date('d-m-Y', strtotime($report->generate_date))) ?></td>
                            <td><?= h(date('d-m-Y', strtotime($report->from_date))) ?></td>
                            <td><?= h(date('d-m-Y', strtotime($report->to_date))) ?></td>
                            <td><?= h($report->total_purchase) ?></td>
                            <td>
                                <?= $this->Html->link(
                                    'View',
                                    ['action' => 'viewPurchase', $report->report_id],
                                    ['class' => 'btn btn-primary btn-sm']
                                ) ?>

                                <?= $this->Html->link(
                                    'Download Report',
                                    ['action' => 'viewPurchase', $report->report_id, '?' => ['pdf' => 1]],
                                    [
                                        'class' => 'btn btn-warning btn-sm ms-1',
                                        'target' => '_blank',
                                        'escape' => false
                                    ]
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">No Purchase reports found.</div>
    <?php endif; ?>
</div>