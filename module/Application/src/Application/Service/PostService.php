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

}