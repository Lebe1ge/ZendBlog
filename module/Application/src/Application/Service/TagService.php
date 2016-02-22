<?php
/**
 * Service
 * @package Application\Service
 * @author Julien
 *
 */
namespace Application\Service;

use Application\Entity\Tag;

class TagService extends AbstractService
{

    /**
     * Obtient toutes les categories
     * @return Application\Entity\Tag
     */
    public function getAll()
    {
        return $this->getRep()->findAll();
    }

    /**
     * Obtient une categorie par son id
     * @param string id
     * @return Application\Entity\Tag
     */
    public function getById($id)
    {
        return $this->getRep()->find($id);
    }

    /**
     * Obtient une categorie par son slug
     * @param string slug
     * @return Application\Entity\Tag
     */
    public function getTagBySlug($slug)
    {
        return $this->getRep()->findOneBy(array('slug' => $slug));
    }

    /**
     * Obtient une categorie par son slug
     * @param string slug
     * @return Application\Entity\Tag
     */
    public function getByArrayId($array)
    {
        foreach($array as $k => $v){
            $array[$k] = $this->getRep()->findOneBy(array('tag_id'=>$v));
        }
        return $array;
    }

    /**
     * Sauvegarder une categorie
     * @param Tag $tag
     * @internal param $ Application\Entity\Tag
     */
    public function saveTag(Tag $tag)
    {
        $this->getEm()->persist($tag);
        $this->getEm()->flush();
    }

    /**
     * Supprimer une categorie
     * @param int id
     */
    public function deleteTag($id)
    {
        $tag = $this->getById($id);
        $this->getEm()->remove($tag);
        $this->getEm()->flush();
    }

}