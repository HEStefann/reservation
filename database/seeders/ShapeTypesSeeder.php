<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShapeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sql = "
            INSERT INTO `shape_types` (`id`, `IdShapeGroup`, `Description`, `Active`, `CreatedBy`, `ModifiedBy`, `created_at`, `updated_at`, `deleted_at`) VALUES
            (1, 1, 'Squere', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (2, 1, 'Circle', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (3, 1, 'Half circle up', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (4, 1, 'Half circle down', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (5, 1, 'Half circle right', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (6, 1, 'Half circle left', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (8, 4, 'No background', 1, 'sa', NULL, '2022-01-10 07:59:48', NULL, NULL),
            (9, 4, 'Square', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (10, 4, 'Round', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (11, 2, 'Default', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (12, 2, 'Entrance', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (13, 2, 'Internal doorway', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (14, 2, 'Emergency exit', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (15, 2, 'Kitchen', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (16, 2, 'Stairway', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL),
            (17, 2, 'Reception', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL), (18, 2, 'Bar', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL), (19, 2, 'Pos', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL), (20, 2, 'Network', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL), (21, 3, 'HorisontalLine', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL), (22, 3, 'VerticalLine', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL), (23, 2, 'Counter Sales', 1, 'sa', NULL, '2020-12-29 14:22:50', NULL, NULL), (24, 2, 'Chair', 1, 'sa', NULL, '2021-12-27 08:55:38', NULL, NULL), (25, 2, 'Plant', 1, 'sa', NULL, '2021-12-27 08:55:50', NULL, NULL), (30, 5, 'Left', 1, 'sa', NULL, '2022-01-14 09:30:55', NULL, NULL), (31, 5, 'Up', 1, 'sa', NULL, '2022-01-14 09:31:13', NULL, NULL), (32, 5, 'Right', 1, 'sa', NULL, '2022-01-14 09:31:26', NULL, NULL), (33, 5, 'Down', 1, 'sa', NULL, '2022-01-14 09:31:35', NULL, NULL); ";
            DB::statement($sql);
        }

}
