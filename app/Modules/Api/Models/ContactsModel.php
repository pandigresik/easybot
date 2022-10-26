<?php namespace App\Modules\Api\Models;

// use asligresik\easyapi\Models\BaseModel;

class ContactsModel extends BaseModel
{
    protected $table = 'contacts';
    protected $returnType = 'App\Modules\Api\Entities\Contacts';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;  
    protected $allowedFields = [
        'name',
		'identity_number',
		'created_at',
		'updated_at',
		'created_by'
    ];
    protected $validationRules = [
        'id' => 'numeric|required|is_unique[contacts.id,id,{id}]',
		'name' => 'max_length[60]|required',
		'identity_number' => 'max_length[255]|required',
		'created_at' => 'valid_date|required',
		'updated_at' => 'valid_date|required',
		'created_by' => 'numeric'
    ];   
}
