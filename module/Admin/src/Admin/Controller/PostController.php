<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\Query;
use Zend\View\Model\ViewModel;
use Application\Form\PostForm;
use Application\Entity\Post;

class PostController extends AbstractActionController
{
    public function indexAction()
    {
        $posts = $this->getServiceLocator()->get('Application\Service\PostService')->getAll();
        foreach($posts as $post){
            $post->category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($post->category_id);
            $post->author = $this->getServiceLocator()->get('Application\Service\UserService')->getById($post->author);
        }
        return new ViewModel(array(
            'posts' => $posts,
            'flashMessages' => $this->flashMessenger()->getMessages()
        ));
    }

    public function addAction()
    {
        $entityManager  = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $formPost = new PostForm($entityManager);
        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {
            // On instancie notre modèle Post
            $post = new Post();

            // Et on passe l'InputFilter de Post au formulaire
            $formPost->setInputFilter($post->getInputFilter());
            $formPost->setData($request->getPost());

            // Si le formulaire est valide
            if ($formPost->isValid()) {
                // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Post
                $post->exchangeArray($formPost->getData());

                // On enregistre ces données dans la table Post
                $this->getServiceLocator()->get('Application\Service\PostService')->savePost($post);
                $this->flashMessenger()->addMessage(array('success' => "L'article '{$post->title}' a été ajoutée"));
                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toRoute('zfcadmin/post');
            } else {
                // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
                foreach ($formPost->getMessages() as $messageId => $messages) {
                    foreach($messages as $message) {
                        $this->flashMessenger()->addMessage(array('error' => "Validation failure '$messageId': $message"));
                    }
                }
            }
        }


        return new ViewModel(
            array(
                'form' => $formPost,
                'flashMessages' => $this->flashMessenger()->getMessages()
            )
        );
    }

    public function editAction()
    {
        $id = (int) $this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('zfcadmin/post');
        }

        try {
            $post = $this->getServiceLocator()->get('Application\Service\PostService')->getById($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('zfcadmin/post');
        }

        $entityManager  = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $formPost = new PostForm($entityManager);
        $formPost->bind($post);
        $formPost->get('submit')->setValue('Modifier');

        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {

            // Et on passe l'InputFilter de Post au formulaire
            $formPost->setInputFilter($post->getInputFilter());
            $formPost->setData($request->getPost());

            var_dump(($request->getPost()));

            // Si le formulaire est valide
            if ($formPost->isValid()) {
                // On enregistre ces données dans la table Post
                $this->getServiceLocator()->get('Application\Service\PostService')->savePost($post);
                $this->getServiceLocator()->get('Zend\Log')->info("L'article '{$post->title}' a été modifié");
                $this->flashMessenger()->addMessage(array('success' => "L'article '{$post->title}' a été modifié"));                // Puis on redirige sur la page d'accueil.
//                return $this->redirect()->toRoute('zfcadmin/post');
            }
            // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
            foreach ($formPost->getMessages() as $messageId => $messages) {
                foreach($messages as $message) {
                    $this->getServiceLocator()->get('Zend\Log')->err("Validation failure '$messageId': $message");
                    $this->flashMessenger()->addMessage(array('error' => "Validation failure '$messageId': $message"));
                }
            }
        }

        return new ViewModel(
            array(
                'form' => $formPost,
                'id'   => $id,
                'flashMessages' => $this->flashMessenger()->getMessages()
            )
        );
    }

    public function deleteAction()
    {
        try{
            $post = $this->getServiceLocator()->get('Application\Service\PostService')->getById($this->params('id'));
            $post_title = $post->title;
            $this->getServiceLocator()->get('Application\Service\PostService')->deletePost($post->post_id);

            $this->getServiceLocator()->get('Zend\Log')->info("L'article '{$post_title}' a été supprimée");
            $this->flashMessenger()->addMessage(array('success' => "L'article '{$post_title}' a été supprimée"));
            // Puis on redirige sur la page d'accueil.
            return $this->redirect()->toRoute('zfcadmin/post');

        } catch( \InvalidArgumentException $e ){
            return $this->redirect()->toRoute('zfcadmin/post');
        }
    }
}