<?php
namespace App\DefaultBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ClientsAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('logo', null, array('template' => 'AppDefaultBundle:Admin:show_image.html.twig'))
            ->add('description')
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
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('logo', null, array('template' => 'AppDefaultBundle:Admin:list_clients.html.twig'))
            ->addIdentifier('name')
            ->addIdentifier('created_at')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
            ->add('created_at')
        ;
    }

}
