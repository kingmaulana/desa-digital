<?php

namespace App\Interfaces;

interface UserRepositoryInterface 
{
    public function getAll(
        ?string $search,
        ?int $limit,
        bool $execute
    );

    public function getAllPaginated(
        ?string $search,
        ?int $rowPerPage
    );

    public function getById(
        string $id
    );

    // create data blueprint
    public function create(array $data);

}