@extends('layouts.app')
@section('content')
<form id="attendanceForm">
    <label for="employeeCode">Employee Code:</label>
    <input type="text" id="employeeCode" name="EmployeeCode" required><br><br>

    <label for="year">Year:</label>
    <input type="number" id="year" name="Year" required><br><br>

    <label for="month">Month:</label>
    <select id="month" name="Month" required>
        <option value="january">January</option>
        <option value="february">February</option>
        <option value="march">March</option>
        <option value="april">April</option>
        <option value="may">May</option>
        <option value="june">June</option>
        <option value="july">July</option>
        <option value="august">August</option>
        <option value="september">September</option>
        <option value="october">October</option>
        <option value="november">November</option>
        <option value="december" selected>December</option>
    </select><br><br>

    <button type="submit">Fetch Attendance</button>
</form>
<div id="attendanceResult"></div>

<script>
    $(document).ready(function () {
        $('#attendanceForm').on('submit', function (e) {
            e.preventDefault(); // Prevent form submission

            const apiUrl = 'http://apps.amangroupbd.com:1001/api/DailyAttendance/searchAttendances';
            const params = {
                EmployeeCode: $('#employeeCode').val(),
                Year: $('#year').val(),
                Month: $('#month').val()
            };

            $.ajax({
                url: apiUrl,
                type: 'GET',
                data: params,
                dataType: 'json',
                success: function (response) {
                    let html = '<h2>Attendance Data:</h2>';
                    if (response && response.data) {
                        html += `<pre>${JSON.stringify(response.data, null, 2)}</pre>`;
                    } else {
                        html += '<p>No data found.</p>';
                    }
                    $('#attendanceResult').html(html);
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    $('#attendanceResult').html(`<p>Error fetching data: ${error}</p>`);
                }
            });
        });
    });
</script>


 <form id="loginForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <div id="loginResult"></div>

    <script>
        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                const apiUrl = 'http://192.168.2.217:1001/api/auth/login';
                const loginData = {
                    username: $('#username').val(),
                    password: $('#password').val()
                };

                $.ajax({
                    url: apiUrl,
                    type: 'POST',
                    data: JSON.stringify(loginData),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function (response) {
                        if (response.token) {
                            $('#loginResult').html('<p>Login successful!</p>');
                            console.log('Token:', response.token); // Use or store the token as needed
                        } else {
                            $('#loginResult').html('<p>Login failed: Invalid response.</p>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        let errorMessage = 'Login failed.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        $('#loginResult').html(`<p>${errorMessage}</p>`);
                    }
                });
            });
        });
    </script>
@endsection
