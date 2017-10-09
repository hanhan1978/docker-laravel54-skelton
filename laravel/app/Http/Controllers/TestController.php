<?php
/**
 * Created by PhpStorm.
 * User: hanhan
 * Date: 2017/08/04
 * Time: 15:04
 */

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function show()
    {
        return 'This is test';
    }

    public function show_mysql_10000()
    {
        $tests = \App\Test::all();
        echo (count($tests));
        return 'This is test';
    }


    public function show_super_cache_10000()
    {

        $key = 'hoge10000';
        $fuga = $this->cache_get($key);
        if(!$fuga){
            $tests = \App\Test::take(10000)->get();
            $this->cache_set($key, $tests->toArray());
        }else{
            echo ("cache hit -> ".count($fuga));
        }
        return 'This is test super cache 10000';
    }

    private function cache_set($key, $val) {
        $val = var_export($val, true);
        // HHVM fails at __set_state, so just use object cast for now
        $val = str_replace('.*::__set_state', '(object)', $val);
        // Write to temp file first to ensure atomicity
        $tmp = "/tmp/$key." . uniqid('', true) . '.tmp';
        file_put_contents($tmp, '<?php $val = ' . $val . ';', LOCK_EX);
        rename($tmp, "/tmp/$key");
    }

    private function cache_get($key) {
        @include "/tmp/$key";
        return isset($val) ? $val : false;
    }
}