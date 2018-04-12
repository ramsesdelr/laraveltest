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
                       <h4> Average Items per Category </h4>
                            <ul>
                                @foreach ($percentItemsPrice as $item)
                                <li>
                                    <b>{{ $item->type_name }}</b> - Qty: {{ $item->total }}
                                </li>
                                @endforeach
                            </ul>
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
                                    <td>Tags</td>
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
