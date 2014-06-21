<?php

namespace CzoopUrl\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class UrlRepository
{
	/**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /** @ORM\Column(type="string") */
    protected $name;
    
    /** @ORM\Column(type="string") */
    protected $url;

    /** @ORM\Column(type="string") */
    protected $slug;

    /** @ORM\Column(type="string") */
    protected $environment;

    public function exchangeArray($data = array())
    {
    	$this->id 		= (isset($data['id'])) ?	 $data['id'] : null;
    	$this->name 	= (isset($data['name'])) ? $data['name'] : null;
    	$this->url 		= (isset($data['url'])) ? $data['url'] : null;
    	$this->slug 	= (isset($data['slug'])) ? $data['slug'] : null;
    	$this->environment 	= (isset($data['environment'])) ? $data['environment'] : null;
    }

    public function getId()
    {
    	return $this->id;
    }
    
    public function getName()
    {
    	return $this->name;
    }

    public function getUrl()
    {
    	return $this->url;
    }

    public function getSlug()
    {
    	return $this->slug;
    }

    public function getEnvironment()
    {
    	return $this->environment;
    }

    public function setId($data)
    {
    	$this->id = $data;
    }

    public function setUrl($data)
    {
    	$this->url = $data;
    }
    public function setSlug($data)
    {
    	$this->slug = $data;
    }
    public function setName($data)
    {
    	$this->name = $data;
    }
    public function setEnvironment($data)
    {
    	$this->environment = $data;
    }
}