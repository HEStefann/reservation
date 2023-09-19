<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackgroundTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sql = "
            INSERT INTO `background_types` (`id`, `Description`, `Active`, `CreatedBy`, `ModifiedBy`, `created_at`, `updated_at`, `deleted_at`) VALUES
            (1, 'Image', 1, 'sa', NULL, '2021-12-27 11:03:12', NULL, NULL),
            (2, 'Colour', 1, 'sa', NULL, '2021-12-29 09:22:27', NULL, NULL)
        ";

        DB::statement($sql);
    }
}
