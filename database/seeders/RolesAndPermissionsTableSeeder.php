<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();

        $editOffices        = Permission::create(['name'=>'edit offices']);
        $deleteOffices      = Permission::create(['name'=>'delete offices']);
        $editCommodities    = Permission::create(['name'=>'edit commodities']);
        $deleteCommodities  = Permission::create(['name'=>'delete commodities']);
        $editFocals         = Permission::create(['name'=>'edit focals']);
        $deleteFocals       = Permission::create(['name'=>'delete focals']);
        $editReports        = Permission::create(['name'=>'edit progress reports']);
        $deleteReports      = Permission::create(['name'=>'delete progress reports']);
        $editUpdates        = Permission::create(['name'=>'edit roadmap updates']);
        $deleteUpdates      = Permission::create(['name'=>'delete roadmap updates']);
        $editRoadmaps       = Permission::create(['name'=>'edit roadmaps']);
        $deleteRoadmaps     = Permission::create(['name'=>'delete roadmaps']);
        $editSections       = Permission::create(['name'=>'edit sections']);
        $deleteSections     = Permission::create(['name'=>'delete sections']);
        $editCompliance     = Permission::create(['name'=>'edit compliance reviews']);
        $deleteCompliance   = Permission::create(['name'=>'delete compliance reviews']);
        $editPeriods        = Permission::create(['name'=>'edit report periods']);
        $deletePeriods      = Permission::create(['name'=>'delete report periods']);
        $manageRoles        = Permission::create(['name' => 'manage roles']);
        $managePermissions  = Permission::create(['name' => 'manage permissions']);
        $manageUsers        = Permission::create(['name' => 'manage users']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        User::find(1)->assignRole($admin);

        Schema::disableForeignKeyConstraints();
    }
}
