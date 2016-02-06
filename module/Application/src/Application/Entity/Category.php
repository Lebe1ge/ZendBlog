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
 * @ORM\Table(name="category")
 *
 * @author
 */
class Category implements InputFilterAwareInterface
{
    /*********************************
     * ATTRIBUTS
     *********************************/

    protected $inputFilter;

    /**
     * @var int L'identifiant de la categorie
     * @ORM\Id
     * @ORM\Column(type="integer", name="category_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string Le nom
     * @ORM\Column(type="string", length=100, unique=true, nullable=true, name="nom")
     */
    protected $nom;
    /**
     * @var string Le slug
     * @ORM\Column(type="string", unique=true,  length=100, name="slug")
     */
    protected $slug;
    /**
     * @var int Statut de la categorie
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
        $this->nom = $data['nom'];
        $this->slug = $data['slug'];
        $this->state = $data['state'];
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
                'name'     => 'nom',
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
                            'max'      => 100,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'slug',
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
                            'max'      => 100,
                        ),
                    ),
                ),
            ));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }


    /*********** PROTECTED **********/

    /************ PRIVATE ***********/
}