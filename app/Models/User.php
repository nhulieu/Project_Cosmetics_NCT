<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = "user";
    protected $fillable = ['id', 'fname', 'lname', 'email', 'phone', 'username', 'password', 'address', 'token', 'active', 'amount_spend', 'type', 'updated_at', 'created_at', 'retired'];
    public $timestamps = true;

    function UserType()
    {
        switch ($this->type) {
            case 1:
                return "Admin";
                break;

            case 2:
                return "User";
                break;

            default:
                # code...
                break;
        }
    }

    public function orders()
    {
        return $this->hasMany(order::class);
    }
}
