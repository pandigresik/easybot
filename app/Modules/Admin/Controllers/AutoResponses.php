<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\AdminCrudController;
use App\Modules\Admin\Models\AutoResponsesFilter;
use App\Modules\Api\Models\AutoResponsesModel;
use IlluminateAgnostic\Arr\Support\Arr;

class AutoResponses extends AdminCrudController
{
    protected $baseController = '\\'.__CLASS__;
    protected $viewPrefix = 'App\Modules\Admin\Views\auto_responses\\';
    protected $baseRoute = 'admin/autoResponses';
    protected $langModel = 'auto_responses';
    protected $modelName = 'App\Modules\Api\Models\AutoResponsesModel';
    public function index(){
        return parent::index();
    }

    public function edit($id = null){
        return parent::edit($id);
    }

    public function update($id = null){
        return parent::update($id);
    }

    public function show($id = null){
        return parent::show($id);
    }

    public function create(){
        return parent::create();
    }

    public function delete($id = null){
        return parent::delete($id);
    }

    protected function getDataIndex()
    {
        $model = model(AutoResponsesFilter::class);
        return [
            'headers' => [
                                    'message' => lang('crud.auto_responses.message'),
                'chat_type' => lang('crud.auto_responses.chat_type'),
                'destination' => lang('crud.auto_responses.destination'),
                'response' => lang('crud.auto_responses.response'),
                'description' => lang('crud.auto_responses.description'),
                // 'created_by' => lang('crud.auto_responses.created_by')
            ],
            'controller' => $this->getBaseController(),
            'viewPrefix' => $this->getViewPrefix(),
			'baseRoute' => $this->getBaseRoute(),
            'showSelectAll' => true,
            'data' => $model->paginate(setting('App.perPage')),
            'pager' => $model->pager
        ];
    }

    protected function getDataEdit($id = null)
    {
        $dataEdit = parent::getDataEdit($id);
        $model = new AutoResponsesModel();

        if(!empty($id)){
            $data = $model->find($id);
            if (null === $data) {
                return redirect()->back()->with('error', lang('app.resourceNotFound', [$this->langModel]));
            }
            $dataEdit['data'] = $data;
        }
        
        return $dataEdit;
    }
}
