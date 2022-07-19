<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::transaction(function () {
                $user = new User();
                Log::info($user);
                $data = [
                    'name' => 'Admin',
                    'email' => 'admin@mail.com',
                    'password' => Hash::make('password'),
                    'type' => 1,
                    'create_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ];
                $user->fill($data)->save();
            });
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
