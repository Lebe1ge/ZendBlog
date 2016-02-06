<?php
/**
 * Service
 * @package Application\Service
 * @author Julien
 *
 */
namespace Application\Service;

class CategoryService extends AbstractService
{

    /**
     * Obtient toutes les categories
     * @return Application\Model\Category
     */
    public function getAll()
    {
        return $this->getRep()->findAll();
    }

    /**
     * Obtient une categorie par son id
     * @param string id
     * @return Application\Model\Category
     */
    public function getById($id)
    {
        return $this->getRep()->find($id);
    }

    /**
     * Obtient une categorie par son slug
     * @param string slug
     * @return Application\Model\Category
     */
    public function getCategoryBySlug($slug)
    {
        return $this->getRep()->findBy(array('slug' => $slug));
    }

}