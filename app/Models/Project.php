<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'image',
        'address',
        'creator_id',
        'admin_id'
    ];
    public function projectUnits()
    {
        return $this->hasMany( ProjectUnit::class, 'project_id', 'id');
    }
    public function admin()
    {
        return $this->belongsTo( User::class, 'admin_id', 'id');
    }
    public function creator()
    {
        return $this->belongsTo( User::class, 'creator_id', 'id');
    }



}
