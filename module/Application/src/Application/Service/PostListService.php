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

/**
 * Class PostListService
 * @package Application\Service
 */
class PostListService implements ServiceInterface
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var UserDTO
     */
    private $userDTO;

    /**
     * @var array
     */
    private $errors;

    /**
     * PostListService constructor.
     * @param PostRepositoryInterface $postRepository
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(PostRepositoryInterface $postRepository, UserRepositoryInterface $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
        $this->errors = [];
    }

    /**
     * @param UserDTO $user
     * @return $this
     */
    public function setup(UserDTO $user)
    {
        $this->userDTO = $user;
        return $this;
    }

    /**
     * @return bool|mixeds
     */
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

    /**
     * @return bool
     */
    public function hasErrors()
    {
        return !empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}