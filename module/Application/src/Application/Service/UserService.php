<?php
/**
 * Service
 * @package Application\Service
 * @author Bidoum
 *
 */
namespace Application\Service;
use Application\Entity\User;

/**
 * Service
 *
 * @package Application\Service
 * @author auget
 *
 */
class UserService extends AbstractService
{
    /**
     * Obtient tous les utilisateurs
     * @param string email
     * @return Application\Entity\User
     *
     */

    public function getAll(){

        return $this->getRep()->findAll();
    }

    /**
     * Obtient une utilisateur par son id
     * @param string id
     * @return Application\Entity\User
     */
    public function getById($id)
    {
        return $this->getRep()->find($id);
    }

    /**
     * Supprimer un user
     * @param int id
     */
    public function deletePost($id)
    {
        $user = $this->getById($id);
        $this->getEm()->remove($user);
        $this->getEm()->flush();
    }
}