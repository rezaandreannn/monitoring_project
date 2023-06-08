<div class="d-flex flex-sm-column justify-content-center pt-6">
    <div>
        {{ $logo ?? '' }}
    </div>

    <div class="card card-primary">

        <div class="card-body">
            {{ $slot }}
        </div>

    </div>
</div>
