<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
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
            'tags' => $tags
        ));
    }

    public function addAction()
    {
        $tagPost = new TagForm();
        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {

            // On instancie notre modèle Post
            $tag = new Tag();

            // Et on passe l'InputFilter de Post au formulaire
            $postInput = $tag->getInputFilter();
            $tagPost->setInputFilter($postInput);
            $tagPost->setData($request->getPost());
            // Si le formulaire est valide
            if ($tagPost->isValid()) {

                try{

                    // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Post
                    $tag->exchangeArray($tagPost->getData());
                    // On enregistre ces données dans la table Post
                    $this->getServiceLocator()->get('Application\Service\TagService')->saveTag($tag);
                    $this->flashMessenger()->addMessage(array('success' => "Le tag '{$tag->tag_id}' a été avec succès"));
                    // Puis on redirige sur la page d'accueil.
                    return $this->redirect()->toRoute('zfcadmin/tag');
                }catch(\Exception $e){

                    die($e->getMessage());
                }
            }
            else{

                $tagPost->getMessages();
            }
            // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
        }

        return new ViewModel(
            array(
                'form' => $tagPost
            )
        );
    }

    public function deleteAction()
    {
        try{
            $idPost = $this->params('id');
        } catch( \InvalidArgumentException $e ){

            return $this->redirect()->toRoute('zfcadmin/tag');
        }

        $this->getServiceLocator()->get('Application\Service\TagService')->deleteTag($idPost);
        return $this->redirect()->toRoute('zfcadmin/tag');

    }

    public function editAction()
    {
        $idTag = $this->params('id');
        $tagForm = new TagForm();
        $tagData = $this->getServiceLocator()->get('Application\Service\TagService')->getById($idTag);
        $tagForm->bind($tagData);
        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {
            // On instancie notre modèle Post
            $tag = new Tag();

            // Et on passe l'InputFilter de Post au formulaire
            $tagForm->setInputFilter($tag->getInputFilter());
            $tagForm->setData($request->getPost());

            // Si le formulaire est valide
            if ($tagForm->isValid()) {

                try{
                    // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Post
                    $tag->exchangeArray($tagForm->getData());

                    // On enregistre ces données dans la table Post
                    $this->getServiceLocator()->get('Application\Service\TagService')->saveTag($tag);
                    //$this->flashMessenger()->addMessage(array('success' => "Category '{$post->name}' was added successfully"));
                    // Puis on redirige sur la page d'accueil.
                    return $this->redirect()->toRoute('zfcadmin/tag');

                } catch(\Exception $e){
                    die($e->getMessage());
                }


            }
            // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
        }else{

            $tagForm->getMessages();
        }

        return new ViewModel(
            array(
                'form' => $tagForm,
                'id'   => $idTag
            )
        );
    }
}