<?php
namespace App\Model\Entity;
namespace App\Controller;
use Cake\ORM\Entity;

class Description extends Entity
{
    protected $_accessible = [
        'name' => true,
        'name_zh_hk' => true,
        'name_km_kh' => true,
        'subjects' => true,
        'tools' => true,
        'title' => true,
        'staffs_id' => true,
        'process_id' => true,
        'create_date' => true,
    ];
}
