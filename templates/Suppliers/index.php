<div class="container-fluid bg-white p-5">

    <h2 class="text-center fw-bold mb-5">List of Suppliers</h2>

    <?= $this->Flash->render() ?>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-hover table-striped text-center align-middle">
            <thead class="table-info">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th class="actions"><?= 'Actions' ?></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <td><?= $this->Number->format($supplier->id) ?></td>
                        <td><?= h($supplier->name) ?></td>
                        <td><?= h($supplier->address) ?></td>
                        <td><?= h($supplier->email) ?></td>
                        <td><?= h($supplier->phone) ?></td>
                        <td class="actions">

                            <?= $this->Html->link(
                                'View',
                                ['action' => 'view', $supplier->id],
                                ['class' => 'btn btn-primary btn-sm mb-1']
                            ) ?>

                            <?= $this->Html->link(
                                'Edit',
                                ['action' => 'edit', $supplier->id],
                                ['class' => 'btn btn-warning btn-sm mb-1']
                            ) ?>

                            <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $supplier->id],
                                [
                                    'class' => 'btn btn-danger btn-sm mb-1',
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $supplier->id),
                                ]
                            ) ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->prev('<<') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>>') ?>
        </ul>
    </nav>
</div>