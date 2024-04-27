<nav class="navbar navbar-expand-sm navbar-light bg-light mt-2">
    <div class="container">
        <div class="w-100 d-flex justify-content-between ">
            <div class="text-start">
                <button type="button" id="menuButton" class="btn"><i class="fa-solid fa-bars"></i></button>
            </div>
            <div class="d-flex align-content-center">
                <div>
                    <b class="me-5">{{ auth()->user()->name }}
                    ({{ auth()->user()->role }})
                    </b>
                </div>
                <a href="/logout" class="btn btn-danger"><i class="fa fa-sign-out"></i></a>

            </div>
        </div>
    </div>
</nav>
<script>
    var menuButton = document.getElementById('menuButton');
    var sidebar = document.querySelector('.col-auto');

    function tutup() {
        sidebar.classList.toggle('d-none');
    }

    menuButton.addEventListener('click', function() {
        tutup();
    });
</script>
