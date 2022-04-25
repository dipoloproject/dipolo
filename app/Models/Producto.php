<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    use HasFactory;


    
    public static function Alta($argumentos) {

        echo("INGRESA AL MODELO<br><br>");
        
        $mensaje = DB::select('CALL sp_productos_alta_beta( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $argumentos);

        var_dump($mensaje[0]);
        echo("LUEGO DE LLAMAR AL STORE PROCEDURE"); exit;
        
        return $mensaje[0];
    }
}
