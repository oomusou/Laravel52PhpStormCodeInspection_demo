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
     * @param PostIDPO $po
     * @return string
     */
    public function showTitle(PostIDPO $po) : string
    {
        return $this->postRepository
            ->getTitle($po->ip, $po->default)
            ->title;
    }
}