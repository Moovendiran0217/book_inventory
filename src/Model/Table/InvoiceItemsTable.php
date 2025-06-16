<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InvoiceItems Model
 *
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\InvoiceItem newEmptyEntity()
 * @method \App\Model\Entity\InvoiceItem newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\InvoiceItem> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceItem get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\InvoiceItem findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\InvoiceItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\InvoiceItem> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceItem|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\InvoiceItem saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\InvoiceItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InvoiceItem>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InvoiceItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InvoiceItem> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InvoiceItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InvoiceItem>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InvoiceItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InvoiceItem> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InvoiceItemsTable extends Table
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

        $this->setTable('invoice_items');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_number',
        ]);

        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER',
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
            ->integer('invoice_number')
            ->requirePresence('invoice_number', 'create')
            ->notEmptyString('invoice_number');

        $validator
            ->integer('book_id')
            ->notEmptyString('book_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['book_id'], 'Books'), ['errorField' => 'book_id']);

        return $rules;
    }
}
