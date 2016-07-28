<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 18:41
 */

namespace Application\Service;


use Application\DTO\PostDTO;
use Application\Model\Post;
use Application\Model\ID;
use Application\Repository\PostRepositoryInterface;

class PostService implements ServiceInterface
{
    private $errors;
    private $postDTO;
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->errors = [];
    }

    public function setup(PostDTO $post)
    {
        $this->postDTO = $post;
        return $this;
    }

    public function run()
    {
        try {
            $post = new Post();
            $post->setPostDate($this->postDTO->date());
            $post->setContent($this->postDTO->content());
            $post->setUserId(ID::create($this->postDTO->userId()));
            $this->postRepository->persist($post);
            return true;
        } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}