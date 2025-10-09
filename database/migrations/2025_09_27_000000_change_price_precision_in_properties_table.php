<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ChangePricePrecisionInPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Use raw ALTER statements so we don't need doctrine/dbal.
     * Supports MySQL/MariaDB and PostgreSQL. SQLite requires manual intervention.
     *
     * @return void
     */
    public function up()
    {
        $driver = DB::getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME);

        if (in_array($driver, ['mysql', 'mysqli'])) {
            // MySQL/MariaDB: change column using MODIFY
            DB::statement("ALTER TABLE `properties` MODIFY `price` DECIMAL(12,2) NOT NULL");
        } elseif ($driver === 'pgsql') {
            // PostgreSQL: alter column type
            DB::statement('ALTER TABLE properties ALTER COLUMN price TYPE DECIMAL(12,2)');
        } else {
            throw new \RuntimeException("Database driver '{$driver}' is not supported by this migration. Please alter the `price` column manually.");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $driver = DB::getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME);

        if (in_array($driver, ['mysql', 'mysqli'])) {
            DB::statement("ALTER TABLE `properties` MODIFY `price` DOUBLE(8,2) NOT NULL");
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE properties ALTER COLUMN price TYPE DOUBLE PRECISION');
        } else {
            throw new \RuntimeException("Database driver '{$driver}' is not supported by this migration revert. Please revert the `price` column manually.");
        }
    }
}
