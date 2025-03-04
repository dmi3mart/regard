<?php

namespace App\Models;

class Order extends Model
{

    /**
     * @return mixed
     * Мы можем определить eager-loading и
     * "глобально" на уровне модели. Но в данной реализации
     * используется метод ->with() в контроллере
     */
    //public $with = ['manager'];

    public function manager()
    {
        return $this->hasOne(App\Models\Manager::class);
    }

}