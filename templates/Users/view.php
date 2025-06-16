<div class="container bg-white p-5">

    <h2 class="text-center fw-bold mb-5">List of Users</h2>

    <?= $this->Flash->render() ?>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-hover table-striped text-center align-middle">
            <thead class="table-info">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th class="actions"><?= 'Actions' ?></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td>
                            <?php
                            $role = h($user->role);
                            $badgeClass = ($role === 'Admin') ? 'bg-primary' : 'bg-success';
                            ?>

                            <span class="badge <?= $badgeClass ?>">
                                <?= $role ?>
                            </span>
                        </td>
                        <td class="actions">

                            <?= $this->Html->link(
                                'Edit',
                                ['action' => 'edit', $user->id],
                                ['class' => 'btn btn-warning btn-sm mb-1']
                            ) ?>

                            <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $user->id],
                                [
                                    'class' => 'btn btn-danger btn-sm mb-1',
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
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