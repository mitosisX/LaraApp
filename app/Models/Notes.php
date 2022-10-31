<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Notes_Props;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Notes extends Model
{
    use HasFactory;

    protected $table = 'notes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['note_title', 'content'];

    protected $casts = [
        'title'=>'boolean'
    ];

    public function addColor($id, $color){
        Notes_Props::create([
            'notes_id' => $id,
            'color' => $color
        ]);
    }

    protected function title():Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes)=>Str::upper($value),
        );
    }

    protected function content():Attribute
    {
        return Attribute::make(
            get: fn ($value) => "> {$value}",
        );
    }

    public function props(){
        return $this->hasOne(Notes_Props::class);
    }
}