<div class="row">
    <div class="form-group mr-4" wire:model="carClassId">
        <label for="car_class_id" class="text-md-right">{{ __('Car Class') }}</label>

        <div>
            <select id="car_class_id" class="form-control" name="car_class_id">
                <option value="" selected disabled>select class</option>
                @foreach($carClasses as $class)
                    <option {{ $class->id === old('car_class_id') ? 'selected' : '' }} value={{ $class->id }}>{{ $class->name }}</option>
                @endforeach
            </select>

            @error('car_class_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group mr-4" wire:model="fromDate">
        <label for="from_date" class="text-md-right">{{ __('From Date') }}</label>

        <div>
            <input id="from_date"
                   type="date"
                   min="{{ \Carbon\Carbon::now()->toDateString() }}"
                   max="{{ $toDate ? \Carbon\Carbon::parse($toDate)->subDay()->toDateString() : '' }}"
                   class="form-control @error('from_date') is-invalid @enderror"
                   name="from_date"
                   value="{{ $fromDate ?? old('from_date') }}">

            @error('from_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group mr-4" wire:model="toDate">
        <label for="to_date" class="text-md-right">{{ __('To Date') }}</label>

        <div>
            <input id="to_date"
                   type="date"
                   min="{{ $fromDate ? \Carbon\Carbon::parse($fromDate)->addDay()->toDateString() : \Carbon\Carbon::now()->addDay()->toDateString() }}"
                   class="form-control @error('to_date') is-invalid @enderror"
                   name="to_date"
                   value="{{ $toDate ?? old('to_date') }}">

            @error('to_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group mr-4 d-flex align-items-end ">
        <button class="btn btn-primary">Search</button>
    </div>
</div>
