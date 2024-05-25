@extends('public.auth.layouts.master')

@section('content_auth')
    <div class="card-header border-bottom mb-3">
        <h2 class="fw-bold">@lang('Thông tin cá nhân')</h2>
    </div>

    <x-form :action="route('profile.update')" type="put" :validate="true" enctype="multipart/form-data">
        <div class="card-body">

            <div class="row align-items-center justify-content-between">
                <div class="col-md-3 col-12">
                    <div class="row justify-content-center align-items-center gap-2">
                        <div class="col-md-12 col-12 text-center">
                            <span class="avatar avatar-xl" id="avatarPreview"
                                style="background-image: url('{{ $auth->avatar ? asset($auth->avatar) : asset('public/assets/images/avav.png') }}')"></span>
                        </div>

                        <div class="col-md-12 col-12 text-center">
                            <input type="file" id="uploadAvatar" name="avatar" accept="image/*"
                                onchange="previewAvatar(event)">
                            <label for="uploadAvatar" class="btn btn-outline-cyan mx-auto">Đổi ảnh đại diện</label>
                        </div>
                    </div>
                </div>
                <div class="row col-md-9 col-12">
                    <div class="col-lg-6 col-12">
                        <div class="mb-3">
                            <label class="form-label required">@lang('fullname')</label>
                            <x-input type="fullname" class="shadow-none" name="fullname" :value="$auth->fullname" :placeholder="trans('Nhập họ và tên')"
                                :required="true" />
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="mb-3">
                            <label class="form-label required">@lang('email')</label>
                            <x-input-email class="shadow-none" name="email" :value="$auth->email" :required="true"
                                :placeholder="trans('Địa chỉ email')" disabled="true" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="mb-3">
                            <label class="form-label required">@lang('phone')</label>
                            <x-input-phone class="shadow-none" name="phone" :value="$auth->phone" :required="true"
                                :placeholder="trans('Số điện thoại')" />
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="mb-3">
                            <label class="form-label required">@lang('birthday')</label>
                            <x-input type="date" class="shadow-none" name="birthday" :value="$auth->birthday" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">@lang('address')</label>
                            <x-input class="shadow-none" name="address" :value="$auth->address" :placeholder="trans('address')" />
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <x-button type="submit" class="ms-auto btn-cyan mt-3">@lang('Lưu thay đổi')</x-button>
    </x-form>
@endsection


<script>
    function previewAvatar(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').style.backgroundImage = 'url(' + e.target.result + ')';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
