@extends('index')

@section('report')

    <table class="table table-striped table-bordered">

        <thead class="thead-dark">
            <tr>
                <th>#</th>
                @foreach($collection->get('Columns') as $column)
                    <th>{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($collection->get('Rows') as $rowName => $row)
                <tr>
                    <td>{{ $rowName }}</td>
                    @foreach($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection