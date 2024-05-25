<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-body">
            <!-- name -->
            <div class="">
                <label class="control-label">{{ __('Tên') }}:</label>
                <x-input name="name" :value="old('name')" :required="true" placeholder="{{ __('Tên') }}" />
            </div>
        </div>
    </div>
</div>
