@extends('layouts.dashboard',[
    'page_title'=>"dashboard",
    'custom_css'=>"dashboard.css"
])

@php
    $hospitals = \App\Models\Hospital::all();

@endphp


@section('content')
    <x-content-heading :name="'Dashboard'"/>

    <x-sub-nav :buttons="$nav_buttons"/>

    <form class="filter_bar" style="display: grid">
        <button id="filter_button" onclick="toggle_filter_bar()">
            Toggle Filters
        </button>
    </form>
    <div class="dashboard_filter" data-toggle="false">
        <div class="filter_panel">
            <div class="input_elem">

                <label for="">Hospital</label>
                <select name="hospital" id="hospital">
                    <option value="0">All</option>
{{--                    update--}}

                @if(isset($hospitals) && count($hospitals) > 0)
                        @foreach($hospitals as $hospital)
                            <option value="{{$hospital->id}}">{{$hospital->Name}}</option>
                        @endforeach
                    @endif

                </select>
            </div>
            <div class="input_elem">
                <label for="">Date of Birth</label>
                <input type="Date" name="date_of_birth">
            </div>
            <div class="input_elem">
                <label for="">Last Name</label>
                <input type="text" name="last_name">
            </div>
            <div class="input_elem">
                <label for="">Gender</label>
                <select name="gender" id="">
                    <option value="">All</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="input_elem">
                <label for="">Type of birth</label>
                <select name="typ_of_birth" id="">
                    <option value="">All</option>
                    <option value="Normal">Normal</option>
                    <option value="Stale">Stale</option>
                </select>
            </div>
        </div>
        <div class="action-button">
            <button onclick="collect_filters()">Apply</button>
            <button onclick="clear_filters()">Clear</button>
        </div>

    </div>
    <div class="body_layout dashboard_table_view">
        @if(isset($records) && count($records) > 0 )
            <x-App.Tables.dashboard-table :records="$records">

            </x-App.Tables.dashboard-table>
        @else
            <p>No Records Found</p>
        @endif
    </div>

    <script>
        let elem = $('.dashboard_filter');

        function toggle_filter_bar() {
            event.preventDefault();
            status = elem.attr('data-toggle');

            if (status == 'true') {
                elem.attr('data-toggle', false);
            } else {
                elem.attr('data-toggle', true);
            }


            layout_filters();
        }

        function layout_filters() {

            status = elem.attr('data-toggle');

            if (status == "true") {
                elem.css('height', '195px');
                console.log("toggling down");
            } else {
                elem.css('height', '0px');
                console.log("toggling up");
            }
        }

        function collect_filters() {
            let hospital = $("[name='hospital']").val();
            let date_of_birth = $("[name='date_of_birth']").val();
            let last_name = $("[name='last_name']").val();
            let gender = $("[name='gender']").val();
            let typ_of_birth = $("[name='typ_of_birth']").val();

            let data = {
                "hospital": hospital,
                "date_of_birth": date_of_birth,
                "last_name": last_name,
                "gender": gender,
                "typ_of_birth": typ_of_birth
            }



            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/filterData',
                data: {
                    'data': data
                },
                success: function (data) {
                    console.log(data);
                    $('.dashboard_table_view').html(data);
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }
// update
        function clear_filters() {
            $("[name='hospital']").val("");
            $("[name='date_of_birth']").val("");
            $("[name='last_name']").val("");
            $("[name='gender']").val("");
            $("[name='typ_of_birth']").val("");

            collect_filters();
        }
    </script>
@endsection


