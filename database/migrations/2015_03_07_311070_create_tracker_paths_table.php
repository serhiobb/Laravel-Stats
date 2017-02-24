<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\MySqlBuilder;
use PragmaRX\Tracker\Support\Migration;

class CreateTrackerPathsTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_paths';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        $builder = $this->builder;

        /** @var $builder MySqlBuilder*/
        $builder->create(
            $this->table,
            function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('path')->index();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        $this->drop($this->table);
    }
}
