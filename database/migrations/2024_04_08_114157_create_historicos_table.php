        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        return new class extends Migration
        {
            /**
             * Run the migrations.
             */
            public function up(): void
            {
                Schema::create('historicos', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('equipamento_id');
                    $table->unsignedBigInteger('id_protocolo');
                    $table->foreign('equipamento_id')->references('id')->on('equipamentos')->onDelete('cascade');
                    $table->foreign('id_protocolo')->references('id')->on('protocolo_entrada')->onDelete('cascade');
                    $table->text('desc')->nullable();
                    $table->text('solucao')->nullable();
                    $table->unsignedBigInteger('id_setor_escolas')->nullable();
                    $table->foreign('id_setor_escolas')->references('id')->on('setor_escolas');
                    $table->unsignedBigInteger('id_users')->nullable();
                    $table->foreign('id_users')->references('id')->on('users');
                    $table->text('acessorios');
                    $table->string('faltamPecas')->nullable();
                    $table->timestamps();

                });

            }

            /**
             * Reverse the migrations.
             */
            public function down(): void
            {
                Schema::dropIfExists('historicos');
            }
        };
