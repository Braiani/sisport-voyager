<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $guarded = [];
    
    protected $portarias = true;

    public function coordenacao()
    {
        return $this->belongsTo(Coordenacao::class, 'id');
    }

    public function portarias()
    {
        return $this->belongsToMany(Portaria::class, 'pessoas_portarias')
                    ->withPivot('data_relatorio', 'entregou_relatorio', 'declaracao')
                    ->using(PessoasPortariaPivot::class);
    }
    
    public function usuario()
    {
        return $this->hasOne(User::class);
    }

    public function getPessoaCoordenacaoAttribute()
    {
        return $this->coordenacao;
    }
}
