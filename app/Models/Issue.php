<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $fillable = [
        'issue_number',
        'issue_type_id',
        'title',
        'description',
        'creator_id',
        'project_units_id',
        'resolved',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function issueCreator()
    {
        return $this->belongsTo( User::class, 'creator_id', 'id');
    }

    public function issueType()
    {
        return $this->belongsTo(IssueType::class, 'issue_type_id', 'id');
    }

    public function issueUnit()
    {
        return $this->belongsTo(ProjectUnit::class, 'project_units_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany( Comment::class, 'issue_id', 'id');
    }

}
