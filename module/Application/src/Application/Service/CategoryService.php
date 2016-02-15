<?php
/**
 * Service
 * @package Application\Service
 * @author Julien
 *
 */
namespace Application\Service;

use Application\Entity\Category;

class CategoryService extends AbstractService
{

    /**
     * Obtient toutes les categories
     * @return Application\Entity\Category
     */
    public function getAll()
    {
        return $this->getRep()->findAll();
    }

    /**
     * Obtient une categorie par son id
     * @param string id
     * @return Application\Entity\Category
     */
    public function getById($id)
    {
        return $this->getRep()->find($id);
    }

    /**
     * Obtient une categorie par son slug
     * @param string slug
     * @return Application\Entity\Category
     */
    public function getCategoryBySlug($slug)
    {
        return $this->getRep()->findOneBy(array('slug' => $slug));
    }

    /**
     * Sauvegarder une categorie
     * @param Category $category
     * @internal param $ Application\Entity\Category
     */
    public function saveCategory(Category $category)
    {
        $this->getEm()->persist($category);
        $this->getEm()->flush();
    }

}