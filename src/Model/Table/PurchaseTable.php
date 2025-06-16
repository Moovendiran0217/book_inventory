<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Purchase Model
 *
 * @method \App\Model\Entity\Purchase newEmptyEntity()
 * @method \App\Model\Entity\Purchase newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Purchase> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Purchase get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Purchase findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Purchase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Purchase> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Purchase|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Purchase saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Purchase>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Purchase>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Purchase>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Purchase> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Purchase>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Purchase>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Purchase>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Purchase> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PurchaseTable extends Table
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

        $this->setTable('purchase');
        $this->setDisplayField('supplier_name');
        $this->setPrimaryKey('purchase_number');
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
            ->scalar('supplier_name')
            ->maxLength('supplier_name', 255)
            ->requirePresence('supplier_name', 'create')
            ->notEmptyString('supplier_name', 'Supplier Name is Required');

        $validator
            ->dateTime('purchase_date')
            ->allowEmptyDateTime('purchase_date');

        $validator
            ->scalar('book_title')
            ->maxLength('book_title', 255)
            ->requirePresence('book_title', 'create')
            ->notEmptyString('book_title', 'Book Title is Required');

        $validator
            ->integer('quantity')
            ->notEmptyString('quantity', 'Quantity is Required');

        $validator
            ->decimal('cost_per_unit')
            ->notEmptyString('cost_per_unit', 'Cost Per Unit is Required');

        $validator
            ->date('expected_delivery_date')
            ->notEmptyDate('expected_delivery_date','Expected Deliver Date is Required');

        $validator
            ->scalar('status')
            ->allowEmptyString('Status');

        return $validator;
    }
}
