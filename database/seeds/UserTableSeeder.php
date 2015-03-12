<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Newlywedgame\User;

class UserTableSeeder extends Seeder {

    public function run()
	{
		DB::table('users')->delete();

		User::create([
			'name' => 'Abinadi',
			'email' => 'unknown_dave@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'male',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Brett',
			'email' => 'unknown_dave@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'male',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Dave',
			'email' => 'unknown_dave@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'male',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Ed',
			'email' => 'unknown_ed@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'male',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Emma',
			'email' => 'unknown_emma@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'female',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Gussy',
			'email' => 'unknown_gussy@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'female',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Heidi',
			'email' => 'unknown_heidi@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'female',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Molly',
			'email' => 'unknown_dave@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'female',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Natalie',
			'email' => 'unknown_dave@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'female',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Rigo',
			'email' => 'unknown_rigo@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'male',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Stephanie',
			'email' => 'unknown_stephanie@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'female',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);

		User::create([
			'name' => 'Tom',
			'email' => 'unknown_dave@gmail.com',
			'password' => 'godzilla',
			'locked_in' => false,
			'spouse_id' => null,
			'gender' => 'male',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);
	}
}
