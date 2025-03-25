<?php

namespace App\Repositories;

use App\Models\Veiculo;

class VeiculoRepository
{

    private $model;
    
    public function __construct(Veiculo $model)
    {
        $this->model = $model;
    }

    public function store(array $data): Veiculo
    {
        return $this->model->create($data);
    }
    
}