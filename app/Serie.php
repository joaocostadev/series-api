<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $appends = ['Links'];

    public function getLinksAttribute() : array
    {
        return [
            'Self' => '/api/series/' . $this->id,
            'Episodios' => '/api/series/' . $this->id . '/episodios'
        ];
    }

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }
}
