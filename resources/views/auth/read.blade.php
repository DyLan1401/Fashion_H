@extends( 'layouts.navbar')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                             <th>Phone</th>
                              <th>Address</th>
                            <th>Mật khẩu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$messi->id}}</td>
                            <td>{{$messi->name}}</td>
                            <td>{{$messi->email}}</td>
                            <td>{{$messi->phone}}</td>
                            <td>{{$messi->address}}</td>
                         
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

