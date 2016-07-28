<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 27.07.2016
 * Time: 23:25
 */

namespace Application\Model;

/**
 * Class Post
 * @package Application\Model
 */
class Post
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $postDate;

    /**
     * @var string
     */
    private $content;

    /**
     * @var integer
     */
    private $userId;

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
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * @param \DateTime $postDate
     */
    public function setPostDate(\DateTime $postDate)
    {
        $this->postDate = $postDate;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return ID
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param ID $userId
     */
    public function setUserId(ID $userId)
    {
        $this->userId = $userId;
    }


}