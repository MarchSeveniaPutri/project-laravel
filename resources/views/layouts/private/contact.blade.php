@extends('layouts.private.index')
@section('container')
    
<div class="d-flex flex-column justify-content-between align-items-start pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 welcome-message">My Contacts</h1>
</div>

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
    {{ session('success') }}
    </div>
    @endif

    <div class="card shadow mb-4" style="margin: 10px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Contact Setting</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Message</th>
                            <th scope="col" style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phonenumber }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>
                                <a href="/dashboard/contacts/{{ $contact->id }}" class="badge bg-info"><i class="fa-regular fa-eye"></i></a>
                                <form action="/dashboard/contacts/{{ $contact->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><i class="fa-regular fa-rectangle-xmark"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection