@extends('layouts.app') {{-- or your layout file --}}

@section('content')
<div class="container">
    <h2>Add Project</h2>

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
            @error('title') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Category</label>
            <select name="category_id" required>
                <option value="">Select Category</option>
                @foreach(\App\Models\Category::active()->ordered()->get() as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Description</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Tags (comma separated)</label>
            <input type="text" name="tags" value="{{ old('tags') }}">
        </div>

        <div>
            <label>Badge (optional)</label>
            <input type="text" name="badge" value="{{ old('badge') }}">
        </div>

        <div>
            <label>Image (optional)</label>
            <input type="file" name="image" accept="image/*">
            @error('image') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Link (optional)</label>
            <input type="url" name="link" value="{{ old('link') }}">
        </div>

        <button type="submit">Save Project</button>
    </form>
</div>
@endsection
