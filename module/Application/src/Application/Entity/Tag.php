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
 * @ORM\Table(name="tag")
 *
 * @author
 */
class Tag implements InputFilterAwareInterface
{
    /*********************************
     * ATTRIBUTS
     *********************************/

    protected $inputFilter;

    /**
     * @var int L'identifiant utilisateur
     * @ORM\Id
     * @ORM\Column(type="integer", name="tag_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $tag_id;
    /**
     * @var string Le nom du tag
     * @ORM\Column(type="string", length=255, unique=true, nullable=true, name="name")
     */
    protected $name;
    /**
     * @var int Id du user
     * @ORM\Column(type="integer", name="user_id", nullable=true)
     */
    protected $user_id;
    /**
     * @var int Id de l'article
     * @ORM\Column(type="integer", name="post_id", nullable=true)
     */
    protected $post_id;
    /**
     * @var int Statut du tag
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

        $this->tag_id = (isset($data['tag_id'])) ? $data['tag_id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->post_id = (isset($data['post_id'])) ? $data['post_id'] : null;
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
                'name'     => 'tag_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
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
                            'max'      => 255,
                        ),
                    ),
                ),
            ));


            $inputFilter->add(array(
                'name'     => 'post_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));


            $inputFilter->add(array(
                'name'     => 'user_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'state',
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    /*********** PROTECTED **********/

    /************ PRIVATE ***********/
}