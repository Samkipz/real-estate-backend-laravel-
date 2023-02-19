<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'project_id',
        'tenant_id',
    ];
    public function project(){
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
    public function tenant(){
        return $this->belongsTo(ProjectUnit::class, 'tenant_id', 'id');
    }
}
