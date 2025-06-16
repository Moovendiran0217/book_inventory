<div class="container col-md-4 my-5 bg-white p-5">

<h4 class="mb-3 text-secondary">Login</h4>
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>

<div class="mb-3 mt-2">
    <?= $this->Form->control('username', [
        'label' => 'Username or Email',
        'class' => 'form-control mt-2',
        'required' => true,
        'placeholder' => 'Enter your username or email'
    ]) ?>
</div>

<div class="mb-3">
    <?= $this->Form->control('password', [
        'label' => 'Password',
        'class' => 'form-control mt-2',
        'required' => true,
        'placeholder' => 'Enter your password',
        'type' => 'password'
    ]) ?>
</div>

<div class="mb-4">
    <?= $this->Form->button('Login', ['class' => 'btn btn-success w-100']) ?>
</div>

<?= $this->Form->end() ?>

<p class="text-center mb-0">
    <?= $this->Html->link(__('Don’t have an account? Register'), 
    ['action' => 'register'], 
    ['class' => 'btn btn-link']) ?>
</p>

</div>
