<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 *
 * @method \App\Model\Entity\Book newEmptyEntity()
 * @method \App\Model\Entity\Book newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Book> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Book findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Book> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Book saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Book>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Book>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Book>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Book> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Book>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Book>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Book>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Book> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BooksTable extends Table
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

        $this->setTable('books');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->scalar('title')
            ->maxLength('title', 100)
            ->notEmptyString('title','Title is required.');

        $validator
            ->scalar('author')
            ->maxLength('author', 100)
            ->notEmptyString('author','Author name is required.');

        $validator
            ->scalar('publisher')
            ->maxLength('publisher', 100)
            ->notEmptyString('publisher','Publisher name is required.');

        $validator
            ->integer('publishing_year','Publishing year must be an integer.')
            ->notEmptyString('publishing_year','Publishing year is required.');

        $validator
            ->scalar('isbn')
            ->maxLength('isbn', 20)
            ->notEmptyString('isbn','ISBN is required.');

        $validator
            ->scalar('edition')
            ->maxLength('edition', 50)
            ->notEmptyString('edition','Edition is required.');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 50)
            ->notEmptyString('genre','Genre is required.');

        $validator
            ->scalar('cost')
            ->notEmptyString('cost','Cost is required.');

        $validator
            ->scalar('price')
            ->notEmptyString('price','price is required.');

        $validator
            ->integer('quantity','Quantity must be an integer.')
            ->notEmptyString('quantity','Quantity is required.');

        $validator
            ->scalar('language')
            ->maxLength('language', 50)
            ->notEmptyString('language','Language is required.');

        return $validator;
    }
}
