<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBackendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('backend')->create('ceo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->timestamp('dob')->nullable();
            $table->string('phone', 16);
            $table->string('address')->nullable();
            $table->integer('organization_id');
            $table->integer('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('backend')->create('industry', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 120);
            $table->string('description', 500)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('backend')->create('organization', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('profile_id')->nullable();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->integer('ceo_id')->nullable();
            $table->string('licence', 36);
            $table->string('db_name', 24);
            $table->integer('status')->default(0)->comment('0->trial
1->active
2->lock');
            $table->integer('lock_status')->default(0)->comment('0-active
1-lock');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('backend')->create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::connection('backend')->create('product', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 120);
            $table->string('description', 500)->nullable();
            $table->integer('industry_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('backend')->create('profile', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->integer('organization_id');
            $table->integer('ceo_id')->nullable();
            $table->string('product_ids', 500)->nullable();
            $table->integer('industry_id')->nullable();
            $table->string('tax_number', 24)->nullable();
            $table->string('address', 500)->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('phone', 16)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('backend')->create('role', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('route', 500);
            $table->string('description', 500);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
            $table->integer('status')->default(0)->comment('0=>active
1=>lock');
        });

        Schema::connection('backend')->create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('backend')->dropIfExists('users');

        Schema::connection('backend')->dropIfExists('role');

        Schema::connection('backend')->dropIfExists('profile');

        Schema::connection('backend')->dropIfExists('product');

        Schema::connection('backend')->dropIfExists('password_resets');

        Schema::connection('backend')->dropIfExists('organization');

        Schema::connection('backend')->dropIfExists('industry');

        Schema::connection('backend')->dropIfExists('ceo');
    }
}
