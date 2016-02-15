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
use Application\Form\CategoryForm;
use Application\Entity\Category;

class CategoryController extends AbstractActionController
{

    public function listAction()
    {
        $category = $this->getServiceLocator()->get('Application\Service\CategoryService')->getCategoryBySlug($this->params('slug'));
        $posts = $this->getServiceLocator()->get('Application\Service\PostService')->getPostByCategory($category->nom);
        return new ViewModel(array(
            'posts' => $posts,
        ));
    }

    public function showAction()
    {
        $data = $this->getServiceLocator()->get('Application\Service\CategoryService')->getById($this->params('id'));
        return new ViewModel(array(
            'post' => $data,
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
            $category= new Category();

            // Et on passe l'InputFilter de Category au formulaire
            $formCategory->setInputFilter($category->getInputFilter());
            $formCategory->setData($request->getPost());

            // Si le formulaire est valide
            if ($formCategory->isValid()) {
                // On prend les données du formulaire qui sont converti pour correspondre à notre modèle Category
                $category->exchangeArray($formCategory->getData());

                // On enregistre ces données dans la table Category
                $this->getServiceLocator()->get('Application\Service\CategoryService')->saveCategory($category);

                // Puis on redirige sur la page d'accueil.
                return $this->redirect()->toUrl('/');
            }
            // Si le formulaire n'est pas valide, on reste sur la page et les erreurs apparaissent
        }

        return new ViewModel(
            array(
                'form' => $formCategory
            )
        );
    }

}
