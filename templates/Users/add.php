<div class="container bg-white p-5">

    <h4 class="mb-3 text-secondary">Add User</h4>

    <?= $this->Flash->render() ?>

    <?= $this->Form->create(
        $user,
        [
            'class' => 'needs-validation', // Enables Bootstrap 5 validation styles
            'novalidate' => true            // Disables HTML5 validation to use custom validation
        ]
    ) ?>

    <div class="row">
        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'username',
                [
                    'label' => 'Username',
                    'class' => 'form-control',
                    'required' => true,
                    'placeholder' => 'Enter your username'
                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control(
                'email',
                [
                    'label' => 'Email',
                    'class' => 'form-control',
                    'required' => true,
                    'placeholder' => 'Enter your email',

                ]
            ) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control('password', [
                'label' => 'Password',
                'class' => 'form-control',
                'required' => true,
                'placeholder' => 'Enter your password',
                'type' => 'password'
            ]) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control('confirm_password', [
                'label' => 'Confirm Password',
                'class' => 'form-control',
                'required' => true,
                'placeholder' => 'Re-enter your password',
                'type' => 'password'
            ]) ?>
        </div>

        <div class="mb-3 col-md-6">
            <?= $this->Form->control('role', [
                'label' => 'Role',
                'class' => 'form-control',
                'required' => true,
                'options' => ['User' => 'User', 'Admin' => 'Admin']
            ]) ?>
        </div>


        <div class="text-center">
            <?= $this->Form->button(
                ('Submit'),
                ['class' => 'btn btn-success']
            ) ?>
        </div>

    </div>
    <?= $this->Form->end() ?>
</div>