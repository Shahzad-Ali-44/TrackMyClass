<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('student_forms', 'user_id')) {
            Schema::table('student_forms', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('id');
            });
        }
        
        $firstUser = \App\Models\User::first();
        if ($firstUser) {
            DB::table('student_forms')->whereNull('user_id')->update(['user_id' => $firstUser->id]);
            DB::table('student_forms')->whereNotIn('user_id', function($query) {
                $query->select('id')->from('users');
            })->update(['user_id' => $firstUser->id]);
        } else {
            DB::table('student_forms')->whereNull('user_id')->delete();
        }
        
        DB::statement('ALTER TABLE student_forms MODIFY user_id BIGINT UNSIGNED NOT NULL');
        
        $foreignKeys = DB::select("SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'student_forms' AND COLUMN_NAME = 'user_id' AND CONSTRAINT_NAME LIKE '%foreign%'");
        if (empty($foreignKeys)) {
            Schema::table('student_forms', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::table('student_forms', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
