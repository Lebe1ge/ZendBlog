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
use Application\Form\TagForm;
use Application\Entity\Tag;

class TagController extends AbstractActionController
{

    public function listAction()
    {
        $tag = $this->getServiceLocator()->get('Application\Service\TagService')->getTagBySlug($this->params('slug'));
        $posts = $this->getServiceLocator()->get('Application\Service\PostService')->getAll();
        foreach($posts as $k => $post){
            $post->category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($post->category_id);
            $post->author = $this->getServiceLocator()->get('Application\Service\UserService')->getById($post->author);

            if(is_array($post->tags)) {
                $post->tags = $this->getServiceLocator()->get('Application\Service\TagService')->getByArrayId($post->tags);
                if(!in_array($tag, $post->tags))
                    unset($posts[$k]);
            } else {
                unset($posts[$k]);
            }
        }
        return new ViewModel(array(
            'posts' => $posts,
        ));
    }

    public function showAction()
    {
        $data = $this->getServiceLocator()->get('Application\Service\TagService')->getById($this->params('id'));
        return new ViewModel(array(
            'post' => $data,
        ));
    }

}
