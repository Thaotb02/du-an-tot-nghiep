<?php

namespace App\Repositories;

use App\Model\Order;
use App\Repositories\AppRepository;

class GuiEmailHetHanGoiTap extends AppRepository
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function hetHan(string $thoiGian, array $selects = ['*'])
    {
        return $this->model
        ->where('start_date', '<=', $thoiGian)
        ->where('finish_date', '>=', $thoiGian)
            ->select($selects)
            ->first();
    }


}