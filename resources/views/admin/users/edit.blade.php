@extends('admin.layouts.main')

@section('title',__('admin.edit-users'))

@section('content')
    @include('admin.includes.title')
    @include('admin.includes.error')
    <form action="{{ route('users.update',$main->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>{{ __('admin.users-name') }}</label>
            <input type="text" class="form-control" name="name" value="{{ $main->name }}"
                   placeholder="{{ __('admin.users-enter-name') }}" required>
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
            <label>{{ __('admin.users-roles') }}</label>
            <select class="form-control" name="role_id" required>
                <option value="{{ $main->role->id }}">{{ $main->role->name }}</option>
            @foreach($role as $item)
                    @if($main->role->id === $item->id) @continue; @endif
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-lg btn-original btn-block" type="submit">{{ __('admin.edit') }}</button>
    </form>
@endsection