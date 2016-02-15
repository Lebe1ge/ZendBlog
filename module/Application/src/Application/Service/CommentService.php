<?php
/**
 * Service
 * @package Application\Service
 * @author Bidoum
 *
 */
namespace Application\Service;

use Application\Entity\Comment;

class CommentService extends AbstractService
{

    /**
     * Obtient tous les posts
     * @return Application\Model\Comment
     */
    public function getAll()
    {
        return $this->getRep()->findAll();
    }

    /**
     * Obtient un post par son id
     * @param string id
     * @return Application\Model\Comment
     */
    public function getById($id)
    {
        return $this->getRep()->find($id);
    }

    /**
     * Sauvegarder une categorie
     * @param Application\Entity\Comment
     */
    public function savePost(Comment $post)
    {
        $this->getEm()->persist($post);
        $this->getEm()->flush();
    }

    /**
     * Supprimer une categorie
     * @param int id
     */
    public function deletePost($id)
    {
        $post = $this->getById($id);
        $this->getEm()->remove($post);
        $this->getEm()->flush();
    }

}