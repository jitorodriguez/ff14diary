<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Servers;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('datacenter');
            $table->string('name');
        });

        $defaultData = [
            // North America - Aether
            ['region' => 'North America', 'datacenter' => 'Aether', 'name' => 'Adamantoise'],
            ['region' => 'North America', 'datacenter' => 'Aether', 'name' => 'Cactuar'],
            ['region' => 'North America', 'datacenter' => 'Aether', 'name' => 'Faerie'],
            ['region' => 'North America', 'datacenter' => 'Aether', 'name' => 'Gilgamesh'],
            ['region' => 'North America', 'datacenter' => 'Aether', 'name' => 'Jenova'],
            ['region' => 'North America', 'datacenter' => 'Aether', 'name' => 'Midgardsormr'],
            ['region' => 'North America', 'datacenter' => 'Aether', 'name' => 'Sargatanas'],
            ['region' => 'North America', 'datacenter' => 'Aether', 'name' => 'Siren'],
            // North America - Crystal
            ['region' => 'North America', 'datacenter' => 'Crystal', 'name' => 'Balmung'],
            ['region' => 'North America', 'datacenter' => 'Crystal', 'name' => 'Brynhildr'],
            ['region' => 'North America', 'datacenter' => 'Crystal', 'name' => 'Coeurl'],
            ['region' => 'North America', 'datacenter' => 'Crystal', 'name' => 'Diabolos'],
            ['region' => 'North America', 'datacenter' => 'Crystal', 'name' => 'Goblin'],
            ['region' => 'North America', 'datacenter' => 'Crystal', 'name' => 'Malboro'],
            ['region' => 'North America', 'datacenter' => 'Crystal', 'name' => 'Mateus'],
            ['region' => 'North America', 'datacenter' => 'Crystal', 'name' => 'Zalera'],
            // North America - Dynamis
            ['region' => 'North America', 'datacenter' => 'Dynamis', 'name' => 'Halicarnassus'],
            ['region' => 'North America', 'datacenter' => 'Dynamis', 'name' => 'Maduin'],
            ['region' => 'North America', 'datacenter' => 'Dynamis', 'name' => 'Marilith'],
            ['region' => 'North America', 'datacenter' => 'Dynamis', 'name' => 'Seraph'],
            // North America - Primal
            ['region' => 'North America', 'datacenter' => 'Primal', 'name' => 'Behemoth'],
            ['region' => 'North America', 'datacenter' => 'Primal', 'name' => 'Excalibur'],
            ['region' => 'North America', 'datacenter' => 'Primal', 'name' => 'Exodus'],
            ['region' => 'North America', 'datacenter' => 'Primal', 'name' => 'Famfrit'],
            ['region' => 'North America', 'datacenter' => 'Primal', 'name' => 'Hyperion'],
            ['region' => 'North America', 'datacenter' => 'Primal', 'name' => 'Lamia'],
            ['region' => 'North America', 'datacenter' => 'Primal', 'name' => 'Leviathan'],
            ['region' => 'North America', 'datacenter' => 'Primal', 'name' => 'Ultros'],
            // European - Chaos
            ['region' => 'Europe', 'datacenter' => 'Chaos', 'name' => 'Ultros'],
            ['region' => 'Europe', 'datacenter' => 'Chaos', 'name' => 'Louisoix'],
            ['region' => 'Europe', 'datacenter' => 'Chaos', 'name' => 'Moogle'],
            ['region' => 'Europe', 'datacenter' => 'Chaos', 'name' => 'Omega'],
            ['region' => 'Europe', 'datacenter' => 'Chaos', 'name' => 'Phantom'],
            ['region' => 'Europe', 'datacenter' => 'Chaos', 'name' => 'Ragnarok'],
            ['region' => 'Europe', 'datacenter' => 'Chaos', 'name' => 'Sagittarius'],
            ['region' => 'Europe', 'datacenter' => 'Chaos', 'name' => 'Spriggan'],
            //European - Light
            ['region' => 'Europe', 'datacenter' => 'Light', 'name' => 'Alpha'],
            ['region' => 'Europe', 'datacenter' => 'Light', 'name' => 'Lich'],
            ['region' => 'Europe', 'datacenter' => 'Light', 'name' => 'Odin'],
            ['region' => 'Europe', 'datacenter' => 'Light', 'name' => 'Phoenix'],
            ['region' => 'Europe', 'datacenter' => 'Light', 'name' => 'Raiden'],
            ['region' => 'Europe', 'datacenter' => 'Light', 'name' => 'Shiva'],
            ['region' => 'Europe', 'datacenter' => 'Light', 'name' => 'Twintania'],
            ['region' => 'Europe', 'datacenter' => 'Light', 'name' => 'Zodiark'],
            //Oceanian - Materia
            ['region' => 'Oceanian', 'datacenter' => 'Materia', 'name' => 'Bismarck'],
            ['region' => 'Oceanian', 'datacenter' => 'Materia', 'name' => 'Ravana'],
            ['region' => 'Oceanian', 'datacenter' => 'Materia', 'name' => 'Sephirot'],
            ['region' => 'Oceanian', 'datacenter' => 'Materia', 'name' => 'Sophia'],
            ['region' => 'Oceanian', 'datacenter' => 'Materia', 'name' => 'Zurvan'],
            //Japanese - Elemental
            ['region' => 'Japan', 'datacenter' => 'Elemental', 'name' => 'Aegis'],
            ['region' => 'Japan', 'datacenter' => 'Elemental', 'name' => 'Atomos'],
            ['region' => 'Japan', 'datacenter' => 'Elemental', 'name' => 'Carbuncle'],
            ['region' => 'Japan', 'datacenter' => 'Elemental', 'name' => 'Garuda'],
            ['region' => 'Japan', 'datacenter' => 'Elemental', 'name' => 'Gungnir'],
            ['region' => 'Japan', 'datacenter' => 'Elemental', 'name' => 'Kujata'],
            ['region' => 'Japan', 'datacenter' => 'Elemental', 'name' => 'Tonberry'],
            ['region' => 'Japan', 'datacenter' => 'Elemental', 'name' => 'Typhon'],
            //Japanese - Gaia
            ['region' => 'Japan', 'datacenter' => 'Gaia', 'name' => 'Alexander'],
            ['region' => 'Japan', 'datacenter' => 'Gaia', 'name' => 'Bahamut'],
            ['region' => 'Japan', 'datacenter' => 'Gaia', 'name' => 'Durandal'],
            ['region' => 'Japan', 'datacenter' => 'Gaia', 'name' => 'Fenrir'],
            ['region' => 'Japan', 'datacenter' => 'Gaia', 'name' => 'Ifrit'],
            ['region' => 'Japan', 'datacenter' => 'Gaia', 'name' => 'Ridill'],
            ['region' => 'Japan', 'datacenter' => 'Gaia', 'name' => 'Tiamat'],
            ['region' => 'Japan', 'datacenter' => 'Gaia', 'name' => 'Ultima'],
            //Japanese - Mana
            ['region' => 'Japan', 'datacenter' => 'Mana', 'name' => 'Anima'],
            ['region' => 'Japan', 'datacenter' => 'Mana', 'name' => 'Asura'],
            ['region' => 'Japan', 'datacenter' => 'Mana', 'name' => 'Chocobo'],
            ['region' => 'Japan', 'datacenter' => 'Mana', 'name' => 'Hades'],
            ['region' => 'Japan', 'datacenter' => 'Mana', 'name' => 'Ixion'],
            ['region' => 'Japan', 'datacenter' => 'Mana', 'name' => 'Masamune'],
            ['region' => 'Japan', 'datacenter' => 'Mana', 'name' => 'Pandaemonium'],
            ['region' => 'Japan', 'datacenter' => 'Mana', 'name' => 'Titan'],
            //Japanese - Meteor
            ['region' => 'Japan', 'datacenter' => 'Meteor', 'name' => 'Belias'],
            ['region' => 'Japan', 'datacenter' => 'Meteor', 'name' => 'Mandragora'],
            ['region' => 'Japan', 'datacenter' => 'Meteor', 'name' => 'Ramuh'],
            ['region' => 'Japan', 'datacenter' => 'Meteor', 'name' => 'Shinryu'],
            ['region' => 'Japan', 'datacenter' => 'Meteor', 'name' => 'Unicorn'],
            ['region' => 'Japan', 'datacenter' => 'Meteor', 'name' => 'Valefor'],
            ['region' => 'Japan', 'datacenter' => 'Meteor', 'name' => 'Yojimbo'],
            ['region' => 'Japan', 'datacenter' => 'Meteor', 'name' => 'Zeromus'],
        ];

        DB::table('servers')->insert($defaultData);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
