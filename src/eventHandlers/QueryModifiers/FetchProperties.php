<?php

namespace DevGroup\EntitySearchProperties\eventHandlers\QueryModifiers;

use DevGroup\DataStructure\helpers\PropertiesHelper;
use DevGroup\EntitySearch\base\SearchEvent;
use DevGroup\EntitySearch\response\ResultResponse;
use DevGroup\DataStructure\traits\PropertiesTrait;

class FetchProperties
{
    public static function modify(SearchEvent $e)
    {
        $searchQuery = $e->searchQuery();
        if ($searchQuery->fillProperties === false) {
            return;
        }

        $mainEntityClassName = $searchQuery->mainEntityClassName;

        if (in_array(PropertiesTrait::class, class_uses($mainEntityClassName), true)) {
            /** @var ResultResponse $response */
            $response = &$e->response;
            $entities = $response->entities;
            PropertiesHelper::fillProperties($entities);
            $response->entities = $entities;
        }
    }
}
