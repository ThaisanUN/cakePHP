<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proces Entity
 *
 * @property int $id
 * @property string $process_name
 * @property string $sub_name
 * @property string $subsub_name
 * @property int|null $parent_id
 * @property int|null $id_description
 * @property int|null $user_language_id
 * @property string|null $subject
 * @property string $title
 * @property string|null $tools
 * @property string|null $file
 * @property \Cake\I18n\FrozenTime $create_date
 *
 * @property \App\Model\Entity\Proces $parent_proces
 * @property \App\Model\Entity\UserLanguage $user_language
 * @property \App\Model\Entity\Proces[] $child_process
 */
class Proces extends Entity
{

    protected $_accessible = [
        'id'=> true,
        'process_name' => true,
        'sub_name' => true,
        'subsub_name' => true,
        'process_language_id' => true,
        'other' => true,
        'create_date' => true,
    ];
}
