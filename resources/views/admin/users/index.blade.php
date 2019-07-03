@extends('admin.layouts.main')

@section('title',__('admin.users-title'))

@section('content')
    <div class="row justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-lg-9">
            <div class="d-flex">
                <h1 class="h2">@yield('title')</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="pull-right">
                <a class="btn btn-original" href="{{ route('users.create') }}">{{ __('admin.create-users') }}</a>
            </div>
        </div>
    </div>
    @include('admin.includes.success')
    <div class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th scope="col">{{ __('admin.users-id') }}</th>
                <th scope="col">{{ __('admin.users-name') }}</th>
                <th scope="col">{{ __('admin.users-number') }}</th>
                <th scope="col">{{ __('admin.users-email') }}</th>
                <th scope="col">{{ __('admin.users-password') }}</th>
                <th scope="col">{{ __('admin.users-roles') }}</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($main as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td scope="row">{{ $item->name }}</td>
                    <td scope="row">{{ $item->number }}</td>
                    <td scope="row">{{ $item->email }}</td>
                    <td scope="row">
                        @if($item->password)
                            {{ __('admin.enabled') }}
                        @else
                            {{ __('admin.disabled') }}
                        @endif
                    </td>
                    <td scope="row">
                        {{ $item->role->name }}
                    </td>
                    <td scope="row">
                        <a href="{{ route('users.show',$item->id) }}"><i class="far fa-eye"></i></a>
                        <a href="{{ route('users.edit',$item->id) }}"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('users.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection