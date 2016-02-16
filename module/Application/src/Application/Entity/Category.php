<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Application\Filter\Slugify;
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
    protected $category_id;
    /**
     * @var string Le nom de la catégorie
     * @ORM\Column(type="string", length=100, unique=true, nullable=true, name="name")
     */
    protected $name;
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
        $slugifyFilter = new Slugify();
        $this->category_id = (isset($data['category_id'])) ? $data['category_id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->slug = (isset($data['slug'])) ? $data['slug'] : $slugifyFilter->filter($this->name);
        $this->state = (isset($data['state'])) ? $data['state'] : 1;
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
                'name'     => 'category_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(
                array(
                    'name'     => 'name',
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
                )
            );

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }


    /*********** PROTECTED **********/

    /************ PRIVATE ***********/
}