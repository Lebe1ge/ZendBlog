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
use Doctrine\ORM\Query;
use Zend\View\Model\ViewModel;

 use Zend\Paginator\Paginator;
 use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Zend_Paginator;

class CategoryController extends AbstractActionController
{

    public function listAction()
    {
        $category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getCategoryBySlug($this->params('slug'));
        $posts = $this->getServiceLocator()->get('Application\Service\PostService')->getPostByCategory($category->category_id);
        foreach($posts as $post){
            $post->category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($post->category_id);
            $post->author = $this->getServiceLocator()->get('Application\Service\UserService')->getById($post->author);
        }

        
        $view =  new ViewModel();

        $paginator = new Paginator(new ArrayAdapter($posts));


       $paginator->setDefaultItemCountPerPage(1);
       

        $page=  (int)$this->params()->fromRoute('page');

       if($page) $paginator->setCurrentPageNumber($page);
       
       $view->setVariable('paginator',$paginator);


        return $view;
    }

    public function showAction()
    {
        $data = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($this->params('id'));
        return new ViewModel(array(
            'post' => $data,
        ));
    }

}
