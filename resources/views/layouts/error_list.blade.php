@if (count($errors) > 0)
    <div class='row validation-errors'>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="alert alert-danger">
                    <strong>Upsss!</strong>Error...<br />
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif