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

    /**
     * Sauvegarder une categorie
     * @param Category category
     */
    public function saveCategory(Category $category)
    {
        $data = array(
            'id_category' => $category->idCategory,
            'name'  => $category->name
        );

        $id = (int)$category->id_category;

        if ($id == 0) {
            $this->insert($data);
        } elseif ($this->getCategory($id)) {
            $this->update(
                $data,
                array(
                    'id_category' => $id,
                )
            );
        }
    }

    /**
     * Supprimer une categorie
     * @param int id
     */
    public function deleteCategory($id)
    {
        $this->delete(array('id_category' => $id));
    }

}