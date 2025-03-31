<?php

namespace App\Repositories;

use App\Models\Veiculo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

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
    
    public function paginate(int $perPage = 10): LengthAwarePaginator{
        $veiculos = QueryBuilder::for(Veiculo::class)
        ->allowedFilters([
            'name',
            'brand',
            'city',
        ])
        ->paginate($perPage); 
        return $veiculos;
    }
}