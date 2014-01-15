namespace UnnamedFormNamespace\Controller; 

use Zend\Mvc\Controller\AbstractActionController; 
use Zend\View\Model\ViewModel; 
use Application\Form\InscriptionClassForm; 
use Application\Form\InscriptionClassFormValidator; 
use Application\Model\InscriptionFormModel; 

public function inscriptionAction() 
{ 
    $form = new InscriptionValidatorClassForm(); 
    $request = $this->getRequest(); 

    if($request->isPost()) 
    { 
        $user = new UserFormModel(); 
        
        $formValidator = new InscriptionValidatorClassForm(); 
        { 
            $form->setInputFilter($formValidator->getInputFilter()); 
            $form->setData($request->getPost()); 
        } 
         
        if($form->isValid()){ 
        { 
            $user->exchangeArray($form->getData()); 
        } 
    } 
    
    return ['form' => $form]; 
} 
