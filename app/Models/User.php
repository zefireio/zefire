<?php

namespace App\Models;

use Zefire\Database\Model;

class User extends Model
{
    protected $connection = 'mysql1';

    protected $table = 'user';

    protected $model = '\\App\\Models\User';

    public static function boot()
    {
        $model = get_class();
        return new $model();
    }
}