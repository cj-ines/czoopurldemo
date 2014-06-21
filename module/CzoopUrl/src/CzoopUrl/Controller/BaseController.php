<?php

namespace CzoopUrl\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BaseController extends AbstractActionController
{
    protected $urlRepository;
    protected $entityManager;
    protected $urlRepositoryEntity;

    public function getUrlRepositoryEntity()  
    {
        if (!$this->urlRepositoryEntity) {
            $this->urlRepositoryEntity = $this->getServiceLocator()->get('CzoopUrl\Entity\UrlRepository');
        }
        return $this->urlRepositoryEntity;
    }

    public function getEntityManager()
    {
        if (!$this->entityManager) {
            $this->entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->entityManager;
    }

    public function getUrlRepository()
    {
        $em = $this->getEntityManager();
        return $em->getRepository('CzoopUrl\Entity\UrlRepository');
    }
}
