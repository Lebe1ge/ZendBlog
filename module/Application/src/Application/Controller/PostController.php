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
use Application\Entity\Post;

class PostController extends AbstractActionController
{

    public function listAction()
    {
        $posts = $this->getServiceLocator()->get('Application\Service\PostService')->getAll();
        foreach($posts as $post){
            $post->category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($post->category_id);
            $post->author = $this->getServiceLocator()->get('Application\Service\UserService')->getById($post->author);
        }
        return new ViewModel(array(
            'posts' => $posts,
        ));
    }

    public function showAction()
    {
        return new ViewModel(array(
            'post' => $this->getServiceLocator()->get('Application\Service\PostService')->getById($this->params('id')),
        ));
    }

    public function addAction()
    {
        $formPost = new PostForm();

        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {
            // On instancie notre modèle Post
            $post= new Post();

            // Et on passe l'InputFilter de Post au formulaire
            $formPost->setInputFilter($post->getInputFilter());
            $formPost->setData($request->getPost());

            // Si le formulaire est valide
            if ($formPost->isValid()) {
                // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Post
                $post->exchangeArray($formPost->getData());

                // On enregistre ces données dans la table Post
                $this->getServiceLocator()->get('Application\Service\PostService')->savePost($post);

                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toUrl('/');
            }
            // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
        }

        return new ViewModel(
            array(
                'form' => $formPost
            )
        );
    }
}
