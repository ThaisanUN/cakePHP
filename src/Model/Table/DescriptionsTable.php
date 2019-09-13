<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class DescriptionsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('descriptions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Staffs', [
            'foreignKey' => 'staffs_id'
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'id'
        ]);
        $this->belongsTo('process', [
            'foreignKey' => 'id'
        ]);
    }
}
