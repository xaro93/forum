<?php

namespace App\Doctrine\Filter;

use Doctrine\ORM\Mapping\ClassMetaData;
use Doctrine\ORM\Query\Filter\SQLFilter;

class SoftDeletable extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if ($targetEntity->reflClass->hasProperty('deletedAt')) {
            return $targetTableAlias.'.deleted_at IS NULL';
        }

        return '';
    }
}