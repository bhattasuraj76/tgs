@extends('backend.master.master')
@section('activeDashboard', 'active')
@section('title', 'Dashboard')
@section('content')
<section class="page-content container-fluid">
    <section class="page-content container-fluid">
        @include('errors.errors')
        <!-- <div class="card">
            <div class="card-header">
                <h2>Recent Tokens</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Token ID</th>
                            <th>Department</th>
                            <th>Date</th>
                            <th>Time Slot</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse( $tokens as $key => $each)
                        <tr>
                            <td>{{ $each->id}}</td>
                            <td>{{ $each->department_name}}</td>
                            <td>{{ $each->date}}</td>
                            <td>{{ $each->time_slot}}</td>
                            <td>{{ $each->name}}</td>
                            <td>{{ $each->phone}}</td>
                            <td>
                                @if( $each->status == 'valid')
                                <a class="btn btn-sm  btn-success text-white" href="{{route('admin.token.status.change', $each->id)}}">Valid</a>
                                @else
                                <a class="btn btn-sm btn-danger text-white" href="{{route('admin.token.status.change', $each->id)}}">Invalid</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.token.show', $each->id)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye btn-info"></i>
                                </a>
                                <form action="{{route('admin.token.destroy', $each->id)}}" method="POST" onsubmit="return confirmDelete(event, this)" class="d-inline">
                                    {{method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash btn-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Sorry, there are no recent tokens</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$tokens->render()}}
            </div>
        </div> -->
    </section>
</section>
@endsection