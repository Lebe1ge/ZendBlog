<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
/**
 * Représentation d'un utilisateur
 *
 * @ORM\Entity
 * @ORM\Table(name="post")
 *
 * @author
 */
class Post implements InputFilterAwareInterface
{
    /*********************************
     * ATTRIBUTS
     *********************************/
    protected $inputFilter;
    /**
     * @var int L'identifiant utilisateur
     * @ORM\Id
     * @ORM\Column(type="integer", name="post_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $post_id;
    /**
     * @var string Le titre
     * @ORM\Column(type="string", length=255, unique=true, nullable=true, name="title")
     */
    protected $title;
    /**
     * @var string Le contenu
     * @ORM\Column(type="text", name="content")
     */
    protected $content;
    /**
     * @var int Id de la catégorie
     * @ORM\Column(type="integer", name="category_id", nullable=true)
     */
    protected $category_id;
    /**
     * @var int Id de l'auteur
     * @ORM\Column(type="integer", name="author", nullable=true)
     */
    protected $author;
    /**
     * @var int Statut du post
     * @ORM\Column(type="integer", name="state")
     */
    protected $state;
    /**
     * @var date Date création de l'article
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $date_create;
    /**
     * @var string Chemin vers l'image
     * @ORM\Column(type="string", length=255, nullable=true, name="path_picture")
     */
    protected $path_picture;
    /*********************************
     * ACCESSEURS
     *********************************/
    /*********** GETTERS ************/
    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }
    /*********** SETTERS ************/
    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
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
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function exchangeArray ($data = array())
    {
        $this->post_id = (isset($data['post_id'])) ? $data['post_id'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : null;
        $this->content = (isset($data['content'])) ? $data['content'] : null;
        $this->category_id = (isset($data['category_id'])) ? $data['category_id'] : null;
        $this->author = (isset($data['author'])) ? $data['author'] : null;
        $this->state = (isset($data['path_picture'])) ? $data['path_picture'] : 1;
        $this->date_create = (isset($data['date_create'])) ? $data['date_create'] : null;
        $this->path_picture = (isset($data['path_picture'])) ? $data['path_picture'] : null;
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $inputFilter->add(array(
                'name'     => 'post_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'title',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 255,
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'content',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'category_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'author',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            /*$inputFilter->add(array(
                'name'     => 'state',
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            */
            /*$inputFilter->add(array(
                'name' => 'date_create',
                'type' => 'Zend\Form\Element\DateSelect',
                'options' => array(
                    'create_empty_option' => true,
                    'min_year' => date('Y') - 70,
                    'max_year' => date('Y') - 30,
                    'day_attributes' => array(
                        'class' => 'input-small',
                        'style' => 'width: 22%',
                    ),
                    'month_attributes' => array(
                        'class' => 'input-medium',
                        'style' => 'width: 35%',
                    ),
                    'year_attributes' => array(
                        'class' => 'input-small',
                        'style' => 'width: 25%',
                    )
                ),
            ));
            */
            /*$inputFilter->add(array(
                'name'     => 'path_picture',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                        ),
                    ),
                ),
            ));
            */
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
    /*********** PROTECTED **********/
    /************ PRIVATE ***********/
}