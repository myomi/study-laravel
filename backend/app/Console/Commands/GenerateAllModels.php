<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Doctrine\Common\Inflector\Inflector;

class GenerateAllModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'krlove:generate:all-models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all models';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $tables = DB::select('SHOW TABLES');
        // $databaseName = config('database.connections.'.config('database.default').'.database');
        // $tables = collect($tables);
        // $tables = $tables->pluck('Tables_in_'.$databaseName);
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        foreach($tables as $table)
        {
            if($table === 'migrations') continue;
            // $className = Str::camel(Str::singular($table));
            // $className = ucfirst($className);
            $className = Inflector::classify(Str::singular($table));
            Artisan::call('krlove:generate:model', ['class-name' => $className, '--table-name' => $table]);
        }
    }
}