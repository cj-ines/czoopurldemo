<?php 

namespace CzoopUrl\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;

class RouteController extends BaseController
{
	public function indexAction()
	{
		$em = $this->getEntityManager();
		//$urls = $this->getUrlRepository()->findAll();
		$query = $em->createQuery('SELECT u FROM \CzoopUrl\Entity\UrlRepository u');
		$urls = new Paginator(new DoctrinePaginator(new ORMPaginator($query)));

		$urls->setCurrentPageNumber((int)$this->params()->fromQuery('page',1));
		$urls->setItemCountPerPage(20);

		//$paginator = new ViewModel()
		$view = new ViewModel(array(
			'urls' => $urls,
		));

		return $view;
	}

	public function toAction()
	{
		
		$em = $this->getEntityManager();
		$url = $this->getUrlRepository();
		$slug =  $this->params()->fromRoute('slug');
		$env = $this->params()->fromRoute('environment');
		if (!is_null($env)) {
			$destination = $this->getUrlRepository()->findOneBy(array('slug' => $slug, 'environment' => $env));
			if (!is_null($destination)) {
				$this->redirect()->toUrl($destination->getUrl());
			}
			
		}
		
		$destinations = $this->getUrlRepository()->findBy(array('slug' => $slug));
		$view = new ViewModel(array(
			'destinations' => $destinations,
			'platform' => ''
		));
		return $view;
	}

	public function goAction()
	{
		$this->redirect()->toRoute('czoopurl');
	}
}