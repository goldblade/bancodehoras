<?php
namespace Application\Entity;

use Core\Entity\Entity;
use Core\Entity\EntityException;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\SequenceGenerator;
use Doctrine\ORM\Mapping\PrePersist;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * Entidade Aluno
 * 
 * @author  Eduardo Junior <ej@eduardojunior.com>
 * @category  Entidade
 * @package  Application
 * @subpackage  Aluno
 * @version  0.1
 * @example  Classe Aluno
 * @copyright  Copyright (c) 2014 Eduardo Junior.com (http://www.eduardojunior.com)
 * 
 * @ORM\Entity
 * @ORM\Table(name="aluno")
 * 
 */
class Aluno extends Entity
{
	/**
	 * @var  int $id
	 * 
	 * @ORM\Id
	 * @ORM\Column(type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="AUTO")	 
	 */
	protected $id;

	/**
	 * @var string $matricula
	 *
	 * @ORM\Column(type="string", unique=true, length=14)
	 */
	protected $matricula;

	/**
	 * @var string $nome
	 * 
	 * @ORM\Column(type="string", length=80)
	 */
	protected $nome;

	/**
	 * getters and setters 
	 */
	public function getId()
	{
		return $this->id;
	}

	public function setId($value)
	{
		$this->id = $this->valid("id", $value);
	}

	public function getMatricula()
	{
		return $this->matricula;
	}

	public function setMatricula($value)
	{
		$this->matricula = $this->valid("matricula", $value);
	}


	/**
	 * [$inputFilter description]
	 * @var [type]
	 */
	protected $inputFilter;

	/**
	 * Configura os filtros dos campos da entidade
	 * 
	 * @return Zend\InputFilter\Inputfilter
	 */
	public function getInputFilter()
	{
		if (!$this->inputFilter){
			$inputFilter = new InputFilter();
			$factory = new InputFactory();

			$inputFilter->add($factory->createInput(array(
				'name' => 'id',
				'required' => true,	
				'filters' => array(
					array('name' => 'Int'),
				),			
			)));			

			$inputFilter->add($factory->createInput(array(
				'name' => 'nome',
				'required' => true,
				'filters'	=>	array(
					array('name'	=>	'StripTags'),
					array('name'	=>	'StringTrim'),
				),				
			)));

			$inputFilter->add($factory->createInput(array(
				'name' => 'matricula',
				'required' => true,
				'filters'	=>	array(
					array('name'	=>	'StripTags'),
					array('name'	=>	'StringTrim'),
				),				
			)));

			$this->inputFilter = $inputFilter;
		}
		return $this->inputFilter;
	}


}