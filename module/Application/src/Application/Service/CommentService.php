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
    /** @noinspection PhpUndefinedNamespaceInspection */

    /**
     * Obtient tous les comments
     * @return Application\Entity\Comment
     */
    public function getAll()
    {
        return $this->getRep()->findAll();
    }

    /**
     * Obtient un comment par son id
     * @param string id
     * @return Application\Entity\Comment
     */
    public function getById($id)
    {
        return $this->getRep()->find($id);
    }

    /**
     * Obtient un comment par son id
     * @param string id
     * @return Application\Entity\Comment
     */
    public function getByPostId($id)
    {
        return $this->getRep()->findBy(array("post_id" => $id));
    }

    /**
     * Sauvegarder une categorie
     * @param Comment $comment
     * @internal param $ Application\Entity\Comment
     */
    public function saveComment(Comment $comment)
    {
        $this->getEm()->persist($comment);
        $this->getEm()->flush();
    }

    /**
     * Supprimer une categorie
     * @param int id
     */
    public function deleteComment($id)
    {
        $comment = $this->getById($id);
        $this->getEm()->remove($comment);
        $this->getEm()->flush();
    }

}