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
	 * @ORM\Column(name="cod_setor", type="integer", nullable=false)
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

}