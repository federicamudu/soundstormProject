<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
        });
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@soundstorm.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->profile()->create([
            'is_admin' => true
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
        User::where('email', 'admin@soundstorm.com')->first()->delete();
    }
};
