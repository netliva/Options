<?php

namespace Netliva\OptionsBundle\Services;



use Netliva\OptionsBundle\Entity\Options;

class OptionServices extends \Twig_Extension
{
	protected $em;
	public function __construct($em){
		$this->em = $em;
	}

	public function getFunctions()
	{
		return array(
			new \Twig_SimpleFunction('get_option', [$this, 'get']),
		);
	}


	public function get($key)
	{

		$entity = $this->em->getRepository(Options::class)->findOneByKeyword($key);

		if ($entity)
		{
			return $entity->getValue();
		}
		else
		{
			return null;
		}
	}


	public function set($key, $value)
	{

		$oldOptions = $this->em->getRepository(Options::class)->findOneByKeyword($key);

		if ($oldOptions)
		{
			$oldOptions->setValue($value);
		}
		else
		{
			$options = new Options();
			$options->setKeyword($key);
			$options->setValue($value);


			$this->em->persist($options);
		}

		$this->em->flush();
	}

	public function delete($key)
	{
		$oldOptions = $this->em->getRepository(Options::class)->findOneByKeyword($key);

		if ($oldOptions)
		{
			$this->em->remove($oldOptions);
			$this->em->flush();
		}

	}


}