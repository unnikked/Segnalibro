<div class="form-group{{ $errors->has(strval($attribute)) ? ' has-error' : '' }}">
    <label for="text" class="col-md-4 control-label">{{ $slot }}</label>

    <div class="col-md-6">
        <input id="text" type="text" class="form-control" name="text" value="{{ old(strval($attribute)) }}" required autofocus>

        @if ($errors->has(strval($attribute)))
            <span class="help-block">
                <strong>{{ $errors->first(strval($attribute)) }}</strong>
            </span>
        @endif
    </div>
</div>
