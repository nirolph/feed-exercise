<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Factory\BasePostFactory;
use Application\Factory\BaseUserFactory;
use Application\Repository\DoctrineUserRepository;
use Application\Service\PostListService;
use Application\Service\PostService;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Doctrine\DBAL\DriverManager;
use Application\Repository\DoctrinePostRepository;
use Zend\Debug\Debug;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories'  => array(
                'queryBuilder' => function($sm) {
                    $config = $sm->get('config');
                    $connection = DriverManager::getConnection($config['doctrine_connection']);
                    return $connection;
                },
                'postRepository' => function($sm) {
                    $postFactory = $sm->get('postFactory');
                    $doctrineQueryBuilder = $sm->get('queryBuilder');
                    $repository = new DoctrinePostRepository($postFactory, $doctrineQueryBuilder);
                    return $repository;
                },
                'userRepository' => function($sm) {
                    $userFactory = $sm->get('userFactory');
                    $postRepository = $sm->get('postRepository');
                    $doctrineQueryBuilder = $sm->get('queryBuilder');
                    $repository = new DoctrineUserRepository($userFactory, $doctrineQueryBuilder, $postRepository);
                    return $repository;
                },
                'postFactory' => function($sm) {
                    return new BasePostFactory();
                },
                'userFactory' => function($sm) {
                    return new BaseUserFactory();
                },
                'postService' => function ($sm) {
                    $postRepository = $sm->get('postRepository');
                    return new PostService($postRepository);
                },
                'postListService' => function ($sm) {
                    $postRepository = $sm->get('postRepository');
                    $userRepository = $sm->get('userRepository');
                    return new PostListService($postRepository, $userRepository);
                }
            )
        );
    }
}
