<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\Query;
use Zend\View\Model\ViewModel;
use Application\Form\PostForm;
use Application\Entity\User;

class UserController extends AbstractActionController
{
    public function indexAction()
    {
        $users = $this->getServiceLocator()->get('Application\Service\UserService')->getAll();
        return new ViewModel(array(
            'users' => $users,
            'flashMessages' => $this->flashMessenger()->getMessages()
        ));
    }

    public function deleteAction()
    {
        try{
            $user = $this->getServiceLocator()->get('Application\Service\UserService')->getById($this->params('id'));
            $username = $user->getUsername();
            $this->getServiceLocator()->get('Application\Service\UserService')->deletePost($user->getId());

            $this->flashMessenger()->addMessage(array('success' => "L'utilisateur '{$username}' a été supprimée"));
            // Puis on redirige sur la page d'accueil.
            return $this->redirect()->toRoute('zfcadmin/user');

        } catch( \InvalidArgumentException $e ){
            return $this->redirect()->toRoute('zfcadmin/user');
        }
    }
}