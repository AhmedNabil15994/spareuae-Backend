<?php

namespace Modules\Apps\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Authorization\Database\Seeders\PermissionsSeederTableSeeder;
use Modules\Authorization\Database\Seeders\RoleSeederTableSeeder;
use Modules\Donations\Entities\DonationStatus;
use Modules\User\Entities\User;

class SetupAppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        Model::unguard();
        (new PermissionsSeederTableSeeder())->run();
        (new RoleSeederTableSeeder())->run();
        $this->insertUserRole($this->insertUser());
        DB::commit();
    }

    private function insertUser()
    {
        return User::create([
            'name' => 'Ahmed Nabil',
            'mobile' => '201558651994',
            'email' => 'admin@spare.com',
            'password' => "111111",
        ]);
    }

    private function insertUserRole($user)
    {
        $user->assignRole(['super-admin']);
    }
}
