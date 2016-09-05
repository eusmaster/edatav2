<?php

namespace App\Repositories;

use App\User;

class CeduladosRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function Buscar(integer $ci)
    {
        return $users = DB::table('cedulados')->where('cedula', '=',$ci)->get();
    }  
}
