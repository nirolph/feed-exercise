<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 18:46
 */

namespace Application\DTO;


class PostDTO
{
    private $date;
    private $content;
    private $userId;

    public function __construct(\DateTime $date, $content, $userId)
    {
        $this->date = $date;
        $this->content = $content;
        $this->userId = $userId;
    }

    public function date()
    {
        return $this->date;
    }

    public function content()
    {
        return $this->content;
    }

    public function userId()
    {
        return $this->userId;
    }
}