<?php

namespace App\Repositories;

use App\Models\MemberTeam;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class MemberTeamRepository extends BaseRepository
{
    public function model()
    {
        return MemberTeam::class;
    }

    public function findManyBy(
        array $columns = ['*'],
        array $parameters = [],
        array $orderBy = [],
        array $groupBy = [],
        array $specialParameters = []
    ) {
        $query = $this->model->select($columns);

        foreach ($parameters as $key => $value) {
            $query->where($key, $value);
        }

        foreach ($orderBy as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        if (!empty($groupBy)) {
            $query->groupBy($groupBy);
        }

        return $query->get();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function findOneByIdProfileTeam($id)
    {
        return $this->model->where('id_profile_team', $id)->first();
    }

}
