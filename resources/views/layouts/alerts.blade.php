@if (session()->has('success'))
<div class="alert alert-success  d-flex justify-content-between align-items-center">
    <Strong>{{session()->get('success')}}</Strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if (session()->has('info'))
<div class="alert alert-info d-flex justify-content-between align-items-center">
    <Strong>{{session()->get('info')}}</Strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if (session()->has('error'))
<div class="alert alert-danger d-flex justify-content-between align-items-center">
    <Strong>{{session()->get('error')}}</Strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger d-flex justify-content-between align-items-center">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
