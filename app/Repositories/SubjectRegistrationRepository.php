<?php

namespace App\Repositories;

use App\Models\Classes;
use App\Models\Courses;
use App\Models\Subjects;
use App\Repositories\Interfaces\SubjectRegistrationRepositoryInterface;

class SubjectRegistrationRepository extends BaseRepository implements SubjectRegistrationRepositoryInterface
{
    protected $model;

    public function __construct(Subjects $model)
    {
        $this->model = $model;
    }

    public function getCoursesWithSubjects()
    {
        return Courses::all();
    }

    public function getSubjectsWithClasses($courseId)
    {
        return Subjects::with('classes')->where('coure_id', $courseId)->orderBy('id', 'asc')->get();
    }

    public function getClassesBySubjectId($subjectId)
    {
        return Classes::where('subject_id', $subjectId)->orderBy('id', 'asc')->get();
    }

    public function getClassData($id)
    {
        return Classes::with(['subject', 'teacher', 'subject.course'])->where('subject_id', $id)->orderBy('id', 'asc')->get();
    }
}
