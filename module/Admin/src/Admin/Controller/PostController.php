<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Zend\View\Model\ViewModel;
use Application\Form\PostForm;
use Application\Entity\Post;

class PostController extends AbstractActionController
{
    public function indexAction()
    {
        $posts = $this->getServiceLocator()->get('Application\Service\PostService')->getAll();
        return new ViewModel(array(
            'posts' => $posts,
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
                $this->flashMessenger()->addMessage(array('success' => "Category '{$post->name}' was added successfully"));
                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toUrl('zfc    admin/post');
            }
            // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
        }

        return new ViewModel(
            array(
                'form' => $formPost
            )
        );
    }

    public function deleteAction()
    {
        die("DELETE");
        $this->getServiceLocator()->get('Application\Service\PostService')->deletePost($this->params('id'));
        return new viewModel("posts");

    }

    public function editAction(){

        die("LOL");
    }
}