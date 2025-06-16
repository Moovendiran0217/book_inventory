<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchaseReport Model
 *
 * @method \App\Model\Entity\PurchaseReport newEmptyEntity()
 * @method \App\Model\Entity\PurchaseReport newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\PurchaseReport> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseReport get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\PurchaseReport findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\PurchaseReport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\PurchaseReport> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseReport|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\PurchaseReport saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\PurchaseReport>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PurchaseReport>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PurchaseReport>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PurchaseReport> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PurchaseReport>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PurchaseReport>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PurchaseReport>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PurchaseReport> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PurchaseReportTable extends Table
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

        $this->setTable('purchase_report');
        $this->setDisplayField('report_id');
        $this->setPrimaryKey('report_id');
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
            ->integer('total_purchase')
            ->requirePresence('total_purchase', 'create')
            ->notEmptyString('total_purchase');

        $validator
            ->date('from_date')
            ->requirePresence('from_date', 'create')
            ->notEmptyDate('from_date');

        $validator
            ->date('to_date')
            ->requirePresence('to_date', 'create')
            ->notEmptyDate('to_date');

        $validator
            ->dateTime('generate_date')
            ->allowEmptyDateTime('generate_date');

        return $validator;
    }
}
