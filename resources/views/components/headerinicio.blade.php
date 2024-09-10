<div class="header w-100">
    <div class="header-left">
        <a onclick="abrirSidebar()" class="menu-toggle mx-4" id="menu-toggle">
            <div class="hamburger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </a>
        <h1>SHI - Sistema de Heteroidentificação</h1>
    </div>
    <div class="header-right">
        <span>Olá, {{ Auth::user()->name }}</span>
    </div>
</div>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
