<?php

namespace App\Traits;

trait CreateKey
{
  protected $tableName;

  /**
   * 妥当なキーを生成
   * 
   * @param $column
   * @return string
   */
  public function createKey($column = 'key')
  {
    while (true) {
      $key = strtolower(md5(microtime() . config('key')));
      try {
        call_user_func_array([$this->tableName, 'where'], [$column, '=', $key])->firstOrFail();
      }
      catch (\Exception $e) {
        break;
      }
      sleep(0.1);
    }

    return $key;
  }
}