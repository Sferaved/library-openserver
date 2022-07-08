<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Library storing request",
 *     description="Some simple request createa as example",
 * )
 */
class StoreBookRequest
{

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Name of key for storring",
     *     example="random",
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="Author_id",
     *     description="Author_id for storring",
     *     example="1",
     * )
     *
     * @var int
     */
    public $author_id;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Value for storring",
     *     example="awesome",
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Cover",
     *     description="Cover for storring",
     *     example="images/books/My new book.jpg",
     * )
     *
     * @var string
     */
    public $cover;

    /**
     * @OA\Property(
     *     title="Category_id",
     *     description="Author_id for storring",
     *     example="1",
     * )
     *
     * @var int
     */
    public $category_id;

}
