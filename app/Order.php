<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATE_BORROW = 0;
    const STATE_PAID = 1;
    const STATE_MONEY_BACK = 2;
    const STATE_RETURNED = 3;

    protected $fillable = [
        'file_id', 'stu_id', 'cloth', 'accessory',
    ];

    public function hasCloth()
    {
        return $this->hasOne('App\Cloth', 'id', 'cloth');
    }

    public function hasAccessory()
    {
        return $this->hasOne('App\Cloth', 'id', 'accessory');
    }

    public function hasUser()
    {
        return $this->hasOne('App\User', 'id', 'stu_id');
    }
}
