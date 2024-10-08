<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    button:hover i {
        transform: scale(1.1);
    }
</style>
<div class="header ">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">

                        <div class="dropdown-menu p-0 m-0">

                        </div>
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell ai-icon" href="{{ route('user.edit', auth()->user()->id) }}" role="button">
                            <i class="bi bi-person-circle"></i>
                            <div class="pulse-css"></div>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="border: none; background: none; cursor: pointer; margin-left: 5px;">
                                <i class="fas fa-sign-out-alt text-light" style="font-size: 20px; transition: transform 0.3s;"></i>
                            </button>
                        </form>


                    </li>

                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="list-unstyled">
                                <li class="media dropdown-item">
                                    <span class="success"><i class="ti-user"></i></span>
                                    <div class="media-body">

                                    </div>
                        </div>

        </nav>
    </div>
</div>
