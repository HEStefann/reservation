<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_size')->insert([
            ['id' => 1, 'Description' => 'S', 'ShapeGroupTypeId' => NULL, 'IdResolutionType' => 1, 'Height' => 68, 'Width' => 68, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL],
            ['id' => 2, 'Description' => 'M', 'ShapeGroupTypeId' => NULL, 'IdResolutionType' => 1, 'Height' => 78, 'Width' => 78, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL],
            ['id' => 3, 'Description' => 'L', 'ShapeGroupTypeId' => NULL, 'IdResolutionType' => 1, 'Height' => 98, 'Width' => 98, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL],
            ['id' => 4, 'Description' => 'S', 'ShapeGroupTypeId' => NULL, 'IdResolutionType' => 2, 'Height' => 68, 'Width' => 68, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL],
            ['id' => 5, 'Description' => 'M', 'ShapeGroupTypeId' => NULL, 'IdResolutionType' => 2, 'Height' => 78, 'Width' => 78, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL],
            ['id' => 6, 'Description' => 'L', 'ShapeGroupTypeId' => NULL, 'IdResolutionType' => 2, 'Height' => 98, 'Width' => 98, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL],
            ['id' => 7, 'Description' => 'C', 'ShapeGroupTypeId' => NULL, 'IdResolutionType' => NULL, 'Height' => 98, 'Width' => 98, 'Active' => 1, 'CreatedBy' => 'sa','ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL], ['id' => 8, 'Description' => 'S', 'ShapeGroupTypeId' => 2, 'IdResolutionType' => 1, 'Height' => 48, 'Width' => 48, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL], ['id' => 9, 'Description' => 'M', 'ShapeGroupTypeId' => 2, 'IdResolutionType' => 1, 'Height' => 58, 'Width' => 58, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL], ['id' => 10, 'Description' => 'L', 'ShapeGroupTypeId' => 2, 'IdResolutionType' => 1, 'Height' => 68, 'Width' => 68, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL], ['id' => 11, 'Description' => 'S', 'ShapeGroupTypeId' => 2, 'IdResolutionType' => 2, 'Height' => 38, 'Width' => 38, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL], ['id' => 12, 'Description' => 'M', 'ShapeGroupTypeId' => 2, 'IdResolutionType' => 2, 'Height' => 48, 'Width' => 48, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL], ['id' => 13, 'Description' => 'L', 'ShapeGroupTypeId' => 2, 'IdResolutionType' => 2, 'Height' => 68, 'Width' => 68, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL], ['id' => 14, 'Description' => 'C', 'ShapeGroupTypeId' => 2, 'IdResolutionType' => NULL, 'Height' => 48, 'Width' => 48, 'Active' => 1, 'CreatedBy' => 'sa', 'ModifiedBy' => NULL, 'created_at' => '2021-12-23 09:44:35', 'updated_at' => NULL, 'deleted_at' => NULL], ]); } 
}
