@extends('admin.layouts.main')

@section('title',__('admin.purchased-commodities-title'))

@section('content')
    <div class="content">
        <div class="container">
            <div class="login-page">
                <div class="dreamcrub">
                   <br>
                    <br>
                    <br>
                    <br>
                    <div class="clearfix"></div>
                </div>
                <div class="account_grid">
                    <div class="col-md-12 login-left wow fadeInLeft">
                        <div class="bs-docs-example">
                            <h2>Vendor's Orders</h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Shipment Status</th>
                                    {{--<th scope="col">{{ __('site.profile-purchased-commodities-price') }}</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($goods as $item)
                                    @if(in_array(Auth::user()->vendor, array($item->name)))
                                    <tr>
                                        <td>  {{$item->name}}  </td>
                                        <td>  {{$item->price}}  </td>
                                        <td>  @if(strtoupper($item->ship_status) == '')
                                                <div class="text-info">Not Taken</div>
                                                @elseif(strtoupper($item->ship_status) == 0 )
                                                    <div class="text-info">Not Taken</div>
                                            @elseif(strtoupper($item->ship_status) == "WAITING")
                                                <div class="text-info">Not Taken</div>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection









































    {{--<br>--}}
    {{--<br>--}}
    {{--<br>--}}
    {{--<h1>Section for Suppliers</h1>--}}






    {{--<table class="table-bordered">--}}
{{--        @if(in_array(Auth::user()->role->name, ['Moderator','Admin']))--}}
        {{--<tr>--}}
            {{--@foreach($goods as $item)--}}
                {{--@foreach($abc as $abcd)--}}

{{--                {{$item->toArray}}--}}
{{--            {{dd($item)}}--}}
                {{--@if(in_array(Auth::user()->vendor, array($item->name)))--}}
            {{--<td>Name     </td>--}}
                    {{--<td>Price     </td>--}}
                    {{--<td>Status     </td>--}}
        {{--<tr>--}}
            {{--<td>  {{$item->name}}  </td>--}}
            {{--<td>  {{$item->price}}  </td>--}}
            {{--<td>  @if(strtoupper($item->ship_status) == '')--}}
                {{--<div class="text-info">Not Taken</div>--}}
            {{--@elseif(strtoupper($team->payment_status) == "WAITING")--}}
                {{--<div class="text-info">Not Taken</div>--}}
             {{--@endif </td>--}}
        {{--</tr>--}}
        {{--@endif--}}
        {{--@endforeach--}}
{{--@endforeach--}}
    {{--</table>--}}




{{--@endsection--}}
