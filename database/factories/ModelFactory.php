<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Escola::class, static function (Faker\Generator $faker) {
    return [
        'activated' => $faker->boolean(),
        'cep' => $faker->sentence,
        'cnpj' => $faker->sentence,
        'cod_municipio' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'fone' => $faker->sentence,
        'logradouro' => $faker->sentence,
        'nome' => $faker->sentence,
        'numero' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TurnoEscolar::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'descricao' => $faker->sentence,
        'titulo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Categorizacao::class, static function (Faker\Generator $faker) {
    return [
        'categorizacao' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CategorizacaoItem::class, static function (Faker\Generator $faker) {
    return [
        'categorizacao_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'item' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PeriodoLetivo::class, static function (Faker\Generator $faker) {
    return [
        'activated' => $faker->boolean(),
        'ano_referencia' => $faker->randomNumber(5),
        'carga_horaria' => $faker->randomNumber(5),
        'categorizacao_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'created_by' => $faker->randomNumber(5),
        'data_fim' => $faker->date(),
        'data_fim_rematricula' => $faker->date(),
        'data_inicio' => $faker->date(),
        'data_inicio_rematricula' => $faker->date(),
        'deleted_at' => null,
        'dias_letivos' => $faker->randomNumber(5),
        'escola_id' => $faker->sentence,
        'media' => $faker->randomNumber(5),
        'nome' => $faker->sentence,
        'observacao' => $faker->text(),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CategorizacaoConfig::class, static function (Faker\Generator $faker) {
    return [
        'categorizacao_item_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'data_fim' => $faker->dateTime,
        'data_inicio' => $faker->dateTime,
        'nota_total' => $faker->randomNumber(5),
        'periodo_letivo_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Curso::class, static function (Faker\Generator $faker) {
    return [
        'activated' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'descricao' => $faker->text(),
        'escola_id' => $faker->sentence,
        'nome' => $faker->sentence,
        'qtd_vagas_alunos' => $faker->randomNumber(5),
        'qtd_vagas_alunos_aee' => $faker->randomNumber(5),
        'total_periodos' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CursoGrade::class, static function (Faker\Generator $faker) {
    return [
        'activated' => $faker->boolean(),
        'bol_optativa' => $faker->boolean(),
        'carga_horaria' => $faker->randomNumber(5),
        'color' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'curso_id' => $faker->sentence,
        'deleted_at' => null,
        'descricao' => $faker->sentence,
        'hora_aula' => $faker->randomNumber(5),
        'nome' => $faker->sentence,
        'periodo' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Turma::class, static function (Faker\Generator $faker) {
    return [
        'activated' => $faker->boolean(),
        'bol_aee' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'escola_id' => $faker->sentence,
        'nome' => $faker->sentence,
        'periodo_letivo_id' => $faker->sentence,
        'qtd_vagas_alunos' => $faker->randomNumber(5),
        'qtd_vagas_alunos_aee' => $faker->randomNumber(5),
        'turno_escolar_id' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Professor::class, static function (Faker\Generator $faker) {
    return [
        'celular' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'data_matricula' => $faker->dateTime,
        'data_nascimento' => $faker->date(),
        'deleted_at' => null,
        'escola_id' => $faker->sentence,
        'registro' => $faker->sentence,
        'telefone' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Aluno::class, static function (Faker\Generator $faker) {
    return [
        'bol_aee' => $faker->boolean(),
        'celular' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'data_matricula' => $faker->dateTime,
        'data_nascimento' => $faker->date(),
        'deleted_at' => null,
        'email_responsavel' => $faker->sentence,
        'escola_id' => $faker->sentence,
        'registro' => $faker->sentence,
        'telefone' => $faker->sentence,
        'turma_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Disciplina::class, static function (Faker\Generator $faker) {
    return [
        'activated' => $faker->boolean(),
        'carga_horaria' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'curso_grade_id' => $faker->sentence,
        'deleted_at' => null,
        'descricao' => $faker->sentence,
        'hora_aula' => $faker->randomNumber(5),
        'nome' => $faker->sentence,
        'periodo_letivo_id' => $faker->sentence,
        'professor_id' => $faker->sentence,
        'turma_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PlanejamentoAula::class, static function (Faker\Generator $faker) {
    return [
        'conteudo' => $faker->text(),
        'created_at' => $faker->dateTime,
        'data_fim' => $faker->dateTime,
        'data_inicio' => $faker->dateTime,
        'deleted_at' => null,
        'disciplina_id' => $faker->sentence,
        'habilidades_competencias' => $faker->text(),
        'titulo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PlataformaTransmissao::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'descricao' => $faker->text(),
        'plataforma' => $faker->sentence,
        'site' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Aula::class, static function (Faker\Generator $faker) {
    return [
        'bol_online' => $faker->boolean(),
        'categorizacao_item_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'data_fim' => $faker->dateTime,
        'data_inicio' => $faker->dateTime,
        'deleted_at' => null,
        'disciplina_id' => $faker->sentence,
        'escola_id' => $faker->sentence,
        'link_transmissao' => $faker->sentence,
        'observacoes' => $faker->text(),
        'periodo_letivo_id' => $faker->sentence,
        'planejamento_id' => $faker->sentence,
        'plataforma_id' => $faker->randomNumber(5),
        'professor_id' => $faker->sentence,
        'replica_id' => $faker->sentence,
        'titulo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\NotificacaoTipo::class, static function (Faker\Generator $faker) {
    return [
        'tipo' => $faker->text(),
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Notificaco::class, static function (Faker\Generator $faker) {
    return [
        'assunto' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'descricao' => $faker->text(),
        'destinatario_id' => $faker->randomNumber(5),
        'remetente_id' => $faker->randomNumber(5),
        'tipo_id' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
