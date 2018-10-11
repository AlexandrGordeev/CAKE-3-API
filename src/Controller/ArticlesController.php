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


use Crud\Controller\ControllerTrait;

class ArticlesController extends ApiController
{

    use ControllerTrait;

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'id', 'title', 'description', 'publish', 'author'
        ],
        'sortWhitelist' => [
            'id', 'title', 'publish'
        ]
    ];

    public $components = [
        'RequestHandler',
        'Flash',
        'Crud.Crud' => [
            'actions' => [
                'index' => [
                    'className' => 'Crud.Index',
                    'relatedModels' => ['Tags']
                ],
                'Crud.view',

                'edit' => [
                    'className' => 'Crud.Edit',
                    'relatedModels' => ['Tags']
                ],

                'add' => [
                    'className' => 'Crud.Add',
                    'relatedModels' => ['Tags']
                ],
                'delete' => [
                    'className' => 'Crud.Delete',
                    'relatedModels' => ['Tags']
                ],
                'Crud.Edit',

            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.RelatedModels',
            ]
        ]
    ];

    public function view()
    {

        $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
            $event->subject->query->contain(['Tags']);
        });

        return $this->Crud->execute();
    }


}
