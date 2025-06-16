<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoices Model
 *
 * @method \App\Model\Entity\Invoice newEmptyEntity()
 * @method \App\Model\Entity\Invoice newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Invoice> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Invoice get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Invoice findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Invoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Invoice> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Invoice saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Invoice>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Invoice>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Invoice>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Invoice> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Invoice>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Invoice>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Invoice>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Invoice> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InvoicesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        
        $this->setTable('invoices');
        $this->setDisplayField('invoice_number');
        $this->setPrimaryKey('invoice_number');
        
        // Add this association
        $this->hasMany('InvoiceItems', [
            'foreignKey' => 'invoice_number',
            'bindingKey' => 'invoice_number',
            'className' => 'InvoiceItems'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('customer_name')
            ->maxLength('customer_name', 100)
            ->allowEmptyString('customer_name');

        $validator
            ->decimal('total')
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

        return $validator;
    }
}
