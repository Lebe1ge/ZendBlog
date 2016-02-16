<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Zend\View\Model\ViewModel;
use Application\Form\CategoryForm;
use Application\Entity\Category;

class CategoryController extends AbstractActionController
{
    public function indexAction()
    {
        $category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getAll();
        return new ViewModel(array(
            'category' => $category,
            'flashMessages' => $this->flashMessenger()->getMessages()
        ));
    }

    public function addAction()
    {
        $formCategory = new CategoryForm();
        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {
            // On instancie notre modèle Category
            $category = new Category();

            // Et on passe l'InputFilter de Category au formulaire
            $formCategory->setInputFilter($category->getInputFilter());
            $formCategory->setData($request->getPost());

            // Si le formulaire est valide
            if ($formCategory->isValid()) {
                // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Category
                $category->exchangeArray($formCategory->getData());

                // On enregistre ces données dans la table Category
                $this->getServiceLocator()->get('Application\Service\CategoryService')->saveCategory($category);

                $this->flashMessenger()->addMessage(array('success' => "La catégorie '{$category->name}' a été ajoutée"));
                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toRoute('zfcadmin/category');
            } else {
                // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
                foreach ($formCategory->getMessages() as $messageId => $message) {
                    $this->flashMessenger()->addMessage(array('error' => "Validation failure '$messageId': $message"));
                }
            }
        }

        return new ViewModel(
            array(
                'form' => $formCategory,
                'flashMessages' => $this->flashMessenger()->getMessages()
            )
        );
    }

    public function editAction()
    {
        $id = (int) $this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('zfcadmin/category');
        }

        try {
            $category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('zfcadmin/category');
        }

        $formCategory = new CategoryForm();
        $formCategory->bind($category);
        $formCategory->get('submit')->setValue('Modifier');

        // On récupère l'objet Request
        $request = $this->getRequest();

        // On vérifie si le formulaire a été posté
        if ($request->isPost()) {

            // Et on passe l'InputFilter de Category au formulaire
            $formCategory->setInputFilter($category->getInputFilter());
            $formCategory->setData($request->getPost());

            // Si le formulaire est valide
            if ($formCategory->isValid()) {
                // On enregistre ces données dans la table Category
                $this->getServiceLocator()->get('Application\Service\CategoryService')->saveCategory($category);
                $this->flashMessenger()->addMessage(array('success' => "La catégorie '{$category->name}' a été modifié"));                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toRoute('zfcadmin/category');
            }
            // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
            foreach ($formCategory->getMessages() as $messageId => $message) {
                $this->flashMessenger()->addMessage(array('error' => "Validation failure '$messageId': $message"));
            }
        }

        return new ViewModel(
            array(
                'form'  => $formCategory,
                'id'    => $id
            )
        );
    }

    public function deleteAction()
    {
        try{
            $category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($this->params('id'));
            $category_name = $category->name;
            $this->getServiceLocator()->get('Application\Service\CategoryService')->deleteCategory($category->category_id);

            $this->flashMessenger()->addMessage(array('success' => "La catégorie '{$category_name}' a été supprimée"));
            // Puis on redirige sur la page d'accueil.
            return $this->redirect()->toRoute('zfcadmin/category');

        } catch( \InvalidArgumentException $e ){
            return $this->redirect()->toRoute('zfcadmin/category');
        }
    }
}