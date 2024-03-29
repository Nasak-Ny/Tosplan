<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspacePermission extends Model
{
    use HasFactory;

    protected $table='workspace_permission';
    public $timestamps = false;
    protected $fillable = [
        'workspace_id',
        'user_id',
    ];
}
