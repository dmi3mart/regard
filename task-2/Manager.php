<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $fullName
 */
class Manager extends Model
{
    protected $appends = ['fullName'];

    public function orders()
    {
        return $this->hasMany(App\Models\Order::class);
    }

    /**
     * @return Attribute
     */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->firstName} {$this->lastName}"
        );
    }
}