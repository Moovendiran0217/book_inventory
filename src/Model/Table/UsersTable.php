<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator): Validator
    {
    
    // Validate 'username' field
    $validator
        ->scalar('username')
        ->maxLength('username', 255)
        ->requirePresence('username', 'create')
        ->notEmptyString('username', 'Username is required')
        ->add('username', 'length', [
            'rule' => ['minLength', 5],
            'message' => 'Username must be at least 5 characters long.'
        ]);

    // Validate 'email' field
    $validator
        ->scalar('email')
        ->maxLength('email', 255)
        ->requirePresence('email', 'create')
        ->notEmptyString('email', 'Email is required')
        ->add('email', 'customEmail', [
        'rule' => function ($value, $context) {
            // Custom email validation regex
            return (bool)preg_match('/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/', $value);
        },
        'message' => 'Invalid email format.'
    ]);
    
    // Validate 'password' field
    $validator
        ->scalar('password')
        ->maxLength('password', 255)
        ->requirePresence('password', 'create')
        ->notEmptyString('password', 'Password is required')
        ->add('password', 'length', [
            'rule' => ['minLength', 8],
            'message' => 'Password must be at least 8 characters long.'
        ])
        ->add('password', 'customComplexity', [
            'rule' => function ($value, $context) {
                // At least one uppercase letter and one special character
                return (bool)preg_match('/^(?=.*[A-Z])(?=.*[\W_]).+$/', $value);
            },
            'message' => 'Password must contain at least one uppercase letter and one special character.'
        ]);

    // Validate 'confirm_password' field
    $validator
        ->requirePresence('confirm_password', 'create')
        ->notEmptyString('confirm_password', 'Confirm password is required')
        ->add('confirm_password', 'custom', [
            'rule' => function ($value, $context) {
                return isset($context['data']['password']) && $value === $context['data']['password'];
            },
            'message' => 'Password and confirm password do not match.'
        ]);


    return $validator;
    
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username' , 'message' => 'Username already exists.']);
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email', 'message' => 'Email already exists.']);
        
        return $rules;
    }
}
