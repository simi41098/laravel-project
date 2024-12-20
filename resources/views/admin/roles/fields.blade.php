<!-- Name Field -->
<div class="form-group col-md-6">
    {!! html()->label('Name', 'name') !!}
    {!! html()->text('name', null)->class('form-control')->attribute('placeholder', 'Name of the Role, you\'d like to create?') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-md-12 fields_footer_action_buttons">
    <button class="btn btn-lg btn-success rspSuccessBtns" type="submit" ><i class="fa-duotone fa-floppy-disk"></i> Save</button>
    <a href="{{ route('admin.roles.index') }}" class="btn btn-lg btn-outline-danger"><i class="fa-duotone fa-arrow-left-to-line"></i> Back</a>
</div>
@push('stackedScripts')
    @include('admin.layouts.scripts.regAnotherScript')
    @include('admin.layouts.scripts.swalAjax')
    <script>
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
