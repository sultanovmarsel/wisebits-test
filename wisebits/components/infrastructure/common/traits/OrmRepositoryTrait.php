<?php

namespace Wisebits\infrastructure\common\traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as OrmModel;
use Wisebits\infrastructure\common\ErrorMap;

/**
 * Trait OrmRepositoryTrait
 * @package Wisebits\infrastructure\common\traits
 */
trait OrmRepositoryTrait
{
    protected OrmModel $ormModel;

    /**
     * RepositoryTrait constructor.
     * @param OrmModel $ormModel
     */
    public function __construct(OrmModel $ormModel)
    {
        $this->ormModel = $ormModel;
    }

    /**
     * @param int $id
     * @return OrmModel|null
     */
    protected function findOrmModelById(int $id): ?OrmModel
    {
        $ormModel = $this->getQuery()
            ->whereKey($id)
            ->first();

        if (!$ormModel instanceof OrmModel) {
            return null;
        }

        return $ormModel;
    }

    /**
     * @return array
     */
    protected function findOrmModels(): array
    {
        $ormModels = $this->getQuery()
            ->get();

        $result = [];
        foreach ($ormModels as $ormModel) {
            if (!$ormModel instanceof OrmModel) {
                continue;
            }

            $result[] = $ormModel;
        }

        return $result;
    }

    /**
     * @param $key
     * @return bool
     */
    protected function delete(int $key): bool
    {
        return (bool) $this->getQuery()
            ->whereKey($key)
            ->delete();
    }

    /**
     * @param array $data
     * @return OrmModel
     */
    protected function saveOrmModelByData(array $data): OrmModel
    {
        $ormModel = null;
        if (!empty($data[$this->ormModel->getKeyName()])) {
            $ormModel = $this->findOrmModelById($data[$this->ormModel->getKeyName()]);
        }

        if (!$ormModel instanceof OrmModel) {
            $ormModel = clone $this->ormModel;
        }

        $ormModel->fill($data);

        if (!$ormModel->save()) {
            throw new \RuntimeException(ErrorMap::USER_SAVE_ERROR);
        }

        return $ormModel;
    }

    /**
     * @return Builder
     */
    protected function getQuery(): Builder
    {
        return $this->ormModel::query();
    }
}
