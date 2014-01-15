namespace Application\Form; 

use Zend\Captcha; 
use Zend\Form\Element; 
use Zend\Form\Form; 

class UnnamedFormClass extends Form 
{ 
    public function __construct($name = null) 
    { 
        parent::__construct('application\form'); 
        
        $this->setAttribute('method', 'post'); 
        
        $this->add(array( 
            'name' => 'mail', 
            'type' => 'Zend\Form\Element\Email', 
            'attributes' => array( 
                'placeholder' => 'votre adresse email', 
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
                'placeholder' => 'Votre mot de passe', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Password', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'csrf', 
            'type' => 'Zend\Form\Element\Csrf', 
        ));        
    } 
} 