<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsereProfilesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('UserProfiles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('process', [
            'foreignKey' => 'id'
        ]);
     
    }
}
