<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 28.07.2016
 * Time: 00:29
 */

namespace Application\Repository;

use Application\Factory\FactoryInterface;
use Application\Model\ID;
use Application\Model\User;
use Doctrine\DBAL\Connection;

/**
 * Class DoctrineUserRepository
 * @package Application\Repository
 */
class DoctrineUserRepository implements UserRepositoryInterface
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var FactoryInterface
     */
    private $userFactory;

    /**
     * DoctrineUserRepository constructor.
     * @param FactoryInterface $userFactory
     * @param Connection $connection
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(FactoryInterface $userFactory ,Connection $connection, PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->connection = $connection;
        $this->userFactory = $userFactory;
    }

    /**
     * @param User $user
     */
    public function persist(User $user)
    {
        foreach ($user->getPosts() as $post) {
            $this->postRepository->persist($post);
        }
    }

    /**
     * @param ID $id
     * @return mixed
     * @throws Exception
     */
    public function getUserWithId(ID $id)
    {
        $userData = $this->buildQuery()->select('*')
            ->from('user', 'u')
            ->innerJoin('u', 'users_groups', 'ug', 'ug.user_id = u.id')
            ->where('u.id = :id')
            ->setParameter('id', (string)$id)
            ->execute()->fetch();

        if (empty($userData)) {
            throw new Exception('Unknown user!');
        }

        return $this->userFactory->build($userData);
    }

    /**
     * @return \Doctrine\DBAL\Query\QueryBuilder
     */
    private function buildQuery()
    {
        return $this->connection->createQueryBuilder();
    }
}