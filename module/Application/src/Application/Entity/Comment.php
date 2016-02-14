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
 * @ORM\Table(name="comment")
 *
 * @author
 */
class Comment implements InputFilterAwareInterface
{
    /*********************************
     * ATTRIBUTS
     *********************************/

    protected $inputFilter;

    /**
     * @var int L'identifiant du commentaire
     * @ORM\Id
     * @ORM\Column(type="integer", name="comment_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $comment_id;
    /**
     * @var text contenu du commentaire
     * @ORM\Column(type="text", name="content")
     */
    protected $content;
    /**
     * @var string Id user du commentaire
     * @ORM\Column(type="string", length=100, name="user_id")
     */
    protected $user_id;
    /**
     * @var int Statut du commentaire
     * @ORM\Column(type="integer", name="state", nullable = true)
     */
    protected $state;
    /**
     * @var date Date création de l'article
     * @ORM\Column(type="datetime", name="date_create")
     */
    protected $date_create;

    /**
     * @var integer Id de l'article
     * @ORM\Column(type="string", name="post_id", nullable = true)
     */
    protected $post_id;

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

        $this->comment_id = (isset($data['comment_id'])) ? $data['comment_id'] : null;
        $this->content = (isset($data['content'])) ? $data['content'] : null;
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->state = (isset($data['state'])) ? $data['state'] : 1;
        $this->date_create = (isset($data['date_create'])) ? $data['date_create'] : null;
        $this->post_id = (isset($data['post_id'])) ? $data['post_id'] : null;
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
                'name'     => 'comment_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
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
                'name'     => 'user_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
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
                'name' => 'date_create',
                'type' => 'Zend\Form\Element\DateSelect',
                'options' => array(
                    'create_empty_option' => true,
                    'min_year' => date('Y') - 70,
                    'max_year' => date('Y') - 16,
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



            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    /*********** PROTECTED **********/

    /************ PRIVATE ***********/
}