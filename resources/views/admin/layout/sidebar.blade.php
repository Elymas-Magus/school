<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/escolas') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.escola.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/periodo-letivos') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.periodo-letivo.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/cursos') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.curso.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/turmas') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.turma.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/professors') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.professor.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/alunos') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.aluno.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/disciplinas') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.disciplina.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/planejamento-aulas') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.planejamento-aula.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/aulas') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.aula.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/notificacao-tipos') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.notificacao-tipo.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/notificacos') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.notificaco.title') }}</a></li>
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/turno-escolars') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.turno-escolar.title') }}</a></li> --}}
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/categorizacaos') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.categorizacao.title') }}</a></li> --}}
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/categorizacao-items') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.categorizacao-item.title') }}</a></li> --}}
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/categorizacao-configs') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.categorizacao-config.title') }}</a></li> --}}
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/curso-grades') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.curso-grade.title') }}</a></li> --}}
           {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/plataforma-transmissaos') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.plataforma-transmissao.title') }}</a></li> --}}
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li> --}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
