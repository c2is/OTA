<?php

namespace C2is\OTA\Model\HotelSearch\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;

class Criteria
{
    /**
     * @Type("array<C2is\OTA\Model\HotelSearch\Request\Criterion>")
     * @XmlList(inline = true, entry = "Criterion")
     */
    private $criterion = array();

    public function getCriterion()
    {
        return $this->criterion;
    }

    public function addCriterion($criterion)
    {
        $criterionClassName = sprintf('%sCriterion', get_class($criterion));
        $criterion = new $criterionClassName($criterion);

        $this->criterion[] = $criterion;
    }

    public function setCriterion(array $criterion)
    {
        $this->criterion = $criterion;
    }

    public function resetCriterion()
    {
        $this->criterion = array();
    }
}
