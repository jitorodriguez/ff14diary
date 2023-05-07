<?php

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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("shortname")->unique();
            $table->string("role");
            $table->timestamps();
        });

        $defaultData = [
            //Tank
            ['name' => 'Paladin', 'shortname' => 'PLD', 'role' => 'Tank'],
            ['name' => 'Warrior', 'shortname' => 'WAR', 'role' => 'Tank'],
            ['name' => 'Dark Knight', 'shortname' => 'DRK', 'role' => 'Tank'],
            ['name' => 'Gun Breaker', 'shortname' => 'GNB', 'role' => 'Tank'],
            //Healer
            ['name' => 'White Mage', 'shortname' => 'WHM', 'role' => 'Healer'],
            ['name' => 'Scholar', 'shortname' => 'SCH', 'role' => 'Healer'],
            ['name' => 'Astrologian', 'shortname' => 'AST', 'role' => 'Healer'],
            ['name' => 'Sage', 'shortname' => 'SGE', 'role' => 'Healer'],
            //DPS - Melee
            ['name' => 'Monk', 'shortname' => 'MNK', 'role' => 'DPS'],
            ['name' => 'Dragoon', 'shortname' => 'DRG', 'role' => 'DPS'],
            ['name' => 'Ninja', 'shortname' => 'NIN', 'role' => 'DPS'],
            ['name' => 'Samurai', 'shortname' => 'SAM', 'role' => 'DPS'],
            ['name' => 'Reaper', 'shortname' => 'RPR', 'role' => 'DPS'],
            //DPS - Physical Ranged
            ['name' => 'Bard', 'shortname' => 'BRD', 'role' => 'DPS'],
            ['name' => 'Machinist', 'shortname' => 'MCH', 'role' => 'DPS'],
            ['name' => 'Dancer', 'shortname' => 'DNC', 'role' => 'DPS'],
            //DPS - Magical Ranged
            ['name' => 'Black Mage', 'shortname' => 'BLM', 'role' => 'DPS'],
            ['name' => 'Summoner', 'shortname' => 'SMN', 'role' => 'DPS'],
            ['name' => 'Red Mage', 'shortname' => 'RDM', 'role' => 'DPS'],
            ['name' => 'Blue Mage', 'shortname' => 'BLU', 'role' => 'DPS'],
        ];

        DB::table('jobs')->insert($defaultData);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
