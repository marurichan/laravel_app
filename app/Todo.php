<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $table = 'todos';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',    //inputタグのキーと一致しているか
        'user_id'
    ];
    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }

}
