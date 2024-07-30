<?php

namespace App\Repositories;

use App\Models\Base;
use App\Models\Classes;
use App\Models\Courses;
use App\Models\Major;
use App\Models\Subjects;
use App\Models\Teachers;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\SubjectRegistrationRepositoryInterface;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Services
 */

/*Nơi làm chức năng thêm sửa xóa, có thể tái sử bằng cách exstend BaseRepository*/
class SubjectRegistrationRepository extends BaseRepository implements SubjectRegistrationRepositoryInterface
{
    protected $model;

    public function __construct(Subjects $model)
    {
        $this->model = $model;
    }

    # course -> subject -> class
    public function getCoursesWithSubjects()
    {
        return Courses::with('subjects')->orderBy('id', 'asc')->get();
    }

    public function getSubjectsWithClasses($courseId)
    {
        return Subjects::with('classes')->where('course_id', $courseId)->orderBy('id', 'asc')->get();
    }

    public function getClassesBySubjectId($subjectId)
    {
        return Classes::where('subject_id', $subjectId)->orderBy('id', 'asc')->get();
    }

    public function getTeachersWithSubjects()
    {
        return Teachers::with('subjects')->orderBy('id', 'asc')->get();
    }

    public function getClassData($id)
    {
        return Classes::with(['subject', 'teacher', 'subject.course'])->where('subject_id', $id)->orderBy('id', 'asc')->get();
    }
}
