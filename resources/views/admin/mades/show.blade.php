@extends('admin.layouts.main')

@section('title',__('admin.show-mades'))

@section('content')
    @include('admin.includes.title')
    <ul class="nav mb-md-3">
        <li>
            <a href="{{ route('mades.index') }}" class="btn btn-dark">{{ __('admin.back') }}</a>
            <a href="{{ route('mades.edit', $main->id) }}" class="btn btn-primary">{{ __('admin.update') }}</a>
            <form action="{{ route('mades.destroy', $main->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('admin.delete') }}</button>
            </form>
        </li>
    </ul>
    <table class="table">
        <tr>
            <th>{{ __('admin.mades-id') }}</th>
            <td>{{ $main->id }}</td>
        </tr>

        <tr>
            <th>{{ __('admin.mades-name') }}</th>
            <td>{{ $main->name }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.status') }}</th>
            <td>
                @if($main->status)
                    {{ __('admin.enabled') }}
                @else
                    {{ __('admin.disabled') }}
                @endif
            </td>
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