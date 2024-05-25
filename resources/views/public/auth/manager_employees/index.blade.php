@extends('public.auth.layouts.master')

@section('content_auth')
<div class="border-bottom mb-3 d-flex justify-content-between align-items-center my-2 pb-3">
    <h2 class="fw-bold mb-0">Quản lý nhân viên</h2>
    <a href="{{ route('manager_employee.create') }}" class="btn btn-cyan">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M5 12l14 0" />
        </svg>
        @lang('Thêm nhân viên')</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th style="width: 10%">@lang('serial')</th>
                    <th>@lang('fullname')</th>
                    <th>@lang('phone')</th>
                    <th>@lang('address')</th>
                    <th class="text-center">{{__('Thao tác')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $employee)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <div class="d-flex py-1 align-items-center">
                            <div class="flex-fill">
                                <div class="font-weight-medium">{{$employee->fullname}}</div>
                                <div class="text-muted"><a href="#" class="text-reset">{{$employee->email}}</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="text-muted">{{$employee->username}}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{$employee->address}}</div>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('manager_employee.edit', $employee->id) }}"
                            class="text-decoration-none text-cyan m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                <path d="M13.5 6.5l4 4" />
                            </svg>
                        </a>
                        <a href="#" class="text-decoration-none text-danger m-0 open-modal-delete"
                            data-bs-toggle="modal" data-bs-target="#modalDelete"
                            data-route="{{ route('manager_employee.delete', $employee->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash m-0"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection