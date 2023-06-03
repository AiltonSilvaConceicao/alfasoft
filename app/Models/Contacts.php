<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    /**
     * @var string $table
     * Define o nome da tabela
     */
    protected $table = 'contacts';

    /**
     * Constante que define o atributo de data de criação cadastro
     */
    public $timestamps = true;

    /**
     * @var array $fillable
     * Define as colunas da tabela que podem ser inseridas via formulário (form request)
     */
    protected $fillable = ['name', 'contact', 'email'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'contact' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => ['required', 'string', 'max:255'],
        'contact' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'max:255']
    ];

    /**
     * @var string $primaryKey
     * Define o nome da chave primária
     */
    protected $primaryKey = 'id';

    public function insertData($data)
    {
        return $this->create($data);
    }

    public function updateData($data, $id)
    {
        $dados = $this->find($id);

        return $dados->update($data);
    }

    public function deleteData($id)
    {
        $dados = $this->find($id);

        if ($dados) {
            return $dados->delete();
        }

        return null;
    }
}
