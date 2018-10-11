<?php
/**
 * Created by Hashstudio.
 * User: Alexandr Gordeev
 * Date: 11.10.18
 * Time: 12:06
 * @author hashstudio
 * @email mail@hashstudio.ru
 * @website hashstudio.ru
 */

namespace App\Controller;

use App\Helpers\Auth;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Crud\Controller\ControllerTrait;

class ApiController extends Controller
{
    use ControllerTrait;

    public $components = [
        'RequestHandler',
        'Flash',
        'Crud.Crud' => [
            'actions' => [
                'Crud.Delete',
                'Crud.View',
                'Crud.Index',
                'Crud.Edit',
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.RelatedModels',
            ]
        ]
    ];

    public function beforeFilter(Event $event)
    {
        if (!Auth::isAllowed()) {
            return $this->response->withStatus(403);
        }
        return true;
    }


}
