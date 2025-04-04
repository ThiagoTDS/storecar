<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Veiculo;
use App\Utils\Filters\LowerThanFilter;
use GuzzleHttp\Psr7\Query;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
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

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        $veiculos = QueryBuilder::for(Veiculo::class)
            ->allowedFilters([
                'name',
                'brand',
                'city',
                'type',
                AllowedFilter::custom('veiculo_ano', new LowerThanFilter),
                AllowedFilter::custom('kilometers', new LowerThanFilter),
                AllowedFilter::custom('price', new LowerThanFilter),
            ])
            ->paginate($perPage);
        return $veiculos;
    }

    public function findById(int $id): ?Veiculo
    {
        $veiculo = QueryBuilder::for(Veiculo::class)
            ->where('id', $id)
            ->first();

        return $veiculo;
    }

    public function update(int $id, array $data): bool
    {
        $veiculo = $this->findById($id);

        if (!$veiculo) {
            return false;
        }
        return $veiculo->update($data);
    }

    public function delete(int $id,): bool
    {
        $veiculo = $this->findById($id);
        if (!$veiculo) {
            return false;
        }
        return $veiculo->delete($id);
    }
}
