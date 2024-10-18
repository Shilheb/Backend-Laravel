<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    public function scategories(){
        return $this->hasMany(Scategorie::class,"categorieID");
    }
    protected $fillable = [
        'nomcategorie','imagecategorie'
    ];
}
