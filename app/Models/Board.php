<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $table='boards';

    protected $fillable = [
        'workspace_id',
        'name',
        'last_visited',
    ];

    public function ListModel()
    {
        return $this->hasMany(ListModel::class, 'board_id');
    }
}
