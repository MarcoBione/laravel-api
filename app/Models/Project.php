<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description','type_id'];

    public function types():BelongsTo{

        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
