<?php

namespace App\Services\Interfaces;

/**
 * Interface SubjectRegistrationServiceInterface
 * @package App\Services\Interfaces
 */
interface SubjectRegistrationServiceInterface
{
    public function showCourse();
    public function showSubject($id);
    public function showClass($id);
    public function showClassesBySubjectId($id);
    public function insertClassData($request);
}
