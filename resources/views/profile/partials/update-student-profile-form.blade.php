@php
    $userRoles = auth()->user()->roles->pluck('id')->toArray();
@endphp

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PATCH')
    
    <!-- GPA Input -->
    <div>
        <label for="gpa">Grade Point Average (0-7):</label>
        <input type="number" name="gpa" id="gpa" min="0" max="7" step="0.01" value="{{ old('gpa', auth()->user()->gpa) }}">
    </div>

    <!-- Roles Checkbox -->
    <div>
        <label>Roles:</label>
        @foreach($roles as $role)
        <div>
        <input type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}" @if(in_array($role->id, $userRoles)) checked @endif>

            <label for="role_{{ $role->id }}">{{ $role->name }}</label>
            
        </div>
        @endforeach
    </div>
    

    
    <!-- Submit Button -->
    <div>
        <button type="submit">Update Profile</button>

        @if (session('status') === 'profile-updated')
    <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600"
    >{{ __('Saved.') }}</p>
@endif
    </div>
</form>
