<?php

namespace App\Repositories;
use App\Repositories\AppRepository;
use App\Model\Member;
use Carbon\Carbon;

class User extends AppRepository
{
    public function __construct(Member $model)
    {
        parent::__construct($model);
    }

    public function dangKiHoaDon($memberId, $nhom)
    {
        return $this->model
            ->where('id', $memberId);
    }

}