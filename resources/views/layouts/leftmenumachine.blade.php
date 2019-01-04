<div class="page-aside">
    <div class="page-aside-switch">
        <i class="icon wb-chevron-left" aria-hidden="true"></i>
        <i class="icon wb-chevron-right" aria-hidden="true"></i>
    </div>
    <div class="page-aside-inner page-aside-scroll">
        <div data-role="container">
            <div data-role="content">

                <section class="page-aside-section">
                     
                    <a class="list-group-item {{ Route::current()->getName() == 'machine-management.show' ? 'list-group-item-action active' : '' }}" href="{{ url('machine-management/show', [$machine->id]) }}"> <i class="icon wb-dashboard" aria-hidden="true"></i>Dashboard</a>

                    <h5 class="page-aside-title">Machine Logs </h5>
                    <?php
                    $frm_m = date('m');
                    $frm_d = date('d', strtotime('-3 days'));
                    $frm_y = date('Y');
                    
                    $to_m = date('m');
                    $to_d = date('d', strtotime('+1 day'));
                    $to_y = date('Y');
                    $t="%2F";
                    //$query = "?dateRange=01%2F03%2F2019+-+01%2F04%2F2019";
                    $query = "?dateRange=".$frm_m."".$t."".$frm_d."".$t."".$frm_y."".$t."+-+".$to_m."".$t."".$to_d."".$t."".$to_y."".$t;
                    //echo $query;
                    ?>  
                        <div class="list-group">
                            <a class="list-group-item {{ Route::current()->getName() == 'machine-management.error' ? 'list-group-item-action active' : '' }}" href="{{ url('machine-management/error', [$machine->id]) }}<?php echo $query; ?>"/> <i class="icon wb-folder" aria-hidden="true"></i>Error Logs</a>
                        <a class="list-group-item {{ Route::current()->getName() == 'machine-management.money' ? 'list-group-item-action active' : '' }}" href="{{ url('machine-management/money', [$machine->id]) }}<?php echo $query; ?>"/> <i class="icon wb-folder" aria-hidden="true"></i>Money Logs</a>
                        <a class="list-group-item {{ Route::current()->getName() == 'machine-management.win' ? 'list-group-item-action active' : '' }}" href="{{ url('machine-management/win', [$machine->id]) }}<?php echo $query; ?>"/><i class="icon wb-folder" aria-hidden="true"></i>Win Logs</a>
                        <a class="list-group-item {{ Route::current()->getName() == 'machine-management.goals' ? 'list-group-item-action active' : '' }}" href="{{ url('machine-management/goals', [$machine->id])}}<?php echo $query; ?>"/><i class="icon wb-folder" aria-hidden="true"></i>Goals Logs</a>
                    </div>

                    <h5 class="page-aside-title">Machine Settings </h5>

                    <div class="list-group">
                       
                        <a class="list-group-item {{ Route::current()->getName() == 'machine-settings.edit' ? 'list-group-item-action active' : '' }}" href="{{ route('machine-settings.edit', ['id' => $machine->id]) }}"> <i class="icon wb-wrench" aria-hidden="true"></i>Info</a>
                        <a class="list-group-item {{ Route::current()->getName() == 'claw-settings.edit' ? 'list-group-item-action active' : '' }}" href="{{ route('claw-settings.edit', ['id' => $machine->id]) }}"> <i class="icon wb-wrench" aria-hidden="true"></i>Claw </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'game-settings.edit' ? 'list-group-item-action active' : '' }}" href="{{ route('game-settings.edit', ['id' => $machine->id]) }}"><i class="icon wb-wrench" aria-hidden="true"></i>Game </a>
                        <a class="list-group-item {{ Route::current()->getName() == 'machine-accounts.edit' ? 'list-group-item-action active' : '' }}" href="{{ route('machine-accounts.edit', ['id' => $machine->id]) }}"><i class="icon wb-wrench" aria-hidden="true"></i>Accounts</a>
                        <a class="list-group-item {{ Route::current()->getName() == 'cash-boxes.edit' ? 'list-group-item-action active' : '' }}" href="{{ route('cash-boxes.edit', ['id' => $machine->id]) }}"><i class="icon wb-wrench" aria-hidden="true"></i>Cash Boxes</a>
                        <a class="list-group-item {{ Route::current()->getName() == 'product-definitions.edit' ? 'list-group-item-action active' : '' }}" href="{{ route('product-definitions.edit', ['id' => $machine->id]) }}"><i class="icon wb-wrench" aria-hidden="true"></i>Product Definitions</a>
                    </div>

                </section>

            </div>
        </div>
    </div>
</div>




