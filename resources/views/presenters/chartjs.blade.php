@extends('index')

@section('report')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

<canvas id="myChart" width="400" height="300"></canvas>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [{!! $labels !!}],
            datasets: [
                @foreach($datasets as $num => $dataset)
                {
                    label: "{{ $dataset['label'] }}",
                    data: [{{ $dataset['data'] }}],
                    backgroundColor: '{{ $color($num) }}',
                    borderColor: '{{ $color($num) }}',
                    borderWidth: 1,
                    fill: false,
                },
                @endforeach
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

@endsection