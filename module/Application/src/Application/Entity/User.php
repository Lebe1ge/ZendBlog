<?php
/**
 * User
 * @author Julien
 *
 */
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
 * @ORM\Table(name="user")
 *
 * @author
 */
class User
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
    protected $user_id;
    /**
     * @var string Le login
     * @ORM\Column(type="string", length=255, unique=true, nullable=true, name="username")
     */
    protected $username;
    /**
     * @var string L'email
     * @ORM\Column(type="string", unique=true,  length=255, name="email")
     */
    protected $email;
    /**
     * @var string Le prenom
     * @ORM\Column(type="string", length=100, nullable=true, name="name")
     */
    protected $name;
    /**
     * @var string Le nom
     * @ORM\Column(type="string", length=100, nullable=true, name="lastname")
     */
    protected $lastname;
    /**
     * @var string Le mot de passe
     * @ORM\Column(type="string", length=128, name="password")
     */
    protected $password;
    /**
     * @var int Statut de l'utilisateur
     * @ORM\Column(type="integer", name="state")
     */
    protected $state;
    /**
     * @var int type d'utilisateur
     * @ORM\Column(type="integer", name="type")
     */
    protected $type;
    /**
     * @var date Date inscription
     * @ORM\Column(type="datetime", nullable=true, name="date_inscription")
     */
    protected $date_inscription;
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
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->state = (isset($data['state'])) ? $data['state'] : 1;
        $this->type = (isset($data['type'])) ? $data['type'] : null;
        $this->date_inscription = (isset($data['date_inscription'])) ? $data['date_inscription'] : null;
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
                )
            );

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }


    /*********** PROTECTED **********/

    /************ PRIVATE ***********/
}