@extends('admin.layouts.main')

@section('title',__('admin.show-purchased-commodities'))

@section('content')
    @include('admin.includes.title')
    <ul class="nav mb-md-3">
        <li>
            <a href="{{ route('purchased-commodities.index') }}" class="btn btn-dark">{{ __('admin.back') }}</a>
            <a href="{{ route('purchased-commodities.edit', $main->id) }}" class="btn btn-primary">{{ __('admin.update') }}</a>
            <form action="{{ route('purchased-commodities.destroy', $main->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('admin.delete') }}</button>
            </form>
        </li>
    </ul>
    <table class="table">
        <tr>
            <th>{{ __('admin.purchased-commodities-id') }}</th>
            <td>{{ $main->id }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.purchased-commodities-user') }}</th>
            <td>{{ $main->user->name }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.purchased-commodities-product') }}</th>
            <td>{{ $main->product->name  }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $main->product->price  }}</td>
        </tr>
        <tr>
            <th>Brand</th>
            <td>{{ $main->product->brand_id  }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.created') }}</th>
            <td>{{ $main->created_at }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.update') }}</th>
            <td>{{ $main->updated_at }}</td>
        </tr>
    </table>
@endsection
