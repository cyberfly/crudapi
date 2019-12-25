<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin user

        $admin_users = [
            [
                'name' => 'administrator',
                'email' => 'admin@crudapi.test',
                'type' => 'a',
                'password' => Hash::make('admin123')
            ]
        ];

        if (!empty($admin_users)) {
            foreach ($admin_users as $admin_user) {

                $email = $admin_user['email'];

                $admin = User::whereEmail($email)->first();

                if (!$admin) {

                    // create user

                    $user = User::create($admin_user);

                    if ($user) {
                        // do something extra

                    }
                }
            }
        }

        echo "Admin Users Seeded";
    }
}
