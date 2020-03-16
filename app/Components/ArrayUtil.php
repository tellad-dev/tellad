<?php
namespace App\Components;

class ArrayUtil
{
    /**
     * 配列のキーをキャメルケースへ変換    
     *
     * @param  array $array
     * @return array $results
     */
    function camelizeKey(array $array)
    {
        $results = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $results[camel_case($key)] = $this->camelizeKey($value);
            }
            else {
                $results[camel_case($key)] = $value;
            }
        }
        return $results;
    }

    /**
     * 配列のキーをスネークケースへ変換    
     *
     * @param  array $array
     * @return array $results
     */
    function snakelizeKey(array $array)
    {
        $results = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $results[snake_case($key)] = $this->snakelizeKey($value);
            }
            else {
                $results[snake_case($key)] = $value;
            }
        }
        return $results;
    }

    /**
     * 配列の文字列をエスケープ文字へ変換
     * 
     * @param  array $array
     * @return array $results
     */
    function addSlashesStrings(array $array)
    {
        $results = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $results[$key] = $this->addSlashesStrings($value);
            }
            else {
                $results[$key] = addslashes($value);
            }
        }
        return $results;
    }

    /**
     * array1とarray2の差分を返す
     *
     * @param  array $array1
     * @param  array $array2
     * @return array $difference
     */
    function compare(array $array1, array $array2) 
    { 
        foreach ($array1 as $key => $value) { 
            if (is_array($value)) { 
                if (!isset($array2[$key])) { 
                    $difference[$key] = $value; 
                } 
                elseif (!is_array($array2[$key])) { 
                    $difference[$key] = $value; 
                } 
                else { 
                    $new_diff = $this->compare($value, $array2[$key]); 
                    if ($new_diff != false) { 
                        $difference[$key] = $new_diff; 
                    } 
                } 
            } 
            elseif (!isset($array2[$key]) || $array2[$key] != $value) { 
                $difference[$key] = $value; 
            } 
        } 

        return $difference ?? null; 
    }

    /**
     * Objectを連想配列に変換する
     *
     * @param  Object $object
     * @return array
     */
    function convertObjectToArray($object) 
    { 
        return json_decode(json_encode($object), true);
    }

    /**
     * 配列の中身にnl2br(e())処理をかける
     *
     * @param  array $array
     * @return array $results
     */
    function nl2brE(array $array)
    {
        $results = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $results[$key] = $this->nl2brE($value);
            }
            else {
                $results[$key] = nl2br(e($value));
            }
        }
        return $results;
    }
}
