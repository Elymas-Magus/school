<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'escola' => [
        'title' => 'Escolas',

        'actions' => [
            'index' => 'Escolas',
            'create' => 'New Escola',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'activated' => 'Activated',
            'cep' => 'Cep',
            'cnpj' => 'Cnpj',
            'cod_municipio' => 'Cod municipio',
            'fone' => 'Fone',
            'logradouro' => 'Logradouro',
            'nome' => 'Nome',
            'numero' => 'Numero',
            
        ],
    ],

    'turno-escolar' => [
        'title' => 'Turno Escolar',

        'actions' => [
            'index' => 'Turno Escolar',
            'create' => 'New Turno Escolar',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'titulo' => 'Titulo',
            
        ],
    ],

    'categorizacao' => [
        'title' => 'Categorizacao',

        'actions' => [
            'index' => 'Categorizacao',
            'create' => 'New Categorizacao',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'categorizacao' => 'Categorizacao',
            
        ],
    ],

    'categorizacao-item' => [
        'title' => 'Categorizacao Item',

        'actions' => [
            'index' => 'Categorizacao Item',
            'create' => 'New Categorizacao Item',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'categorizacao_id' => 'Categorizacao',
            'item' => 'Item',
            
        ],
    ],

    'periodo-letivo' => [
        'title' => 'Periodo Letivo',

        'actions' => [
            'index' => 'Periodo Letivo',
            'create' => 'New Periodo Letivo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'activated' => 'Activated',
            'ano_referencia' => 'Ano referencia',
            'carga_horaria' => 'Carga horaria',
            'categorizacao_id' => 'Categorizacao',
            'created_by' => 'Created by',
            'data_fim' => 'Data fim',
            'data_fim_rematricula' => 'Data fim rematricula',
            'data_inicio' => 'Data inicio',
            'data_inicio_rematricula' => 'Data inicio rematricula',
            'dias_letivos' => 'Dias letivos',
            'escola_id' => 'Escola',
            'media' => 'Media',
            'nome' => 'Nome',
            'observacao' => 'Observacao',
            
        ],
    ],

    'categorizacao-config' => [
        'title' => 'Categorizacao Config',

        'actions' => [
            'index' => 'Categorizacao Config',
            'create' => 'New Categorizacao Config',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'categorizacao_item_id' => 'Categorizacao item',
            'data_fim' => 'Data fim',
            'data_inicio' => 'Data inicio',
            'nota_total' => 'Nota total',
            'periodo_letivo_id' => 'Periodo letivo',
            
        ],
    ],

    'curso' => [
        'title' => 'Curso',

        'actions' => [
            'index' => 'Curso',
            'create' => 'New Curso',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'activated' => 'Activated',
            'descricao' => 'Descricao',
            'escola_id' => 'Escola',
            'nome' => 'Nome',
            'qtd_vagas_alunos' => 'Qtd vagas alunos',
            'qtd_vagas_alunos_aee' => 'Qtd vagas alunos aee',
            'total_periodos' => 'Total periodos',
            
        ],
    ],

    'curso-grade' => [
        'title' => 'Curso Grade',

        'actions' => [
            'index' => 'Curso Grade',
            'create' => 'New Curso Grade',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'activated' => 'Activated',
            'bol_optativa' => 'Bol optativa',
            'carga_horaria' => 'Carga horaria',
            'color' => 'Color',
            'curso_id' => 'Curso',
            'descricao' => 'Descricao',
            'hora_aula' => 'Hora aula',
            'nome' => 'Nome',
            'periodo' => 'Periodo',
            
        ],
    ],

    'turma' => [
        'title' => 'Turma',

        'actions' => [
            'index' => 'Turma',
            'create' => 'New Turma',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'activated' => 'Activated',
            'bol_aee' => 'Bol aee',
            'escola_id' => 'Escola',
            'nome' => 'Nome',
            'periodo_letivo_id' => 'Periodo letivo',
            'qtd_vagas_alunos' => 'Qtd vagas alunos',
            'qtd_vagas_alunos_aee' => 'Qtd vagas alunos aee',
            'turno_escolar_id' => 'Turno escolar',
            
        ],
    ],

    'professor' => [
        'title' => 'Professor',

        'actions' => [
            'index' => 'Professor',
            'create' => 'New Professor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'celular' => 'Celular',
            'data_matricula' => 'Data matricula',
            'data_nascimento' => 'Data nascimento',
            'escola_id' => 'Escola',
            'registro' => 'Registro',
            'telefone' => 'Telefone',
            'user_id' => 'User',
            
        ],
    ],

    'aluno' => [
        'title' => 'Aluno',

        'actions' => [
            'index' => 'Aluno',
            'create' => 'New Aluno',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bol_aee' => 'Bol aee',
            'celular' => 'Celular',
            'data_matricula' => 'Data matricula',
            'data_nascimento' => 'Data nascimento',
            'email_responsavel' => 'Email responsavel',
            'escola_id' => 'Escola',
            'registro' => 'Registro',
            'telefone' => 'Telefone',
            'turma_id' => 'Turma',
            'user_id' => 'User',
            
        ],
    ],

    'disciplina' => [
        'title' => 'Disciplina',

        'actions' => [
            'index' => 'Disciplina',
            'create' => 'New Disciplina',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'activated' => 'Activated',
            'carga_horaria' => 'Carga horaria',
            'curso_grade_id' => 'Curso grade',
            'descricao' => 'Descricao',
            'hora_aula' => 'Hora aula',
            'nome' => 'Nome',
            'periodo_letivo_id' => 'Periodo letivo',
            'professor_id' => 'Professor',
            'turma_id' => 'Turma',
            
        ],
    ],

    'planejamento-aula' => [
        'title' => 'Planejamento Aulas',

        'actions' => [
            'index' => 'Planejamento Aulas',
            'create' => 'New Planejamento Aula',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'conteudo' => 'Conteudo',
            'data_fim' => 'Data fim',
            'data_inicio' => 'Data inicio',
            'disciplina_id' => 'Disciplina',
            'habilidades_competencias' => 'Habilidades competencias',
            'titulo' => 'Titulo',
            
        ],
    ],

    'plataforma-transmissao' => [
        'title' => 'Plataforma Transmissao',

        'actions' => [
            'index' => 'Plataforma Transmissao',
            'create' => 'New Plataforma Transmissao',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'plataforma' => 'Plataforma',
            'site' => 'Site',
            
        ],
    ],

    'aula' => [
        'title' => 'Aulas',

        'actions' => [
            'index' => 'Aulas',
            'create' => 'New Aula',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bol_online' => 'Bol online',
            'categorizacao_item_id' => 'Categorizacao item',
            'data_fim' => 'Data fim',
            'data_inicio' => 'Data inicio',
            'disciplina_id' => 'Disciplina',
            'escola_id' => 'Escola',
            'link_transmissao' => 'Link transmissao',
            'observacoes' => 'Observacoes',
            'periodo_letivo_id' => 'Periodo letivo',
            'planejamento_id' => 'Planejamento',
            'plataforma_id' => 'Plataforma',
            'professor_id' => 'Professor',
            'replica_id' => 'Replica',
            'titulo' => 'Titulo',
            
        ],
    ],

    'notificacao-tipo' => [
        'title' => 'Notificacao Tipo',

        'actions' => [
            'index' => 'Notificacao Tipo',
            'create' => 'New Notificacao Tipo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'tipo' => 'Tipo',
            
        ],
    ],

    'notificaco' => [
        'title' => 'Notificacoes',

        'actions' => [
            'index' => 'Notificacoes',
            'create' => 'New Notificaco',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'descricao' => 'Descricao',
            'destinatario_id' => 'Destinatario',
            'remetente_id' => 'Remetente',
            'tipo_id' => 'Tipo',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];