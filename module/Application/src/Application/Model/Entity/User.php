<?php
namespace Application\Model;
use Application\Model\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use ZfcUser\Entity\UserInterface;

/**
 * Représentation d'un utilisateur
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 *
 * @author
 */
class User extends AbstractEntity
{
    /*********************************
     * ATTRIBUTS
     *********************************/

    /**
     * @var int L'identifiant utilisateur
     * @ORM\Id
     * @ORM\Column(type="integer", name="user_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $_id;
    /**
     * @var string Le login
     * @ORM\Column(type="string", length=255, unique=true, nullable=true, name="username")
     */
    protected $_username;
    /**
     * @var string L'email
     * @ORM\Column(type="string", unique=true,  length=255, name="email")
     */
    protected $_email;
    /**
     * @var string Le nom affiché
     * @ORM\Column(type="string", length=50, nullable=true, name="display_name")
     */
    protected $_displayName;
    /**
     * @var string Le mot de passe
     * @ORM\Column(type="string", length=128, name="password")
     */
    protected $_password;
    /**
     * @var int Statut du compte
     * @ORM\Column(type="integer", name="state")
     */
    protected $_state;

    /*********************************
     * ACCESSEURS
     *********************************/

    /*********** GETTERS ************/

    /**
     * Obtient l'identifiant utilisateur
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Obtient le login
     * @return string
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * Obtient l'email
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Obtient le nom affiché
     * @return string
     */
    public function getDisplayName()
    {
        return $this->_displayName;
    }

    /**
     * Obtient le mot de passe
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Obtient le statut du compte
     * @return int
     */
    public function getState()
    {
        return $this->_state;
    }


    /*********** SETTERS ************/

    /**
     * Définit l'id utilisateur
     * @param int $id L'identifiant
     * @return User
     */
    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }

    /**
     * Définit le login
     * @param string $username Le login
     * @return User
     */
    public function setUsername($username)
    {
        $this->_username = $username;
        return $this;
    }

    /**
     * Définit l'email
     * @param string $email L'email
     * @return User
     */
    public function setEmail($email)
    {
        $this->_email = $email;
        return $this;
    }

    /**
     * Définit le nom complet
     * @param string $displayName Le nom complet
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->_displayName = $displayName;
        return $this;
    }

    /**
     * Définit le mot de passe
     * @param string $password Le mot de passe
     * @return User
     */
    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }

    /**
     * Définit l'état
     * @param int $state L'etat
     * @return User
     */
    public function setState($state)
    {
        $this->_state = $state;
        return $this;
    }

    /*********************************
     * CONSTRUCTEUR / DESTRUCTEUR
     *********************************/

    /**
     * Constructeur
     */
    public function __construct()
    {

    }

    /*********************************
     * METHODES
     *********************************/

    /************ PUBLIC ************/

    /*********** PROTECTED **********/

    /************ PRIVATE ***********/
}