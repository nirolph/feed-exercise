<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 18:46
 */

namespace Application\DTO;

/**
 * Product data transfer object
 *
 * Class PostDTO
 * @package Application\DTO
 */
class PostDTO
{
    /**
     * Post date
     * @var \DateTime
     */
    private $date;

    /**
     * Post content
     * @var string
     */
    private $content;

    /**
     * User id
     * @var integer
     */
    private $userId;

    /**
     * PostDTO constructor.
     * @param \DateTime $date
     * @param $content
     * @param $userId
     */
    public function __construct(\DateTime $date, $content, $userId)
    {
        $this->date = $date;
        $this->content = $content;
        $this->userId = $userId;
    }

    /**
     * @return \DateTime
     */
    public function date()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function userId()
    {
        return $this->userId;
    }
}