<?php
/**
 * Service
 * @package Application\Service
 * @author Bidoum
 *
 */
namespace Application\Service;

use \Application\Service\AbstractService;
/**
 * Service
 *
 * @package Application\Service
 * @author auget
 *
 */
class PostService extends AbstractService
{

    /**
     * Obtient tous les posts
     * @param string email
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
     * Obtient un utilisateur par son email
     * @param string email
     * @return Application\Model\Post
     */
    public function getByEmail($email)
    {
        $qb = $this->getEm()->createQueryBuilder();

        $qb->select(array('u'))
            ->from('Application\Model\Post', 'u')
            ->where(
                $qb->expr()->eq('u._email', '?1')
            )
            ->setParameters(array(1 => $email))
        ;

        $query = $qb->getQuery();

        return $query->getSingleResult();
    }
}