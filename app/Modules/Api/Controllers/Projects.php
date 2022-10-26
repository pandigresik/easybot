<?php namespace App\Modules\Api\Controllers;
 
use asligresik\easyapi\Controllers\BaseResourceController;
class Projects extends BaseResourceController
{
    protected $modelName = 'App\Modules\Api\Models\ProjectsModel';  

     /**
     * @OA\Get(
     *     path="/projects",
     *     tags={"Projects"},
     *     summary="Find list Projects",
     *     description="Returns list of Projects",
     *     operationId="getProjects",  
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
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Projects")),
     *            @OA\Property(property="pagination",type="object",@OA\Property(property="currentPage", type="integer"),@OA\Property(property="totalPage", type="integer")),
     *         ),
     *         @OA\XmlContent(type="object",
     *            @OA\Property(property="data",type="array",@OA\Items(ref="#/components/schemas/Projects")),
     *            @OA\Property(property="pagination",type="array",@OA\Items(ref="#/components/schemas/Projects")),
     *         ),           
     *     ),     
     *     @OA\Response(
     *         response=404,
     *         description="Projects not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */

    /**
     * @OA\Get(
     *     path="/projects/{id}",
     *     tags={"Projects"},
     *     summary="Find Projects by ID",
     *     description="Returns a single Projects",
     *     operationId="getProjectsById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Projects to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Projects"),
     *         @OA\XmlContent(ref="#/components/schemas/Projects"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Projects not found"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */

    /**
     * @OA\Post(
     *     path="/projects",
     *     tags={"Projects"},
     *     summary="Add a new Projects to the store",
     *     operationId="addProjects",
     *     @OA\Response(
     *         response=201,
     *         description="Created Projects",
     *         @OA\JsonContent(ref="#/components/schemas/Projects"),
     *         @OA\XmlContent(ref="#/components/schemas/Projects"),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/Projects"}
     * )
     */

    /**
     * @OA\Put(
     *     path="/projects/{id}",
     *     tags={"Projects"},
     *     summary="Update an existing Projects",
     *     operationId="updateProjects",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Projects id to update",
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
     *         description="Projects not found"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Validation exception"
     *     ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/Projects"}
     * )
     */

    /**
     * @OA\Delete(
     *     path="/projects/{id}",
     *     tags={"Projects"},
     *     summary="Deletes a Projects",
     *     operationId="deleteProjects",     
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Projects id to delete",
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