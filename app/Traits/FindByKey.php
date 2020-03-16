<?php namespace App\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;

trait FindByKey
{
    protected $tableName;

    public function findByKey($key, $column = 'key')
    {
        try {
            $model = call_user_func_array([$this->tableName, 'where'], [$column, '=', $key])->firstOrFail();
        }
        catch (ModelNotFoundException $error) {
            throw new \Exception('該当の' . $this->tableName . 'がない');
        }
        catch (\Exception $error) {
            logger()->error(get_class() . ', findByKey error.', [
                'error' => $error,
            ]);
            abort(500);
        }

        return $model;
    }

    /**
     * Keysに該当するものを取得する
     *
     * @param Collection $collection
     * @param string $keys
     */
    public function findByKeys($collection, $keys)
    {
        return $collection->whereIn('key', $keys);
    }

    /**
     * Keysに該当しないものを取得する
     *
     * @param Collection $collection
     * @param string $keys
     */
    public function notFindByKeys($collection, $keys)
    {
        return $collection->whereNotIn('key', $keys);
    }
}
