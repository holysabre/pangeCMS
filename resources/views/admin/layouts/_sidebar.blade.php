<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            @php
                $menus = \App\Models\Menu::get()->toTree();
            @endphp

            @if($menus)
                @foreach($menus as $menu)
                    <li class="treeview">
                        <a href="javascript:;">
                            <i class="icon {{ $menu->icon }}"></i>
                            <span>{{ $menu->name }}</span>
                            <span class="pull-right-container">
                                <i class="icon icon-angle-left"></i>
                            </span>
                        </a>
                        @if($menu->children)
                            <ul class="treeview-menu">
                                @foreach($menu->children as $child)
                                    <li>
                                        <a href="{{ route($child->route) }}">
                                            <i class="icon {{ $child->icon }}"></i> {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
    </section>
</aside>