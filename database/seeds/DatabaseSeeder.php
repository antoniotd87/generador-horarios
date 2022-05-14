<?php

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
        $primerSemestre = Semestre::create([
            'semestre' => 'Primero'
        ]);
        $segundoSemestre = Semestre::create([
            'semestre' => 'Segundo'
        ]);
        $primerSemestre->grupos()->create(['grupo' => '101','jefe_de_grupo'=>'Jefe 1','total'=>40]);
        $primerSemestre->grupos()->create(['grupo' => '102','jefe_de_grupo'=>'Jefe 2','total'=>40]);
        $segundoSemestre->grupos()->create(['grupo' => '201','jefe_de_grupo'=>'Jefe 3','total'=>40]);
        $segundoSemestre->grupos()->create(['grupo' => '202','jefe_de_grupo'=>'Jefe 4','total'=>40]);

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
