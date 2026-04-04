@include('user.common.header')

<div class="row justify-content-center">
    <div class="col-md-8 py-5 my-5">
        <div class="card p-5 shadow-sm">
            <h3 class="text-primary mb-4">Edit Project</h3>

            {{-- Show warning if project is disabled --}}
                @if($project->status == 0)
                    <div class="alert alert-danger">
                        ❌ This project is disabled. You cannot edit this project.
                    </div>
                @endif
            <form action="{{ route('update_project', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3">
                    {{-- <label class="form-label">Project Title</label> --}}
                    <input type="text" name="title" class="form-control"
                           value="{{ $project->title }}"
                           {{ $project->status == 0 ? 'readonly' : '' }} required>
                </div>

                {{-- Location --}}
                <div class="mb-3">
                    {{-- <label class="form-label">Location</label> --}}
                    <input type="text" name="location" class="form-control"
                           value="{{ $project->location }}"
                           {{ $project->status == 0 ? 'readonly' : '' }} required>
                </div>

                {{-- Capacity --}}
                <div class="mb-3">
                    {{-- <label class="form-label">Capacity (kW)</label> --}}
                    <input type="number" name="capacity" class="form-control"
                           value="{{ $project->capacity }}"
                           {{ $project->status == 0 ? 'readonly' : '' }} required>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    {{-- <label class="form-label">Description</label> --}}
                    <textarea name="description" class="form-control" rows="4"
                              {{ $project->status == 0 ? 'readonly' : '' }}>{{ $project->description }}</textarea>
                </div>

                {{-- Current Image --}}
                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    @if($project->image)
                        <img src="{{ asset('uploads/' . $project->image) }}" width="60px" class="rounded mb-2" alt="Project Image">
                    @else
                        <span class="text-danger">No Image Uploaded</span>
                    @endif
                </div>

                {{-- Upload New Image --}}
                <div class="mb-3">
                    <label class="form-label">Change Image</label>
                    <input type="file" name="image" class="form-control" {{ $project->status == 0 ? 'disabled' : '' }}>
                </div>

                {{-- Update Button --}}
                <button type="submit" class="btn btn-primary" {{ $project->status == 0 ? 'disabled' : '' }}>
                    Update Project
                </button>
                <a href="{{ route('projects') }}" class="btn btn-primary">Back</a>
            </form>

            {{-- Success message --}}
            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
        </div>
    </div>
</div>

@include('user.common.footer')
