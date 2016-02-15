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

    public function getActivePostForPagination($idCategory, $nbDays){

    }

    /**
     * Obtient tous les posts
     * @return Application\Entity\Post
     */
    public function getAll()
    {
        return $this->getRep()->findAll();
    }

    /**
     * Obtient un post par son id
     * @param string id
     * @return Application\Entity\Post
     */
    public function getById($id)
    {
        return $this->getRep()->find($id);
    }

    /**
     * Obtient un post par son id
     * @param string category
     * @return Application\Entity\Post
     */
    public function getPostByCategory($category)
    {
        return $this->getRep()->findBy(array("category_id" => $category));
    }

    /**
     * Sauvegarder une categorie
     * @param Post $post
     * @return Application\Entity\Post
     * @internal param $ Application\Entity\Post
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
        $post = $this->getById($id);
        $this->getEm()->remove($post);
        $this->getEm()->flush();
    }

}