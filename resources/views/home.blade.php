@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if($user->is_admin == 1)
                    <div class="col-lg-4">
                        <h4>Total Items Count</h4>
                        <h3> {{$itemsCount}} </h3>
                    </div>
                     <div class="col-lg-4">
                         <h4>Average Items Price</h4>
                        <h3> US$ {{$itemsAveragePrice}} </h3>
                    </div>
                     <div class="col-lg-4">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                    <div class="col-lg-12">
                       <h4> Last 5 Items </h4>
                           <table class="table table-striped table-bordered">
                                <tr> 
                                    <th>Name</th>
                                    <th>Vendor Name</th>
                                    <th>Vendor Photo</th>
                                    <th>Item Photo</th>
                                    <th>Price</th>
                                    <th>Tags</th>
                                 </tr>
                                @foreach ($recentItems as $item)
                                 <tr> 
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->vendor->name }}</td>
                                    <td>
                                         @if(file_exists('storage/'. $item->vendor->logo ) && $item->vendor->logo != null)
                                            <img class="img-fluid img-thumbnail" width="150" src="{{ asset('/storage/'. $item->vendor->logo ) }}">
                                         @endif
                                    </td>
                                    <td>
                                    
                                        @if(file_exists('storage/'. $item->photo ) && $item->photo != null)
                                         <img  class="img-fluid img-thumbnail" width="150" src="{{ asset('/storage/'. $item->photo ) }}">
                                          @endif
                                  
                                    </td>
                                    <td> ${{  $item->price }}</td>
                                    <td>{{  $item->tags }}</td>
                                 </tr>
                                @endforeach
                           </table>

                    </div>
                        <br>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @else
                        You are logged in!
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            @include('nav.sidebar')
        </div>
    </div>
</div>

@endsection

<script type="text/javascript">
    window.onload = function() {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Average Items per Category"
        },
        subtitles: [{
            text: "November 2017"
        }],
        data: [{
            type: "pie",
            yValueFormatString: "#,##0.00\"%\"",
            indexLabel: "{label} ({y})",
            dataPoints: @php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); @endphp
        }]
    });
    chart.render();  
}
</script>