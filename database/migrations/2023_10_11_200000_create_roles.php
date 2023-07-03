<?php

use App\Models\LineaInvestigacion;
use App\Models\ProgramaAcademico;
use App\Models\StatusActividad;
use App\Models\TipoActividad;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        //Crea los Roles
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'usuario']);

        // Usuarios de Prueba admin/usuario
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'usuario',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('usuario123'),
        ]);

        $user = User::find(1);
        $user->assignRole($role1);

        $user2 = User::find(2);
        $user2->assignRole($role2);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_user');
    }
};
