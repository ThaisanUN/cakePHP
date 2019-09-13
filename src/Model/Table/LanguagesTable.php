<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class LanguagesTable extends Table
{
   
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('languages');
      
        $this->setPrimaryKey('id');
        $this->hasMany('Descriptions', [
            'foreignKey' => 'decription_id'
        ]);
        $this->hasMany('Process', [
                    'foreignKey' => 'process_id'
                ]);
                
    }
}