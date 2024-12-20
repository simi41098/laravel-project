<div class="col-sm-9">
    <div class="row">
        <!-- Name Field -->
        <div class="form-group col-sm-8">
            {!! html()->label('Name:', 'name') !!}
            {!! html()->text('name')->class('form-control')->placeholder('Name of the user')->attribute('autocomplete', 'off') !!}
        </div>
        <!-- Roles Field -->
        <div class="form-group col-sm-4">
            {!! html()->label('Role:', 'role') !!}
            {!! html()->select('role[]', $roleItems)->class('form-control select2-multiple')
                ->attribute('data-placeholder', 'Define user roles')
                ->attribute('multiple', 'multiple')
                ->attribute('autocomplete', 'off')
                ->id('role') !!}
        </div>
        <!-- Email Field -->
        <div class="form-group col-sm-6">
            {!! html()->label('Email:', 'email') !!}
            {!! html()->text('email')->class('form-control')->placeholder('Email of the user')->attribute('autocomplete', 'off') !!}
        </div>
        <!-- Mobile Field -->
        <div class="form-group col-sm-6">
            {!! html()->label('Mobile:', 'mobile') !!}
            {!! html()->text('mobile')->class('form-control')->placeholder('Mobile of the user')->attribute('autocomplete', 'off') !!}
        </div>
        <!-- Password Field -->
        @if($type ?? '' == 'create')
            <div class="form-group col-sm-12">
                {!! html()->label('Password:', 'password') !!}
                {!! html()->password('password')->class('form-control')->placeholder('Password of the user')->attribute('autocomplete', 'off') !!}
            </div>
        @endif
    </div>
</div>
@php $hasAvatar = !empty($user) ? $user->hasMedia('avatar') : false @endphp
@include('admin.layouts.scripts.dzSingleImageField', [
    'record' => isset($user) ? $user : '',
    'hasMedia' => $hasAvatar,
    'previewUrl' => $hasAvatar ? $user->avatarUrl['250'] : route('images_default',['resolution' => '250x250']),
    'mediaUuid' => $hasAvatar ? $user->getFirstMedia('avatar')->uuid ?? '' : '',
    'fieldName' => 'avatar',
    'elementId' => 'user_avatar',
    'placeHolderText' => "Drop/Select User Avatar<br/>(Max: 1 MB)"
])
<!-- Submit Field -->
<div class="form-group col-md-12 fields_footer_action_buttons">
    <button class="btn btn-lg btn-success rspSuccessBtns" type="submit" ><i class="fa-duotone fa-floppy-disk"></i> Save</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-lg btn-outline-danger"><i class="fa-duotone fa-arrow-left-to-line"></i> Back</a>
</div>

@push('stackedScripts')
    @include('admin.layouts.scripts.regAnotherScript')
    @include('admin.layouts.scripts.swalAjax')

    <script>
        Dropzone.autoDiscover = false;
        uploadImageByDropzone('#user_avatar');

        $('.submitsByAjax').submit(function (e) {
            e.preventDefault();
            let type = '{{ $type ?? '' }}'
            let dataToPass = new FormData($(this)[0]);
            ajaxCallFormSubmit($(this), false, 'Loading! Please wait...', dataToPass,
                type === 'create' ? postCreate : undefined);
        });

        function postCreate(){
            switch_between_register_to_registerAnother_btn($('.submitsByAjax'), false)
        }
    </script>

@endpush
