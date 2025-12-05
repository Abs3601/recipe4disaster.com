
<x-app-layout>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

	<div class="mb-6">
		<h1 class="h1">Create Admin Account</h1>
		<p class="p mt-2">Create a new administrator account. Password will be set now and can be changed later by the user.</p>
	</div>

	@if(session('status') === 'admin-created')
		<div class="recipe-card">
			<p class="p">New admin account created.</p>
		</div>
	@endif

	<div class="recipe-card">
		<form method="POST" action="{{ route('admin.store') }}">
			@csrf

			<div class="mb-4">
				<label for="name" class="label">Name</label>
				<input id="name" name="name" type="text" value="{{ old('name') }}" class="input" required autofocus />
				@error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
			</div>

			<div class="mb-4">
				<label for="email" class="label">Email</label>
				<input id="email" name="email" type="email" value="{{ old('email') }}" class="input" required />
				@error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
			</div>

			<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
				<div>
					<label for="password" class="label">Password</label>
					<input id="password" name="password" type="password" class="input" required autocomplete="new-password" />
					@error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
				</div>

				<div>
					<label for="password_confirmation" class="label">Confirm Password</label>
					<input id="password_confirmation" name="password_confirmation" type="password" class="input" required autocomplete="new-password" />
				</div>
			</div>

			<div class="flex items-center gap-4">
				<button type="submit" class="btn-primary">Create Admin</button>
				<a href="{{ route('admin.dashboard') }}" class="link">Cancel</a>
			</div>
		</form>
	</div>

</div>

</x-app-layout>
