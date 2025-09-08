<div class="card mb-4">
    <div class="card-body">
        <form action="{{ $route }}" method="GET" id="report-filter-form">
            <div class="row g-3 align-items-end">
                {{-- Floor --}}
                <div class="col-12 col-md-6 col-lg">
                    <label for="floor_id" class="form-label">Floor</label>
                    <select class="form-select" id="floor_id" name="floor_id">
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
                    <select class="form-select" id="department_id" name="department_id">
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
                    <select class="form-select" id="category_id" name="category_id">
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
                    <input type="date" class="form-control" id="from_date" name="from_date" value="{{ request('from_date') }}">
                </div>

                {{-- To Date --}}
                <div class="col-12 col-md-6 col-lg">
                    <label for="to_date" class="form-label">To Date</label>
                    <input type="date" class="form-control" id="to_date" name="to_date" value="{{ request('to_date') }}">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                    <a href="{{ $route }}" class="btn btn-secondary">Clear Filters</a>
                </div>
            </div>
        </form>
    </div>
</div>

@if(collect(request()->query())->except('page')->isNotEmpty())
    <div class="mb-3">
        <h6>Active Filters:</h6>
        <div class="d-flex flex-wrap gap-2">
            @if($activeFloor = $floors->find(request('floor_id')))<span class="badge bg-info text-dark">Floor: {{ $activeFloor->floor_name ?? $activeFloor->name }}</span>@endif
            @if($activeDept = $departments->find(request('department_id')))<span class="badge bg-info text-dark">Department: {{ $activeDept->department_name }}</span>@endif
            @if($activeCat = $categories->find(request('category_id')))<span class="badge bg-info text-dark">Category: {{ $activeCat->name }}</span>@endif
            @if(request('from_date'))<span class="badge bg-info text-dark">From: {{ request('from_date') }}</span>@endif
            @if(request('to_date'))<span class="badge bg-info text-dark">To: {{ request('to_date') }}</span>@endif
        </div>
    </div>
@endif

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const floorSelect = document.getElementById('floor_id');
    const departmentSelect = document.getElementById('department_id');
    const initialFloorId = '{{ request('floor_id') }}';
    const initialDepartmentId = '{{ request('department_id') }}';

    function fetchDepartments(floorId, selectedDepartmentId = null) {
        if (!floorId) {
            departmentSelect.innerHTML = '<option value="">All Departments</option>';
            return;
        }

        fetch(`{{ url('api/floors') }}/${floorId}/departments`)
            .then(response => response.json())
            .then(departments => {
                departmentSelect.innerHTML = '<option value="">All Departments</option>';
                departments.forEach(dept => {
                    const option = new Option(dept.department_name, dept.id);
                    if (selectedDepartmentId && dept.id == selectedDepartmentId) {
                        option.selected = true;
                    }
                    departmentSelect.add(option);
                });
            })
            .catch(error => console.error('Error fetching departments:', error));
    }

    floorSelect.addEventListener('change', () => fetchDepartments(floorSelect.value));

    if (initialFloorId) {
        fetchDepartments(initialFloorId, initialDepartmentId);
    }
});
</script>
@endpush