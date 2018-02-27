<div class="page-aside">
    <div class="page-aside-switch">
        <i class="icon wb-chevron-left" aria-hidden="true"></i>
        <i class="icon wb-chevron-right" aria-hidden="true"></i>
    </div>
    <div class="page-aside-inner page-aside-scroll">
        <div data-role="container">
            <div data-role="content">

                <section class="page-aside-section">
                     
                    <!--a class="list-group-item" href="" > <i class="icon wb-dashboard" aria-hidden="true"></i>Dashboard</a-->

                    <h5 class="page-aside-title">Manage User </h5>
                    <?php //if($user_role == 'Super Admin'){ ?>
                    <!--div class="list-group">
                        <a class="list-group-item" href="{{ route('profile.index') }}"> <i class="icon wb-folder" aria-hidden="true"></i>User Info</a>      
                        <a class="list-group-item" href=""> <i class="icon wb-folder" aria-hidden="true"></i>Permissions</a> 
                        <a class="list-group-item" href="{{ route('profile.create') }}"> <i class="icon wb-folder" aria-hidden="true"></i>Add User</a> 
                        <a class="list-group-item" href=""> <i class="icon wb-folder" aria-hidden="true"></i>User Log History</a> 
                        <a class="list-group-item" href=""><i class="icon wb-folder" aria-hidden="true"></i>Update Password</a>   
                        <a class="list-group-item" href=""><i class="icon wb-folder" aria-hidden="true"></i>Disable Account</a>                                       
                    </div-->                   
                    <?php //}else{ ?>
                    <div class="list-group">
                        <a class="list-group-item" href="{{ route('profile.index') }}"> <i class="icon wb-folder" aria-hidden="true"></i>User Info</a>                        
                        <a class="list-group-item" href="#"> <i class="icon wb-folder" aria-hidden="true"></i>Activities</a>                       
                    </div>
                    <?php //} ?>

                </section>

            </div>
        </div>
    </div>
</div>




