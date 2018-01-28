<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        label {
            margin-right: 20px;
        }
        .form-group {
            margin-right: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Report example</h1>
        <div class="col-md-12" style="border: 1px solid;"></div>
    </div>
    <div class="row" style="margin: 20px 0;">
        <form class="form-inline" method="post" name="settings" action="{{ route('index') }}">
            <div class="form-group">
                <label for="dataSource">Data Source</label>
                <select class="form-control" id="dataSource" name="data_source">
                    @foreach($data_sources_list as $data_source_class => $data_source_title)
                        <option
                                value="{{ $data_source_class }}"
                                {{ $current_data_source == $data_source_class ? 'selected' : '' }}
                        >
                            {{ $data_source_title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="presenter">Presenter</label>
                <select class="form-control" id="presenter" name="presenter">
                    @foreach($presenters_list as $presenter_class => $presenter_title)
                        <option
                                value="{{ $presenter_class }}"
                                {{ $current_presenter == $presenter_class ? 'selected' : '' }}
                        >
                            {{ $presenter_title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
    <div class="row">
        @yield('report')
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>