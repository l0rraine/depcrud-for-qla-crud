<?php

namespace Qla\DepCRUD\app\Http\Controllers;

use Qla\Crud\Controllers\CrudController;
use Qla\DepCRUD\app\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DepCrudController extends CrudController
{
//use CrudControllerTrait;

    /**
     * @var User
     */
    private $department;

    /**
     * DepartmentController constructor.
     *
     * @param User $department
     */
    public function __construct(User $department)
    {
        parent::__construct();

        $this->department = $department;

    }

    public function setup()
    {
        $this->crud->route = 'Crud.Dep';
        $this->crud->permissionName = 'department';
        $this->crud->indexRecursive = true;
        $this->crud->title = '单位';
        $this->crud->viewName='depcrud::department';

        $this->crud->setModel('Qla\DepCRUD\app\Models\User');
    }

    public function getIndex()
    {
        return parent::getIndex();
    }


    public function getAdd()
    {
        $this->data['deps'] = $this->department->getSelectArrayByParentId(0, true);

        return parent::getAdd();
    }

    public function postAdd(Request $request)
    {
        $this->data = $_POST;
        $this->validator = Validator::make($this->data, User::rules(), User::messages());

        return parent::storeCrud($request);
    }

    public function getEdit($id)
    {
        $this->data['deps'] = $this->department->getSelectArrayByParentId(0, true);
        $this->data['model'] = $this->department->find($id);

        $this->data['did'] = $this->data['model']->parent_id;

        return parent::getEdit($id);
    }

    public function postEdit(Request $request)
    {
        $this->data = $_POST;
        $this->validator = Validator::make($this->data, User::rules(), User::messages());

        return parent::updateCrud($request);
    }

    public function indexJson()
    {
        $r = $this->department->getAllByParentId();
        return json_encode($r);
    }


    public function del($selectionJson)
    {
        return parent::del($selectionJson);
    }
}