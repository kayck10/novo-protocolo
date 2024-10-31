<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Menu Principal</li>
            <li>
                <a class="" href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            <li><a class="ai-icon" href="{{ route('atendimento.escola') }}" aria-expanded="false">
                    <i class="la la-calendar"></i>
                    <span class="nav-text">Atendimento as Escolas</span>
                </a>
            </li>
            <li><a class="has-arrow" href="javascript:void()">
                    <i class="la la-book"></i>
                    <span class="nav-text">Protocolos de Entrada</span>
                </a>
                <ul>
                    <li><a href="{{ route('create.protocolo') }}">Cadastrar</a></li>
                    <li><a href="{{ route('index.protocolo') }}">Ver Tudo</a></li>

                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()">
                    <i class="la la-building"></i>
                    <span class="nav-text">Atendimento Interno</span>
                </a>
                <ul>
                    <li><a href="{{ route('atendimento-interno.create') }}">Cadastrar</a></li>
                    <li><a href="{{ route('atendimento-interno.index') }}">Ver Tudo</a></li>
                </ul>
            </li>
            <li> <a class="" href="{{ route('estante.index') }}" aria-expanded="false">
                    <i class="bi bi-columns"></i>
                    <span class="nav-text">Estante</span>
                </a>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="bi bi-box-seam-fill"></i>
                    <span class="nav-text">Inservível</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('inservivel.create') }}">Criar Laudo</a></li>
                    <li><a href="{{ route('inservivel.index') }}">Ver Tudo</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="bi bi-clipboard-data"></i>
                    <span class="nav-text">Gráficos</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('graficos.anual') }}">Anual</a></li>
                    <li><a href="{{ route('graficos.inserviveis') }}">Inservíveis</a></li>
                    <li><a href="{{ route('graficos.participacoes') }}">Participações</a></li>
                </ul>
            </li>
            @if(in_array(auth()->user()->id_tipos_usuarios, [1, 2]))
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text">Usuários</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('user.create') }}">Adicionar Novo</a></li>
                <li><a href="{{ route('user.index') }}">Ver Todos</a></li>
            </ul>
            </li>
        @endif


            <li><a href="{{ route('local.create') }}" aria-expanded="false">
                    <i class="bi bi-bank"></i>
                    <span class="nav-text">Escolas</span>
                </a>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="bi bi-plus-circle"></i>
             <span class="nav-text">Equipamentos</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('create.equipamento') }}">Criar novo</a></li>
                <li><a href="{{ route('lista.tipoequipamento') }}">Ver Todos</a></li>
            </ul>
        </li>
            <li><a href="{{ route('equipamento') }}" aria-expanded="false">
                    <i class="bi bi-clock-history"></i>
                    <span class="nav-text">Histórico de Máquinas</span>
                </a>
            </li>


    </div>
</div>
