<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Book finding request",
 *     description="Some simple request createa as example",
 * )
 */
class FindBookRequest
{

     /**
     * @OA\Property(
     *     title="Id",
     *     description="Id for finding",
     *     example="1",
     * )
     *
     * @var int
     */
    public $id;

}
