<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCoreDbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('core_db')->create('attendance', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id');
            $table->integer('status')->comment('0=>full
1=>half
2=>absent');
            $table->string('reason', 500)->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('checkout_order', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('bill_code', 12);
            $table->string('bill_path')->nullable();
            $table->string('customer_info')->nullable();
            $table->integer('regular_customer_id')->nullable();
            $table->string('menu_id');
            $table->string('quantity');
            $table->string('price');
            $table->string('type');
            $table->integer('discount_percent')->nullable();
            $table->integer('user_id');
            $table->integer('status')->default(0)->comment('0=> Chưa thanh toán
1=>Đã thanh toán');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('customer', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('phone', 24)->nullable();
            $table->string('address')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('favorites')->nullable();
            $table->integer('order_count')->nullable()->default(0);
            $table->text('note')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('employee', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('phone', 16);
            $table->string('address', 500)->nullable();
            $table->integer('position_id');
            $table->integer('shift')->nullable()->comment('1=>\'Sáng\',
    2=>\'Trưa\',
    3=>\'Chiều\',
    4=>\'Tối\',
    5=>\'Nửa ngày sáng\',
    6=>\'Nửa ngày tối\',
    7=>\'Cả ngày\',');
            $table->integer('salary');
            $table->integer('unit');
            $table->integer('status')->default(0)->comment('0->working
1->leave');
            $table->integer('grade')->default(0)->comment('0->new
1->good
2->excellent
3->bad');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::connection('core_db')->create('menu', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->integer('price');
            $table->integer('count')->default(0);
            $table->integer('status')->default(0)->comment('0->active
1->disabled');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('note', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('bill_code');
            $table->text('content');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::connection('core_db')->create('position', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->integer('status')->default(0)->comment('0->available
1->disabled');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('provider', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('phone', 15)->nullable();
            $table->string('address', 500)->nullable();
            $table->text('note')->nullable();
            $table->integer('count')->default(0);
            $table->integer('status')->default(0)->comment('0->active
1->disabled');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('raw_material_import', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('bill_code', 24);
            $table->string('name');
            $table->integer('quantity');
            $table->string('proof')->nullable();
            $table->integer('unit');
            $table->integer('price');
            $table->integer('total');
            $table->integer('provider_id')->nullable();
            $table->integer('user_id');
            $table->integer('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('unit', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 24)->unique('name');
            $table->string('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::connection('core_db')->create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('is_ceo')->default(0);
            $table->string('permissions')->default('["8"]');
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
        Schema::connection('core_db')->dropIfExists('users');

        Schema::connection('core_db')->dropIfExists('unit');

        Schema::connection('core_db')->dropIfExists('raw_material_import');

        Schema::connection('core_db')->dropIfExists('provider');

        Schema::connection('core_db')->dropIfExists('position');

        Schema::connection('core_db')->dropIfExists('password_resets');

        Schema::connection('core_db')->dropIfExists('note');

        Schema::connection('core_db')->dropIfExists('menu');

        Schema::connection('core_db')->dropIfExists('failed_jobs');

        Schema::connection('core_db')->dropIfExists('employee');

        Schema::connection('core_db')->dropIfExists('customer');

        Schema::connection('core_db')->dropIfExists('checkout_order');

        Schema::connection('core_db')->dropIfExists('attendance');
    }
}
