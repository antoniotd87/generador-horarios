<?php

use App\Models\Aula;
use App\Models\Dia;
use App\Models\Hora;
use App\Models\Maestro;
use App\Models\Materia;
use App\Models\Semestre;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Daniel',
            'email' => 'daniel@generador.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'fheruifbus',
        ]);

        $semestre = Semestre::create(['semestre' => 'Primero']);
        $semestre->grupos()->create(['grupo' => '101','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $semestre->grupos()->create(['grupo' => '102','jefe_de_grupo'=>'Jefe 2','total'=>40]);
        $semestre = Semestre::create(['semestre' => 'Segundo']);
        $semestre->grupos()->create(['grupo' => '201','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $semestre->grupos()->create(['grupo' => '202','jefe_de_grupo'=>'Jefe 2','total'=>40]);
        $semestre = Semestre::create(['semestre' => 'Tercero']);
        $semestre->grupos()->create(['grupo' => '301','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $semestre->grupos()->create(['grupo' => '302','jefe_de_grupo'=>'Jefe 2','total'=>40]);
        $semestre = Semestre::create(['semestre' => 'Cuarto']);
        $semestre->grupos()->create(['grupo' => '401','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $semestre->grupos()->create(['grupo' => '402','jefe_de_grupo'=>'Jefe 2','total'=>40]);
        $semestre = Semestre::create(['semestre' => 'Quinto']);
        $semestre->grupos()->create(['grupo' => '501','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $semestre->grupos()->create(['grupo' => '502','jefe_de_grupo'=>'Jefe 2','total'=>40]);
        $semestre = Semestre::create(['semestre' => 'Sexto']);
        $semestre->grupos()->create(['grupo' => '601','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $semestre->grupos()->create(['grupo' => '602','jefe_de_grupo'=>'Jefe 2','total'=>40]);
        $semestre = Semestre::create(['semestre' => 'Septimo']);
        $semestre->grupos()->create(['grupo' => '701','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $semestre->grupos()->create(['grupo' => '702','jefe_de_grupo'=>'Jefe 2','total'=>40]);
        $semestre = Semestre::create(['semestre' => 'Octavo']);
        $semestre->grupos()->create(['grupo' => '801','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $semestre->grupos()->create(['grupo' => '802','jefe_de_grupo'=>'Jefe 2','total'=>40]);
        $semestre = Semestre::create(['semestre' => 'Noveno']);
        $semestre->grupos()->create(['grupo' => '901','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $semestre->grupos()->create(['grupo' => '902','jefe_de_grupo'=>'Jefe 2','total'=>40]);

        Hora::create(['hora' => '7:00 AM']);
        Hora::create(['hora' => '8:00 AM']);
        Hora::create(['hora' => '9:00 AM']);
        Hora::create(['hora' => '10:00 AM']);
        Hora::create(['hora' => '11:00 AM']);
        Hora::create(['hora' => '12:00 PM']);
        Hora::create(['hora' => '13:00 PM']);
        Hora::create(['hora' => '14:00 PM']);
        Hora::create(['hora' => '15:00 PM']);
        Hora::create(['hora' => '16:00 PM']);
        Hora::create(['hora' => '17:00 PM']);
        Hora::create(['hora' => '18:00 PM']);

        Dia::create(['dia' => 'Lunes']);
        Dia::create(['dia' => 'Martes']);
        Dia::create(['dia' => 'Miercoles']);
        Dia::create(['dia' => 'Jueves']);
        Dia::create(['dia' => 'Viernes']);

        Aula::create(['aula' => 'Aula 1']);
        Aula::create(['aula' => 'Aula 2']);
        Aula::create(['aula' => 'Aula 3']);
        Aula::create(['aula' => 'Aula 4']);
        Aula::create(['aula' => 'Aula 5']);
        Aula::create(['aula' => 'Aula 6']);
        Aula::create(['aula' => 'Aula 7']);

        $materia = Materia::create([
            'clave' => 'UL-003',
            'materia' => 'Administracion Para Informatica',
            'creditos' => '6',
            'carrera' => 'Informatica',
            'horas' => '6',
            'semestre_id' => 1,
            'especialidad' => 'IS',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'UZA-103',
            'materia' => 'Fundamentos de Ing de Software',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 1,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia =  Materia::create([
            'clave' => 'AL-023',
            'materia' => 'Algebra Lineal',
            'creditos' => '6',
            'carrera' => 'Informatica',
            'horas' => '6',
            'semestre_id' => 2,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        Maestro::create([
            'uid' => 'JHG-43',
            'docente' => 'Azucena',
            'grado_de_estudios' => 'Licenciatura',
            'division' => 'Informatica'
        ]);
    }
}
