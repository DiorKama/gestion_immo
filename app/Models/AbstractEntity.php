<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AbstractEntity extends Model
{
    /**
     * @var string
     */
    protected $titleColumn = 'title';

    /**
     * @var array
     */
    protected $excludeFilterColumns = [];

    /**
     * @var array
     */
    public static $rules = [];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @param array $attributes
     */
    public function __construct(
        array $attributes = []
    ) {
        parent::__construct($attributes);
    }

    /**
     * @param Builder $query
     * @param array $params
     * @param array $relations
     *
     * @return Builder
     */
    public function scopeCrudFilter(
        Builder $query,
        $params = [],
        $relations = []
    ) {
        if (!$params) {
            $query = $this
                ->crudFilterAddSortBy(
                    $query,
                    $params
                );

            return $query;
        }

        $query = $this
            ->crudFilterAddParams(
                $query,
                $params,
                $relations
            );

        $q = trim(Arr::get($params, 'q'));
        $query = $this->crudFilterAddTextSearch($query, $q);
        $query = $this->crudFilterAddCreatedDateRange($query, $params);
        $query = $this->crudFilterAddUpdatedDateRange($query, $params);
        $query = $this->crudFilterAddSortBy($query, $params);

        return $query;
    }

    /**
     * @param Builder $query
     * @param array $params
     * @param array $relations
     *
     * @return Builder
     */
    protected function crudFilterAddParams(
        Builder $query,
        array $params,
        array $relations
    ) {
        $columns = $this->getColumns();

        foreach ($params as $key => $value) {
            if (
                in_array(
                    Str::camel(rtrim($key, '_id')),
                    $relations
                )
                && !blank($value)
            ) {
                if (is_array($value)) {
                    $query->whereIn($this->getTable() . '.' . $key, $value);
                } else {
                    $query->where($this->getTable() . '.' . $key, $value);
                }
            } elseif (
                in_array($key, $columns)
                && !blank($value)
            ) {
                if (is_array($value)) {
                    $query->whereIn($key, $value);
                } else {
                    $query->where($key, $value);
                }
            }
        }

        return $query;
    }

    /**
     * Get an array of the columns on a table
     *
     * @return array
     */
    protected function getColumns()
    {
        return collect(DB::getSchemaBuilder()->getColumnListing($this->getTable()))
            ->filter(
                function ($column) {
                    return !in_array($column, $this->excludeFilterColumns);
                }
            )
            ->all();
    }

    /**
     * @return string
     */
    public function getQualifiedSortOrderColumn()
    {
        return $this->getTable() . '.id';
    }

    /**
     * @return string
     */
    public function getDefaultSortOrderDirection()
    {
        return 'desc';
    }

    /**
     * @param Builder $query
     * @param array $params
     *
     * @return Builder
     */
    protected function crudFilterAddSortBy(
        Builder $query,
        array $params
    ) {
        $column = $this->getQualifiedSortOrderColumn();
        $direction = $this->getDefaultSortOrderDirection();

        if (
            Arr::get($params, 'sort_by')
            && in_array(
                Arr::get($params, 'sort_by'),
                Schema::getColumnListing($this->getTable())
            )
        ) {
            $column = Arr::get($params, 'sort_by');
            $direction = Arr::get($params, 'dir');
        }

        return $query->orderBy($column, $direction);
    }

    /**
     * @param Builder $query
     * @param string $q
     *
     * @return Builder
     */
    protected function crudFilterAddTextSearch(
        Builder $query,
        string $q = null
    ) {
        $table = $this->getTable();

        if ($q) {
            return $query
                ->where(
                    function (Builder $query) use ($table, $q) {
                        $query->where($table . '.id', $q);
                        if (Schema::hasColumn($table, $this->titleColumn)) {
                            $query
                                ->orWhere(
                                    $table . '.' . $this->titleColumn,
                                    'LIKE',
                                    "%{$q}%"
                                );
                        }
                    }
                );
        }

        return $query;
    }

    protected function crudFilterAddCreatedDateRange(
        Builder $query,
        array $params
    ) {
        if (Arr::get($params, 'date_from')) {
            $query->where(
                $this->getTable() . '.created_at',
                '>',
                date('Y-m-d H:i:s', strtotime($params['date_from']))
            );
        }

        if (Arr::get($params, 'date_to')) {
            $query->where(
                $this->getTable() . '.created_at',
                '<',
                date('Y-m-d H:i:s', strtotime($params['date_to'] . ' + 1 day'))
            );
        }

        return $query;
    }

    protected function crudFilterAddUpdatedDateRange(
        Builder $query,
        array $params
    ) {
        if (Arr::get($params, 'updated_date_from')) {
            $query->where(
                $this->getTable() . '.updated_at',
                '>',
                date('Y-m-d H:i:s', strtotime($params['updated_date_from']))
            );
        }
        if (Arr::get($params, 'updated_date_to')) {
            $query->where(
                $this->getTable() . '.updated_at',
                '<',
                date('Y-m-d H:i:s', strtotime($params['updated_date_to'] . ' + 1 day'))
            );
        }

        return $query;
    }
}
