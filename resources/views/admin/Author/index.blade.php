@extends('admin.layouts.main')

@section('title',__('admin.purchased-commodities-title'))

@section('content')

    <br>
    <br>
    <br>
    <h1>Section for Suppliers</h1>






    <table class="paleBlueRows">

        <tr> @foreach($goods as $item)
                <td>Name     </td>
                <td>Price     </td>

        </tr>
        <tr>


            <td>    {{$item->name}}   </td>
            <td>  {{$item->price}}  </td>



            @endforeach
        </tr>

    </table>




@endsection
