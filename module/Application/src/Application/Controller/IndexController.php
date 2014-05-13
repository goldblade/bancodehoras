<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Aluno;
use Application\Form\Aluno as AlunoForm;

class IndexController extends ActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function saveAction()
    {
    	$form = new AlunoForm();
    	return new ViewModel(array(
    		'form' => $form
    	));    
    }
}
