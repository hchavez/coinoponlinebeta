<div class="page-aside">
    <div class="page-aside-switch">
        <i class="icon wb-chevron-left" aria-hidden="true"></i>
        <i class="icon wb-chevron-right" aria-hidden="true"></i>
    </div>
    <div class="page-aside-inner page-aside-scroll">
        <div data-role="container">
            <div data-role="content">

                <section class="page-aside-section">
                    <h5 class="page-aside-title">Settings </h5>
                    <div class="list-group">
                        <a class="list-group-item {{ Route::current()->getName() == 'machines.index' ? 'list-group-item-action active' : '' }}" href="{{ url('machine-management') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Machines
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'theme-lists.index' ? 'list-group-item-action active' : '' }}" href="{{ url('theme-lists') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Themes
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'key.index' ? 'list-group-item-action active' : '' }}" href="{{ url('key') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Key
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'key-location.index' ? 'list-group-item-action active' : '' }}" href="{{ url('key-location') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Key Location
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'machine-type.index' ? 'list-group-item-action active' : '' }}" href="{{ url('machine-type') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Machine Type
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'machine-model.index' ? 'list-group-item-action active' : '' }}" href="{{ url('machine-model') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Machine Model
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'machine-sizes.index' ? 'list-group-item-action active' : '' }}" href="{{ url('machine-sizes') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Machine Sizes
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'checklist.index' ? 'list-group-item-action active' : '' }}" href="{{ url('checklist') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>CheckList
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'machinemodel-checklist.index' ? 'list-group-item-action active' : '' }}" href="{{ url('machinemodel-checklist') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>MachineModel CheckList
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'meters.index' ? 'list-group-item-action active' : '' }}" href="{{ url('meters') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Meters
                        </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'repair-type.index' ? 'list-group-item-action active' : '' }}" href="{{ url('repair-type') }}">
                            <i class="icon wb-folder" aria-hidden="true"></i>Repair Type
                        </a>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>





