<?php
/**
 * Service
 * @package Application\Service
 * @author Bidoum
 *
 */
namespace Application\Service;

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
     * Sauvegarder une categorie
     * @param Post post
     */
    public function savePost(Post $post)
    {
        $data = array(
            'id_post' => $post->idPost,
            'name'  => $post->name
        );

        $id = (int)$post->id_post;

        if ($id == 0) {
            $this->insert($data);
        } elseif ($this->getPost($id)) {
            $this->update(
                $data,
                array(
                    'id_post' => $id,
                )
            );
        }
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