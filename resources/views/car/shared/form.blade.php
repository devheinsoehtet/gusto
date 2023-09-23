<div class="form-group mb-2">
    <label>Brand</label>
    <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror"
        value="{{ old('brand', optional($car ?? null)->brand) }}">
    @error('brand')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label>Model</label>
    <input type="text" name="model" class="form-control @error('model') is-invalid @enderror"
        value="{{ old('model', optional($car ?? null)->model) }}">
    @error('model')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label>Registration No</label>
    <input type="text" name="registration_no" class="form-control @error('registration_no') is-invalid @enderror"
        value="{{ old('registration_no', optional($car ?? null)->registration_no) }}">
    @error('registration_no')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label>Rental Rate</label>
    <input type="number" name="rental_rate" class="form-control @error('rental_rate') is-invalid @enderror"
        value="{{ old('rental_rate', optional($car ?? null)->rental_rate) }}">
    @error('rental_rate')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label>Status</label>
    <select class="form-select @error('status') is-invalid @enderror" name="status">
        @foreach (session('car_status_options') as $carStatusOption)
            <option value="{{ $carStatusOption }}" @selected(old('status', optional($car ?? null)->status) == $carStatusOption)>{{ $carStatusOption }}</option>
        @endforeach
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label>Door Count</label>
    <select class="form-select @error('door_count') is-invalid @enderror" name="door_count">
        @foreach (session('door_count_options') as $doorCountOption)
            <option value="{{ $doorCountOption }}" @selected(old('door_count', optional($car->properties ?? null)['door_count']) == $doorCountOption)>{{ $doorCountOption }}</option>
        @endforeach
    </select>
    @error('door_count')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label>Seat Count</label>
    <select class="form-select @error('seat_count') is-invalid @enderror" name="seat_count">
        @foreach (session('seat_count_options') as $seatCountOption)
            <option value="{{ $seatCountOption }}" @selected(old('seat_count', optional($car->properties ?? null)['seat_count']) == $seatCountOption)>{{ $seatCountOption }}</option>
        @endforeach
    </select>
    @error('seat_count')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-2">
    <label>Fuel Type</label>
    <select class="form-select @error('fuel_type') is-invalid @enderror" name="fuel_type">
        @foreach (session('fuel_type_options') as $fuelTypeOption)
            <option value="{{ $fuelTypeOption }}" @selected(old('fuel_type', optional($car->properties ?? null)['fuel_type']) == $fuelTypeOption)>{{ $fuelTypeOption }}</option>
        @endforeach
    </select>
    @error('fuel_type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-check-group mb-2">
    <label>Gearbox</label>
    @foreach (session('gear_box_type_options') as $gearboxTypeOption)
        <div class="form-check">
            <input class="form-check-input @error('gear_box_type') is-invalid @enderror" type="radio"
                name="gear_box_type" id="{{ $gearboxTypeOption }}" @checked(old('gear_box_type', optional($car->properties ?? null)['gear_box_type']) == $gearboxTypeOption)
                value="{{ $gearboxTypeOption }}">
            <label class="form-check-label" for="{{ $gearboxTypeOption }}">
                {{ $gearboxTypeOption }}
            </label>
        </div>
    @endforeach
</div>

<div class="form-group mb-2">
    <label>Details</label>
    <textarea class="form-control @error('details') is-invalid @enderror" name="details" rows="3">
        {{ old('details', optional($car ?? null)->details) }}
    </textarea>
    @error('details')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@if (optional($car ?? null)->img_url)
    <img src="{{ asset($car->img_url) }}" width="500" height="600">
@endif

<div class="form-group mb-2">
    <label>Image</label>
    <input name="image" type="file" class="form-control @error('image') is-invalid @enderror">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
