<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ArticlesTag Entity
 *
 * @property int $id
 * @property int $tag_id
 * @property int $article_id
 *
 * @property \App\Model\Entity\Tag $tag
 * @property \App\Model\Entity\Article $article
 */
class ArticlesTag extends Entity
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
        'tag_id' => true,
        'article_id' => true,
        'tag' => true,
        'article' => true
    ];
}
