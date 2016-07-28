<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 27.07.2016
 * Time: 23:25
 */

namespace Application\Repository;
use Application\Model\ID;
use Application\Model\Post;

/**
 * Interface PostRepositoryInterface
 * @package Application\Repository
 */
interface PostRepositoryInterface
{
    /**
     * @param integer $group
     * @param array $conditions
     * @return mixed
     */
    public function getLatestPosts(ID $group, array $conditions = []);

    /**
     * @param Post $post
     * @return mixed
     */
    public function persist(Post $post);
}