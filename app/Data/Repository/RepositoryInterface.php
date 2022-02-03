<?php

declare(strict_types=1);

namespace App\Data\Repository;

interface RepositoryInterface
{
    public function all();
    public function create(array  $data);
    public function update(string $id, array $data);
    public function delete(string $id);
    public function find(string $id);
}
