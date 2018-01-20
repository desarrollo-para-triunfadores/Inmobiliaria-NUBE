<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersRolesPermisosTableSeeder::class);
         $this->call(PaisesTableSeeder::class);
         $this->call(ProvinciasTableSeeder::class);
         $this->call(LocalidadesTableSeeder::class);
         $this->call(BarriosTableSeeder::class);
         $this->call(EdificiosTableSeeder::class);
         $this->call(PersonasTableSeeder::class);
         $this->call(TiposTableSeeder::class);
         $this->call(CaracteristicasTableSeeder::class);
         $this->call(InquilinosTableSeeder::class);
         $this->call(PropietariosTableSeeder::class);
         $this->call(GarantesTableSeeder::class);
      
         $this->call(InmueblesTableSeeder::class);
         $this->call(EspaciosTableSeeder::class);
         $this->call(ProyectosTableSeeder::class);
         $this->call(EdificiosCaracteristicasTableSeeder::class);
         $this->call(InmueblesCaracteristicasTableSeeder::class);
         $this->call(InmueblesImagenesTableSeeder::class); 
         $this->call(ServiciosTableSeeder::class);

         $this->call(EstadosOportunidadesTableSeeder::class);
         $this->call(OportunidadesTableSeeder::class);
       //  $this->call(VisitasTableSeeder::class);
         $this->call(ContratosTableSeeder::class);
         $this->call(ContratosServiciosTableSeeder::class);
         $this->call(ContratosPeriodosTableSeeder::class);

         $this->call(LiquidacionesMensualesTableSeeder::class);
         $this->call(ConceptosLiquidacionesMensualesTableSeeder::class);

       

    }
}
