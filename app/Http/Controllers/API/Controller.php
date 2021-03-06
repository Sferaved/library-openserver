<?php


namespace App\Http\Controllers\API;
/**
 * @OA\Info(
 *     title="Library API documentation",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="sferaved@gmail.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Tag(
 *     name="Library",
 *     description="Books page",
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url="http://library/api"
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="X-APP-ID",
 *     securityScheme="X-APP-ID"
 * )
 */

class Controller extends \App\Http\Controllers\Controller
{

}
