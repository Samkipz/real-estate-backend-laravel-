<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    public function commentCreator()
    {
        return $this->belongsTo( User::class, 'user_id', 'id');
    }

    public function commentIssue()
    {
        return $this->belongsTo( Issue::class, 'issue_id', 'id');
    }

}
