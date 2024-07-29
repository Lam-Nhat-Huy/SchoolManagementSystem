<?php

namespace App\Services\Interfaces;

/**
 * Interface SubjectServiceInterface
 * @package App\Services\Interfaces
 */
interface SubjectServiceInterface
{
    public function getSubject($search = null, $courseId = null, $status = null);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
}
