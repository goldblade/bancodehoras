<?php
namespace Application\Form;

use Zend\Form\Form;

class Aluno extends Form
{
	public function __construct()
	{
		parent::__construct("aluno");
		$this->setAttribute('method', 'post');
		$this->setAttribute('action', '/application/index/save');

		$this->add(array(
			'name' => 'id',
			'attributes' => array(
				'type' => 'hidden',
			),
		));

		$this->add(array(
			'name' => 'matricula',
			'attributes' => array(
				'type' => 'text',
				'placeholder' => 'Matrícula',
				'class' => 'narrow input'
			),
			'options' => array(
				'label' => 'Matrícula',
			),
		));

		$this->add(array(
			'name' => 'nome',
			'attributes' => array(
				'type' => 'text',
				'placeholder' => 'Nome',
				'class' => 'input'
			),
			'options' => array(
				'label' => 'Nome',
			),
		));
		
		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'class' => 'medium primary btn',
				'type' => 'submit',
				'value' => '  Enviar  ',
				'id' => 'submitbutton',
			),
		));
	
	}
}