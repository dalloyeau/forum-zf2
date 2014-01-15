namespace UnnamedFormNamespace\Form; 

use Zend\Captcha; 
use Zend\Form\Element; 
use Zend\Form\Form; 

class UnnamedFormClass extends Form 
{ 
    public function __construct($name = null) 
    { 
        parent::__construct('unnamedformnamespace'); 
        
        $this->setAttribute('method', 'post'); 
        
        $this->add(array( 
            'name' => 'nom', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Votre nom ici ', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Nom', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'prenom', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Votre prénom ici ', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Prenom', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'adresse', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Votre adresse ici ', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Adresse', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'age', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Votre age ici ', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Age', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'ville', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Votre ville ici ', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Ville', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'email', 
            'type' => 'Zend\Form\Element\Email', 
            'attributes' => array( 
                'placeholder' => 'Votre email ici', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Email', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'password', 
            'type' => 'Zend\Form\Element\Password', 
            'attributes' => array( 
                'placeholder' => 'Password Here...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Password', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'pseudo', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Votre pseudo ici ', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Pseudo', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'csrf', 
            'type' => 'Zend\Form\Element\Csrf', 
        ));        
    } 
} 