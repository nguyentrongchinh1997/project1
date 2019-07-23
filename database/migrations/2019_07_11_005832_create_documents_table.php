<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name"); // tên tài liệu
            $table->string("unsigned_name"); // tên tài liệu không dấu
            $table->text("dicription"); //miêu tả tài liệu
            $table->integer("type"); // loại tài liệuame
            $table->float("price", 15, 2)->nullable(); // giá tài liệu
            $table->integer("download")->nullable(); //lượt tải
            $table->string("image"); // ảnh đại diện tài liệu
            $table->string("url_document"); // đường dẫn tải tài liệu
            $table->integer("preview")->nullable(); // số trang muốn cho xem trước
            $table->integer("view")->nullable();
            $table->integer("page"); // so trang
            $table->string("format"); // dinh dang
            $table->integer("category_id"); // id chuyen muc
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
