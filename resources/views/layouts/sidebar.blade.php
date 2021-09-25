<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link navbar-danger">
        <img src="{{ asset(config('app.icon', 'favicon.ico')) }}" alt="App Icon" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <div class="sidebar sidebar-no-expand">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-child-indent nav-compact flex-column" data-widget="treeview" role="menu" data-accordion="false"> @foreach(Module::allEnabled() as $module) @includeIf($module->getLowerName().'::layouts.menuitems') @endforeach </ul>
        </nav>
    </div>
</aside>
