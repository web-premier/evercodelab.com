<?php
namespace App\DefaultBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PageAdmin extends Admin
{
    protected  $securityContext;

    function __construct($code, $class, $baseControllerName, $securityContext)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->securityContext = $securityContext;
    }

    private function getCurrentUser()
    {
        return $this->securityContext->getToken()->getUser();
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('alias')
            ->add('name')
            ->add('text')
            ->add('user')
            ->add('created_at')
            ->add('updated_at')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('alias')
            ->add('name')
            ->add('text')
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('alias')
            ->addIdentifier('name')
            ->addIdentifier('user')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('alias')
            ->add('name')
            ->add('user')
        ;
    }

    public function prePersist($page)
    {
        $page->setUser($this->getCurrentUser());
    }

    public function preUpdate($page)
    {
        $page->setUser($this->getCurrentUser());
    }
}
