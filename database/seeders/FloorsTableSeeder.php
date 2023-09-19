<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sql = "
            INSERT INTO floors (id, Description, DisplayOrder, Active, CreatedBy, ModifiedBy, created_at, updated_at, deleted_at, LineElements, PrinterName, IdBackground, Colour)
            VALUES
            (62, 'Test Section', 1, 0, 'pos_admin', 'pos_admin', '2021-12-22 08:48:25', '2021-12-22 15:33:36', NULL, NULL, NULL, NULL, NULL),
(63, '1st floor2', 1, 0, 'pos_admin', 'pos_admin', '2021-12-22 15:34:05', '2021-12-22 15:40:04', NULL, NULL, NULL, NULL, NULL),
(64, '1st floor', 1, 0, 'pos_admin', 'pos_admin', '2021-12-22 15:40:25', '2021-12-22 15:48:08', NULL, NULL, NULL, NULL, NULL),
(65, '1st floor', 1, 0, 'pos_admin', 'pos_admin', '2021-12-22 15:48:32', '2021-12-27 10:37:53', NULL, NULL, NULL, NULL, NULL),
(66, 'Test Section', 1, 0, 'pos_admin', 'pos_admin', '2021-12-27 10:38:58', '2021-12-27 10:39:15', NULL, NULL, NULL, NULL, NULL),
(67, 'Test Section', 1, 0, 'pos_admin', 'pos_admin', '2021-12-27 10:39:00', '2021-12-27 10:39:22', NULL, NULL, NULL, NULL, NULL),
(68, '1st floor', 1, 0, 'pos_admin', 'pos_admin', '2021-12-27 10:39:58', '2021-12-29 06:51:00', NULL, NULL, NULL, NULL, NULL),
(69, '1st floor', 1, 0, 'pos_admin', 'pos_admin', '2021-12-29 06:52:15', '2021-12-29 06:58:12', NULL, NULL, NULL, NULL, NULL),
(70, '1st floor', 1, 0, 'pos_admin', 'pos_admin', '2021-12-29 06:59:42', '2021-12-29 10:57:48', NULL, NULL, NULL, NULL, NULL),
(71, '1st floor', 1, 0, 'pos_admin', 'pos_admin', '2021-12-29 10:58:26', '2021-12-31 09:20:01', NULL, NULL, NULL, 10, NULL),
(72, 'Terrasse', 2, 0, 'pos_admin', 'pos_admin', '2021-12-31 08:07:05', '2021-12-31 09:19:47', NULL, NULL, NULL, NULL, NULL),
(73, 'Backyard', 3, 0, 'pos_admin', 'pos_admin', '2021-12-31 08:07:05', '2021-12-31 09:19:52', NULL, NULL, NULL, NULL, NULL),
(74, 'Rooftop', 4, 0, 'pos_admin', 'pos_admin', '2021-12-31 08:10:33', '2021-12-31 09:19:57', NULL, NULL, NULL, 14, NULL),
(75, '1st floor', 1, 0, 'pos_admin', 'pos_admin', '2021-12-31 09:20:07', '2021-12-31 10:59:31', NULL, NULL, NULL, 14, NULL),
(76, '1st floor', 1, 0, 'pos_admin', 'pos_admin', '2021-12-31 10:59:52', '2022-01-04 05:39:14', NULL, NULL, NULL, 14, NULL),
(77, '1st floor', 1, 0, 'pos_admin', 'pos_admin', '2022-01-04 05:39:45', '2022-01-19 11:28:23', NULL, NULL, NULL, 1, '#d6d6d6'),
(78, 'Bar', 2, 1, 'pos_admin', 'pos_admin', '2022-01-10 07:16:21', '2022-02-25 08:13:58', NULL, NULL, NULL, 34, '#d6d6d6'),
(79, 'Test Section', 3, 0, 'pos_admin', 'pos_admin', '2022-01-10 08:18:32', '2022-02-14 11:17:43', NULL, NULL, NULL, 5, '#d6d6d6'),
(80, 'Terrasse', 4, 1, 'pos_admin', 'pos_admin', '2022-01-13 10:33:48', '2022-01-28 11:24:36', NULL, NULL, NULL, 5, '#d6d6d6'),
(81, 'Test Section1', 4, 1, 'pos_admin', 'pos_admin', '2022-01-19 11:28:42', '2022-02-25 08:14:09', NULL, NULL, NULL, 14, '#d6d6d6'),
(82, 'my floor', 5, 0, 'pos_admin', 'pos_admin', '2022-01-31 07:04:08', '2022-01-31 07:08:16', NULL, NULL, NULL, 2, NULL),
(83, 'my floor', 5, 0, 'pos_admin', 'pos_admin', '2022-01-31 07:08:55', '2022-02-14 11:17:32', NULL, NULL, NULL, 33, NULL),
(84, 'test', 6, 0, 'pos_admin', 'pos_admin', '2022-01-31 07:18:11', '2022-01-31 07:19:44', NULL, NULL, NULL, 14, NULL),
(85, 'test 2', 7, 0, 'pos_admin', 'pos_admin', '2022-01-31 07:18:11', '2022-01-31 07:19:38', NULL, NULL, NULL, 14, NULL),
(86, 'test 3', 8, 0, 'pos_admin', 'pos_admin', '2022-01-31 07:18:33', '2022-01-31 07:19:33', NULL, NULL, NULL, 14, NULL),
(87, 'test', 6, 0, 'pos_admin', 'pos_admin', '2022-01-31 07:20:11', '2022-01-31 09:56:53', NULL, NULL, NULL, 14, NULL),
(88, 'Test Section 3', 7, 0, 'pos_admin', 'pos_admin', '2022-01-31 09:55:09', '2022-01-31 09:56:06', NULL, NULL, NULL, 14, NULL),
(89, 'Test Section 4', 6, 0, 'pos_admin', 'pos_admin', '2022-01-31 09:57:26', '2022-01-31 09:58:37', NULL, NULL, NULL, 14, NULL),
(90, 'Test2', 6, 0, 'pos_admin', 'pos_admin', '2022-01-31 09:58:54', '2022-01-31 10:03:04', NULL, NULL, NULL, 14, NULL),
(91, 'Test 3', 6, 0, 'pos_admin', 'pos_admin', '2022-01-31 10:03:55', '2022-02-01 13:33:55', NULL, NULL, NULL, 14, NULL),
(92, 'test new', 7, 0, 'pos_admin', 'pos_admin', '2022-01-31 14:28:54', '2022-02-01 13:33:49', NULL, NULL, NULL, 14, NULL),
(93, 'new section', 8, 0, 'pos_admin', 'pos_admin', '2022-02-01 13:33:31', '2022-02-01 13:33:44', NULL, NULL, NULL, 14, NULL),
(94, 'New empty', 4, 1, 'pos_admin', 'pos_admin', '2022-02-14 11:18:13', '2022-02-25 08:14:20', NULL, NULL, NULL, 4, NULL);";

        DB::statement($sql);
    }
}
