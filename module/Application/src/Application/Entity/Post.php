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
    protected $id;
    /**
     * @var string Le titre
     * @ORM\Column(type="string", length=255, unique=true, nullable=true, name="title")
     */
    protected $title;
    /**
     * @var string Le contenu
     * @ORM\Column(type="string", unique=true,  length=255, name="content")
     */
    protected $content;
    /**
     * @var string L'auteur
     * @ORM\Column(type="string", length=50, nullable=true, name="author")
     */
    protected $author;
    /**
     * @var int Statut du post
     * @ORM\Column(type="integer", name="state")
     */
    protected $state;

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
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->author = $data['author'];
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
                'name'     => 'id',
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
                'name'     => 'author',
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

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    static public function slugify($text)
    {
        $text = preg_replace('/\W+/', '-', $text);
        $text = strtolower(trim($text, '-'));
        return $text;
    }


    /*********** PROTECTED **********/

    /************ PRIVATE ***********/
}