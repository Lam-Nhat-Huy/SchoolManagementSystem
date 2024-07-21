<?php

namespace App\Repositories\Interfaces;

/**
 * Interface BaseRepositoryInterface
 * @package App\Reponsitories\Interfaces
 */
interface SubjectRepositoryInterface
{
    public function getSubjectById(int $id = 0);
}
