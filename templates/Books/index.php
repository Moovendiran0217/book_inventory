<div class="container-fluid bg-white p-5">
    <h2 class="text-center fw-bold mb-5">List of Books</h2>

    <?= $this->Flash->render() ?>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-hover table-striped text-center align-middle">
            <thead class="table-info">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('author') ?></th>
                    <th><?= $this->Paginator->sort('publisher') ?></th>
                    <th><?= $this->Paginator->sort('publishing_year') ?></th>
                    <th><?= $this->Paginator->sort('isbn') ?></th>
                    <th><?= $this->Paginator->sort('edition') ?></th>
                    <th><?= $this->Paginator->sort('genre') ?></th>
                    <th><?= $this->Paginator->sort('cost') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('language') ?></th>
                    <th class="actions"><?= 'Actions' ?></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $this->Number->format($book->id) ?></td>
                        <td><?= h($book->title) ?></td>
                        <td><?= h($book->author) ?></td>
                        <td><?= h($book->publisher) ?></td>
                        <td><?= $this->Number->format($book->publishing_year) ?></td>
                        <td><?= h($book->isbn) ?></td>
                        <td><?= h($book->edition) ?></td>
                        <td><?= h($book->genre) ?></td>
                        <td><?= number_format($book->cost, 2) ?></td>
                        <td><?= number_format($book->price, 2) ?></td>
                        <td><?= $book->quantity === 0 ? '<span class="text-danger fw-bold">Mark as Sold</span>' : $this->Number->format($book->quantity) ?>
                        </td>
                        <td><?= h($book->language) ?></td>
                        <td class="actions">

                            <?= $this->Html->link(
                                'View',
                                ['action' => 'view', $book->id],
                                ['class' => 'btn btn-primary btn-sm mb-1']
                            ) ?>

                            <?= $this->Html->link(
                                'Edit',
                                ['action' => 'edit', $book->id],
                                ['class' => 'btn btn-warning btn-sm mb-1']
                            ) ?>

                            <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $book->id],
                                [
                                    'class' => 'btn btn-danger btn-sm mb-1',
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $book->id),
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