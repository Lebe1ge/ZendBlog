<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\Query;
use Zend\View\Model\ViewModel;
use Application\Form\PostForm;
use Application\Entity\Tag;

class TagController extends AbstractActionController
{
    public function indexAction()
    {
        $tags = $this->getServiceLocator()->get('Application\Service\TagService')->getAll();
        return new ViewModel(array(
            'tags' => $tags,
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
            $tag = new Tag();

            // Et on passe l'InputFilter de Post au formulaire
            $postInput = $tag->getInputFilter();
            $formPost->setInputFilter($postInput);
            $formPost->setData($request->getPost());
            // Si le formulaire est valide
            if ($formPost->isValid()) {

                try{
                    // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Post
                    $tag->exchangeArray($formPost->getData());

                    // On enregistre ces données dans la table Post
                    $this->getServiceLocator()->get('Application\Service\TagService')->savePost($tag);
                    $this->flashMessenger()->addMessage(array('success' => "Article '{$tag->tag_id}' posté avec succès"));
                    // Puis on redirige sur la page d'accueil.
                    return $this->redirect()->toRoute('zfcadmin/post');
                }catch(\Exception $e){

                    die($e->getMessage());
                }
            }
            else{

                $formPost->getMessages();
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
        try{
            $idPost = $this->params('id');
        } catch( \InvalidArgumentException $e ){

            return $this->redirect()->toRoute('zfcadmin/post');
        }

        $this->getServiceLocator()->get('Application\Service\PostService')->deletePost($idPost);
        return $this->redirect()->toRoute('zfcadmin/post');

    }

    public function editAction()
    {
        $idPost = $this->params('id');
        $formPost = new PostForm();
        $postData = $this->getServiceLocator()->get('Application\Service\PostService')->getById($idPost);
        $formPost->bind($postData);
        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {
            // On instancie notre modèle Post
            $post= new Tag();

            // Et on passe l'InputFilter de Post au formulaire
            $formPost->setInputFilter($post->getInputFilter());
            $formPost->setData($request->getPost());

            // Si le formulaire est valide
            if ($formPost->isValid()) {

                try{
                    // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Post
                    $post->exchangeArray($formPost->getData());

                    // On enregistre ces données dans la table Post
                    $this->getServiceLocator()->get('Application\Service\PostService')->savePost($post);
                    //$this->flashMessenger()->addMessage(array('success' => "Category '{$post->name}' was added successfully"));
                    // Puis on redirige sur la page d'accueil.
                    return $this->redirect()->toRoute('zfcadmin/post');

                } catch(\Exception $e){
                    die($e->getMessage());
                }


            }
            // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
        }else{

            $formPost->getMessages();
        }

        return new ViewModel(
            array(
                'form' => $formPost,
                'id'   => $idPost
            )
        );
    }
}