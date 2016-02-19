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
use Application\Form\PostForm;
use Application\Form\CommentForm;
use Application\Entity\Post;
use Application\Entity\Comment;

 use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
 use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
 use Zend\Paginator\Paginator;

  use Zend\Paginator\Adapter\ArrayAdapter;
  use Zend\Zend_Paginator;

class PostController extends AbstractActionController
{

    public function listAction()
    {
        // //entity manager c'est posts $entityManager
        $posts = $this->getServiceLocator()->get('Application\Service\PostService')->getAll();
        foreach($posts as $post){
            $post->category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($post->category_id);
            $post->author = $this->getServiceLocator()->get('Application\Service\UserService')->getById($post->author);
            if(!empty($post->tags))
                $post->tags = $this->getServiceLocator()->get('Application\Service\TagService')->getByArrayId($post->tags);
        }

        $view =  new ViewModel();

        $paginator = new Paginator(new ArrayAdapter($posts));


        $paginator->setDefaultItemCountPerPage(1);
       

        $page = (int)$this->params()->fromRoute('page');

       if($page) $paginator->setCurrentPageNumber($page);
       
       $view->setVariable('paginator',$paginator);
        $view->setVariable('last', count($paginator));


        return $view;
    }

    public function showAction()
    {
        $formComment = new CommentForm();

        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {
            // On instancie notre modèle Post
            $comment = new Comment();

            // Et on passe l'InputFilter de Post au formulaire
            $formComment->setInputFilter($comment->getInputFilter());
            $formComment->setData($request->getPost());

            // Si le formulaire est valide
            if ($formComment->isValid()) {
                // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Post
                $comment->exchangeArray($formComment->getData());

                // On enregistre ces données dans la table Post
                $this->getServiceLocator()->get('Application\Service\CommentService')->saveComment($comment);

                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toUrl('/');
            }
            // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
        }

        $post = $this->getServiceLocator()->get('Application\Service\PostService')->getById($this->params('id'));
        $post->category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($post->category_id);
        $post->author = $this->getServiceLocator()->get('Application\Service\UserService')->getById($post->author);
        $post->comments = $this->getServiceLocator()->get('Application\Service\CommentService')->getByPostId($post->post_id);

        if(!empty($post->tags))
            $post->tags = $this->getServiceLocator()->get('Application\Service\TagService')->getByArrayId($post->tags);
        $formComment->setData(array("post_id" => $post->post_id));



        return new ViewModel(array(
            'post' => $post,
            'form' => $formComment,
            'post_id' => $this->params('id'),
            'flashMessages' => $this->flashMessenger()->getMessages()
        ));
    }
}
