<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2">
            <x-button.submit :title="__('Thêm')" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Hiển thị trang chủ') }}
        </div>
        <div class="card-body p-2">
            <x-select class="select2-bs5" name="show_home" :required="true">
                @foreach ($show_home as $key => $item)
                    <x-select-option :value="$key" :title="$item" />
                @endforeach
            </x-select>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Avatar') }}
        </div>
        <div class="card-body p-2">
            <x-input-image-ckfinder name="avatar" showImage="avatar" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Icon') }}
        </div>
        <div class="card-body p-2">
            <x-input-image-ckfinder name="icon" showImage="icon" value="" :isEmpty="true"/>
        </div>
    </div>
</div>
