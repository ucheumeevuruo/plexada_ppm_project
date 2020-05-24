<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Document Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string $document_no
 * @property string $document_type
 * @property \Cake\I18n\FrozenTime|null $date_uploaded
 * @property string $file_uploaded
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Document[] $documents
 */
class Document extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'project_id' => true,
        'document_no' => true,
        'document_type' => true,
        'date_uploaded' => true,
        'file_uploaded' => true,
        'project' => true,
        'documents' => true,
    ];
}
