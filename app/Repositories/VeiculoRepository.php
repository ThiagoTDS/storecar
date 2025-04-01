<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw new \RuntimeException("Falha ao criar veículo: " . $e->getMessage());
        }
        // return $this->model->create($data);
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

    public function findById(int $id): ?Veiculo{

        return $this->model->find($id);

    }

    public function update(int $id, array $data): bool {
        try {
            $veiculo = $this->findById($id);

            if (!$veiculo) {
                throw new ModelNotFoundException("Veículo não encontrado");
            }

            return $veiculo->update($data);
            } catch (\Exception $e) {
            throw new \RuntimeException("Falha ao atualizar veículo: " . $e->getMessage());
        }
    }
}