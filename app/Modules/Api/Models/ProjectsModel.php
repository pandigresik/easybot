<?php namespace App\Modules\Api\Models;

// use asligresik\easyapi\Models\BaseModel;

class ProjectsModel extends BaseModel
{
    protected $table = 'projects';
    protected $returnType = 'App\Modules\Api\Entities\Projects';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;  
    protected $allowedFields = [
        'name',
		'description',
		'created_at',
		'updated_at',
		'created_by'
    ];
    protected $validationRules = [
        'id' => 'numeric|required|is_unique[projects.id,id,{id}]',
		'name' => 'max_length[60]|required',
		'description' => 'max_length[255]|required',
		'created_at' => 'valid_date|required',
		'updated_at' => 'valid_date|required',		
    ];   
}
