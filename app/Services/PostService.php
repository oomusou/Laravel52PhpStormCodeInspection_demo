<?php

declare(strict_types = 1);

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    /** @var  PostRepository */
    private $postRepository;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param int $id
     * @param string $default
     * @return string
     */
    public function showTitle(int $id, string $default) : string
    {
        switch ($id) {
            case 1 :



                $defaultTitle = 'No title 1';

            case 2 :
                $defaultTitle = 'No title 2';
                break;

            default:
                $defaultTitle = $default;
                break;
        }

        return $this->postRepository
            ->getTitle($id, $defaultTitle)
            ->title;
    }
}