<?php
namespace App\Model\Table;

use App\Model\Entity\Palestrante;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Palestrantes Model
 *
 */
class PalestrantesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('palestrantes');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
        		'foreignKey' => 'user_id',
        		'type' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('perfil', 'create')
            ->notEmpty('perfil');

        $validator
            ->requirePresence('foto', 'create')
            ->notEmpty('foto');
        
        $validator
            ->requirePresence('ocupacao', 'create')
            ->notEmpty('ocupacao');
        $validator
            ->requirePresence('user_id', 'create')
            ->notEmpty('user_id');

        return $validator;
    }
}
