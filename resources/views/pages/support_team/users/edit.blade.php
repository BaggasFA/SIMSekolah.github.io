@extends('layouts.master')
@section('page_title', 'Edit User')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Detail Pengguna</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            {{-- <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-update" action="{{ route('users.update', Qs::hash($user->id)) }}" data-fouc> --}}
            <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation" action="{{ route('users.update', Qs::hash($user->id)) }}" data-fouc>
                @csrf @method('PUT')
                <h6>Data Pribadi</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="user_type"> Pilih Jenis Pengguna: <span class="text-danger">*</span></label>
                                <select disabled="disabled" class="form-control select" id="user_type">
                                    <option value="">{{ strtoupper($user->user_type) }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Lengkap: <span class="text-danger">*</span></label>
                                <input value="{{ $user->name }}" required type="text" name="name" placeholder="Nama Lengkap" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat: <span class="text-danger">*</span></label>
                                <input value="{{ $user->address }}" class="form-control" placeholder="Alamat" name="address" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email: </label>
                                <input value="{{ $user->email }}" type="email" name="email" class="form-control" placeholder="email">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No.Hp:</label>
                                <input value="{{ $user->phone }}" type="text" name="phone" class="form-control" placeholder="0812345678" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No.Telp:</label>
                                <input value="{{ $user->phone2 }}" type="text" name="phone2" class="form-control" placeholder="0212345678" >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        @if(in_array($user->user_type, Qs::getStaff()))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Mulai Kerja:</label>
                                    <input autocomplete="off" name="emp_date" value="{{ $user->staff->first()->emp_date }}" type="text" class="form-control date-pick" placeholder="Pilih Tanggal...">

                                </div>
                            </div>
                        @endif

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Pilih..">
                                    <option value=""></option>
                                    <option {{ ($user->gender == 'Male') ? 'selected' : '' }} value="Male">Laki-Laki</option>
                                    <option {{ ($user->gender == 'Female') ? 'selected' : '' }} value="Female">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="nal_id">Nationality: <span class="text-danger">*</span></label>
                                <select data-placeholder="Choose..." required name="nal_id" id="nal_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($nationals as $nal)
                                        <option {{ ($user->nal_id == $nal->id) ? 'selected' : '' }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="kecamatan_id">Kecamatan: <span class="text-danger">*</span></label>
                            <select required data-placeholder="Choose.." class="select-search form-control" name="kecamatan_id" id="kecamatan_id">
                                <option value=""></option>
                                @foreach($kecamatans as $kecamatan)
                                    <option {{ ($user->kecamatan_id == $kecamatan->id ? 'selected' : '') }} value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="col-md-4">
                            <label for="lga_id">LGA: <span class="text-danger">*</span></label>
                            <select required data-placeholder="Select kecamatan First" class="select-search form-control" name="lga_id" id="lga_id">
                                <option value="{{ $user->lga_id ?? '' }}">{{ $user->lga->name ?? '' }}</option>
                            </select>
                        </div> --}}

                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="bg_id">Blood Group: </label>
                                <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    @foreach($blood_groups as $bg)
                                        <option {{ ($user->bg_id == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                    </div>

                    {{--Passport--}}
                    <div class="row">
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

    </div>
@endsection
