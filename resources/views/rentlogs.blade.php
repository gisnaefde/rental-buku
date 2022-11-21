@extends ('layout.mainlayout')
@section('title', 'Dashboard')

@section('content')
<h3>Rent Logs List</h3>
<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Book</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
            </tr>
        </thead>
        <tbody>
            <!-- backround danger jika client telat mengembalikan buku dan kena denda -->
            <tr class="bg-danger">
                <td>1</td>
                <td>Gisna</td>
                <td>Programmer</td>
                <td>12-12-2022</td>
                <td>12-12-2022</td>
                <td>12-12-2022</td>
            </tr>
        </tbody>
        <tbody>
            <!-- bg-success jika client tepat waktu mengembalikan -->
            <tr class="bg-success">
                <td>1</td>
                <td>Gisna</td>
                <td>Programmer</td>
                <td>12-12-2022</td>
                <td>12-12-2022</td>
                <td>12-12-2022</td>
            </tr>
        </tbody>
        <tbody>
            <!-- bg putih jika client belum mengembalikan buku -->
            <tr>
                <td>1</td>
                <td>Gisna</td>
                <td>Programmer</td>
                <td>12-12-2022</td>
                <td>12-12-2022</td>
                <td>12-12-2022</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection