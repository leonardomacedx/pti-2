<!-- resources/views/components/sidebar.blade.php -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-header justify-content-center">
        <h1>Sistema de clínicas</h1>
    </div>
    <nav>
        <ul>
            <li><a href="/inicio">Atendimento</a></li>
            <li><a href="/cadastro-paciente">Cadastro de paciente</a></li>
            @if( session('permissao') == 1)
                <li><a href="/manutencao">Manutenção</a></li>
            @endif
            <li><a href="/logout">Sair</a></li>

        </ul>
    </nav>
</div>
