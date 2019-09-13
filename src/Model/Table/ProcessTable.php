<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProcessTable extends Table
{
   
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('process');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
        $this->hasMany('Descriptions', [
            'foreignKey' => 'process_id'
        ]);
        $this->BelongsTo('user_language', [
            'foreignKey' => 'user_language_id'
        ]);
       
    }
}