<?php namespace App\Modules\Api\Controllers;
 
use asligresik\easyapi\Controllers\BaseResourceController;
class Contacts extends BaseResourceController
{
    protected $modelName = 'App\Modules\Api\Models\ContactsModel';  

     /**
     * @OA\Get(
     *     path="/contacts",
     *     tags={"Contacts"},
     *     summary="Find list Contacts",
     *     description="Returns list of Contacts",
     *     operationId="getContacts",  
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="search by column defined",     
     *         @OA\Schema(
     *             type="object"              
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="order",
     *         in="query",
     *         description="order by column defined",     
     *         @OA\Schema(
     *             type="object"              
     *         )
     *     ),    
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="page to show",     
     *         @OA\Schema(
     *             type="int32"     
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="count data display per page",     
     *         @OA\Schema(
     *             type="int32"     
     *         )
     *     ),   
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",     
     *         @OA\JsonContent(type="object",
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Contacts")),
     *            @OA\Property(property="pagination",type="object",@OA\Property(property="currentPage", type="integer"),@OA\Property(property="totalPage", type="integer")),
     *         ),
     *         @OA\XmlContent(type="object",
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Contacts")),
     *            @OA\Property(property="pagination",type="array",@OA\Items(ref="#/components/schemas/Contacts")),
     *         ),           
     *     ),     
     *     @OA\Response(
     *         response=404,
     *         description="Contacts not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */

    /**
     * @OA\Get(
     *     path="/contacts/{id}",
     *     tags={"Contacts"},
     *     summary="Find Contacts by ID",
     *     description="Returns a single Contacts",
     *     operationId="getContactsById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Contacts to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Contacts"),
     *         @OA\XmlContent(ref="#/components/schemas/Contacts"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Contacts not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */

    /**
     * @OA\Post(
     *     path="/contacts",
     *     tags={"Contacts"},
     *     summary="Add a new Contacts to the store",
     *     operationId="addContacts",
     *     @OA\Response(
     *         response=201,
     *         description="Created Contacts",
     *         @OA\JsonContent(ref="#/components/schemas/Contacts"),
     *         @OA\XmlContent(ref="#/components/schemas/Contacts"),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/Contacts"}
     * )
     */

    /**
     * @OA\Put(
     *     path="/contacts/{id}",
     *     tags={"Contacts"},
     *     summary="Update an existing Contacts",
     *     operationId="updateContacts",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Contacts id to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Contacts not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/Contacts"}
     * )
     */

    /**
     * @OA\Delete(
     *     path="/contacts/{id}",
     *     tags={"Contacts"},
     *     summary="Deletes a Contacts",
     *     operationId="deleteContacts",     
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Contacts id to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pet not found",
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },
     * )
     */
} 