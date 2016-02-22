<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Zend\View\Model\ViewModel;
use Application\Form\TagForm;
use Application\Entity\Tag;

class TagController extends AbstractActionController
{
    public function indexAction()
    {
        $tags = $this->getServiceLocator()->get('Application\Service\TagService')->getAll();
        return new ViewModel(array(
            'tags' => $tags,
            'flashMessages' => $this->flashMessenger()->getMessages()
        ));
    }

    public function addAction()
    {
        $formTag = new TagForm();
        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {
            // On instancie notre modèle Tag
            $tag = new Tag();

            // Et on passe l'InputFilter de Tag au formulaire
            $formTag->setInputFilter($tag->getInputFilter());
            $formTag->setData($request->getPost());
            // Si le formulaire est valide
            if ($formTag->isValid()) {
                // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Tag
                $tag->exchangeArray($formTag->getData());

                // On enregistre ces données dans la table Tag
                $this->getServiceLocator()->get('Application\Service\TagService')->saveTag($tag);
                $this->getServiceLocator()->get('Zend\Log')->info("Le tag '{$tag->name}' a été ajoutée");
                $this->flashMessenger()->addMessage(array('success' => "Le tag '{$tag->name}' a été ajoutée"));
                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toRoute('zfcadmin/tag');
            } else {
                // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
                foreach ($formTag->getMessages() as $messageId => $message) {
                    $this->getServiceLocator()->get('Zend\Log')->err("Validation failure '$messageId': $message");
                    $this->flashMessenger()->addMessage(array('error' => "Validation failure '$messageId': $message"));
                }
            }
        }

        return new ViewModel(
            array(
                'form' => $formTag,
                'flashMessages' => $this->flashMessenger()->getMessages()
            )
        );
    }

    public function editAction()
    {
        $id = (int) $this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('zfcadmin/tag');
        }

        try {
            $tag = $this->getServiceLocator()->get('Application\Service\TagService')->getById($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('zfcadmin/tag');
        }

        $formTag = new TagForm();
        $formTag->bind($tag);
        $formTag->get('submit')->setValue('Modifier');

        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {


            // Et on passe l'InputFilter de Tag au formulaire
            $formTag->setInputFilter($tag->getInputFilter());
            $formTag->setData($request->getPost());

            // Si le formulaire est valide
            if ($formTag->isValid()) {
                // On enregistre ces données dans la table Tag
                $this->getServiceLocator()->get('Application\Service\TagService')->saveTag($tag);
                $this->getServiceLocator()->get('Zend\Log')->info("Le tag '{$tag->name}' a été modifié");
                $this->flashMessenger()->addMessage(array('success' => "Le tag '{$tag->name}' a été modifié"));
                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toRoute('zfcadmin/tag');
            } else {
                // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
                foreach ($formTag->getMessages() as $messageId => $messages) {
                    foreach($messages as $message) {
                        $this->getServiceLocator()->get('Zend\Log')->err("Validation failure '$messageId': $message");
                        $this->flashMessenger()->addMessage(array('error' => "Validation failure '$messageId': $message"));
                    }
                }
            }
        }

        return new ViewModel(
            array(
                'form'  => $formTag,
                'id'    => $id,
                'flashMessages' => $this->flashMessenger()->getMessages()
            )
        );
    }

    public function deleteAction()
    {
        try{
            $tag = $this->getServiceLocator()->get('Application\Service\TagService')->getById($this->params('id'));
            $tag_name = $tag->name;
            $this->getServiceLocator()->get('Application\Service\TagService')->deleteTag($tag->tag_id);
            $this->getServiceLocator()->get('Zend\Log')->info("La catégorie '{$tag_name}' a été supprimée");
            $this->flashMessenger()->addMessage(array('success' => "La catégorie '{$tag_name}' a été supprimée"));
            // Puis on redirige sur la page d'accueil.
            return $this->redirect()->toRoute('zfcadmin/tag');

        } catch( \InvalidArgumentException $e ){
            return $this->redirect()->toRoute('zfcadmin/tag');
        }
    }
}