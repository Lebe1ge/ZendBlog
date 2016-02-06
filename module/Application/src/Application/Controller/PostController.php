<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Application for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;

use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{

    public function listAction()
    {
        $data = $this->getServiceLocator()->get('Application\Service\PostService')->getAll();
        return new ViewModel(array(
            'posts' => $data,
        ));
    }

    public function showAction()
    {
        return new ViewModel(array(
            'post' => $this->getServiceLocator()->get('Application\Service\PostService')->getById($this->params('id')),
        ));
    }
}
