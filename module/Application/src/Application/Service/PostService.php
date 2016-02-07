<?php
/**
 * Service
 * @package Application\Service
 * @author Bidoum
 *
 */
namespace Application\Service;

use Application\Entity\Post;
class PostService extends AbstractService
{

    /**
     * Obtient tous les posts
     * @return Application\Model\Post
     */
    public function getAll()
    {
        return $this->getRep()->findAll();
    }

    /**
     * Obtient un post par son id
     * @param string id
     * @return Application\Model\Post
     */
    public function getById($id)
    {
        return $this->getRep()->find($id);
    }

    /**
     * Obtient un post par son id
     * @param string category
     * @return Application\Model\Post
     */
    public function getPostByCategory($category)
    {
        return $this->getRep()->findBy(array("category" => $category));
    }

    /**
     * Sauvegarder une categorie
     * @param Application\Entity\Post
     */
    public function savePost(Post $post)
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
        $this->delete(array('id_post' => $id));
    }

}