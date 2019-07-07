@extends('admin.layouts.main')

@section('title',__('Edit User'))

@section('content')
    @include('admin.includes.title')
    @include('admin.includes.error')
    <form action="{{ route('vendor.update',$main->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>{{ __('admin.users-name') }}</label>
            <input type="text" class="form-control" name="firstname" value="{{ $main->name }}"
                   placeholder="{{ __('admin.users-enter-name') }}">
        </div>
        <div class="form-group">

            <input type="hidden" class="form-control" name="lastname" value="{{ $main->name }}"
                   placeholder="{{ __('admin.users-enter-name') }}">
        </div>

        <div class="form-group">
            <label>{{ __('admin.users-number') }}</label>
            <input type="text" class="form-control" name="number" value="{{ $main->number }}"
                   placeholder="{{ __('admin.users-enter-number') }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('admin.users-email') }}</label>
            <input type="email" class="form-control" name="email" value="{{ $main->email }}"
                   placeholder="{{ __('admin.users-enter-email') }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('admin.users-password') }}</label>
            <input type="password" class="form-control" name="password" value="{{ $main->password }}"
                   placeholder="{{ __('admin.users-enter-password') }}" required>
        </div>

        <div class="form-group">
            <label>Select Vendor's Brand</label>
            <select class="form-control" name="vendor" required>
                <option
                value="{{ $main->vendor}}">{{ $main->vendor }}</option>
                @foreach($brand as $item)
{{--                    @if($main->role->id === $item->id) @continue; @endif--}}
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-lg btn-original btn-block" type="submit">{{ __('admin.edit') }}</button>
    </form>
@endsection
