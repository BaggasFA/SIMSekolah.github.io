@extends('layouts.master')
@section('page_title', 'Manage Users')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Pengguna</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-user" class="nav-link active" data-toggle="tab">Tambah Pengguna</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage Pengguna</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($user_types as $ut)
                            <a href="#ut-{{ Qs::hash($ut->id) }}" class="dropdown-item" data-toggle="tab">{{ $ut->name }}s</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="new-user">
                    {{-- <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('users.store') }}" data-fouc> --}}
                    <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation" action="{{ route('users.store') }}" data-fouc>
                        @csrf
                    <h6>Data Pribadi</h6>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="user_type"> Pilih Jenis Pengguna: <span class="text-danger">*</span></label>
                                        <select required data-placeholder="Pilih Jenis Pengguna" class="form-control select" name="user_type" id="user_type" onchange="doe()">
                                            @foreach($user_types as $ut)
                                                <option value="{{ Qs::hash($ut->id) }}">{{ $ut->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Lengkap: <span class="text-danger">*</span></label>
                                        <input value="{{ old('name') }}" required type="text" name="name" placeholder="Nama Lengkap" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat: <span class="text-danger">*</span></label>
                                        <input value="{{ old('address') }}" class="form-control" placeholder="Alamat" name="address" type="text" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Email: </label>
                                        <input value="{{ old('email') }}" type="email" name="email" class="form-control" placeholder="email">
                                    </div>
                                </div>

                                <div class="col-md-3" id="usernamedivteacher">
                                    <div class="form-group">
                                        <label>Username: <span class="text-danger">*</span></label>
                                        <input value="{{ old('username') }}" type="text" name="username" class="form-control" placeholder="Username" id="usernameinput">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>No.Hp:</label>
                                        <input value="{{ old('phone') }}" type="text" name="phone" class="form-control" placeholder="0812345678" >
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>No.Telp:</label>
                                        <input value="{{ old('phone2') }}" type="text" name="phone2" class="form-control" placeholder="0212345678" >
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3" id="doe">
                                    <div class="form-group">
                                        <label>Tanggal Mulai Kerja: <span class="text-danger">*</span></label>
                                        <input autocomplete="off" name="emp_date" value="{{ old('emp_date') }}" type="text" class="form-control date-pick" placeholder="Pilih Tanggal..." id="doeinput">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Password: </label>
                                        <input id="password" type="password" name="password" class="form-control"  >
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">Gender: <span class="text-danger">*</span></label>
                                        <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Pilih..">
                                            <option value=""></option>
                                            <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Laki-Laki</option>
                                            <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nal_id">Nationality: <span class="text-danger">*</span></label>
                                        <select data-placeholder="Choose..." required name="nal_id" id="nal_id" class="select-search form-control">
                                            <option value=""></option>
                                            @foreach($nationals as $nal)
                                                <option {{ (old('nal_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="row">
                                {{--State--}}
                                <div class="col-md-4">
                                    <label for="kecamatan_id">Kecamatan: <span class="text-danger">*</span></label>
                                    <select required data-placeholder="Choose.." class="select-search form-control" name="kecamatan_id" id="kecamatan_id">
                                        <option value=""></option>
                                        @foreach($kecamatans as $kecamatan)
                                            <option {{ (old('kecamatan_id') == $kecamatan->id ? 'selected' : '') }} value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--LGA--}}
                                {{-- <div class="col-md-4">
                                    <label for="lga_id">LGA: <span class="text-danger">*</span></label>
                                    <select required data-placeholder="Select kecamatan First" class="select-search form-control" name="lga_id" id="lga_id">
                                        <option value=""></option>
                                    </select>
                                </div> --}}
                                {{--BLOOD GROUP--}}
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bg_id">Blood Group: </label>
                                        <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">
                                            <option value=""></option>
                                            @foreach($blood_groups as $bg)
                                                <option {{ (old('bg_id') == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                            </div>

                            <div class="row">
                                {{--PASSPORT--}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="d-block">Foto:</label>
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="file-input" data-fouc>
                                        <span class="form-text text-muted">Format Gambar: jpeg, png. Max file size 2Mb</span>
                                    </div>
                                </div>
                            </div>

                        </fieldset>



                    </form>
                </div>

                @foreach($user_types as $ut)
                    <div class="tab-pane fade" id="ut-{{Qs::hash($ut->id)}}">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>No.Hp</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users->where('user_type', $ut->title) as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $u->photo }}" alt="photo"></td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->username }}</td>
                                    <td>{{ $u->phone }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    {{--View Profile--}}
                                                    <a href="{{ route('users.show', Qs::hash($u->id)) }}" class="dropdown-item"><i class="icon-eye"></i> Lihat Profil</a>
                                                    {{--Edit--}}
                                                    <a href="{{ route('users.edit', Qs::hash($u->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                @if(Qs::userIsSuperAdmin())

                                                        <a href="{{ route('users.reset_pass', Qs::hash($u->id)) }}" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>
                                                        {{--Delete--}}
                                                        <a id="{{ Qs::hash($u->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                        <form method="post" id="item-delete-{{ Qs::hash($u->id) }}" action="{{ route('users.destroy', Qs::hash($u->id)) }}" class="hidden">@csrf @method('delete')</form>
                                                @endif

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    {{--Student List Ends--}}
@endsection
