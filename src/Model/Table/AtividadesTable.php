<?php
namespace App\Model\Table;

use App\Model\Entity\Atividade;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Atividades Model
 *
 */
class AtividadesTable extends Table
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

        $this->table('atividades');
        $this->displayField('id');
        $this->primaryKey('id');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo','O campo Tipo é obrigatório. ')
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo','O campo Título é obrigatório. ')
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao','O campo Descrição é obrigatório. ')
            ->add('id_palestrante', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_palestrante', 'create')
            ->notEmpty('id_palestrante','O campo Palestrante é obrigatório. ');
    }
}
