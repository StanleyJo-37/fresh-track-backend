<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AssetRelation extends Model
{
    /** @use HasFactory<\Database\Factories\AssetRelationFactory> */
    use HasFactory;

    protected $table = 'asset_relations';

    protected $fillable = [
        'asset_id',
        'model_type',
        'model_id'
    ];

    public function asset_relation(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'model_type', 'model_id');
    }

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
