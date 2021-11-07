<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * @var array
     */
    static array $columnListing = [];

    /**
     * @return string
     */
    public static function getTableName(): string
    {
        return (new static())->getTable();
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function fill(array $attributes): Model
    {
        $columns = $this->getColumnListing();

        $attributes = array_filter($attributes, function($value) {
            return !is_null($value);
        });

        $attributes = array_intersect_key($attributes,  array_flip($columns));

        return parent::fill($attributes);
    }

    /**
     * @return array
     */
    protected function getColumnListing(): array
    {
        $class = get_class($this);

        if (!array_key_exists($class, static::$columnListing)) {
            static::$columnListing[$class] = $this->getConnection()
                ->getSchemaBuilder()
                ->getColumnListing($this->getTable());
        }
        return static::$columnListing[$class];
    }
}
