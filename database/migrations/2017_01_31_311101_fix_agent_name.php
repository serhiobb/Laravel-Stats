<?php

use Illuminate\Database\Schema\Blueprint;
use PragmaRX\Tracker\Support\Migration;

class FixAgentName extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_agents';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        try {
//            $this->builder->table(
//                $this->table,
//                function ($table) {
//                    $table->dropUnique('tracker_agents_name_unique');
//                }
//            );

            $this->builder->table(
                $this->table,
                function ($table) {
                    /** @var $table Blueprint */
                    $table->text('name')->change();//->unique()->change();
                }
            );
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        try {
            $this->builder->table(
                $this->table,
                function ($table) {
                    $table->string('name', 255)->change();
                    $table->unique('name');
                }
            );
        } catch (\Exception $e) {
        }
    }
}
