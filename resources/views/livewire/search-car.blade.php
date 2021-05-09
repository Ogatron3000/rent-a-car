<div class="row">
    <div class="form-group mr-4" wire:model="carClassId">
        <label for="car_class_id" class="text-md-right">{{ __('Car Class') }}</label>

        <div>
            <select id="car_class_id" class="form-control" name="car_class_id">
                <option value="" selected disabled>select class</option>
                @foreach($carClasses as $class)
                    <option value={{ $class->id }}>{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group mr-4" wire:model="fromDate">
        <label for="from_date" class="text-md-right">{{ __('From Date') }}</label>

        <div>
            <input id="from_date"
                   type="date"
                   min="{{ \Carbon\Carbon::now()->toDateString() }}"
                   max="{{ $toDate ? \Carbon\Carbon::parse($toDate)->subDay()->toDateString() : '' }}"
                   class="form-control"
                   name="from_date"
                   value="{{ $fromDate }}">
        </div>
    </div>

    <div class="form-group mr-4" wire:model="toDate">
        <label for="to_date" class="text-md-right">{{ __('To Date') }}</label>

        <div>
            <input id="to_date"
                   type="date"
                   min="{{ $fromDate ? \Carbon\Carbon::parse($fromDate)->addDay()->toDateString() : \Carbon\Carbon::now()->addDay()->toDateString() }}"
                   class="form-control"
                   name="to_date"
                   value="{{ $toDate }}">
        </div>
    </div>

    <div class="form-group mr-4 d-flex align-items-end ">
        <button class="btn btn-primary">Search</button>
    </div>
</div>
