<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShapeGroupTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sql = "
            INSERT INTO `shape_group_types` (`id`, `Description`, `Active`, `CreatedBy`, `ModifiedBy`, `created_at`, `updated_at`, `deleted_at`) VALUES
            (1, 'Table - interaction shape', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (2, 'Interior - noninteraction shape', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (3, 'Line shape', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (4, 'Interior design shape', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (5, 'Rotation side', 1, 'sa', NULL, '2022-01-14 09:29:59', NULL, NULL)
        ";

        DB::statement($sql);
    }
}
