<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\AdminCrudController;
use App\Modules\Admin\Models\ContactsFilter;
use App\Modules\Api\Models\ContactsModel;
use IlluminateAgnostic\Arr\Support\Arr;

class Contacts extends AdminCrudController
{
    protected $baseController = '\\'.__CLASS__;
    protected $viewPrefix = 'App\Modules\Admin\Views\contacts\\';
    protected $baseRoute = 'admin/contacts';
    protected $langModel = 'contacts';
    protected $modelName = 'App\Modules\Api\Models\ContactsModel';
    public function index()
    {
        return parent::index();
    }

    public function edit($id = null)
    {
        return parent::edit($id);
    }

    public function update($id = null)
    {
        return parent::update($id);
    }

    public function show($id = null)
    {
        return parent::show($id);
    }

    public function create()
    {
        return parent::create();
    }

    public function delete($id = null)
    {
        return parent::delete($id);
    }

    protected function getDataIndex()
    {
        $model = model(ContactsFilter::class);
        return [
            'headers' => [
                'name' => lang('crud.contacts.name'),
                'identity_number' => lang('crud.contacts.identity_number')                
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
        $model = new ContactsModel();

        if (!empty($id)) {
            $data = $model->find($id);
            if (null === $data) {
                return redirect()->back()->with('error', lang('app.resourceNotFound', [$this->langModel]));
            }
            $dataEdit['data'] = $data;
        }

        return $dataEdit;
    }
}
