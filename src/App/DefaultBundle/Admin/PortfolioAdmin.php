<?php
namespace App\DefaultBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PortfolioAdmin extends Admin
{
    protected $securityContext;

    public function __construct($code, $class, $baseControllerName, $securityContext)
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
            ->add('name')
            ->add('logo', null, array('template' => 'AppDefaultBundle:Admin:show_image.html.twig'))
            ->add('description')
            ->add('link')
            ->add('user')
            ->add('created_at')
            ->add('updated_at')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('file', 'file', array('required' => true, 'label' => 'Image'))
            ->add('description')
            ->add('link')
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('logo', null, array('template' => 'AppDefaultBundle:Admin:list_image.html.twig'))
            ->addIdentifier('name')
            ->addIdentifier('link')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
            ->add('link')
            ->add('created_at')
        ;
    }

    public function prePersist($portfolio)
    {
        $portfolio->setUser($this->getCurrentUser());
    }

    public function preUpdate($portfolio)
    {
        $portfolio->setUser($this->getCurrentUser());
    }
}
