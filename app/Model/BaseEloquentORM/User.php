<?php

namespace App\Model\BaseEloquentORM;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'base_eloquent_orm_users';
    public $timestamps = false;

}
