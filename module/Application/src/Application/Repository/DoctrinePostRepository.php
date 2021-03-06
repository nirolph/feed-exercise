<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 27.07.2016
 * Time: 23:27
 */

namespace Application\Repository;


use Application\Factory\FactoryInterface;
use Application\Factory\PostFactoryInterface;
use Application\Model\ID;
use Doctrine\DBAL\Connection;
use Zend\Debug\Debug;
use Application\Model\Post;

/**
 * Class DoctrinePostRepository
 * @package Application\Repository
 */
class DoctrinePostRepository implements PostRepositoryInterface
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var FactoryInterface
     */
    private $postFactory;

    /**
     * DoctrinePostRepository constructor.
     * @param FactoryInterface $postFactory
     * @param Connection $connection
     */
    public function __construct(FactoryInterface $postFactory, Connection $connection)
    {
        $this->postFactory = $postFactory;
        $this->connection = $connection;
    }

    /**
     * @param ID $groupId
     * @param array $conditions
     * @return array
     * @throws Exception
     */
    public function getLatestPosts(ID $groupId, array $conditions = [])
    {
        $results = $this->buildQuery()->select('*')
                ->from('post', 'p')
                ->innerJoin('p', 'users_groups', 'ug', 'ug.user_id = p.user_id')
                ->where('ug.group_id = :group_id')
                ->setParameter('group_id', (string) $groupId)
                ->orderBy('p.date', 'DESC')
                ->execute()->fetchAll();

        $posts = [];

        if (empty($results)) {
            throw new Exception('No posts were found!');
        }

        foreach ($results as $entry) {
            $posts[] = $this->postFactory->build($entry);
        }

        return $posts;
    }

    /**
     * @param Post $post
     */
    public function persist(Post $post)
    {
        $this->buildQuery()->insert('post')
            ->values([
                'date' => ':date',
                'content' => ':content',
                'user_id' => ':user_id'
            ])
            ->setParameter('date', $post->getPostDate()->format('Y-m-d H:i:s'))
            ->setParameter('content', $post->getContent())
            ->setParameter('user_id', (string) $post->getUserId())
            ->execute();
    }

    /**
     * @return \Doctrine\DBAL\Query\QueryBuilder
     */
    private function buildQuery()
    {
        return $this->connection->createQueryBuilder();
    }

}