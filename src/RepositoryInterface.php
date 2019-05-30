<?php

namespace App;

interface RepositoryInterface
{
    public function add(Entity $entity): Entity;
}
