<?php

namespace AppBundle\Twig\Extension;

class AppExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'app';
    }

    public function getFilters()
    {
        return array(
            'age' => new \Twig_SimpleFilter('age', [$this, 'getAge']),
        );
    }

    public function getAge($date)
    {
        if (!$date instanceof \DateTime) {
            // turn $date into a valid \DateTime object or let return
            return null;
        }

        $referenceDate = date('01-01-Y');
        $referenceDateTimeObject = new \DateTime($referenceDate);

        $diff = $referenceDateTimeObject->diff($date);

        return $diff->y;
    }
}
