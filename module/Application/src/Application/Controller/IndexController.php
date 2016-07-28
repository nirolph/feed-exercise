<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\DTO\PostDTO;
use Application\DTO\UserDTO;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Debug\Debug;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $post = new PostDTO(
            new \DateTime(),
            'test content that should save itself',
            1
        );

        $postService = $this->getServiceLocator()->get('postService');
        $postService->setup($post)->run();

        if ($postService->hasErrors()) {
            Debug::dump($postService->getErrors());
        } else {
            Debug::dump('Succesfully created post!');
        }

        return new ViewModel();
    }

    public function listAction()
    {
        $user = new UserDTO(1);
        $postListService = $this->getServiceLocator()->get('postListService');
        $posts = $postListService->setup($user)->run();

        if ($postListService->hasErrors()) {
            Debug::dump($postListService->getErrors());
        }

        Debug::dump($posts);
        return new ViewModel();
    }
}
