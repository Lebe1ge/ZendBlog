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
        $data = $this->getRep()->findAll();
        foreach($data as $v){
            if($v->tags)
                $v->tags = explode("-", $v->tags);
        }
        return $data;
    }

    /**
     * Obtient un post par son id
     * @param string id
     * @return Application\Entity\Post
     */
    public function getById($id)
    {
        $data = $this->getRep()->find($id);
        $data->tags = explode("-", $data->tags);
        return $data;
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