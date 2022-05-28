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
        $semestre->grupos()->create(['grupo' => '101', 'jefe_de_grupo' => 'Jefe 1', 'total' => 40]);
        $semestre->grupos()->create(['grupo' => '102', 'jefe_de_grupo' => 'Jefe 2', 'total' => 40]);
        $semestre = Semestre::create(['semestre' => 'Segundo']);
        $semestre->grupos()->create(['grupo' => '201', 'jefe_de_grupo' => 'Jefe 1', 'total' => 40]);
        $semestre->grupos()->create(['grupo' => '202', 'jefe_de_grupo' => 'Jefe 2', 'total' => 40]);
        $semestre = Semestre::create(['semestre' => 'Tercero']);
        $semestre->grupos()->create(['grupo' => '301', 'jefe_de_grupo' => 'Jefe 1', 'total' => 40]);
        $semestre->grupos()->create(['grupo' => '302', 'jefe_de_grupo' => 'Jefe 2', 'total' => 40]);
        $semestre = Semestre::create(['semestre' => 'Cuarto']);
        $semestre->grupos()->create(['grupo' => '401', 'jefe_de_grupo' => 'Jefe 1', 'total' => 40]);
        $semestre->grupos()->create(['grupo' => '402', 'jefe_de_grupo' => 'Jefe 2', 'total' => 40]);
        $semestre = Semestre::create(['semestre' => 'Quinto']);
        $semestre->grupos()->create(['grupo' => '501', 'jefe_de_grupo' => 'Jefe 1', 'total' => 40]);
        $semestre->grupos()->create(['grupo' => '502', 'jefe_de_grupo' => 'Jefe 2', 'total' => 40]);
        $semestre = Semestre::create(['semestre' => 'Sexto']);
        $semestre->grupos()->create(['grupo' => '601', 'jefe_de_grupo' => 'Jefe 1', 'total' => 40]);
        $semestre->grupos()->create(['grupo' => '602', 'jefe_de_grupo' => 'Jefe 2', 'total' => 40]);
        $semestre = Semestre::create(['semestre' => 'Septimo']);
        $semestre->grupos()->create(['grupo' => '701', 'jefe_de_grupo' => 'Jefe 1', 'total' => 40]);
        $semestre->grupos()->create(['grupo' => '702', 'jefe_de_grupo' => 'Jefe 2', 'total' => 40]);
        $semestre = Semestre::create(['semestre' => 'Octavo']);
        $semestre->grupos()->create(['grupo' => '801', 'jefe_de_grupo' => 'Jefe 1', 'total' => 40]);
        $semestre->grupos()->create(['grupo' => '802', 'jefe_de_grupo' => 'Jefe 2', 'total' => 40]);
        $semestre = Semestre::create(['semestre' => 'Noveno']);
        $semestre->grupos()->create(['grupo' => '901', 'jefe_de_grupo' => 'Jefe 1', 'total' => 40]);
        $semestre->grupos()->create(['grupo' => '902', 'jefe_de_grupo' => 'Jefe 2', 'total' => 40]);
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
        Maestro::create([
            'uid' => 'ALR-N01',
            'docente' => ' Mtra. Ana Luisa Ramírez Noriega',
            'grado_de_estudios' => 'Licenciada en Informática',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'ESB-002',
            'docente' => ' Ing. Ernesto Segundo Bartolo',
            'grado_de_estudios' => 'Ingeniero en Computación',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'GRJ-003',
            'docente' => ' Mtra. Guillermina Reyes Juárez',
            'grado_de_estudios' => 'Licenciada en Informática',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'ARG-004',
            'docente' => ' Mtro. Alex Ramírez Galindo',
            'grado_de_estudios' => 'Ingeniero en Computación',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'JLG-M05',
            'docente' => ' Ing. Jóse Luis García Morales',
            'grado_de_estudios' => 'Ingeniero en Computación',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'LAG-F06',
            'docente' => ' Ing. Luis Angel Gonzalez Flores',
            'grado_de_estudios' => 'Ingeniero en Computacón',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'AHC-007',
            'docente' => ' L.I.A Azucena Hernández Crisóstomo',
            'grado_de_estudios' => 'Licenciada en Informática Administrativa',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'AFE-R10',
            'docente' => ' Mtro. Andrés Felipe Eguía Rodríguez',
            'grado_de_estudios' => 'Ingeniero Industrial',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'MPS-G11',
            'docente' => ' Mtra. Martha Patricia Sanchez Guadarrama',
            'grado_de_estudios' => 'Licenciada en Contaduria',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'LKV-M12',
            'docente' => ' L.I.A Lila Karen Velazquez Modesto',
            'grado_de_estudios' => 'Licenciada en Informática',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'RNL-008',
            'docente' => ' Mtro. Rául Nava López',
            'grado_de_estudios' => 'Ingeniero en Computación',
            'division' => 'Informatica'
        ]);
        Maestro::create([
            'uid' => 'BMG-009',
            'docente' => ' Mtra. Brenda Miranda García',
            'grado_de_estudios' => 'Ingeniera en Sistemas Computacionales',
            'division' => 'Informatica'
        ]);
        $materia = Materia::create([
            'clave' => 'AEB-1011',
            'materia' => ' Desarrollo de Aplicaciones para Dispositivos Móviles',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 8,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFC-1021',
            'materia' => ' Seguridad Informática',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 8,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'AEF-1041',
            'materia' => ' Matemáticas Discretas',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 2,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFF-1012',
            'materia' => ' Estrategías de Gestión de Servicios de TI',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 8,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFD-1013',
            'materia' => ' Física para Informática',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 2,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFD-1011',
            'materia' => ' Desarrollo e Implementación de Sistemas de Información',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 6,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'ISH-2104',
            'materia' => ' Desarrollo Integral de Software',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 8,
            'especialidad' => 'Si',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'ACF-0902',
            'materia' => ' Cálculo Integral',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 2,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFF-1018',
            'materia' => ' Investigación de Operaciones',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 4,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'AEC-1008',
            'materia' => ' Contabilidad Financiera',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 2,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFD-1023',
            'materia' => ' Taller de Emprendedores',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 8,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'AEC-1034',
            'materia' => ' Fundamentos de Telecomunicaciones',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 4,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFM-1017',
            'materia' => ' Interconectividad de Redes',
            'creditos' => '6',
            'carrera' => 'Informatica',
            'horas' => '6',
            'semestre_id' => 6,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'AEA-1063',
            'materia' => ' Taller de Base de Datos',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 6,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFF-1016',
            'materia' => ' Inteligencia de Negocios',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 8,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'AEB-1054',
            'materia' => ' Programación Orientada a Objetos',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 2,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFD-1006',
            'materia' => ' Arquitectura de Computadoras',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 4,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFD-1006',
            'materia' => ' Administración de los Recursos y Función Informática',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 2,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'ISP-2101',
            'materia' => ' Fundamentos de Ingeniería de Software',
            'creditos' => '3',
            'carrera' => 'Informatica',
            'horas' => '3',
            'semestre_id' => 6,
            'especialidad' => 'SI',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFD-1010',
            'materia' => ' Desarrollo de Aplicaciones Web',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 6,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFF-1003',
            'materia' => ' Administración y Organización de Datos',
            'creditos' => '5',
            'carrera' => 'Informatica',
            'horas' => '5',
            'semestre_id' => 4,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'ISH-2103',
            'materia' => ' Arquitectura y Diseño del Software',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 8,
            'especialidad' => 'SI',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'ACA-0909',
            'materia' => ' Taller de Investigación 1',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 4,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'IFH-1007',
            'materia' => ' Auditoría Informática',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 6,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
        $materia = Materia::create([
            'clave' => 'AEC-1061',
            'materia' => ' Sistemas Operativos',
            'creditos' => '4',
            'carrera' => 'Informatica',
            'horas' => '4',
            'semestre_id' => 4,
            'especialidad' => 'Ninguna',
        ]);
        foreach ($materia->semestre->grupos as $item) {
            $materia->materiaGrupos()->create(['grupo_id' => $item->id]);
        }
    }
}
