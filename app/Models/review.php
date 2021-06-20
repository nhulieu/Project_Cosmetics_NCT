<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = "review";
    protected $fillable = ['id', 'mark', 'content', 'product_id', 'user_id', 'created_at', 'update_at', 'retired'];
    public $timestamps = true;

    function User()
    {
        $user = user::find($this->user_id);
        return $user->fname . " " . $user->lname;
    }
}
