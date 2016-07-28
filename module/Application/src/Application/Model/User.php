<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 27.07.2016
 * Time: 22:59
 */

namespace Application\Model;


class User
{
    private $id;
    private $name;
    private $groups;
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

    public function createPost(Post $post)
    {
        $this->posts[] = $post;
    }

    public function getPosts()
    {
        return $this->posts;
    }

    public function setGroups(array $groupIds)
    {
        $this->groups = $groupIds;
    }
}