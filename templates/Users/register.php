<div class="container col-md-4 bg-white p-5">

<h4 class="mb-3 text-secondary">Registration</h4>
<?= $this->Flash->render() ?>
<?= $this->Form->create($user, [
    'class' => 'needs-validation', // Enables Bootstrap 5 validation styles
    'novalidate' => true // Disables HTML5 validation to use custom validation
]) ?>

<div class="mb-3 mt-2 ">
    <?= $this->Form->control('username', [
        'label' => 'Username',
        'class' => 'form-control mt-1',
        'required' => true,
        'placeholder' => 'Enter your username'
    ]) ?>
</div>

<div class="mb-3">
    <?= $this->Form->control('email', [
        'label' => 'Email',
        'class' => 'form-control mt-1',
        'required' => true,
        'placeholder' => 'Enter your email',
    ]) ?>
</div>

<div class="mb-3">
    <?= $this->Form->control('password', [
        'label' => 'Password',
        'class' => 'form-control mt-1',
        'required' => true,
        'placeholder' => 'Enter your password',
        'type' => 'password'
    ]) ?>
</div>

<div class="mb-3">
    <?= $this->Form->control('confirm_password', [
        'label' => 'Confirm Password',
        'class' => 'form-control mt-1',
        'required' => true,
        'placeholder' => 'Re-enter your password',
        'type' => 'password'
    ]) ?>
</div>

<div class="mb-4">
    <?= $this->Form->button('Register', ['class' => 'btn btn-success w-100']) ?>
</div>

<?= $this->Form->end() ?>

<p class="text-center mb-0">
    <?= $this->Html->link(__('Already have an account? Login'), 
    ['action' => 'login'], 
    ['class' => 'btn btn-link']) ?>
</p>

</div>