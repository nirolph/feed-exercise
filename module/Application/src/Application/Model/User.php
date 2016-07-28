<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 27.07.2016
 * Time: 22:59
 */

namespace Application\Model;

/**
 * Class User
 * @package Application\Model
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $groups;

    /**
     * @var array
     */
    private $posts;

    public function __construct()
    {
        $this->groups = [];
        $this->posts = [];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = ID::create($id);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param Post $post
     */
    public function createPost(Post $post)
    {
        $this->posts[] = $post;
    }

    /**
     * @return array
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param array $groupIds
     */
    public function setGroups(array $groupIds)
    {
        $this->groups = $groupIds;
    }
}