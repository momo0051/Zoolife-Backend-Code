@if(session()->has('success'))
    <div class="alert alert-success">
       
    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
    <strong>Success!</strong>  {{ session()->get('success') }}.

    </div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">

    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
    <strong>Error!</strong>  {{ session()->get('error') }}.

</div>
@endif

@if(session()->has('danger'))
<div class="alert alert-danger">

    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
    <strong>Danger!</strong>  {{ session()->get('danger') }}.

</div>
@endif

@if(session()->has('warning'))
<div class="alert alert-warning">

    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
    <strong>Warning!</strong>  {{ session()->get('warning') }}.

</div>
@endif


