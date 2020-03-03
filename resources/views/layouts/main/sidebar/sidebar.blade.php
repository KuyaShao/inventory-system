
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Inventory System</div>
        <div class="list-group list-group-flush">
            <a href="{{route("admin.inventories.index")}}" class="list-group-item list-group-item-action bg-light">Inventories</a>
            <a href="{{route('admin.supplies.index')}}" class="list-group-item list-group-item-action bg-light">Supplies</a>
            <a href="{{route('admin.vehicles.index')}}" class="list-group-item list-group-item-action bg-light">Vehicles</a>
           @can('manage-users')
            <a href="{{route('admin.users.index')}}" class="list-group-item list-group-item-action bg-light">Users</a>
            @endcan
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
