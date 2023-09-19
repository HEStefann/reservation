<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackgroundsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sql = "
            INSERT INTO `backgrounds` (`id`, `Title`, `Data`, `ObjectColour`, `SymbolColour`, `IdType`, `Active`, `CreatedBy`, `created_at`, `updated_at`, `deleted_at`) VALUES
            (1, 'Carpet', 'carpet.png', '#747474', '#f0f0f0', 1, 1, 'sa', '2021-12-29 09:27:34', NULL, NULL),
            (2, 'Gradient', 'gradient.png', '#747474', '#f0f0f0', 1, 1, 'sa', '2021-12-29 09:27:51', NULL, NULL),
            (3, 'Marble', 'marble.png', '#747474', '#f0f0f0', 1, 1, 'sa', '2021-12-29 09:28:12', NULL, NULL),
            (4, 'Marble-2', 'marble-2.png', '#747474', '#f0f0f0', 1, 1, 'sa', '2021-12-29 09:28:30', NULL, NULL),
            (5, 'Paper', 'paper.png', '#606060', '#f0f0f0', 1, 1, 'sa', '2021-12-29 09:28:42', NULL, NULL),
            (6, 'Paper-2', 'paper-2.png', '#606060', '#f0f0f0', 1, 1, 'sa', '2021-12-29 09:28:59', NULL, NULL),
            (7, 'Solid', 'solid.png', '#747474', '#f0f0f0', 1, 1, 'sa', '2021-12-29 09:29:15', NULL, NULL),
            (9, 'Woodfloor-light', 'woodfloor-light.png', '#484848', '#f0f0f0', 1, 1, 'sa', '2021-12-29 09:29:41', NULL, NULL),
            (10, 'Woodfloor-2', 'woodfloor-2.png', '#f0f0f0', '#484848', 1, 1, 'sa', '2021-12-29 09:29:57', NULL, NULL),
            (12, 'Woodfloor-3', 'woodfloor-3.png', '#f0f0f0', '#484848', 1, 1, 'sa', '2021-12-29 09:31:48', NULL, NULL),
            (13, 'Tile', 'tile.png', '#747474', '#f0f0f0', 1, 1, 'sa', '2021-12-29 09:37:31', NULL, NULL),
            (14, 'Solid color', '#d6d6d6', '#747474', '#f0f0f0', 2, 1, 'sa', '2021-12-29 09:42:47', '2022-01-12 09:13:07', NULL),
            (15, 'My-new-background.png', 'My-new-background.png', '#b5b5b5', '#151b22', 1, 0, '', '2022-01-24 10:13:24', NULL, NULL),
            (16, 'minimalism-4k-for-mac-desktop-wallpaper-preview.jp', 'minimalism-4k-for-mac-desktop-wallpaper-preview.jp', '#ffffff', '#31373e', 1, 0, 'pos_admin', '2022-01-27 12:39:39', NULL, NULL),
            (17, 'minimalism.jpg', 'minimalism.jpg', '#ffffff', '#31373e', 1, 0, 'pos_admin', '2022-01-27 12:44:13', NULL, NULL),
            (18, 'winter-4k-pc.jpg', 'winter-4k-pc.jpg', '#b5b5b5', '#ffffff', 1, 0, 'pos_admin', '2022-01-27 13:11:03', NULL, NULL),
            (23, 'winter-4k-pc-desktop-wallpaper-preview.jpg', 'winter-4k-pc-desktop-wallpaper-preview.jpg', '#b5b5b5', '#151b22', 1, 1, 'pos_admin', '2022-01-28 14:05:35', NULL, NULL),
            (29, 'backgroundtest.png', 'backgroundtest.png', '#e6e6e6', '#31373e', 1, 1, 'pos_admin', '2022-01-28 14:51:20', NULL, NULL),
            (30, 'winter-4k-pc-desktop-wallpaper-preview.jpg', 'winter-4k-pc-desktop-wallpaper-preview.jpg', '#b5b5b5', '#151b22', 1, 1, 'pos_admin', '2022-01-28 14:57:43', NULL, NULL),
            (31, 'backgroundtest.png', 'backgroundtest.png', '#e6e6e6', '#31373e', 1, 1, 'pos_admin', '2022-01-31 07:45:04', NULL, NULL),
            (32, 'backgroundtest.png', 'backgroundtest.png', '#e6e6e6', '#31373e', 1, 1, 'pos_admin', '2022-01-31 07:48:01', NULL, NULL),
            (33, 'winter-4k-pc-desktop-wallpaper-preview.jpg', 'winter-4k-pc-desktop-wallpaper-preview.jpg', '#e6e6e6', '#151b22', 1, 1, 'pos_admin', '2022-01-31 14:12:09', NULL, NULL),
            (34, 'backgroundtest.png', 'backgroundtest.png', '#ffffff', '#31373e', 1, 1, 'pos_admin', '2022-02-01 14:32:15', NULL, NULL);
        ";

        DB::statement($sql);
    }
}
