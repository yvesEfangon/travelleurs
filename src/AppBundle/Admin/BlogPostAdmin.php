<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/04/2016
 * Time: 01:47
 */
namespace AppBundle\Admin;

use AppBundle\Entity\BlogPost;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;


class BlogPostAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->with('Content',array('class' => 'col-md-9'))
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->add('language','choice',array(
                'choices'=>array(
                    'FR'=>'fr',
                    'EN'=>'en',
                    'ES'=>'es'
                )
            ))
            ->add('draft','choice', array(
                    'choices'  => array(
                        'Yes' => true,
                        'No' => false
                    )
                )
            )
            ->end()

            ->with('Meta data',array('class' => 'col-md-3'))
            ->add('category', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Category',
                'property' => 'name',
            ))
            ->end()
        ;
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Site Post'; // shown in the breadcrumb on the create view
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('category.name')
            ->add('language')
            ->add('draft')

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('category.name')
            ->add('language')
            ->add('draft');
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('slug')
            ->add('author')
            ->add('language')
        ;
    }

}