<div class="form-group{{ $errors->has(strval($attribute)) ? ' has-error' : '' }}">
    <label for="url" class="col-md-4 control-label">{{ $slot }}</label>

    <div class="col-md-6">
        <input id="url" type="url" class="form-control" name="url" value="{{ old(strval($attribute)) }}" required autofocus>

        @if ($errors->has(strval($attribute)))
            <span class="help-block">
                <strong>{{ $errors->first(strval($attribute)) }}</strong>
            </span>
        @endif
    </div>
</div>
