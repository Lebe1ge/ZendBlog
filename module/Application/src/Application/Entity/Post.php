<?php
namespace Application\Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * Représentation d'un utilisateur
 *
 * @ORM\Entity
 * @ORM\Table(name="post")
 *
 * @author
 */
class Post
{
    /*********************************
     * ATTRIBUTS
     *********************************/

    /**
     * @var int L'identifiant utilisateur
     * @ORM\Id
     * @ORM\Column(type="integer", name="post_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $_id;
    /**
     * @var string Le titre
     * @ORM\Column(type="string", length=255, unique=true, nullable=true, name="title")
     */
    protected $_title;
    /**
     * @var string Le contenu
     * @ORM\Column(type="string", unique=true,  length=255, name="content")
     */
    protected $_content;
    /**
     * @var string L'auteur
     * @ORM\Column(type="string", length=50, nullable=true, name="author")
     */
    protected $_author;
    /**
     * @var int Statut du post
     * @ORM\Column(type="integer", name="state")
     */
    protected $_state;

    /*********************************
     * ACCESSEURS
     *********************************/

    /*********** GETTERS ************/

    /**
     * Obtient l'identifiant du post
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Obtient le titre
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Obtient le contenu
     * @return string
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * Obtient l'auteur
     * @return string
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * Obtient le statut du post
     * @return int
     */
    public function getState()
    {
        return $this->_state;
    }


    /*********** SETTERS ************/

    /**
     * Définit l'id du post
     * @param int $id L'identifiant
     * @return Post
     */
    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }

    /**
     * Définit le titre
     * @param string $title Le titre
     * @return Post
     */
    public function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    /**
     * Définit le contenu
     * @param string $content Le contenu
     * @return Post
     */
    public function setContent($content)
    {
        $this->_content = $content;
        return $this;
    }

    /**
     * Définit l'auteur
     * @param string $author L'auteur
     * @return Post
     */
    public function setAuthor($author)
    {
        $this->_author = $author;
        return $this;
    }

    /**
     * Définit l'état
     * @param int $state L'etat
     * @return Post
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