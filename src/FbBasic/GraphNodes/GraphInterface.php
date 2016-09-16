<?php

namespace FbBasic\GraphNodes;

interface GraphInterface
{

    /**
     * Getter for $graphObjectFields.
     *
     * @return array
     */
    public static function getObjectFields();

    /**
     * Getter for $graphObjectFields.
     *
     * @return array
     */
    public static function getObjectEdges();

}
