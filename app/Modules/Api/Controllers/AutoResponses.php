<?php namespace App\Modules\Api\Controllers;
 
use asligresik\easyapi\Controllers\BaseResourceController;
class AutoResponses extends BaseResourceController
{
    protected $modelName = 'App\Modules\Api\Models\AutoResponsesModel';  

     /**
     * @OA\Get(
     *     path="/autoResponses",
     *     tags={"AutoResponses"},
     *     summary="Find list AutoResponses",
     *     description="Returns list of AutoResponses",
     *     operationId="getAutoResponses",  
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
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/AutoResponses")),
     *            @OA\Property(property="pagination",type="object",@OA\Property(property="currentPage", type="integer"),@OA\Property(property="totalPage", type="integer")),
     *         ),
     *         @OA\XmlContent(type="object",
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/AutoResponses")),
     *            @OA\Property(property="pagination",type="array",@OA\Items(ref="#/components/schemas/AutoResponses")),
     *         ),           
     *     ),     
     *     @OA\Response(
     *         response=404,
     *         description="AutoResponses not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */

    /**
     * @OA\Get(
     *     path="/autoResponses/{id}",
     *     tags={"AutoResponses"},
     *     summary="Find AutoResponses by ID",
     *     description="Returns a single AutoResponses",
     *     operationId="getAutoResponsesById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of AutoResponses to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/AutoResponses"),
     *         @OA\XmlContent(ref="#/components/schemas/AutoResponses"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="AutoResponses not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */

    /**
     * @OA\Post(
     *     path="/autoResponses",
     *     tags={"AutoResponses"},
     *     summary="Add a new AutoResponses to the store",
     *     operationId="addAutoResponses",
     *     @OA\Response(
     *         response=201,
     *         description="Created AutoResponses",
     *         @OA\JsonContent(ref="#/components/schemas/AutoResponses"),
     *         @OA\XmlContent(ref="#/components/schemas/AutoResponses"),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/AutoResponses"}
     * )
     */

    /**
     * @OA\Put(
     *     path="/autoResponses/{id}",
     *     tags={"AutoResponses"},
     *     summary="Update an existing AutoResponses",
     *     operationId="updateAutoResponses",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="AutoResponses id to update",
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
     *         description="AutoResponses not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/AutoResponses"}
     * )
     */

    /**
     * @OA\Delete(
     *     path="/autoResponses/{id}",
     *     tags={"AutoResponses"},
     *     summary="Deletes a AutoResponses",
     *     operationId="deleteAutoResponses",     
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="AutoResponses id to delete",
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