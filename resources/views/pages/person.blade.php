@extends('layouts.base')

@section('title', 'Person Page | De Archive')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <h2 class="text-primary mb-4">{{ __('person.title') }}</h2>
            <h4 class="text-muted">{{ __('person.bigtitle') }}</h4>

            <h2 class="text-primary my-4">{{ __('person.search') }}</h2>

            <form class="contact-form" action="{{ route('person') }}" method="GET">
                <div class="row mb-3">
                    <div class="col-12 col-sm-6">
                        <label for="name" class="text-primary h5 font-weight-bold">{{ __('person.firstname') }}</label>
                        <input type="text" id="name" name="firstname" class="form-control search-inp mb-3"
                            placeholder="Enter" value="{{ old('firstname', request('firstname')) }}">
                    </div>
                    <div class="col">
                        <label for="year-picker" class="text-primary h5 font-weight-bold">{{ __('person.birth') }}</label>
                        <input type="text" id="year-picker" name="birth_year" class="form-control search-inp mb-3"
                            placeholder="Enter" value="{{ old('birth_year', request('birth_year')) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="lastname" class="text-primary h5 font-weight-bold">{{ __('person.lastname') }}</label>
                        <input type="text" id="lastname" name="lastname" class="form-control search-inp mb-3"
                            placeholder="Enter" value="{{ old('lastname', request('lastname')) }}">
                    </div>
                    <div class="col">
                        <label for="object" class="text-primary h5 font-weight-bold">{{ __('person.object') }}</label>
                        <select name="object" id="object" class="form-control search-inp mb-3">
                            <option value="">Select</option>
                            <!-- Populate options here -->
                            <!-- Example: -->
                            <option value="object1" {{ old('object', request('object')) == 'object1' ? 'selected' : '' }}>
                                Object 1</option>
                            <option value="object2" {{ old('object', request('object')) == 'object2' ? 'selected' : '' }}>
                                Object 2</option>
                        </select>
                    </div>
                </div>
                <div class="row d-flex justify-content-center my-5">
                    <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <button type="submit" class="btn btn-primary btn-lg w-100 py-3">{{ __('person.search') }}</button>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button type="reset" class="btn btn-outline-primary btn-lg w-100 py-3"
                            id="clear">{{ __('person.clear') }}</button>
                    </div>
                </div>
                @if ($persons->currentPage() > 1 || $persons->perPage() != 10)
                    <input type="hidden" name="per_page" value="{{ $persons->perPage() }}">
                    <input type="hidden" name="page" value="{{ $persons->currentPage() }}">
                @endif
            </form>

            <div class="table-responsive rounded-5">
                <table class="table table-striped person-table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('person.lastname') }}</th>
                            <th scope="col">{{ __('person.firstname') }}</th>
                            <th scope="col">{{ __('person.surname') }}</th>
                            <th scope="col">{{ __('person.year') }}</th>
                            <th scope="col">{{ __('person.birthplace') }}</th>
                            <th scope="col">{{ __('person.object') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($persons as $person)
                            <tr>
                                <th>{{ $person->lastname }}</th>
                                <td>{{ $person->firstname }}</td>
                                <td>{{ $person->surname }}</td>
                                <td>{{ $person->year }}</td>
                                <td>{{ $person->birth_place }}</td>
                                <td>{{ $person->object }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">{{ __('person.nodata') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex">
                    <div class="mx-auto">
                        {{ $persons->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        // jQuery code to change icon color on input focus
        $('.contact-form input, .contact-form textarea').focus(function() {
            $(this).siblings('.contact-form-icon').css('color', '#007BFF');
        }).blur(function() {
            $(this).siblings('.contact-form-icon').css('color', '#CCCCCC');
        });

        $('#clear').on('click', function() {
            $('.contact-form input, .contact-form textarea').val('');
        });

        $("#year-picker").datepicker({
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy',
            yearRange: '1800:2024',
            onClose: function(dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 1));
            }
        }).focus(function() {
            $(".ui-datepicker-month").hide();
            $(".ui-datepicker-calendar").hide();
        }).on('input', function() {
            let vvl = $(this).val();
            if (vvl.length == 4) {
                $(this).datepicker('setDate', new Date(vvl, 1));
                $(".ui-datepicker-month").hide();
                $(".ui-datepicker-calendar").hide();
            }
        });
    </script>
@endsection
