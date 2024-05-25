<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center" style="width:350px">
        <h3 class="card-title">Thông báo</h3>
        <a href="{{ route('notification.index') }}" class="nav-link fs-4 small">Tất cả thông
            báo</a>
    </div>
    @if ($notify->isEmpty())
        <p href="#" class="text-body d-block text-center">Hiện không có thông báo</p>
    @else
        <div class="list-group list-group-flush list-group-hoverable">
            @foreach ($notify as $value)
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <a href="#" class="text-body d-block">{{ $value->title }}</a>
                            <div class="d-block text-muted text-truncate mt-n1" style="max-width:350px">
                                {!! $value->desc !!}
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                    </path>
                                    <path
                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
