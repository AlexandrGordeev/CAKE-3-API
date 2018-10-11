<?php
/**
 * Created by Hashstudio.
 * User: Alexandr Gordeev
 * Date: 11.10.18
 * Time: 15:29
 * @author hashstudio
 * @email mail@hashstudio.ru
 * @website hashstudio.ru
 */

namespace App\Controller;


class TagsController extends ApiController
{

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'id', 'name'
        ],
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];
}
