<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('escolas')->name('escolas/')->group(static function() {
            Route::get('/',                                             'EscolasController@index')->name('index');
            Route::get('/create',                                       'EscolasController@create')->name('create');
            Route::post('/',                                            'EscolasController@store')->name('store');
            Route::get('/{escola}/edit',                                'EscolasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EscolasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{escola}',                                    'EscolasController@update')->name('update');
            Route::delete('/{escola}',                                  'EscolasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('turno-escolars')->name('turno-escolars/')->group(static function() {
            Route::get('/',                                             'TurnoEscolarController@index')->name('index');
            Route::get('/create',                                       'TurnoEscolarController@create')->name('create');
            Route::post('/',                                            'TurnoEscolarController@store')->name('store');
            Route::get('/{turnoEscolar}/edit',                          'TurnoEscolarController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TurnoEscolarController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{turnoEscolar}',                              'TurnoEscolarController@update')->name('update');
            Route::delete('/{turnoEscolar}',                            'TurnoEscolarController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categorizacaos')->name('categorizacaos/')->group(static function() {
            Route::get('/',                                             'CategorizacaoController@index')->name('index');
            Route::get('/create',                                       'CategorizacaoController@create')->name('create');
            Route::post('/',                                            'CategorizacaoController@store')->name('store');
            Route::get('/{categorizacao}/edit',                         'CategorizacaoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategorizacaoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{categorizacao}',                             'CategorizacaoController@update')->name('update');
            Route::delete('/{categorizacao}',                           'CategorizacaoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categorizacao-items')->name('categorizacao-items/')->group(static function() {
            Route::get('/',                                             'CategorizacaoItemController@index')->name('index');
            Route::get('/create',                                       'CategorizacaoItemController@create')->name('create');
            Route::post('/',                                            'CategorizacaoItemController@store')->name('store');
            Route::get('/{categorizacaoItem}/edit',                     'CategorizacaoItemController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategorizacaoItemController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{categorizacaoItem}',                         'CategorizacaoItemController@update')->name('update');
            Route::delete('/{categorizacaoItem}',                       'CategorizacaoItemController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('periodo-letivos')->name('periodo-letivos/')->group(static function() {
            Route::get('/',                                             'PeriodoLetivoController@index')->name('index');
            Route::get('/create',                                       'PeriodoLetivoController@create')->name('create');
            Route::post('/',                                            'PeriodoLetivoController@store')->name('store');
            Route::get('/{periodoLetivo}/edit',                         'PeriodoLetivoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PeriodoLetivoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{periodoLetivo}',                             'PeriodoLetivoController@update')->name('update');
            Route::delete('/{periodoLetivo}',                           'PeriodoLetivoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categorizacao-configs')->name('categorizacao-configs/')->group(static function() {
            Route::get('/',                                             'CategorizacaoConfigController@index')->name('index');
            Route::get('/create',                                       'CategorizacaoConfigController@create')->name('create');
            Route::post('/',                                            'CategorizacaoConfigController@store')->name('store');
            Route::get('/{categorizacaoConfig}/edit',                   'CategorizacaoConfigController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategorizacaoConfigController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{categorizacaoConfig}',                       'CategorizacaoConfigController@update')->name('update');
            Route::delete('/{categorizacaoConfig}',                     'CategorizacaoConfigController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('cursos')->name('cursos/')->group(static function() {
            Route::get('/',                                             'CursoController@index')->name('index');
            Route::get('/create',                                       'CursoController@create')->name('create');
            Route::post('/',                                            'CursoController@store')->name('store');
            Route::get('/{curso}/edit',                                 'CursoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CursoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{curso}',                                     'CursoController@update')->name('update');
            Route::delete('/{curso}',                                   'CursoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('curso-grades')->name('curso-grades/')->group(static function() {
            Route::get('/',                                             'CursoGradeController@index')->name('index');
            Route::get('/create',                                       'CursoGradeController@create')->name('create');
            Route::post('/',                                            'CursoGradeController@store')->name('store');
            Route::get('/{cursoGrade}/edit',                            'CursoGradeController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CursoGradeController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cursoGrade}',                                'CursoGradeController@update')->name('update');
            Route::delete('/{cursoGrade}',                              'CursoGradeController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('turmas')->name('turmas/')->group(static function() {
            Route::get('/',                                             'TurmaController@index')->name('index');
            Route::get('/create',                                       'TurmaController@create')->name('create');
            Route::post('/',                                            'TurmaController@store')->name('store');
            Route::get('/{turma}/edit',                                 'TurmaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TurmaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{turma}',                                     'TurmaController@update')->name('update');
            Route::delete('/{turma}',                                   'TurmaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('professors')->name('professors/')->group(static function() {
            Route::get('/',                                             'ProfessorController@index')->name('index');
            Route::get('/create',                                       'ProfessorController@create')->name('create');
            Route::post('/',                                            'ProfessorController@store')->name('store');
            Route::get('/{professor}/edit',                             'ProfessorController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProfessorController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{professor}',                                 'ProfessorController@update')->name('update');
            Route::delete('/{professor}',                               'ProfessorController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('alunos')->name('alunos/')->group(static function() {
            Route::get('/',                                             'AlunoController@index')->name('index');
            Route::get('/create',                                       'AlunoController@create')->name('create');
            Route::post('/',                                            'AlunoController@store')->name('store');
            Route::get('/{aluno}/edit',                                 'AlunoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AlunoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{aluno}',                                     'AlunoController@update')->name('update');
            Route::delete('/{aluno}',                                   'AlunoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('disciplinas')->name('disciplinas/')->group(static function() {
            Route::get('/',                                             'DisciplinaController@index')->name('index');
            Route::get('/create',                                       'DisciplinaController@create')->name('create');
            Route::post('/',                                            'DisciplinaController@store')->name('store');
            Route::get('/{disciplina}/edit',                            'DisciplinaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DisciplinaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{disciplina}',                                'DisciplinaController@update')->name('update');
            Route::delete('/{disciplina}',                              'DisciplinaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('planejamento-aulas')->name('planejamento-aulas/')->group(static function() {
            Route::get('/',                                             'PlanejamentoAulasController@index')->name('index');
            Route::get('/create',                                       'PlanejamentoAulasController@create')->name('create');
            Route::post('/',                                            'PlanejamentoAulasController@store')->name('store');
            Route::get('/{planejamentoAula}/edit',                      'PlanejamentoAulasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PlanejamentoAulasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{planejamentoAula}',                          'PlanejamentoAulasController@update')->name('update');
            Route::delete('/{planejamentoAula}',                        'PlanejamentoAulasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('plataforma-transmissaos')->name('plataforma-transmissaos/')->group(static function() {
            Route::get('/',                                             'PlataformaTransmissaoController@index')->name('index');
            // Route::get('/create',                                       'PlataformaTransmissaoController@create')->name('create');
            Route::post('/',                                            'PlataformaTransmissaoController@store')->name('store');
            // Route::get('/{plataformaTransmissao}/edit',                 'PlataformaTransmissaoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PlataformaTransmissaoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{plataformaTransmissao}',                     'PlataformaTransmissaoController@update')->name('update');
            Route::delete('/{plataformaTransmissao}',                   'PlataformaTransmissaoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('aulas')->name('aulas/')->group(static function() {
            Route::get('/',                                             'AulasController@index')->name('index');
            Route::get('/create',                                       'AulasController@create')->name('create');
            Route::post('/',                                            'AulasController@store')->name('store');
            Route::get('/{aula}/edit',                                  'AulasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AulasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{aula}',                                      'AulasController@update')->name('update');
            Route::delete('/{aula}',                                    'AulasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('notificacao-tipos')->name('notificacao-tipos/')->group(static function() {
            Route::get('/',                                             'NotificacaoTipoController@index')->name('index');
            Route::get('/create',                                       'NotificacaoTipoController@create')->name('create');
            Route::post('/',                                            'NotificacaoTipoController@store')->name('store');
            Route::get('/{notificacaoTipo}/edit',                       'NotificacaoTipoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'NotificacaoTipoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{notificacaoTipo}',                           'NotificacaoTipoController@update')->name('update');
            Route::delete('/{notificacaoTipo}',                         'NotificacaoTipoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('notificacos')->name('notificacos/')->group(static function() {
            Route::get('/',                                             'NotificacoesController@index')->name('index');
            Route::get('/create',                                       'NotificacoesController@create')->name('create');
            Route::post('/',                                            'NotificacoesController@store')->name('store');
            Route::get('/{notificaco}/edit',                            'NotificacoesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'NotificacoesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{notificaco}',                                'NotificacoesController@update')->name('update');
            Route::delete('/{notificaco}',                              'NotificacoesController@destroy')->name('destroy');
        });
    });
});