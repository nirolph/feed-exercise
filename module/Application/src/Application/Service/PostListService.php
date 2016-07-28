<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 19:15
 */

namespace Application\Service;


use Application\Model\ID;
use Application\DTO\UserDTO;
use Application\Repository\PostRepositoryInterface;
use Application\Repository\UserRepositoryInterface;

class PostListService implements ServiceInterface
{
    private $postRepository;
    private $userRepository;
    private $userDTO;
    private $errors;

    public function __construct(PostRepositoryInterface $postRepository, UserRepositoryInterface $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
        $this->errors = [];
    }

    public function setup(UserDTO $user)
    {
        $this->userDTO = $user;
        return $this;
    }

    public function run()
    {
        try {
            $userId = ID::create($this->userDTO->id());
            $user = $this->userRepository->getUserWithId($userId);
            $posts = $this->postRepository->getLatestPosts($user->getId());
            return $posts;
        } catch (\Exception $e) {
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