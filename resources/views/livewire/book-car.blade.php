<div>
    <div class="form-group row" wire:model="carClassId">
        <label for="car_class_id" class="col-md-4 col-form-label text-md-right">{{ __('Car Class') }}</label>

        <div class="col-md-6">
            <select id="car_class_id" class="form-control" name="car_class_id" required>
                <option value="" selected disabled>select class</option>
                @foreach($carClasses as $class)
                    <option {{ $class->id === old('car_class_id') ? 'selected' : '' }} value={{ $class->id }}>{{ $class->name }}</option>
                @endforeach
            </select>

            @error('car_class_id')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row" wire:model="fromDate">
        <label for="from_date" class="col-md-4 col-form-label text-md-right">{{ __('From Date') }}</label>

        <div class="col-md-6">
            <input id="from_date"
                   type="date"
                   min="{{ \Carbon\Carbon::now()->toDateString() }}"
                   max="{{ $toDate ? \Carbon\Carbon::parse($toDate)->subDay()->toDateString() : '' }}"
                   class="form-control @error('from_date') is-invalid @enderror"
                   name="from_date"
                   value="{{ $fromDate ?? old('from_date') }}"
                   required>

            @error('from_date')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row" wire:model="toDate">
        <label for="to_date" class="col-md-4 col-form-label text-md-right">{{ __('To Date') }}</label>

        <div class="col-md-6">
            <input id="to_date"
                   type="date"
                   min="{{ $fromDate ? \Carbon\Carbon::parse($fromDate)->addDay()->toDateString() : \Carbon\Carbon::now()->addDay()->toDateString() }}"
                   class="form-control @error('to_date') is-invalid @enderror"
                   name="to_date"
                   value="{{ $toDate ?? old('to_date') }}"
                   required>

            @error('to_date')
            <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>

    @if($carClassId && $fromDate && $toDate)
        <div class="form-group row" wire:model="carId">
            <label for="car_id" class="col-md-4 col-form-label text-md-right">{{ __('Car') }}</label>


            <div class="col-md-6">
                <select id="car_id" class="form-control" name="car_id" required>
                    <option value="" selected disabled>select car</option>
                    @foreach(\App\Models\Car::queryAvailable($fromDate, $toDate, $carClassId)->get() as $car)
                        <option value={{ $car->id }}>{{ $car->model }}</option>
                    @endforeach
                </select>

                @error('car_id')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="start_location_id" class="col-md-4 col-form-label text-md-right">{{ __('Start Location') }}</label>

            <div class="col-md-6">
                <select id="start_location_id" class="form-control" name="start_location_id" required>
                    <option value="" selected disabled>select start location</option>
                    @foreach($locations as $location)
                        <option value={{ $location->id }}>{{ $location->name }}</option>
                    @endforeach
                </select>

                @error('start_location_id')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="end_location_id" class="col-md-4 col-form-label text-md-right">{{ __('End Location') }}</label>

            <div class="col-md-6">
                <select id="end_location_id" class="form-control" name="end_location_id" required>
                    <option value="" selected disabled>select end location</option>
                    @foreach($locations as $location)
                        <option value={{ $location->id }}>{{ $location->name }}</option>
                    @endforeach
                </select>

                @error('end_location_id')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row" wire:model="equipmentIds">
            <label for="equipment_ids" class="col-md-4 col-form-label text-md-right">{{ __('Equipment') }}</label>

            <div class="col-md-6">
                <select id="equipment_ids" class="form-control" name="equipment_ids[]" multiple>
                    @foreach($equipment as $item)
                        <option value={{ $item->id }}>{{ $item->name }}</option>
                    @endforeach
                </select>

                @error('equipment_ids')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="notes" class="col-md-4 col-form-label text-md-right">{{ __('Notes') }}</label>

            <div class="col-md-6">
                <textarea id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes">{{ old('notes') }}</textarea>

                @error('notes')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        @if($carId)
            <div class="form-group row">
                <p class="col-md-4 col-form-label text-md-right">Price</p>

                <div class="col-md-6">
                    <span class="form-control">
                        {{ \App\Models\Car::findOrFail($carId)->price * \Carbon\Carbon::parse($fromDate)->diffInDays($toDate) + \App\Models\Equipment::findMany($equipmentIds)->sum('price') }} EUR
                    </span>
                </div>
            </div>
        @endif
    @endif
</div>
