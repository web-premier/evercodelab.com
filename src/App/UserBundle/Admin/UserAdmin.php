<?php
namespace App\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use App\UserBundle\Form\Extension\ChoiceList\UserRoles as UserRoles;

class UserAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('email')
            ->add('username')
            ->add('roles')
            ->add('enabled')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username')
            ->add('email')
            ->add('plainPassword', 'text')
            ->add('roles', 'choice', array(
                'choice_list' => new UserRoles(),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('enabled', null, array('required' => false))
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('username')
            ->addIdentifier('email')
            ->addIdentifier('enabled')
            ->addIdentifier('roles')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email')
            ->add('username')
            ->add('enabled')
            ->add('roles', null, array(), 'choice',
                array('choice_list' => new UserRoles())
            )
        ;
    }

    public function getExportFields()
    {
        return array('email', 'username');
    }
}
