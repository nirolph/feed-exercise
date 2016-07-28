<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 00:17
 */

namespace Application\Factory;


use Application\Model\Post;
use Zend\Debug\Debug;

class BasePostFactory implements FactoryInterface
{
    public function build(array $data)
    {
        $post = new Post();

        if (isset($data['id'])) {
            $post->setId($data['id']);
        }

        if (isset($data['date'])) {
            $post->setPostDate(\DateTime::createFromFormat('Y-m-d H:i:s', $data['date']));
        }

        if (isset($data['content'])) {
            $post->setContent($data['content']);
        }

        return $post;
    }
}