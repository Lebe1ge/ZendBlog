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
use Application\Form\CommentForm;
use Application\Entity\Comment;
use Zend\Form\Element;

class CommentController extends AbstractActionController
{

    public function listAction()
    {
        $comment = $this->getServiceLocator()->get('Application\Service\CommentService')->getCommentBySlug($this->params('slug'));
        $posts = $this->getServiceLocator()->get('Application\Service\PostService')->getPostByComment($comment->comment_id);
        foreach($posts as $post){
            $post->comment = $this->getServiceLocator()->get('Application\Service\CommentService')->getById($post->comment_id);
            $post->author = $this->getServiceLocator()->get('Application\Service\UserService')->getById($post->author);
        }
        return new ViewModel(array(
            'posts' => $posts,
        ));
    }

    public function showAction()
    {
        $data = $this->getServiceLocator()->get('Application\Service\CommentService')->getById($this->params('id'));
        return new ViewModel(array(
            'post' => $data,
        ));
    }

    public function addAction()
    {
        $formComment = new CommentForm();

        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {
            // On instancie notre modèle Comment
            $comment= new Comment();

            // Et on passe l'InputFilter de Comment au formulaire
            $formComment->setInputFilter($comment->getInputFilter());
            $formComment->setData($request->getPost());

            // Si le formulaire est valide
            if ($formComment->isValid()) {
                // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Comment
                $comment->exchangeArray($formComment->getData());

                // On enregistre ces données dans la table Comment
                $this->getServiceLocator()->get('Application\Service\CommentService')->saveComment($comment);
                $this->flashMessenger()->addMessage(array('success' => "Votre commentaire a été ajoutée"));
                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toUrl($this->getRequest()->getServer('HTTP_REFERER'));
            } else {
                // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
                foreach ($formComment->getMessages() as $messageId => $messages) {
                    foreach ($messages as $message) {
                        var_dump(array('error' => "Validation failure '$messageId': $message"));
                        $this->flashMessenger()->addMessage(array('error' => "Validation failure '$messageId': $message"));
                    }
                }
            }
        }

        return new ViewModel(
            array(
                'form' => $formComment
            )
        );
    }

}
