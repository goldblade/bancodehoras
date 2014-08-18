<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Aluno;
use Application\Form\Aluno as AlunoForm;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;

class IndexController extends ActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function saveAction()
    {
        $aluno = new Aluno;
    	$form = new AlunoForm();
        $request = $this->getRequest();
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        if ($id > 0){
            $aluno = $this->getEntityManager()->find('Application\Entity\Aluno', $id);
            $form->get('submit')->setAttribute('value', 'Editar');
        }        
        $form->setHydrator(new DoctrineEntity($this->getEntityManager(), 'Application\Entity\Aluno'));
        $form->bind($aluno);
        if ($request->isPost()){
            $id = (int) $this->params()->fromPost('id', 0);
            if ($id > 0){
                $pagina = $this->getEntityManager()->find('Application\Entity\Aluno', $id);
            }  
            $form->setInputFilter($aluno->getInputFilter());    
            $form->setData($request->getPost());                
            if ($form->isValid()){
                if ($id > 0){                   
                    $this->flashMessenger()->addSuccessMessage('Aluno Alterado!');                    
                } else {                    
                    $this->getEntityManager()->persist($aluno);
                    $this->flashMessenger()->addSuccessMessage('Novo Aluno Cadastrado');  
                }                               
                $this->getEntityManager()->flush();                
                return $this->redirect()->toUrl('/application/index');
            } else {
                var_dump("FORM INVALIDO");
            }
        }
    	return new ViewModel(array(
    		'form' => $form
    	));    
    }
}
