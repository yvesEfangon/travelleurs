<?php
/**
 * Created by PhpStorm.
 * User: Yves
 * Date: 01/06/2016
 * Time: 13:20
 */

namespace AppBundle\Service;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * Class TravUtilities
 * @package AppBundle\Services
 */
class TravUtilities
{


    /**
     * @param string $keyword
     * @param array  $arrayToSearch
     * @return bool
     */
    public function customSearch($keyword, $arrayToSearch)
    {
        foreach ($arrayToSearch as $key => $arrayItem) {
            if (strstr($arrayItem, $keyword)) {
                return true;
            }
        }
    }

    /**
     * @param \DateTime $date1
     * @param \DateTime $date2
     * @param $field_name
     * @param $queryBuilder
     * @param array $parameters
     * @return array
     */
    public function processDates(\DateTime $date1, \DateTime $date2, $field_name, &$queryBuilder, array &$parameters)
    {//Process dates filter for a MySql query!

        $par_d1 = uniqid('x');
        $par_d2 = uniqid('y');


        if ($date1 != '' && $date2 != '') {
            $diff       = $this->dateDiff($date1, $date2);

            if ($diff === false) {
                return $parameters;
            }

            if ($diff>0) {
                $date_tmp   = $date1;
                $date1      = $date2;
                $date2      = $date_tmp;
            }

            $queryBuilder->andWhere('TO_DAYS('.$field_name.') >= TO_DAYS(:'.$par_d1.')');
            $queryBuilder->andWhere('TO_DAYS('.$field_name.') <= TO_DAYS(:'.$par_d2.')');

            $parameters[$par_d1]    = $date1;
            $parameters[$par_d2]    = $date2;
        } elseif ($date1 != '' && $date2 == '') {
            $queryBuilder->andWhere('TO_DAYS('.$field_name.') = TO_DAYS(:'.$par_d1.')');
            $parameters[$par_d1]    = $date1;
        } elseif ($date2 != '' && $date1=='') {
            $queryBuilder->andWhere('TO_DAYS('.$field_name.') = TO_DAYS(:'.$par_d2.')');
            $parameters[$par_d2]    = $date2;
        }

        return $parameters;
    }

    /**
     * @param float        $amount1
     * @param float        $amount2
     * @param string       $fieldName
     * @param QueryBuilder $queryBuilder
     * @param array        $parameters
     * @return array
     */
    public function processQueryAmounts($amount1, $amount2, $fieldName, &$queryBuilder, array $parameters)
    {
        $max    = ($amount2>$amount1)?$amount2:$amount1;
        $min    = ($amount2<$amount1)?$amount2:$amount1;

        if (count($parameters)==0) {
            $queryBuilder->where($fieldName.' >= :min AND '.$fieldName.' <=:max');
        } else {
            $queryBuilder->andWhere($fieldName.' >= :min AND '.$fieldName.' <=:max');
        }

        $parameters['min']  = $min;
        $parameters['max']  = $max;

        return $parameters;
    }

    /**
     * @param array        $values
     * @param string       $fieldName
     * @param QueryBuilder $queryBuilder
     * @param array        $parameters
     * @return array
     */
    public function handleOrClause(array $values, $fieldName, &$queryBuilder, array &$parameters)
    {
        $dql    = array();
        $isEmpty    = (count($parameters)==0);

        $values    = array_unique($values);
        foreach ($values as $i=>$value) {
            $param      = 'vv_'.$i.$value;

            if (isset($parameters[$param])) {
                continue;
            }

            $dql[]      = $fieldName.' LIKE :'.$param;

            $parameters[$param]   = $value;
        }

        $query  = implode(' OR ', $dql);

        if ($isEmpty) {
            $queryBuilder->where($query);
        } else {
            $queryBuilder->andWhere($query);
        }

        return $parameters;
    }

    /**
     * @param array        $fields
     * @param string       $value
     * @param QueryBuilder $queryBuilder
     * @param array        $parameters
     * @param bool $strict
     * @return mixed
     */
    public function addOrFieldsToQuery(array $fields, $value, &$queryBuilder, $parameters, $strict=false)
    {
        $dql    = array();

        foreach ($fields as $i=>$field) {
            $param      = 'xx_'.$i.$field;

            if (isset($parameters[$param])) {
                continue;
            }

            $dql[]      = $field.' = :'.$param;

            $parameters[$param]   = $value;
        }

        $query  = implode(' OR ', $dql);

        $queryBuilder->where($query);

        return $parameters;
    }

    /**
     * @param string $date1
     * @param string $date2
     * @return bool|float
     */
    public function dateDiff(\DateTime $date1, \DateTime $date2)
    {

        if ($date1 && $date2) {
            $datediff    = $date1->diff($date2);

            return floor($datediff->d / (60 * 60 * 24));
        } else {
            return false;
        }
    }

    /**
     * @param float $amount
     * @return string
     */
    public function formatMoney($amount)
    {
        return number_format($amount, 2, '.', ' ');
    }


}
