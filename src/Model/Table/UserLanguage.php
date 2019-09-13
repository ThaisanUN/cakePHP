<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsereLanguagesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('UserLanguage');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('process', [
            'foreignKey' => 'id'
        ]);
     
    }
}
