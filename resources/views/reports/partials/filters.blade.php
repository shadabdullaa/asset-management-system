<div class="card mb-4">
    <div class="card-body">
        <form action="{{ $route }}" method="GET" id="report-filter-form">
            <div class="row g-3 align-items-end">
                {{-- Floor --}}
                <div class="col-12 col-md-6 col-lg">
                    <label for="floor_id" class="form-label">Floor</label>
                    <select class="form-select uniform-input w-100" id="floor_id" name="floor_id" style="height: 2.5rem;">
                        <option value="">All Floors</option>
                        @foreach($floors as $floor)
                            <option value="{{ $floor->id }}" {{ request('floor_id') == $floor->id ? 'selected' : '' }}>
                                {{ $floor->floor_name ?? $floor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Department --}}
                <div class="col-12 col-md-6 col-lg">
                    <label for="department_id" class="form-label">Department</label>
                    <select class="form-select uniform-input w-100" id="department_id" name="department_id" style="height: 2.5rem;">
                        <option value="">All Departments</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>
                                {{ $dept->department_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Category --}}
                <div class="col-12 col-md-6 col-lg">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select uniform-input w-100" id="category_id" name="category_id" style="height: 2.5rem;">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- From Date --}}
                <div class="col-12 col-md-6 col-lg">
                    <label for="from_date" class="form-label">From Date</label>
                    <input type="date" class="form-control uniform-input w-100" id="from_date" name="from_date" value="{{ request('from_date') }}" style="height: 2.5rem;">
                </div>

                {{-- To Date --}}
                <div class="col-12 col-md-6 col-lg">
                    <label for="to_date" class="form-label">To Date</label>
                    <input type="date" class="form-control uniform-input w-100" id="to_date" name="to_date" value="{{ request('to_date') }}" style="height: 2.5rem;">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end" style="gap: 0.25rem;">
                    <button type="submit" class="btn btn-primary d-flex align-items-center">
                        <i class="fas fa-filter me-2"></i>
                        <span>Apply Filters</span>
                    </button>
                    <a href="{{ $route }}" class="btn btn-secondary d-flex align-items-center">
                        <i class="fas fa-times me-2"></i>
                        <span>Clear Filters</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.input-icon-wrapper .form-select,
.input-icon-wrapper .form-control {
    height: 2.5rem;
}
.input-icon-wrapper i {
    display: none;
}
</style>
