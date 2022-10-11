<?php

namespace WebWhales\DlfHackaton2022\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;
use WebWhales\DlfHackaton2022\DlfHackaton2022ServiceProvider;
use WebWhales\DlfHackaton2022\Models\Locale;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'WebWhales\\DlfHackaton2022\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            DlfHackaton2022ServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $this->migrateTables();
    }

    private function migrateTables(): void
    {
        $migrations = [
            'create_locales_table',
            'create_model_translations_table',
        ];

        foreach ($migrations as $migration) {
            $migration = include __DIR__."/../database/migrations/$migration.php";
            $migration->up();
        }

        Schema::create('test_models', function (Blueprint $table) {
            $table->increments('id');
            //$table->multilingual();
            $table->foreignIdFor(Locale::class);
            $table->text('name')->nullable();
        });
    }
}
