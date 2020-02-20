<?php

namespace App\Repositories\Contracts;

use App\Repositories\BaseRepositoryInterface;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryContract
{
    /**
     * Get all the model records in the database.
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Count the number of specified model records in the database.
     *
     * @return int
     */
    public function count(): int;

    /**
     * Get the first specified model record from the database.
     *
     * @return Model
     */
    public function first(): Model;

    /**
     * Get all the specified model records in the database.
     *
     * @return Collection
     */
    public function get(): Collection;

    /**
     * Get the specified model record from the database.
     *
     * @param $id
     *
     * @return Model
     */
    public function find($id): Model;

    /**
     * @param $item
     * @param $column
     * @param array $columns
     *
     * @return Builder|Model|object|null
     */
    public function findByColumn($item, $column, array $columns = ['*']);

    /**
     * Delete the specified model record from the database.
     *
     * @param $id
     *
     * @return bool|null
     * @throws Exception
     */
    public function deleteById($id): ?bool;

    /**
     * Set the query limit.
     *
     * @param int $limit
     *
     * @return BaseRepositoryContract
     */
    public function limit($limit): BaseRepositoryContract;

    /**
     * Set an ORDER BY clause.
     *
     * @param string $column
     * @param string $direction
     * @return BaseRepositoryContract
     */
    public function orderBy($column, $direction = 'asc'): BaseRepositoryContract;

    /**
     * @param int $limit
     * @param array $columns
     * @param string $pageName
     * @param null $page
     *
     * @return LengthAwarePaginator
     */
    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null): LengthAwarePaginator;

    /**
     * Add a simple where clause to the query.
     *
     * @param string $column
     * @param string $value
     * @param string $operator
     *
     * @return BaseRepositoryContract
     */
    public function where($column, $value, $operator = '=');

    /**
     * Add a simple where in clause to the query.
     *
     * @param string $column
     * @param mixed $values
     *
     * @return BaseRepositoryContract
     */
    public function whereIn($column, $values);

    /**
     * Set Eloquent relationships to eager load.
     *
     * @param $relations
     *
     * @return BaseRepositoryContract
     */
    public function with($relations): BaseRepositoryContract;

    /**
     * Create a new instance of the model's query builder.
     *
     * @return BaseRepositoryContract
     */
    public function newQuery(): BaseRepositoryContract;
}
