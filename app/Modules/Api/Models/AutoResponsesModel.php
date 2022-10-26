<?php namespace App\Modules\Api\Models;

// use asligresik\easyapi\Models\BaseModel;

class AutoResponsesModel extends BaseModel
{
    protected $table = 'auto_responses';
    protected $returnType = 'App\Modules\Api\Entities\AutoResponses';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;  
    protected $allowedFields = [
        'message',
		'chat_type',
		'destination',
		'response',
		'description',
		'created_at',
		'updated_at',
		'created_by'
    ];
    protected $validationRules = [
        'id' => 'numeric|required|is_unique[auto_responses.id,id,{id}]',
		'message' => 'max_length[120]|required',
		'chat_type' => 'required',
		'destination' => 'max_length[255]|required',
		'response' => 'required',
		'description' => 'max_length[255]|required',
		'created_at' => 'valid_date|required',
		'updated_at' => 'valid_date|required'		
    ];   
}
