<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\Query;
use Zend\View\Model\ViewModel;
use Application\Form\PostForm;
use Application\Entity\Comment;

class CommentController extends AbstractActionController
{
    public function indexAction()
    {
        $comments = $this->getServiceLocator()->get('Application\Service\CommentService')->getAll();
        foreach($comments as $comment){
            $comment->article = $this->getServiceLocator()->get('Application\Service\PostService')->getById($comment->post_id);
        }
        return new ViewModel(array(
            'comments' => $comments,
            'flashMessages' => $this->flashMessenger()->getMessages()
        ));
    }

    public function deleteAction()
    {
        try{
            $comment = $this->getServiceLocator()->get('Application\Service\CommentService')->getById($this->params('id'));
            $comment_author = $comment->author;
            $this->getServiceLocator()->get('Application\Service\CommentService')->deleteComment($comment->comment_id);

            $this->getServiceLocator()->get('Zend\Log')->info("Le commentaire de '{$comment_author}' a été supprimée");
            $this->flashMessenger()->addMessage(array('success' => "Le commentaire de '{$comment_author}' a été supprimée"));
            // Puis on redirige sur la page d'accueil.
            return $this->redirect()->toRoute('zfcadmin/comment');

        } catch( \InvalidArgumentException $e ){
            return $this->redirect()->toRoute('zfcadmin/comment');
        }
    }
}