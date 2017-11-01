<?php

namespace Qla\DepCRUD\app\Models;

use Qla\Crud\app\Models\BaseClassifiedModel;
use Qla\Crud\ModelTraits\BaseModelTrait;
use Qla\Crud\app\Http\Helpers\Pinyin;

class Department extends BaseClassifiedModel
{
    use BaseModelTrait;

    protected $table = 'departments';

    protected $fillable = [
        'title',
        'sort_id',
        'parent_id',
        'class_list',
        'class_layer',
        'pinyin',
    ];

    public static function rules($id = 0, $merge = [])
    {
        return array_merge([
            'title' => 'required',
            'parent_id' => 'required',
        ],$merge);
    }

    public static function messages($id = 0, $merge = [])
    {
        return array_merge([
            'title.required' => '必须填写标题',
            'parent_id.required' => '必须选择父单位！',
        ],$merge);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['pinyin'] = Pinyin::getShortPinyin($value);
    }
}