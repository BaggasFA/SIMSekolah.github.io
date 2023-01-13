@extends('layouts.master')
@section('page_title', 'Edit Student')
@section('content')

        <div class="card">
            <div class="card-header bg-white header-elements-inline">
                <h6 id="ajax-title" class="card-title">Form Pengisian Untuk Merubah Data {{ $sr->user->name }}</h6>

                {!! Qs::getPanelOptions() !!}
            </div>

            <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-update" data-reload="#ajax-title" action="{{ route('students.update', Qs::hash($sr->id)) }}" data-fouc>
                @csrf @method('PUT')
                <h6>Data Pribadi</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap: <span class="text-danger">*</span></label>
                                <input value="{{ $sr->user->name }}" required type="text" name="name" placeholder="Nama Lengkap" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat: <span class="text-danger">*</span></label>
                                <input value="{{ $sr->user->address }}" class="form-control" placeholder="Address" name="alamat" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email: <span class="text-danger">*</span></label>
                                <input value="{{ $sr->user->email  }}" type="email" name="email" class="form-control" placeholder="email">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Pilih..">
                                    <option value=""></option>
                                    <option {{ ($sr->user->gender  == 'Male' ? 'selected' : '') }} value="Male">Laki-Laki</option>
                                    <option {{ ($sr->user->gender  == 'Female' ? 'selected' : '') }} value="Female">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>No.Hp:</label>
                                <input value="{{ $sr->user->phone  }}" type="text" name="phone" class="form-control" placeholder="0812345678" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>No.Telp:</label>
                                <input value="{{ $sr->user->phone2  }}" type="text" name="phone2" class="form-control" placeholder="0212345678" >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Lahir:</label>
                                <input name="dob" value="{{ $sr->user->dob  }}" type="text" class="form-control date-pick" placeholder="Pilih Tanggal...">

                            </div>
                        </div>

                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">Nationality: <span class="text-danger">*</span></label>
                                <select data-placeholder="Choose..." required name="nal_id" id="nal_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($nationals as $na)
                                        <option {{  ($sr->user->nal_id  == $na->id ? 'selected' : '') }} value="{{ $na->id }}">{{ $na->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="col-md-3">
                            <label for="kecamatan_id">Kecamatan: <span class="text-danger">*</span></label>
                            <select required data-placeholder="Choose.." class="select-search form-control" name="kecamatan_id" id="kecamatan_id">
                                <option value=""></option>
                                @foreach($kecamatans as $kecamatan)
                                    <option {{ ($sr->user->kecamatan_id  == $kecamatan->id ? 'selected' : '') }} value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="col-md-3">
                            <label for="lga_id">LGA: <span class="text-danger">*</span></label>
                            <select required data-placeholder="Select kecamatan First" class="select-search form-control" name="lga_id" id="lga_id">
                                @if($sr->user->lga_id)
                                    <option selected value="{{ $sr->user->lga_id }}">{{ $sr->user->lga->name}}</option>
                                @endif
                            </select>
                        </div> --}}

                    </div>
                    <div class="row">
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="bg_id">Blood Group: </label>
                                <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    @foreach(App\Models\BloodGroup::all() as $bg)
                                        <option {{ ($sr->user->bg_id  == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="d-block">Foto:</label>
                                <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="file-input" data-fouc>
                                <span class="form-text text-muted">Format Gambar: jpeg, png. Max file size 2Mb</span>
                            </div>
                        </div>
                    </div>

                </fieldset>

                <h6>Data Siswa</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_class_id">Kelas: </label>
                                <select onchange="getClassSections(this.value)" name="my_class_id" required id="my_class_id" class="form-control select-search" data-placeholder="Pilih Kelas">
                                    <option value=""></option>
                                    @foreach($my_classes as $c)
                                        <option {{ $sr->my_class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Section: </label>
                                <select name="section_id" required id="section_id" class="form-control select" data-placeholder="Pilih Section">
                                    <option value="{{ $sr->section_id }}">{{ $sr->section->name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_parent_id">Orang tua: </label>
                                <select data-placeholder="Pilih..."  name="my_parent_id" id="my_parent_id" class="select-search form-control">
                                    <option  value=""></option>
                                    @foreach($parents as $p)
                                        <option {{ (Qs::hash($sr->my_parent_id) == Qs::hash($p->id)) ? 'selected' : '' }} value="{{ Qs::hash($p->id) }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year_admitted">Tahun Diterima: </label>
                                <select name="year_admitted" data-placeholder="Pilih..." id="year_admitted" class="select-search form-control">
                                    <option value=""></option>
                                    @for($y=date('Y', strtotime('- 10 years')); $y<=date('Y'); $y++)
                                        <option {{ ($sr->year_admitted == $y) ? 'selected' : '' }} value="{{ $y }}">{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <label for="dorm_id">Dormitory: </label>
                            <select data-placeholder="Choose..."  name="dorm_id" id="dorm_id" class="select-search form-control">
                                <option value=""></option>
                                @foreach($dorms as $d)
                                    <option {{ ($sr->dorm_id == $d->id) ? 'selected' : '' }} value="{{ $d->id }}">{{ $d->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dormitory Room No:</label>
                                <input type="text" name="dorm_room_no" placeholder="Dormitory Room No" class="form-control" value="{{ $sr->dorm_room_no }}">
                            </div>
                        </div>
                    </div> --}}
                </fieldset>

            </form>
        </div>
@endsection
