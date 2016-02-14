<?php
/**
 * Service
 * @package Application\Service
 * @author Bidoum
 *
 */
namespace Application\Service;

use Application\Entity\Tag;
class TagService extends AbstractService
{

    /**
     * Obtient tous les tags
     * @return Application\Model\Tag
     */
    public function getAll()
    {
        die("LOL");
        return $this->getRep()->findAll();
    }

    /**
     * Obtient un tag par son id
     * @param string id
     * @return Application\Model\Tag
     */
    public function getById($id)
    {
        return $this->getRep()->find($id);
    }

    /**
     * Sauvegarder une tag
     * @param Application\Entity\Tag
     */
    public function saveTag(Tag $post)
    {
        $this->getEm()->persist($post);
        $this->getEm()->flush();
    }

    /**
     * Supprimer un tag
     * @param int id
     */
    public function deleteTag($id)
    {
        $post = $this->getById($id);
        $this->getEm()->remove($post);
        $this->getEm()->flush();
    }

}