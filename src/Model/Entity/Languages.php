<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Languages extends Entity
{
    protected $_accessible = [
        'id' => true,
        'language_id' => true,
        'proces_id' => true,
        'decription_id' => true
    ];
}
