<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="{{ url('css/table.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <script>
        // Convert Blade variable to JS object
        const avgSalaryPerDept = @json($avgSalaryPerDept);
        const totalEmployeesPerDept = @json($totalEmployeesPerDept);
    </script>
    <div class="topnav">
        <div>
            <h1>Dashboard</h1>
        </div>
        <div class="btn">
            <button onclick="window.location.href='{{ route('users.createUser') }}'">Create</button>
            <div class="search_block">
                <input type="text" placeholder="Enter name">
                <button>Search</button>
            </div>
            <form action="{{ route('users.logout') }}" method="POST" id="logoutForm">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
    <!-- charts -->
    <div class="user_dashboard">
        <div class="chart_vertical">
            <div id="chartContainer" class="chart">
                <div>
                    <div class="btn">
                        <button class="outline_button" type="button" id="toggleButton">Toggle</button>
                        <!-- <button class="outline_button" type="button" onclick="toogle()">Toggle</button> -->
                    </div>
                    <canvas id="chartCanvas"></canvas>
                </div>
                <script type="module" src="{{ asset('js/app.js') }}"></script>
                </script>
                <!-- <script>
                    // Assuming avgSalaryPerDept is passed from the controller
                    const avgSalaryPerDept = @json($avgSalaryPerDept); // Convert Blade variable to JS object
                </script> -->
                <!-- <script type="module" src="{{ asset('js/barChart.js') }}"></script> -->
                <!-- <script type="module" src="{{ asset('js/app.js') }}"></script> </script> -->
            </div>
            <div class="side_menu">
                <div>
                    <canvas id="barChart"></canvas>
                </div>

                <script src="{{ asset('js/verticalbar.js') }}"></script>
            </div>
        </div>
        <!-- table -->
        <div class="tabular_data">
            <div class="table">
                <div class="table_name">
                    <h3>User Table</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Profile Picture</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    @if ($user->profile_picture)
                                        <img src="{{ asset('uploads/user/' . $user->profile_picture) }}"
                                            alt="{{ $user->name }} profile picture">
                                    @else
                                        <p>No profile picture</p>
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->department }}</td>
                                <td>{{ $user->salary_ctc }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($users->hasPages())
                    <div class="pagination">
                        @if (!$users->onFirstPage())
                            <a href="{{ $users->previousPageUrl() }}" rel="prev">Prev</a>
                        @endif
                        @for ($i = $users->currentPage(); $i <= $users->currentPage() + 2 && $i <= $users->lastPage(); $i++)
                            <a href="{{ $users->url($i) }}"
                                class="{{ $users->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                        @endfor
                        @if ($users->hasMorePages())
                            <a href="{{ $users->nextPageUrl() }}" rel="next">Next</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
