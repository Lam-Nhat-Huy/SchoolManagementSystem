<?php

namespace App\Repositories;

use App\Models\Base;
use App\Models\Subjects;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Services
 */

/*Nơi làm chức năng thêm sửa xóa, có thể tái sử bằng cách exstend BaseRepository*/
class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{

    /* Xài chung thì viết hàm bên đây rồi */
    protected $model;

    public function __construct(Subjects $model)
    {
        $this->model = $model;
    }

    public function getSubjectById(int $id = 0)
    {
        return $this->model->select([
            'id',
            'name',
            'course_id',
            'description',
        ])->findOrFail($id);
    }
}
