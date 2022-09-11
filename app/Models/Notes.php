<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;

    protected $table = 'notes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['title', 'content'];

    public function addColor($id, $color){
        Notes_Props::create([
            'notes_id' => $id,
            'color' => $color
        ]);
    }

    public function props(){
        return $this->hasOne(Notes_Props::class);
    }
}
