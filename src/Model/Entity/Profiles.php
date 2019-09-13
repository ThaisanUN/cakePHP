<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Profiles extends Entity
{
    protected $_accessible = [
        'id' => true,
        'name' => true,
        'name_zh_hk' => true,
        'name_km_kh' => true,
        'status'=>true,
        'status'=>true,
        'img_url'=>true
    ];
}
